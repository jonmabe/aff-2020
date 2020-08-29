<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

?>
				<div class="AFF-SupportFooter">
					<h4>The Anaheim Fall Festival & Halloween Parade is a Registered 501(c)3 Non-Profit</h4>
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
		</div>
		<footer id="colophon" class="site-footer">
			<div class="site-info">
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', '_s' ) ); ?>">
					<?php
					/* translators: %s: CMS name, i.e. WordPress. */
					printf( esc_html__( 'Proudly powered by %s', '_s' ), 'WordPress' );
					?>
				</a>
				<span class="sep"> | </span>
					<?php
					/* translators: 1: Theme name, 2: Theme author. */
					printf( esc_html__( 'Theme: %1$s by %2$s.', '_s' ), '_s', '<a href="https://automattic.com/">Automattic</a>' );
					?>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	</div>
</div>

<?php wp_footer(); ?>

</body>
</html>
