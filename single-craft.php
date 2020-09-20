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

add_filter( 'wp_nav_menu_items', 'aff_craft_menu_items', 10, 2 );
function aff_craft_menu_items ( $items, $args ) {
	$link = get_theme_mod('aff_parade_flyer');
    $items .= '<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4034"><a href="'. $link .'" target="_blank">PARADE</a></li>';
    return $items;
}

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
		<a href="<?= get_permalink(get_page_by_path( 'crafts' )) ?>" rel="prev">
			<img src="<?php bloginfo('stylesheet_directory'); ?>/images/CraftsHeaderSub.png" alt="<?php bloginfo( 'name' ); ?>; <?= get_bloginfo( 'description', 'display' ) ?>" id="AFF-CraftsHeaderSub">
		</a>
		<div class="AFF-CraftName">
			<h2><?= the_title() ?></h2>
		</div>
		<div class="circular-logo AFF-SponsorCircle">
			<a href="<?= the_field('sponsor_link') ?>" target="_blank">
			<?php 
			$sponsor_logo = get_field('sponsor_logo');
			if($sponsor_logo){
				echo wp_get_attachment_image( $sponsor_logo['ID'], array(177,177) );
			}
			?>
			</a>
		</div>
	</div>
	<div class="AFF-CraftsSubBody">
		<div class="container AFF-CraftContainer">
			<?php while( have_rows('steps') ) : the_row(); ?>
			<div class="row">
				<div class="col-md-auto AFF-CraftStepPhotoContainer">
					<?php 
					$step_image = get_sub_field('image');
					if($step_image){
						echo wp_get_attachment_image( $step_image['ID'], array(162,162), false, array('class'=>'AFF-CraftStepPhoto'));
					}
					?>
				</div>
				<div class="col-md-auto AFF-CraftStepContainer">
					<h3><?= get_sub_field('title') ?></h3>
					<p><?= get_sub_field('description') ?></p>
				</div>
			</div>
			<?php endwhile; ?>
		</div>
		<?php if(get_field('signoff')) : ?>
		<div class="AFF-CraftSignoff">
			<?= get_field('signoff') ?>
		</div>
		<?php endif; ?>
		<div class="AFF-ThanksFooter">
			<h3>THANKS <?= the_field('sponsor_name') ?> FOR YOUR PARTNERSHIP</h3>
			<h4><a href="<?= the_field('sponsor_link') ?>" target="_blank"><?= the_field('sponsor_link_text') ?></a></h4>
		</div>
		<div class="nav-links">
			<div class="nav-previous">
				<a href="<?= get_permalink(get_page_by_path( 'crafts' )) ?>" rel="prev">&lt; Back to all Crafts</a>
			</div>
		</div>

<?php
wp_reset_postdata(); 

get_sidebar();
get_footer();
