<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package seed
 */

get_header(); ?>
<div class="post-thumbnail">
  <a href="javascript:history.back()"><i class="fa fa-chevron-left"></i></a>
	<?php the_post_thumbnail('full'); ?>
</div>
<div class="container">
	<div id="primary" class="entry-content <?php echo '-'.SEED_BLOG_LAYOUT; ?>">
		<main id="main" class="site-main -hide-title" role="main">

      <div class="row">
        <div class="col m12 s12">
          <h2 class="member-name"><?php the_title(); ?></h2>
          <div class="sussess-title-modal">
            <p class="type-company">
              <?php the_field( 'company_type' ); ?></p>
            <h3 class="member-company"><?php the_field( 'company_name' ); ?></h3>
          </div>
          <a class="member-web" target="_blank" href="<?php the_field( 'company_web' ); ?>"><i class="fa fa-arrow-right" aria-hidden="true"></i> <?php the_field( 'company_web' ); ?></a>
          <div class="content"><?php echo get_field( 'company_info' ); ?></div>
          <hr>
        </div>
        <div class="col m6 s12">
          <p class="additional"><span class="heading">เบอร์ติดต่อ:</span> <?php the_field( 'company_phone' ); ?></p>
        </div>
        <div class="col m6 s12">
          <p class="additional"><span class="heading">ที่อยู่:</span> <?php the_field( 'company_address' ); ?></p>
        </div>
      </div>
		</main><!-- #main -->
	</div><!-- #primary -->


</div><!--container-->

<?php get_footer(); ?>
