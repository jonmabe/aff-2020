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

$args = array(  
	'post_type' => 'artist',
	'post_status' => 'publish',
	'posts_per_page' => 100, 
	'orderby' => 'title', 
	'order' => 'ASC', 
);
$loop = new WP_Query( $args ); 
$col_count = 0;
$tent_background_number = 0;
?>
<div class="col-md-auto" id="AFF-left-col">
	<?php
		get_sidebar('home-link');
	?>
	<div class="AFF-ArtistsBanner">
		<div class="AFF-ArtBanner-Content">
			<h3>HALLOWEEN...</h3>
			<p>
				is a time for WILD <br>
				Costumes, fun <br>
				DECORATIONS & <br>
				creativity!
			</p>
			<p>
				We’ve gathered <br>
				some of our <br>
				favorite ARTISTs, <br>
				from regions <br>
				beyond, To HELP <br>
				us celebrate the <br>
				season with <br>
				ghoulish delight.
			</p>
			<h4 id="AFF-h4a">CLICK!</h4>
			<h4 id="AFF-h4b">SHOP!</h4>
			<h4 id="AFF-h4c">SUPPORT!</h4>
		</div>
	</div>
	<?php
		get_sidebar('left-common');
	?>
</div>
<div class="col-md-auto" id="AFF-mid-col">
	<?php
		get_sidebar('nav');
	?>
	<div class="AFF-ArtistsHeader">
		<img src="<?php bloginfo('stylesheet_directory'); ?>/images/ArtistsHeader.png" id="AFF-ArtistsHeader" alt="<?php bloginfo( 'name' ); ?>; <?= get_bloginfo( 'description', 'display' ) ?>">
	</div>
	<div class="AFF-ArtistsBody">
		<img src="<?php bloginfo('stylesheet_directory'); ?>/images/MSRightStar01.png" alt="Stars" id="AFF-MSRightStar01">
		<img src="<?php bloginfo('stylesheet_directory'); ?>/images/MSLeftStars.png" alt="Stars" id="AFF-MSLeftStars">
		<div id="primary" class="site-main container AFF-ArtistsTents">
			<?php
			while ( $loop->have_posts() ) : $loop->the_post(); 
				$image = get_field('thumbnail_photo');
				$rotate_image_degrees = rand(-2,2);
				if($rotate_image_degrees == 0) $rotate_image_degrees = -1;
				if($tent_background_number == 6)
					$tent_background_number = 1;
				else $tent_background_number++;
			?>
				<? if($col_count % 3 == 0) { ?>
				<div class="row">
				<?php } ?>
					<div class="col-sm AFF-ArtistsTent AFF-Tent-<?echo $tent_background_number ?>">
						<div class="container AFF-ArtTentContainer">
							<div class="row">
								<div class="col">
									<div class="AFF-Tent-ImageContainer">
									<a href="<?= get_field('website') ?>" target="_blank">
										<? if ($image) {
											echo wp_get_attachment_image($image['ID'], 'festival-act-thumbnail-nocrop', false, array( "class" => "AFF-Tent-Image", "style" => "transform: rotate(". $rotate_image_degrees ."deg);"));
										} ?>
									</a>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<h3><a href="<?= get_field('website') ?>" target="_blank"><? the_title() ?></a></h3>
								</div>
							</div>
						</div>
					</div>
				<? if(($col_count + 1) % 3 == 0) { ?>
				</div>
				<?php } ?>
			<?php
				$col_count++;
			endwhile;
			?>
			<? if(($col_count) % 3 != 0) { ?>
				</div>
			<?php } ?>
		</div>

<?php
wp_reset_postdata(); 

get_sidebar();
get_footer();
