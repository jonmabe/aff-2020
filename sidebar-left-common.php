<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

?>

<div class="AFF-StarButtons">
	<div class="AFF-Star">
		<a href="https://paypal.me/anaheimfallfestival" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/DonateButton_S.png" alt="Yellow Star Donate Button" id="AFF-DonateButton" class="AFF-Left-Images">
		</a>
	</div>
	<br>
	<div class="AFF-Star">
		<a href="<?= get_permalink(get_page_by_path( 'shop' )) ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/ShopButton_S.png" alt="Yellow Star Shop Button" id="AFF-ShopButton" class="AFF-Left-Images">
		</a>
	</div>
	<div class="AFF-SocialMedia">
		<a href="https://www.instagram.com/anaheimhalloweenparade/" target="_blank">
			<img src="<?php bloginfo('stylesheet_directory'); ?>/images/instagram.png" />
		</a>
		<a href="https://www.facebook.com/AnaheimHalloweenParade" target="_blank">
			<img src="<?php bloginfo('stylesheet_directory'); ?>/images/facebook.png" />
		</a>
	</div>
</div>