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
	<img src="<?php bloginfo('stylesheet_directory'); ?>/images/DateBanners_S.png" id="AFF-DateBanners" alt="Two Banners Bearing Starting Date of Oct. 1 and Ending Date of Oct. 31">
	<div class="AFF-SpecialAnnouncements">
		<div class="AFF-SpecialAnnouncements-Content">
			<div class="AFF-Poem">
				<span style="font-size: 20px;">O</span>ctober always welcomes <span style="font-size: 16px;">F</span>all<br>
				<div class="AFF-Indent"><span style="font-size: 16px;">W</span>ith festive family fun;</div>
				<span style="font-size: 16px;">B</span>ut here's a <span style="font-size: 16px;">T</span>rick:<br>
				<div class="AFF-Indent"><span style="font-size: 16px;">T</span>here'll be new <span style="font-size: 16px;">T</span>reats</div>
				<span style="font-size: 16px;">EACH</span> day, not just one!<br>
			</div>
			<div class="AFF-Poem">
				<span style="font-size: 16px;">P</span>erformers, artists, music, crafts<br>
				<div class="AFF-Indent"><span style="font-size: 16px;">A</span>nd so much more will burst</div>
				<span style="font-size: 16px;">I</span>nto each home,<br>
				<div class="AFF-Indent"><span style="font-size: 16px;">ONLINE</span> of course,</div>
				<span style="font-size: 16px;">D</span>ay <span style="font-size: 16px;">O</span>ne thru <span style="font-size: 16px;">T</span>hirty-<span style="font-size: 16px;">F</span>irst.<br>
			</div>
			<div class="AFF-Poem">
				<span style="font-size: 16px;">S</span>o as you see the <span style="font-size: 16px;">M</span>oon grow full<br>
				<div class="AFF-Indent"><span style="font-size: 16px;">A</span>nd dream of <span style="font-size: 16px;">P</span>umpkin <span style="font-size: 16px;">T</span>ime,</div>
				<span style="font-size: 16px;">A</span> month of joy<br>
				<div class="AFF-Indent"><span style="font-size: 16px;">A</span>waits you from</div>
				<span style="font-size: 16px;">Y</span>our friends in <span style="font-size: 16px;">A</span>naheim!<br>
			</div>
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
	<div class="AFF-header">
		<img src="<?php bloginfo('stylesheet_directory'); ?>/images/HeaderStars_S.png" alt="<?php bloginfo( 'name' ); ?>; <?= get_bloginfo( 'description', 'display' ) ?>" id="AFF-HeaderLogo">
	</div>
	<div class="AFF-MainBodyContent">
		<img src="<?php bloginfo('stylesheet_directory'); ?>/images/BottomLeftStars_S.png" alt="Two 5-point Stars, One Solid Black, One Black Outline" id="AFF-BottomLeftStars">
		<img src="<?php bloginfo('stylesheet_directory'); ?>/images/FeaturingArrow_S.png" alt="Banner with 2 Descending Folds Ending in Arrow Pointing Down, Text on Top Fold: Always Fun! Always Free!, Text on Bottom Fold: Featuring" id="AFF-FeaturingArrow">
		<div id="AFF-FrameContent">
			<?php 
				$i = 0;
			?>
			<?php while( have_rows('frame_items') ) : the_row(); ?>
			<?php if(get_sub_field('active')) : ?>
			<div class="AFF-FrameContent-Item" id="AFF-FrameContent-Item-<?= $i ?>">
				<?php
					$embed_code = get_sub_field('embed_code');
					if($embed_code) {
						echo $embed_code;
					} else {
						$image = get_sub_field('image');
						?><a href="<?= get_sub_field('link') ?>" target="_blank"><?= wp_get_attachment_image($image['ID'], array(467, 285)) ?></a><?php
					}
				?>
			</div>
			<?php 
				$i++;
			?>
			<?php endif; ?>
			<?php endwhile; ?>
			<script>
				var currentItem = 0;
				var frameItems = <?= $i ?>;
				function swapFrameItem() 
				{ 
					var nextItem = currentItem + 1 == frameItems ? 0 : currentItem + 1;
					jQuery('#AFF-FrameContent-Item-'+ currentItem).removeClass('AFF-FrameContent-Item-Active');
					jQuery('#AFF-FrameContent-Item-'+ nextItem).addClass('AFF-FrameContent-Item-Active');

					currentItem = nextItem;
					setTimeout("swapFrameItem()",10000);
				} 
				jQuery('#AFF-FrameContent-Item-'+ currentItem).addClass('AFF-FrameContent-Item-Active');
				setTimeout("swapFrameItem()",10000);
			</script>
		</div>
		<div id="primary" class="site-main container AFF-Tents">
			<?php
			$menu_items = wp_get_nav_menu_items('Home Page');
			$col_count = 0;
			$tent_background_number = 0;

			foreach($menu_items as $menu_item) :
				$image = get_field('tent_image', $menu_item->ID);
				$rotate_image_degrees = rand(-2,2);
				if($tent_background_number == 6)
					$tent_background_number = 1;
				else $tent_background_number++;
			?>
				<? if($col_count % 3 == 0) { ?>
				<div class="row">
				<?php } ?>
					<div class="col-sm AFF-Tent AFF-Tent-<?echo $tent_background_number ?>">
						<div class="container AFF-TentContainer">
							<div class="row">
								<div class="col">
									<div class="AFF-Tent-ImageContainer">
									<a href="<?= $menu_item->url ?>">
										<? if ($image) {
											echo wp_get_attachment_image($image['ID'], 'festival-act-thumbnail-nocrop', false, array( "class" => "AFF-Tent-Image", "style" => "transform: rotate(". $rotate_image_degrees ."deg);"));
										} ?>
									</a>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<h3><a href="<?= $menu_item->url ?>"><?= $menu_item->title ?></a></h3>
								</div>
							</div>
						</div>
					</div>
				<? if(($col_count + 1) % 3 == 0) { ?>
				</div>
				<?php } ?>
			<?php
				$col_count++;
			endforeach;
			?>
			<? if(($col_count) % 3 != 0) { ?>
				</div>
			<?php } ?>
		</div>

<?php
wp_reset_postdata(); 

get_sidebar();
get_footer();
