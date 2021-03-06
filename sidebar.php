<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

?>
	</div>
	<div class="AFF-SupportFooter">
		<footer id="colophon" class="site-footer">
			<h4>&copy; 2020, The Anaheim Fall Festival & Halloween Parade is a Registered 501(c)3 Non-Profit</h4>
		</footer><!-- #colophon -->
	</div>
</div>

<?php if(get_post_type() == "craft" || is_page('until-next-year')) : ?>
<?php else : ?>
<div class="col-md-auto" id="AFF-right-col">
<div class="AFF-ParadeButton">
	<a class="AFF-nav-link" href="<?= get_theme_mod('aff_parade_flyer') ?>" target="_blank">PARADE</a>
</div>
<?php if(!is_page('tonights-show')) : ?>
<img src="<?php bloginfo('stylesheet_directory'); ?>/images/SupportArrow-text_S.png" alt="Text: With Generous Support From, Image: Yellow Down Arrow" id="AFF-SupportArrow">
<?php
	$post = get_page_by_path('thanks');
	if( have_rows('tier_1_sponsors') ):
		while ( have_rows('tier_1_sponsors') ) : the_row();
			$image = get_sub_field('image');
			$url = get_sub_field('url');
			$description = get_sub_field('description');
			?>
			<div class="AFF-Sponsor">
				<a href="<?= $url['url'] ?>" target="_blank">
					<?php echo wp_get_attachment_image($image['ID'], 'aff-thanks-logo', array( 'class' => 'AFF-SponsorLogo')); ?>
				</a>
			</div>
			<?php
		endwhile;
	endif;
?>
<img src="<?php bloginfo('stylesheet_directory'); ?>/images/ThanksArrow-text_S.png" alt="Text: Big Thanks, Image: Yellow Down Arrow" id="AFF-ThanksArrow">
<div class="AFF-Thanks">
	<?php if(is_archive() || is_single()) : ?>
		<ul>
			<li class="AFF-Thanks-Name">Anaheim Historical Society</li>
		</ul>
	<?php elseif(is_page('crafts')) : ?>
		<?php
		$args = array(  
			'post_type' => 'craft',
			'post_status' => 'publish',
			'posts_per_page' => 100, 
			'meta_key' => 'sponsor_name',
			'orderby' => 'meta_value', 
			'order' => 'ASC', 
		);
		$loop = new WP_Query( $args ); 
		?>
		<ul>
			<?php
			while ( $loop->have_posts() ) : $loop->the_post(); 
				?><li class="AFF-Thanks-Name"><?= get_field('sponsor_name') ?></li><?
			endwhile;
			wp_reset_postdata(); 
			?>
		</ul>
	<?php else : ?>
		<?php
		$special_thanks_text = get_field('special_thanks', false, false);
		$special_thanks = explode("\n", $special_thanks_text);
		if($special_thanks_text) : ?>
		<ul>
			<?php
			foreach($special_thanks as $name){
				?><li class="AFF-Thanks-Name"><?= $name ?></li><?
			}
			?>
		<?php endif; ?>
		</ul>
		<?php endif; ?>
</div>
<?php
wp_reset_postdata();
?>
<aside id="secondary" class="widget-area">
	<?php
		dynamic_sidebar( 'sidebar-1' );
	?>
</aside><!-- #secondary -->
</div>
<?php endif; ?>
<?php endif; ?>