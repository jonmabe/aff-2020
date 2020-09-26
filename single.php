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
		<a href="<?= get_category_link(get_cat_ID( 'history' )) ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/HistoryHeader-New2.png" id="AFF-SmallBasicHeader" alt="<?php bloginfo( 'name' ); ?>; <?= get_bloginfo( 'description', 'display' ) ?>"></a>
	</div>
	<div class="AFF-HistoryBody">
		<div id="primary" class="site-main">

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );

				the_post_navigation(['prev_text' => '&lt; Previous Post', 'next_text' => 'Next Post &gt;']);

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
		</div>

<?php
get_sidebar();
get_footer();
