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
 * @package Ice-Cold
 *
 * @since 1.0.0
 *
 * @version 1.0.0
 */

// check sidebar active.
$widget_active = ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) ? true : false );

?>
<div class="site-info" style="<?php echo ( ! $widget_active ? 'border: none;' : '' ); ?>">
	<small>
	<?php
	if ( function_exists( 'the_privacy_policy_link' ) ) {
		the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
	}
	?>
	<i class="fas fa-heart"></i> 
	<?php
		/* translators: %s: CMS name, i.e. WordPress. */
		printf( esc_html__( 'Powered by %s', 'ice-cold' ), 'WordPress' );
	?>
	<span role="separator" aria-hidden="true"></span>
	<?php
		/* translators: 1: Theme name, 2: Theme author. */
		printf( esc_html__( 'Theme: %1$s by %2$s.', 'ice-cold' ), 'Ice Cold', '<a href="https://www.wiki.profoxi.de/">Triopsi</a>' );
	?>
	</small>
	<p>
	&copy; 1997-<?php echo gmdate( 'Y' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> <?php echo bloginfo( 'name' ); ?> – 
	<?php
		echo esc_html__( 'Copyright All Rights Reserved', 'ice-cold' );
	?>
		<br>
	<?php
		echo esc_html__( 'Registration Number = A0035839X', 'ice-cold' );
	?>
		<br>
	<?php
		echo esc_html__( 'ABN = 20 213 278 331', 'ice-cold' );
	?>
	</p>
</div><!-- /.site-info -->
