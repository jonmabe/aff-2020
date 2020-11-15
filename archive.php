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

$col_count = 0;
$tent_background_number = 0;
?>
<div class="col-md-auto" id="AFF-left-col">
	<?php
		get_sidebar('home-link');
	?>
	<div class="AFF-SidebarSmallBasicHeader"></div>
	<?php
		get_sidebar('history');
	?>
	<?php
		get_sidebar('left-common');
	?>
</div>
<div class="col-md-auto" id="AFF-mid-col">
	<?php
		get_sidebar('nav');
	?>
	<div class="AFF-SmallBasicHeader">
		<img src="<?php bloginfo('stylesheet_directory'); ?>/images/HistoryHeader-New2.png" id="AFF-SmallBasicHeader" alt="<?php bloginfo( 'name' ); ?>; <?= get_bloginfo( 'description', 'display' ) ?>">
	</div>
	<div class="AFF-HistoryBody">
		<img src="<?php bloginfo('stylesheet_directory'); ?>/images/ContestMiddleStar.png" alt="Stars" id="AFF-HistoryMiddleStar">
		<div id="primary" class="site-main">
			<?php
			while ( have_posts() ) : the_post(); 
				//$image = get_field('thumbnail_image');

				$rotate_image_degrees = rand(-2,2);
				if($rotate_image_degrees == 0) $rotate_image_degrees = -1;
				if($tent_background_number == 2)
					$tent_background_number = 1;
				else $tent_background_number++;
			?>
				<div class="container AFF-HistoryContainer AFF-HistoryC0<?= $tent_background_number ?>">
					<a href="<?= the_permalink() ?>"><? the_post_thumbnail('festival-act-thumbnail', false, array( "class" => "AFF-History-Image0".$tent_background_number, "style" => "transform: rotate(". $rotate_image_degrees ."deg);")); ?></a>
					<div class="row">
						<div class="col AFF-HistoryTitle0<?= $tent_background_number ?>">
							<a href="<?= the_permalink() ?>"><?= the_title() ?></a>
						</div>
					</div>
					<div class="row">
						<div class="col AFF-HistoryInfo0<?= $tent_background_number ?>">
							<?php the_excerpt() ?>
							<a href="<?= the_permalink() ?>" class="AFF-HistoryBtn0<?= $tent_background_number ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/ReadMoreBtn.png" alt="Entry Form Button Yellow Text Black Background"></a>
						</div>
					</div>
				</div>
			<?php
				$col_count++;
			endwhile;

			the_posts_navigation();
			?>
		</div>
<?php
wp_reset_postdata(); 

get_sidebar();
get_footer();
