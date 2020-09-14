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
	<div class="AFF-GenericBodyContent">
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

<?php
wp_reset_postdata(); 

get_sidebar();
get_footer();
