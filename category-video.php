	<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package seed
 */

get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col s12">
				<div class="main-header">
						<?php the_archive_title( '<h2 class="main-title">', '</h2>' ); ?>
				</div>
		</div>
	</div>
	<div class="row">
		<div class="col s12">
			<div class="post-slide carousel carousel-slider center" data-indicators="true">
				<?php
				$args = array(
					'posts_per_page'	=> -1,
					'cat'	=> $cat,
					'post_type'		=> 'post',
					'meta_key'		=> 'select_banner',
					'meta_value'	=> '1'
				 );
				$query = new WP_Query( $args );
				while ( $query->have_posts() ) : $query->the_post(); ?>
				<?php get_template_part( 'template-parts/content', 'carousel');
				endwhile;
				wp_reset_postdata();
				?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col m12 s12">

			<!-- yp edit -->
			<div class="video_nav _mobile">
				<h2>วิดีโอโครงการ</h2>
				<?php
						$term_id = 5;
				    $taxonomy_name = 'category';
				    $termchildren = get_term_children( $term_id, $taxonomy_name );

				    echo '<select id="select_video_cat">';
						  echo '<option>' . 'ทั้งหมด' . '</option>';
				    foreach ( $termchildren as $child ) {
				        $term = get_term_by( 'id', $child, $taxonomy_name );
				        echo '<option value="' . $term->slug . '">' . $term->name . '</option>';
				    }
				    echo '</select>';
					?>
			</div>

				<div class="_desktop">
					<?php wp_nav_menu( array( 'theme_location' => 'video_menu', 'menu_id' => 'video-menu' ) ); ?>
				</div>

				<!-- end yp edit -->

		</div>
	</div>
	<div id="primary" class="row <?php echo '-'.SEED_BLOG_LAYOUT; ?>">
		<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : ?>
				<header class="page-header">
					<?php
					the_archive_title( '<h1 class="page-title entry-title hide">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
					?>
				</header><!-- .page-header -->

				<?php
				if ((int)SEED_BLOG_COLUMNS > 1) {
					echo '<div class="seed-grid-'.SEED_BLOG_COLUMNS.'">';
					while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content','card-excerpt');
					endwhile;
					echo '</div>';
				} else {
					while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content-video');
					endwhile;
				}
				?>

				<?php seed_posts_navigation(); ?>

			<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php
	switch (SEED_BLOG_LAYOUT) {
		case 'rightbar':
		get_sidebar('right');
		break;
		case 'leftbar':
		get_sidebar('left');
		break;
		case 'full-width':
		break;
		default:
		break;
	}
	?>
</div><!--container-->
<style media="screen">
	select{
		display: block!important;
	}
</style>

<script type="text/javascript">
jQuery(document).ready(function($) {
		$('#select_video_cat').on('change', function() {
			var	selects_active = this.value;
			window.location = selects_active;
		});
})
</script>
<?php get_footer(); ?>
