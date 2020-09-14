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
?>
<div class="col-md-auto" id="AFF-left-col">
	<?php
		get_sidebar('home-link');
	?>
</div>
<div class="col-md-auto" id="AFF-mid-col-craft">
	<?php
		get_sidebar('nav');
	?>
	<div class="AFF-CraftsHeaderSub">
		<img src="<?php bloginfo('stylesheet_directory'); ?>/images/CraftsHeaderSub.png" alt="<?php bloginfo( 'name' ); ?>; <?= get_bloginfo( 'description', 'display' ) ?>" id="AFF-CraftsHeaderSub">
		<div class="AFF-CraftName">
			<h2><?= the_title() ?></h2>
		</div>
		<img src="<?php bloginfo('stylesheet_directory'); ?>/images/SponsorCircle.png" alt="Beige Circle with Sponsor Logo" class="AFF-SponsorCircle">
	</div>
	<div class="AFF-CraftsSubBody">
		<div class="container AFF-CraftContainer">
			<div class="row">
				<div class="col-md-auto AFF-CraftStepPhotoContainer">
					<img src="images/CraftImage01.png" alt="Step01" class="AFF-CraftStepPhoto">
				</div>
				<div class="col-md-auto AFF-CraftStepContainer">
					<h3>Title Here</h3>
					<p>Text Here</p>
				</div>
			</div>
		</div>
		<div class="AFF-ThanksFooter">
			<h3>THANKS MUZEO FOR YOUR PARTNERSHIP</h3>
			<h4><a href="#">www.MUZEO.org</a></h4>
		</div>
		<div class="AFF-SupportFooter">
			<h4>The Anaheim Fall Festival & Halloween Parade is a Registered 501(c)3 Non-Profit</h4>
		</div>

<?php
wp_reset_postdata(); 

get_sidebar();
get_footer();
