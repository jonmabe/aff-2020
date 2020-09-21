<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package _s
 */

get_header();
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
	<div class="AFF-header">
		<img src="<?php bloginfo('stylesheet_directory'); ?>/images/HeaderStars_S.png" alt="<?php bloginfo( 'name' ); ?>; <?= get_bloginfo( 'description', 'display' ) ?>" id="AFF-HeaderLogo">
	</div>
	<div class="AFF-HistoryBody">
		<div id="primary" class="site-main">
			<?php
				$step_image = get_field('main_photo');
				if($step_image){
					echo wp_get_attachment_image( $step_image['ID'], 'festival-artist-main', false, array('class'=>'AFF-CraftStepPhoto'));
				}
			?>
			<h1><?= the_title() ?></h1>
			<p>
				<?= get_field('description') ?>
			</p>
		</div>
		<div class="nav-links">
			<div class="nav-previous">
				<a href="<?= get_permalink(get_page_by_path( 'main-stage' )) ?>" rel="prev">&lt; Back to the Main Stage</a>
			</div>
		</div>

<?php
get_sidebar();
get_footer();
