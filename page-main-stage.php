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
		<div id="primary" class="site-main container AFF-MSTents">
			<?php if(have_rows('performances')) : ?>
			<h2>Performances</h2>
			<p>Rewatch past performances by clicking below!</p>
			<?php 
			while( have_rows('performances') ) : the_row(); 
				$link = "javascript: displayPerformance('". get_sub_field('youtube_id') ."');";
				$performance_date = strtotime(get_sub_field('date'));
				$rotate_image_degrees = rand(-2,2);
				if($tent_background_number == 6)
					$tent_background_number = 1;
				else $tent_background_number++;
			?>
				<? if($col_count % 5 == 0) { ?>
				<div class="row">
				<?php } ?>
					<div class="col-sm AFF-Tent AFF-Tent-Small AFF-Tent-<?echo $tent_background_number ?>">
						<?php if($performance_date > time() && get_sub_field('youtube_id')) : ?>
						<div class="container AFF-MSTentContainer AFF-Tent-Upcoming">
							<div class="row">
								<div class="col">
									<div class="AFF-Tent-ImageContainer">
										<?= date('ga l', $performance_date); ?><br />
										<?= date('m/d', $performance_date); ?>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<h3>Coming Soon!</h3>
								</div>
							</div>
						</div>
						<?php else : ?>
						<div class="container AFF-MSTentContainer">
							<div class="row">
								<div class="col">
									<a href="<?= $link ?>">
									<div class="AFF-Tent-ImageContainer">
										<?= date('ga l', $performance_date); ?><br />
										<?= date('m/d', $performance_date); ?>
									</div>
									</a>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<h3><a href="<?= $link ?>">Click to Watch</a></h3>
								</div>
							</div>
						</div>
						<?php endif; ?>
					</div>
				<? if(($col_count + 1) % 5 == 0) { ?>
				</div>
				<?php } ?>
			<?php
				$col_count++;
			endwhile;
			reset_rows();
			?>
			<? if(($col_count) % 5 != 0) { ?>
				</div>
			<?php } ?>
			<?php endif; ?>
			
			<h2>Acts</h2>
			<?php
			$col_count = 0;
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
					<div class="col-sm AFF-Tent AFF-Tent-<?echo $tent_background_number ?>">
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
									<h3><a href="<? the_permalink() ?>"><? the_title() ?></a></h3>
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
			<?php wp_reset_postdata(); ?>
			<?php if(have_rows('performances')) : ?>
			<div class="AFF-Past-Performances">
				<h2>Performances</h2>
				<p>Rewatch past performances by clicking below!</p>
				<?php 
					while( have_rows('performances') ) : the_row(); 
						$performance_date = strtotime(get_sub_field('date'));
						if($performance_date <= time()){
							?>
							<div class="AFF-MainStage-Performace">
								<img src="<?php bloginfo('stylesheet_directory'); ?>/images/Frame.png" alt="Frame" id="AFF-Frame">
								<div class="AFF-Act-FrameContent">
									<?php if(get_sub_field('youtube_id')) : ?>
										<iframe width="503" height="307" src="https://www.youtube.com/embed/<?= get_sub_field('youtube_id') ?>?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
									<?php endif; ?>
								</div>
							</div>
							<?php
						}
					endwhile;
				?>
			</div>
			<?php endif; ?>
		</div>

<?php
wp_reset_postdata(); 

get_sidebar();
get_footer();
