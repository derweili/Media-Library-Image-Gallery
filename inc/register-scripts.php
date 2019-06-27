<?php

$js_dependencies = [ 'wp-plugins', 'wp-element', 'wp-edit-post', 'wp-i18n', 'wp-api-request', 'wp-data', 'wp-components', 'wp-blocks', 'wp-editor', 'wp-compose' ];

add_action( 'init', 'mlig_register_block_assets' );
/**
 * Enqueue block editor only JavaScript and CSS.
 */
function mlig_register_block_assets() {

	// Make paths variables so we don't write em twice ;)
	$editor_js_path = '/assets/js/blocks.editor.js';
	$editor_style_path = '/assets/css/blocks.editor.css';
	$style_path = '/assets/css/blocks.style.css';

	// Register the bundled block JS file
	wp_register_script(
		'media-library-image-gallery-editor-js',
		MLIG_PlUGIN_URL . $editor_js_path,
		$js_dependencies,
		filemtime( MLIG_PlUGIN_DIRECTORY . $editor_js_path ),
		true
	);	

	// Register editor only styles
	wp_register_style(
		'media-library-image-gallery-editor-css',
		MLIG_PlUGIN_URL . $editor_style_path,
		[],
		filemtime( MLIG_PlUGIN_DIRECTORY . $editor_style_path )
	);

}
