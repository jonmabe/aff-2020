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
	'post_type' => 'contest',
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
	<div class="AFF-EntrySteps">
		<div class="AFF-EntrySteps-Content">
			<div class="container">
				<div class="row">
					<div class="col">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/images/Steps01.png" alt="Number 1 in a Circle" id="AFF-Steps01">
					</div>
				</div>
				<div class="row">
					<div class="col">
						<p>
							REVIEW RULES & <br>
							PRINT ENTRY FORM <br>
							FOR CONTEST <br>
							OF CHOICE
						</p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/images/Steps02.png" alt="Number 2 in a Circle" id="AFF-Steps02">
					</div>
				</div>
				<div class="row">
					<div class="col">
						<p>
							FILL OUT FORM & <br>
							BE SURE TO INCLUDE <br>
							PHOTO IF APPLICABLE <br>
							TO CONTEST
						</p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/images/Steps03.png" alt="Number 3 in a Circle" id="AFF-Steps03">
					</div>
				</div>
				<div class="row">
					<div class="col">
						<p>
							EMAIL FORM TO <br>
							ADDRESS PROVIDED <br>
							NOTE: EACH CONTEST <br>
							MAY HAVE IT’S OWN <br>
							UNIQUE ADDRESS
						</p>
					</div>
				</div>
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
	<div class="AFF-ContestsHeader">
		<img src="<?php bloginfo('stylesheet_directory'); ?>/images/ContestsHeader.png" alt="<?php bloginfo( 'name' ); ?>; <?= get_bloginfo( 'description', 'display' ) ?>" id="AFF-ContestsHeader">
	</div>
	<div class="AFF-ContestBody">
		<img src="<?php bloginfo('stylesheet_directory'); ?>/images/ContestMiddleStar.png" alt="Stars" id="AFF-ContestMiddleStar">
		<div id="primary" class="site-main">
			<?php
			while ( $loop->have_posts() ) : $loop->the_post(); 
				$image = get_field('thumbnail_image');
				$entry_form = get_field('entry_form');
				$rotate_image_degrees = rand(-2,2);
				if($tent_background_number == 2)
					$tent_background_number = 1;
				else $tent_background_number++;
			?>
				<div class="container AFF-ContestContainer AFF-ContestC0<?= $tent_background_number ?>">
					<? if ($image) {
						echo wp_get_attachment_image($image['ID'], 'festival-act-thumbnail', false, array( "class" => "AFF-Contest-Image0".$tent_background_number, "style" => "transform: rotate(". $rotate_image_degrees ."deg);"));
					} ?>
					<div class="row">
						<div class="col AFF-ContestTitle0<?= $tent_background_number ?>">
							<?= the_field('name') ?>
						</div>
					</div>
					<div class="row">
						<div class="col AFF-ContestInfo0<?= $tent_background_number ?>">
							<ul>
							<?php
								$instructions = get_field('instructions');
								$instruction_lines = explode("\n", $instructions);
								$line_count = 0;
								foreach($instruction_lines as $line){
									?><li class="AFF-Indent0<?= $line_count ?>">- <?= $line ?></li><?
									$line_count++;
								}
							?>
							</ul>
							<a href="<?= $entry_form['url'] ?>" target="_blank" class="AFF-EntryFormBtn0<?= $tent_background_number ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/EntryFormBtn.png" alt="Entry Form Button Yellow Text Black Background"></a>
						</div>
					</div>
				</div>
			<?php
				$col_count++;
			endwhile;
			?>
		</div>

<?php
wp_reset_postdata(); 

get_sidebar();
get_footer();
