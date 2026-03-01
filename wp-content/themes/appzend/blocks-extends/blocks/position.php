<?php
add_filter( 'ikreate_themes_block_inline_js', 'ikreate_themes_add_position_support_css_js', 10, 2 );
function ikreate_themes_add_position_support_css_js( string $js, string $html ): string {
    if( !$html){
        global $post;
        
        if( $post && $post->post_content) $html = apply_filters( 'the_content', $post->post_content );
    }
    
    if ( str_contains( $html, 'sp-position-' ) ) {
        
		$dir = dirname( __DIR__, 1 );
		$js .= file_get_contents( $dir . '/assets/js/position.js' );
	}


	return $js;
}