<?php
/**
 * Loop Name: Content Card Member
 */
?>
<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package seed
 */

$image_success_left = get_field('image_success_left');
$image_success_right = get_field('image_success_right');
$size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)
?>
<div class="col l3 m4 s12 _desktop">
	<a href="#<?php echo get_the_ID(); ?>" rel="modal:open">
		<div class="member z-depth-1 hoverable">
			<div class="member-photo">
			<?php if(has_post_thumbnail()) { the_post_thumbnail();} else { echo '<img src="' . esc_url( get_template_directory_uri()) .'/img/thumb.jpg" alt="'. get_the_title() .'" />'; }?>
			</div>
			<div class="member-info ">
				<h3 class="member-name"><?php the_title(); ?></h3>
				<h4 class="member-com"><?php the_field( 'company_name' ); ?></h4>
				<p class="member-desc -block-ellipsis-3"><?php the_field( 'company_desc' ); ?></p>
			</div>
		</div>
	</a>
	<div id="<?php echo get_the_ID(); ?>" class="modal main-success-box">
	  <div class="row">
	  	<div class="col m5 s12" style="padding: 0;">
	  		<div class="row">
	  			<div class="col m12 s12 main-success-img">
	  			<?php the_post_thumbnail('medium'); ?>
	  			</div>
	  			<div class="col m6 s12 left-success-img">
	  				<?php echo wp_get_attachment_image( $image_success_left, $size ); ?>
	  			</div>
	  			<div class="col m6 s12 eft-success-img">
	  				<?php echo wp_get_attachment_image( $image_success_right, $size ); ?>
	  			</div>
	  		</div>
	  	</div>
	  	<div class="col m7 s12" style="padding: 0;">
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
	  	</div>
	  </div>
	</div>
</div>





<div class="col l3 m4 s12 _mobile">
	<a href="<?php the_permalink(); ?>">
		<div class="member z-depth-1 hoverable">
			<div class="member-photo">
			<?php if(has_post_thumbnail()) { the_post_thumbnail();} else { echo '<img src="' . esc_url( get_template_directory_uri()) .'/img/thumb.jpg" alt="'. get_the_title() .'" />'; }?>
			</div>
			<div class="member-info ">
				<h3 class="member-name"><?php the_title(); ?></h3>
				<h4 class="member-com"><?php the_field( 'company_name' ); ?></h4>
				<p class="member-desc -block-ellipsis-3"><?php the_field( 'company_desc' ); ?></p>
			</div>
		</div>
	</a>

</div>
