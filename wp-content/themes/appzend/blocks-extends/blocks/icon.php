<?php
add_filter( 'render_block_core/paragraph', 'ikreate_themes_render_icon_block_variation', 10, 2 );
/**
 * Render counter block markup.
 *
 * @since 1.5.2
 *
 * @param string $html  Block html content.
 * @param array  $block Block data.
 *
 * @return string
 */
function ikreate_themes_render_icon_block_variation( string $html, array $block ): string {
	
    if ( !array_key_exists('className', $block['attrs']) || $block['attrs']['className'] !== 'has-sp-icon' ) {
        return $html;
    }

    

	$dom = dom( $html );
	$p   = get_dom_element( 'p', $dom );

	if ( ! $p ) {
		return $html;
	}

    $defaults = [
        'iconSet' => 'dashicons',
        'iconName' => 'dashicons-wordpress',
    ];

    $attrs = array_merge($defaults, $block['attrs']);

    if( $attrs['iconSet'] == 'material'){
        $attrs['iconSet'] = 'material-icons';
    }

    $p->setAttribute(
		'class',
		implode(
			' ',
			[
				'wp-block-paragraph',
                $attrs['iconSet'],
                $attrs['iconName'],

				...explode(
					' ',
					$p->getAttribute( 'class' )
				),
			]
		)
	);

	$p->setAttribute( "data-icon", (string) $attrs['iconName'] );

	$p->textContent = trim( $p->textContent );

	return $dom->saveHTML();
}

add_filter( 'ikreate_themes_block_inline_css', 'ikreate_themes_add_icon_support_css', 10, 2 );
/**
 * Conditionally add counter JS.
 *
 * @since 1.5.2
 *
 * @param string $js   Inline js.
 * @param string $html Block html content.
 *
 * @return string
 */
function ikreate_themes_add_icon_support_css( string $css, string $html ): string {
    /** clasic theme compatible */
    if( !$html){
        global $post;
        
        if( $post && $post->post_content) $html = apply_filters( 'the_content', $post->post_content );
    }
    
    if ( str_contains( $html, 'has-sp-icon' ) ) {
        
		$css .= "
            .has-sp-icon.dashicons{
                display:block;
                margin: 0;
            }";

        if ( str_contains( $html, 'dashicons' ) || str_contains( $html, 'wordpress' ) ) {
            wp_enqueue_style('dashicons');
        }

        if ( str_contains( $html, 'material-icons' ) ) {
            $css .= ".material-icons:after {   content: attr(data-icon); }";
            $font_url = str_replace( ',', '%2C', 'https://fonts.googleapis.com/icon?family=Material+Icons' );
            $response = wp_remote_get( esc_url_raw( $font_url ) );
            if( $response )
                $css .= wp_remote_retrieve_body( $response );
        }
	}


	return $css;
}