<?php

add_action( 'init', 'mlig_register_blocks', 40 );
/**
 * Enqueue block editor only JavaScript and CSS.
 */
function mlig_register_blocks() {	

    // Fail if block editor is not supported
	if ( ! function_exists( 'register_block_type' ) ) {
		return;
	}

    // List all of the blocks for your plugin
    $blocks = ["derweili-media-library-image-gallery/gallery", "jsforwpadvblocks/data-example"];

    // Register each block with same CSS and JS
    foreach( $blocks as $block ) {
        register_block_type( $block, [
            'editor_script' => 'media-library-image-gallery-editor-js',
            'editor_style'  => 'media-library-image-gallery-editor-css',
         ] );	  
    }

}

