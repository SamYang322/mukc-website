<?php
add_action( 'enqueue_block_editor_assets', 'sparklethemes_extend_block_enqueue_block_editor_assets' );

function sparklethemes_extend_block_enqueue_block_editor_assets() {
	// Enqueue our script
    wp_enqueue_script(
        'extend-block',
        esc_url( get_template_directory_uri( ).'/dist/extend-blocks.js' ),
        array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-block-editor' ),
        wp_get_theme()->get( 'Version' ),
        true // Enqueue the script in the footer.
    );

	wp_enqueue_style( 
		'extend-block-editor', 
		get_parent_theme_file_uri('blocks-extends/assets/css/editor-style.css'),
		wp_get_theme()->get( 'Version' ),
		true
	);

}


add_action( 'wp_enqueue_scripts', 'sparklethemes_block_extend_enqueue_scripts', 10 );
/**
 * Register proxy handle for inline frontend scripts.
 *
 * Called in styles.php to share page content string.
 *
 * @since 0.0.27
 *
 * @return void
 */
function sparklethemes_reduce_whitespace( string $string ): string {
	return preg_replace( '/\s+/', ' ', $string );
}
function sparklethemes_block_extend_enqueue_scripts(): void {
	
	$handle = get_template();
	wp_enqueue_script( 'jquery');
	wp_register_script(
		$handle,
		'',
		[],
		wp_get_theme()->get( 'version' ),
		true
	);

	wp_add_inline_script(
		$handle,
		sparklethemes_reduce_whitespace(
			trim(
				apply_filters(
					'sparklethemes_block_inline_js',
					'',
					(string) ( $GLOBALS['template_html'] ?? '' )
				)
			)
		)
	);

	wp_enqueue_script( $handle );


	/** enquue styles */

	wp_register_style(
		$handle,
		'',
		[],
		wp_get_theme()->get( 'Version' )
	);

	wp_enqueue_style( $handle );

	wp_add_inline_style(
		$handle,
		sparklethemes_reduce_whitespace(
			trim(
				apply_filters(
					'sparklethemes_block_inline_css',
					'',
					(string) ( $GLOBALS['template_html'] ?? '' )
				)
			)
		)
	);
}



/**
 * Registers an editor stylesheet for the current theme.
 */
function sparklethemes_block_add_editor_styles() {

    $font_url = str_replace( ',', '%2C', 'https://fonts.googleapis.com/icon?family=Material+Icons' );
    
	add_editor_style( $font_url );

}
add_action( 'admin_init', 'sparklethemes_block_add_editor_styles', 100 );

/**
 * Enqueue a script in the WordPress admin on edit.php.
 *
 * @param int $hook Hook suffix for the current admin page.
 */
function sparklethemes_block_enqueue_admin_script( $hook ) {
    
	if ( 'post.php' != $hook ) {
        return;
    }

	$font_url = str_replace( ',', '%2C', 'https://fonts.googleapis.com/icon?family=Material+Icons' );
	
	wp_enqueue_style( 'googlefonts-material-icon', $font_url, array(), null );


    wp_enqueue_style( $font_url );
}
add_action( 'admin_enqueue_scripts', 'sparklethemes_block_enqueue_admin_script' );


require_once __DIR__ . "/utility/dom.php";
require_once __DIR__ . "/blocks/counter.php";
require_once __DIR__ . "/blocks/icon.php";
require_once __DIR__ . "/blocks/progressbar.php";
//require_once __DIR__ . "/blocks/position.php";