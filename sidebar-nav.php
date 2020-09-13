<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

?>

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
</header><!-- #masthead -->