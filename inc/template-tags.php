<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package seed
 */

if ( ! function_exists( 'seed_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function seed_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( '%s', 'post date', 'seed' ),
		'<i class="si-clock"></i><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( '%s', 'post author', 'seed' ),
		'<span class="author vcard"><i class="si-user"></i><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline">' . $byline . '</span>'; // WPCS: XSS OK.

	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'seed' ) );
		if ( $categories_list ) {
			printf( '<span class="cat-links"><i class="si-folder"></i>' . esc_html__( '%1$s', 'seed' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'seed' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links"><i class="si-tag"></i>' . esc_html__( '%1$s', 'seed' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

}
endif;

if ( ! function_exists( 'seed_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function seed_entry_footer() {

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'seed' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function seed_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'seed_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'seed_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so seed_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so seed_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in seed_categorized_blog.
 */
function seed_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'seed_categories' );
}
add_action( 'edit_category', 'seed_category_transient_flusher' );
add_action( 'save_post',     'seed_category_transient_flusher' );


/**
 * Output Numbered Pagination
 * https://codex.wordpress.org/Function_Reference/paginate_links
 */
function seed_posts_navigation() {
	printf('<div class="content-pagination">');
	global $wp_query; $big = 9999999; 
	echo paginate_links( 
		array(
				'base' 		=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' 	=> '?paged=%#%',
				'current'	=> max( 1, get_query_var('paged') ),
				'total' 	=> $wp_query->max_num_pages,
				'prev_text'  => '<i class="si-angle-left"></i>',
				'next_text'  => '<i class="si-angle-right"></i>',
		));
	printf('</div>');
}