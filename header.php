<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="container AFF-container">
	<div id="page" class="row site">
		<div class="col-md-auto" id="AFF-left-col">
			<div class="AFF-HomeButton">
				<a class="AFF-nav-link" href="index.html">HOME</a>
			</div>
			<img src="<?php bloginfo('stylesheet_directory'); ?>/images/DateBanners_S.png" alt="Two Banners Bearing Starting Date of Oct. 1 and Ending Date of Oct. 31" id="AFF-DateBanners">
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
			<div class="AFF-StarButtons">
				<div class="AFF-Star">
					<a href="donate.html"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/DonateButton_S.png" alt="Yellow Star Donate Button" id="AFF-DonateButton" class="AFF-Left-Images">
					</a>
				</div>
				<br>
				<div class="AFF-Star">
					<a href="shop.html"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/ShopButton_S.png" alt="Yellow Star Shop Button" id="AFF-ShopButton" class="AFF-Left-Images">
					</a>
				</div>
			</div>
		</div>
		<div class="col-md-auto" id="AFF-mid-col">
			<header id="masthead" class="site-header">
				<nav id="site-navigation" class="main-navigation">
					<!--<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', '_s' ); ?></button>-->
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
							'container_class'=>'',
							'menu_class'	 =>'AFF-Nav'

						)
					);
					?>
				</nav><!-- #site-navigation -->
				<div class="AFF-header">
					<img src="<?php bloginfo('stylesheet_directory'); ?>/images/HeaderStars_S.png" alt="97th Anaheim Fall Festival and Halloween Parade with Circular Seal Showing Andy Anaheim Wearing a Witches Hat and Riding a Rocket Over a Small Globe" id="AFF-HeaderLogo">
				</div>
				<div class="site-branding">
					<?php
					the_custom_logo();
					if ( is_front_page() && is_home() ) :
						?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php
					else :
						?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
					endif;
					$_s_description = get_bloginfo( 'description', 'display' );
					if ( $_s_description || is_customize_preview() ) :
						?>
						<p class="site-description"><?php echo $_s_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
					<?php endif; ?>
				</div><!-- .site-branding -->

			</header><!-- #masthead -->
			<div class="AFF-MainBodyContent">
				<!--<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', '_s' ); ?></a>-->
				<img src="<?php bloginfo('stylesheet_directory'); ?>/images/BottomLeftStars_S.png" alt="Two 5-point Stars, One Solid Black, One Black Outline" id="AFF-BottomLeftStars">
				<img src="<?php bloginfo('stylesheet_directory'); ?>/images/FeaturingArrow_S.png" alt="Banner with 2 Descending Folds Ending in Arrow Pointing Down, Text on Top Fold: Always Fun! Always Free!, Text on Bottom Fold: Featuring" id="AFF-FeaturingArrow">

