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
	<div class="AFF-MainStageHeader">
		<a href="<?= get_permalink(get_page_by_path( 'main-stage' )) ?>" rel="prev">
			<img src="<?php bloginfo('stylesheet_directory'); ?>/images/MainStageHeaderAlt.png" id="AFF-MainStageHeader" alt="<?php bloginfo( 'name' ); ?>; <?= get_bloginfo( 'description', 'display' ) ?>">
		</a>
	</div>
	<div class="AFF-ActName">
		<h1><?= the_title() ?></h1>
	</div>
	<div class="AFF-MainStageBody">
		<img src="<?php bloginfo('stylesheet_directory'); ?>/images/Frame.png" alt="Frame" id="AFF-Frame">
		<div class="AFF-Act-FrameContent">
			<?php if(get_field('playlist_youtube_id')) : ?>
				<iframe width="503" height="307" src="https://www.youtube.com/embed/videoseries?list=<?= get_field('playlist_youtube_id') ?>?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			<?php elseif(get_field('ad')) : ?>
				<?php
				$ad = get_field('ad');
				if($ad){
					echo wp_get_attachment_image($ad['ID'], array(503, 307));
				}
				?>
			<?php endif; ?>
		</div>
		<script>
			function displayPerformance(youtubeID) {
				jQuery('.AFF-Act-FrameContent').html('<iframe width="503" height="307" src="https://www.youtube.com/embed/'+ youtubeID +'?controls=0&autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>')
			}
		</script>
		<p><?= get_field('description') ?></p>
		<?php if(get_field('website')) : ?>
		<div class="AFF-ThanksFooter">
			<h3><a href="<?php echo get_field('website') ?>" target="_blank"><?php echo get_field('website') ?></a></h3>
		</div>
		<?php endif; ?>
		<div id="primary" class="site-main container AFF-MSTents AFF-ActPerformances">
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
				<? if($col_count % 3 == 0) { ?>
				<div class="row">
				<?php } ?>
					<div class="col-sm AFF-Tent AFF-Tent-<?echo $tent_background_number ?>">
						<?php if($performance_date > time() ||  !get_sub_field('youtube_id')) : ?>
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
									<h3><a href="<?= $link ?>"><?= get_sub_field('title') ?></a></h3>
								</div>
							</div>
						</div>
						<?php endif; ?>
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
			<?php endif; ?>
		</div>

		<div class="nav-links">
			<div class="nav-previous">
				<a href="<?= get_permalink(get_page_by_path( 'main-stage' )) ?>" rel="prev">&lt; Back to the Main Stage</a>
			</div>
		</div>

<?php
get_sidebar();
get_footer();
