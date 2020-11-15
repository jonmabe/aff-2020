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
<div class="col-md-auto" id="AFF-single-col">
	<div class="AFF-header">
		<img src="<?php bloginfo('stylesheet_directory'); ?>/images/HeaderStars_S.png" alt="<?php bloginfo( 'name' ); ?>; <?= get_bloginfo( 'description', 'display' ) ?>" id="AFF-HeaderLogo">
	</div>
	<div class="AFF-GenericBodyContent">
		<div class="AFF-Large-Player">
			<iframe width="774" height="472" src="https://www.youtube.com/embed/GH6RxghXOLY" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div>
		<div class="AFF-thanks-area">
			<div class="Thanks-Main">
			</div>
			<div class="Thanks-Secondary">
				BILL O’CONNELL - REON BOYDSTUN HOWARD - HILGENFELD MORTUARY<br />
				STEVE & SUSAN FAESSEL - COTTAGE PET HOSPITAL - ANAHEIM BREWERY<br />
				MASTERPIECE TRAVELS - A.R.T. BUSES - DOWNTOWN ANAHEIM ASSOCIATION
			</div>
			<div class="Thanks-Volunteers">
      			JENNIFER MABE - ANDREA MANES - BRANDON HARPER - KIMBERLY KELEMEN<br />
    			LARRY PASCO - ANAHEIM COMMUNITY SERVICES - ANAHEIM POLICE DEPARTMENT<br />
				JUDY OLESEN - JACK KNIGHT -  JEFF NATH - DENNY MOYNAHAN - TREVOR & JESS KELLY<br />
				KEVIN KIDNEY - NORMA JAUREGUI - JOSE & LORENA MORENO - JOHN & ALISA WRAY-RAY<br />
    			ANAHEIM BEAUTIFUL - ANAHEIM HISTORICAL SOCIETY - ALTRUSA INTERNATIONAL <br />
          		ANAHEIM GIRL SCOUTS - ANAHEIM YMCA - ASSISTANCE LEAGUE OF ANAHEIM <br />
            	BOYS & GIRLS CLUB - MISS ANAHEIM BEAUTIFUL - MUZEO - ZION LUTHERAN <br />
            	AMBER FOXX - BOB BAKER MARIONETTES - MISS STACIA - BUSTER BALLOON<br />
      			CHARLES PHOENIX - COPPERTOP INK - CRITTEROSITY - DARDEN - MIKE MULLIGAN<br />
  				QUEEN ANNE’S BLOUSE - SEAN OLIU & THE COASTLINE COWBOYS - STEPHIES DOODLES<br />
       			STRONG WATER - THE SPACE COWBOYS - TIKI TONY - TINY & MARY - ERIC SCALES<br />
      			GEMMA CORRELL - HAYDEN EVANS - KITSCHY WITCH  - LA PINATA DESIGN STUDIO<br />
 				LISA PENNEY - MISGUIDED DESIGNS - RHODE MONTIJO - SARA M. LYONS - SHOW PIGEON<br />
    			THE ART OF SKETCH  - CHRIS NICHOLS - ALYSIA GRAY PAINTER - MIRANDA ALVAREZ<br />
              	CARMEN ALVAREZ - ERIC ANDERSON - SCOTT BARRETT - DAVID BASSETT <br />
   				ALEJANDRA BARBOZA - MARITZA BERMUDEZ - LESLIE CASAMENTO - BOBBY CAVENER<br />
                DORIS MAY DAY - ROSA DOMINGUEZ - GINGER DUNCAN - BRAD DANIELS<br />
				VINCE & MARY KRAEMER - LUCILLE KRING - TOM & ANNIE KUPFRIAN - MICHELLE MAAS<br />
  				KRISTEN MASS-KOHLBERG - MARTHA MIGUEL - KEVIN NELSON - PRISCELLA OROPEZA<br />
    			DEVON REEVES - BILL & LAURA SCHAFFELL - ERIC SMISSEN - RICHARD ESPINACHIO <br />
   				BRIAN SOMMER - LARRY & DINAH TORGERSON - HANS PERK - MARIO V. - DIANA VEGA <br />
                THE ANAHEIM FALL FESTIVAL BOARD OF DIRECTORS: <br />
             	JODY DAILY, DEBBIE HERMAN, DOUG SHIVLEY, KATHY COUTURE, JON MABE, <br />
				KEITH OLESEN, BILL COUTURE & ANTHONY CASTRO 
			</div>
			<img class="Thanks-See-Ya" src="<?php bloginfo('stylesheet_directory'); ?>/images/see-ya.png" alt="<?php bloginfo( 'name' ); ?>; <?= get_bloginfo( 'description', 'display' ) ?>">
		</div>
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
