<?php
/**
 * Plugin Name: WP Meta Description
 * Description: Adds the meta description tag to post excerpts
 * Plugin URI: https://github.com/ingereck/wp-meta-description
 * Author: Inge Reck
 * Author URI: https://ingereck.net/
 * Version: 0.1.0
 * Text Domain: wp-meta-description
 * Domain Path: /languages/
 * License: GPLv3 or later
 */
 
 // exit if file is called directly
if ( ! defined( 'ABSPATH' ) ) {

	exit;

function example_head_meta() {

 global $post;

 // Return the excerpt() if it exists, if not, truncate.
  if ( ! empty( $post->post_excerpt ) ) {
   $content = $post->post_excerpt;
 } elseif ( ! empty( $post->post_content ) ) {
   $content = wp_trim_words( $post->post_content, 40, '...' );
 } else {
    return;
 }

 ?>
  <meta name="description" content="<?php echo esc_attr( strip_tags( stripslashes( $content ) ) ); ?>" />
 <?php

}

add_action( 'wp_head', 'example_head_meta' );
 
