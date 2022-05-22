<?php
// enable mime svg media library
function cc_mime_types($mimes) {
    $mimes['pdf'] = 'application/pdf';
    return $mimes;
  }
add_filter('upload_mimes', 'cc_mime_types');

// For a GIST
add_action( 'init', function () {
  // Register route
	register_rest_route( '/wp/v2', '/file/save', array(
		'methods' => 'POST','args' => array(),
		'permission_callback' => function () {
		  return true;
		},
		'callback' => function ( WP_REST_Request $request ) {

		// Prepare array for output
		$output = array();

		// Request the data send
		$sendData = $request->get_params();

		// Identify user
		$user = wp_get_current_user();

		// Which user is logged in?
		$userID = $user->ID;

		// Get the upload files
		$files = $request->get_file_params();

		// These files need to be included as dependencies when on the front end.
			require_once( ABSPATH . 'wp-admin/includes/image.php' );
			require_once( ABSPATH . 'wp-admin/includes/file.php' );
			require_once( ABSPATH . 'wp-admin/includes/media.php' );

		// Process images
		if (!empty($files)) {
			$upload_overrides = array( 'my_file_upload' => false );
			foreach ($files as $key => $file) {
			$attachment_id = media_handle_upload( $key, $challengeID );
			if ( is_wp_error( $attachment_id ) ) {
				$output['status'] = 'error';
					$output['message'] = '- The image could not be uploaded.';
				return $output;
				} else {
				// Success
				$output['status'] = 'success';
				$output['message'] = 'File '.$attachment_id.' uploaded.';
				$output['url'] = wp_get_attachment_url($attachment_id);
				}
			}
		}
		
		return $output;
		}
	));
});
