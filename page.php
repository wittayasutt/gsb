<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package seed
 */

get_header();?>
<div class="container">
	<div class="row">
		<div class="col s12">
				<div class="main-header">
						<h2 class="main-title"><?php the_title(); ?></h2>
				</div>
		</div>
	</div>
	<div id="primary" class="content-area">
		<main id="main" class="site-main -hide-title" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				
				<?php get_template_part( 'template-parts/content', 'page' ); ?>
				
				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!--container-->
<script>
		jQuery(document).ready(function ($) {
				$('select').material_select();
		});
</script>
<?php get_footer(); ?>