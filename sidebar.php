<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

?>
<div class="AFF-SupportFooter">
		<footer id="colophon" class="site-footer">
			<h4>&copy; 2020, The Anaheim Fall Festival & Halloween Parade is a Registered 501(c)3 Non-Profit</h4>
		</footer><!-- #colophon -->
	</div>
</div>
</div>

<div class="col-md-auto" id="AFF-right-col">
<div class="AFF-ParadeButton">
	<a class="AFF-nav-link" href="<?= get_permalink(get_page_by_path( 'parade' )) ?>">PARADE</a>
</div>
<img src="<?php bloginfo('stylesheet_directory'); ?>/images/SupportArrow-text_S.png" alt="Text: With Generous Support From, Image: Yellow Down Arrow" id="AFF-SupportArrow">
<?php
	$post = get_page_by_path('thanks');
	if( have_rows('tier_1_sponsors') ):
		while ( have_rows('tier_1_sponsors') ) : the_row();
			$image = get_sub_field('image');
			$image_url = $image ? $image['url'] : "";
			$url = get_sub_field('url');
			$description = get_sub_field('description');
			?>
			<div class="AFF-Sponsor">
				<a href="#"><img src="<?= $image_url ?>" alt="<?= $description ?>" class="AFF-SponsorLogo"></a>
			</div>
			<?php
		endwhile;
	endif;
	wp_reset_postdata();
?>
<img src="<?php bloginfo('stylesheet_directory'); ?>/images/ThanksArrow-text_S.png" alt="Text: Big Thanks, Image: Yellow Down Arrow" id="AFF-ThanksArrow">
<div class="AFF-Thanks">
	<ul>
		<?php
		$args = array(  
			'post_type' => array('artist', 'festivalact'),
			'post_status' => 'publish',
			//'posts_per_page' => 8, 
			'orderby' => 'title', 
			'order' => 'ASC', 
		);
		$loop = new WP_Query( $args ); 
		while ( $loop->have_posts() ) : $loop->the_post(); 
			?><li class="AFF-Thanks-Name"><a href="<?= get_permalink() ?>"><?= the_title() ?></a></li><?
		endwhile;
		wp_reset_postdata();
	?>
	</ul>
</div>
<aside id="secondary" class="widget-area">
	<?php
		dynamic_sidebar( 'sidebar-1' );
	?>
</aside><!-- #secondary -->
</div>