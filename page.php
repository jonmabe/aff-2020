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

	<main id="primary" class="site-main">

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

		<div class="container AFF-Tents">
			<div class="row">
				<div class="col-sm AFF-Tent">
					<div class="container AFF-TentContainer">
						<div class="row">
							<div class="col">
								<a href="act.html"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/TentPic01.png" alt="Two People on a Stage Playing Guitar" id="AFF-Tent01"></a>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<h3><a href="act.html">MAIN STAGE ACTS</a></h3>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm AFF-Tent">
					<div class="container AFF-TentContainer">
						<div class="row">
							<div class="col">
								<a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/TentPic01.png" alt="Two People on a Stage Playing Guitar" id="AFF-Tent01"></a>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<h3><a href="#">MAIN STAGE ACTS</a></h3>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm AFF-Tent">
					<div class="container AFF-TentContainer">
						<div class="row">
							<div class="col">
								<a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/TentPic01.png" alt="Two People on a Stage Playing Guitar" id="AFF-Tent01"></a>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<h3><a href="#">MAIN STAGE ACTS</a></h3>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm AFF-Tent">
					<div class="container AFF-TentContainer">
						<div class="row">
							<div class="col">
								<a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/TentPic01.png" alt="Two People on a Stage Playing Guitar" id="AFF-Tent01"></a>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<h3><a href="#">MAIN STAGE ACTS</a></h3>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm AFF-Tent">
					<div class="container AFF-TentContainer">
						<div class="row">
							<div class="col">
								<a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/TentPic01.png" alt="Two People on a Stage Playing Guitar" id="AFF-Tent01"></a>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<h3><a href="#">MAIN STAGE ACTS</a></h3>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm AFF-Tent">
					<div class="container AFF-TentContainer">
						<div class="row">
							<div class="col">
								<a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/TentPic01.png" alt="Two People on a Stage Playing Guitar" id="AFF-Tent01"></a>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<h3><a href="#">MAIN STAGE ACTS</a></h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</main><!-- #main -->
			
<?php
get_sidebar();
get_footer();
