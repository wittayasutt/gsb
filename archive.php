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
					'posts_per_page'	=> 3,
					'cat'	=> $cat,
					'post_type'		=> 'post',
					'meta_key'		=> 'select_banner',
					'meta_value'	=> '1'
				 );
				$query = new WP_Query( $args );
				while ( $query->have_posts() ) : $query->the_post();

				get_template_part( 'template-parts/content', 'carousel');
				endwhile;
				wp_reset_query();
				?>


				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div id="primary" class="content-area <?php echo '-'.SEED_BLOG_LAYOUT; ?>">
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
					get_template_part( 'template-parts/content');
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
<?php get_footer(); ?>
