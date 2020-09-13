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
		<a href="<?= get_permalink(get_page_by_path( 'support-us' )) ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/DonateButton_S.png" alt="Yellow Star Donate Button" id="AFF-DonateButton" class="AFF-Left-Images">
		</a>
	</div>
	<br>
	<div class="AFF-Star">
		<a href="<?= get_permalink(get_page_by_path( 'shop' )) ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/ShopButton_S.png" alt="Yellow Star Shop Button" id="AFF-ShopButton" class="AFF-Left-Images">
		</a>
	</div>
</div>