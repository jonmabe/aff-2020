<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

get_header();


$cart_count = WC()->cart->cart_contents_count;
#if (is_single() && $args->theme_location == 'primary') {
if($cart_count > 0) {
	$cart_url = WC()->cart->get_cart_url();
}

?>
<div class="col-md-auto" id="AFF-left-col">
	<?php
		get_sidebar('home-link');
	?>
	<div class="AFF-SidebarSmallBasicHeader"></div>
	<?php
		get_sidebar('left-common');
	?>
</div>
<div class="col-md-auto" id="AFF-mid-col">
	<?php
		get_sidebar('nav');
	?>
	<div class="AFF-SmallBasicHeader">
	<a href="<?= get_permalink(get_page_by_path( 'shop' )) ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/ShopHeader.png" id="AFF-SmallBasicHeader" alt="<?php bloginfo( 'name' ); ?>; <?= get_bloginfo( 'description', 'display' ) ?>"></a>
	</div>
	<div class="AFF-GenericBodyContent">
		<?php if($cart_count) : ?>
		<div class="AFF-Cart"><a href="<?= $cart_url ?>">(<?= $cart_count ?>) Items in Cart</a></div>
		<?php endif; ?>
		<?php woocommerce_content(); ?>
		<div style="clear:both"></div>
<?php


get_sidebar();
get_footer();
