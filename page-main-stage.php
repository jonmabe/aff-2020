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
	'post_type' => 'festivalact',
	'post_status' => 'publish',
	//'posts_per_page' => 8, 
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
	<div class="AFF-MainStageBanner">
		<div class="AFF-MSBanner-Content">
			
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
	<div class="AFF-MainStageHeader">
		<img src="<?php bloginfo('stylesheet_directory'); ?>/images/MainStageHeader.png" id="AFF-MainStageHeader" alt="<?php bloginfo( 'name' ); ?>; <?= get_bloginfo( 'description', 'display' ) ?>">
	</div>
	<div class="AFF-MainStageBody">
		<img src="<?php bloginfo('stylesheet_directory'); ?>/images/MSRightStar01.png" alt="Stars" id="AFF-MSRightStar01">
		<img src="<?php bloginfo('stylesheet_directory'); ?>/images/MSLeftStars.png" alt="Stars" id="AFF-MSLeftStars">
		<img src="<?php bloginfo('stylesheet_directory'); ?>/images/MSRightStars02.png" alt="Stars" id="AFF-MSRightStars02">
		<div id="primary" class="site-main container AFF-MSTents">
			<?php
			while ( $loop->have_posts() ) : $loop->the_post(); 
				$image = get_field('thumbnail_photo');
				$rotate_image_degrees = rand(-2,2);
				if($tent_background_number == 6)
					$tent_background_number = 1;
				else $tent_background_number++;
			?>
				<? if($col_count % 3 == 0) { ?>
				<div class="row">
				<?php } ?>
					<div class="col-sm AFF-Tent AFF-MSTent-<?echo $tent_background_number ?>">
						<div class="container AFF-MSTentContainer">
							<div class="row">
								<div class="col">
									<div class="AFF-Tent-ImageContainer">
									<a href="<? the_permalink() ?>">
										<? if ($image) {
											echo wp_get_attachment_image($image['ID'], 'festival-act-thumbnail-nocrop', false, array( "class" => "AFF-Tent-Image", "style" => "transform: rotate(". $rotate_image_degrees ."deg);"));
										} ?>
									</a>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<h3><a href="<? the_permalink() ?>"><? the_field('name') ?></a></h3>
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
