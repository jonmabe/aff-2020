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
	<a class="AFF-nav-link" href="parade.html">PARADE</a>
</div>
<img src="<?php bloginfo('stylesheet_directory'); ?>/images/SupportArrow-text_S.png" alt="Text: With Generous Support From, Image: Yellow Down Arrow" id="AFF-SupportArrow">
<div class="AFF-Sponsor">
	<a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/AnaheimLogo.png" alt="Anaheim City Logo" id="AFF-AnaheimLogo"></a>
</div>
<div class="AFF-Sponsor">
	<a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/AnaheimLogo.png" alt="Anaheim City Logo" id="AFF-AnaheimLogo"></a>
</div>
<div class="AFF-Sponsor">
	<a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/AnaheimLogo.png" alt="Anaheim City Logo" id="AFF-AnaheimLogo"></a>
</div>
<img src="<?php bloginfo('stylesheet_directory'); ?>/images/ThanksArrow-text_S.png" alt="Text: Big Thanks, Image: Yellow Down Arrow" id="AFF-ThanksArrow">
<div class="AFF-Thanks">
	<ul>
		<li class="AFF-Thanks-Name">TREVOR KELLY</li>
		<li class="AFF-Thanks-Name">AMBER FOXX</li>
		<li class="AFF-Thanks-Name">SEAN OLIU</li>
		<li class="AFF-Thanks-Name">DARDEN</li>
		<li class="AFF-Thanks-Name">BOB BAKER MARIONETTES</li>
		<li class="AFF-Thanks-Name">RHODE MONTIJO</li>
	</ul>
</div>
<aside id="secondary" class="widget-area">
	<?php
		dynamic_sidebar( 'sidebar-1' );
	?>
</aside><!-- #secondary -->
</div>