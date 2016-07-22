<?php
/**
 * @package Media Library Image Gallery
 * @version 1.6
 */
/*
Plugin Name: Media Library Image Gallery
Description: Display all Images in your Gallery as a WordPress Gallery
Author: derweili
Version: 0.1
Author URI: http://derweili.de/
*/


function all_media_gallery_register_shortcode() {//Register Shortcode function
	 add_shortcode('all-media-gallery', 'all_media_gallery_content');
}
add_action( 'init', 'all_media_gallery_register_shortcode');



function all_media_gallery_content() {

	//Set query args to query attachements
	$query_args = array(
		'post_type' => 'attachment',
		'orderby' => 'date',
		'post_mime_type' => 'image',
	);

	$query_args = apply_filters( 'all_media_gallery_query_args', $query_args );

	$attachements = get_posts( $query_args ); //Get Attachement Posts

	if( $attachements ) { //Check if there are attachements

		$images = array();


		foreach ( $attachements as $attachement ) : setup_postdata( $attachement ); //loop attachements
			//var_dump($attachement);
			$images[] = $attachement->ID;

		endforeach;



		$images = apply_filters( 'all_media_gallery_image_ids', $images );

		$image_id_string = join(',', $images);
		 
		$gallery_shortcode = '[gallery include="' . $image_id_string . '" order="DESC"]';

		echo do_shortcode( $gallery_shortcode );


	};

}


?>
