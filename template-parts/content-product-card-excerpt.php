<?php
/**
 * Loop Name: Product Card with Excerpt
 */
?>
<?php
/**
 * Template part for displaying WooCommerce Product.
 *
 * @package seed
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product; ?>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class('seed-col'); ?>>
	<div class="content-item -card -product -excerpt">
		<a href="<?php echo esc_url( get_permalink( $product->id ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>">
			<div class="pic"><?php echo $product->get_image('shop_catalog'); ?></div>
			<div class="info">
				<h2 itemprop="name" class="entry-title product-title"><?php echo $product->get_title(); ?></h2>
				<?php if ( ! empty( $show_rating ) ) : ?>
					<?php echo $product->get_rating_html(); ?>
				<?php endif; ?>

				<div itemprop="description" class="product-summary">
					<?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?>
				</div>

				<div itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
					<p class="price"><?php echo $product->get_price_html(); ?></p>
				</div>

				<meta itemprop="url" content="<?php the_permalink(); ?>" />
			</div><!--info-->
		</a>
	</div>
</div>