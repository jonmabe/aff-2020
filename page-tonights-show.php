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
	<div class="AFF-SidebarSmallBasicHeader"></div>
</div>
<div class="col-md-auto" id="AFF-mid-col">
	<?php
		get_sidebar('nav');
	?>
	<div class="AFF-MainStageHeader">
		<img src="<?php bloginfo('stylesheet_directory'); ?>/images/MainStageHeader.png" id="AFF-MainStageHeader" alt="<?php bloginfo( 'name' ); ?>; <?= get_bloginfo( 'description', 'display' ) ?>">
	</div>
	<div class="AFF-GenericBodyContent">
		<div class="AFF-Large-Player">
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
		</div>

<?php
wp_reset_postdata(); 

get_sidebar();
get_footer();
