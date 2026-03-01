<?php
/**
 * Author: triopsi
 * Author URI: http://wiki.profoxi.de
 * License: GPL3
 * License URI: https://www.gnu.org/licenses/gpl-3.0
 *
 * Ice-Cold is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * Ice-Cold is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with wpicecold. If not, see https://www.gnu.org/licenses/gpl-3.0.
 *
 * The header for the theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ice-Cold
 *
 * @since 1.0.0
 *
 * @version 1.0.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php if ( is_singular() && pings_open() ) { ?>
	<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
	<?php
}
wp_head();
?>
</head>
<body <?php body_class(); ?>>
<?php
if ( get_theme_mod( 'loader_page_jquery' ) === 'yes' ) :
	?>
	<!-- Preloader -->
		<div class="preloader">
			<div class="status">&nbsp;</div>
		</div>
	<!-- Preloader End -->
	<?php
	endif;
?>

<!-- Header -->
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'ice-cold' ); ?></a>

<?php if ( is_active_sidebar( 'sidebar-top' ) ) : ?>
	<!-- Sidebar Top -->
	<div class="sidebar-top">
		<div class="container">
			<?php dynamic_sidebar( 'sidebar-top' ); ?>
		</div>
	</div>
	<!-- Sidebar Top END -->
<?php endif; ?>
<?php
if ( has_nav_menu( 'top' ) ) :
	get_template_part( 'template-parts/navigation/navigation', 'top' );
endif;
?>
<!-- Header Media -->
<header id="masthead" class="site-header" role="banner">
<?php get_template_part( 'template-parts/header/header', 'media' ); ?>
</header>
<!-- Header Media END -->
<!-- Header END -->
