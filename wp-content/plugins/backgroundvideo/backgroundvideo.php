<?php
/*
Plugin Name: Backgroundvideo
Plugin URI: http://www.christianbachmann.ch/
Version: 0.0.1
Author: LVH
Description: Make a Background Video
*/

global $wpdb;
add_shortcode( 'showvideo', array( BackgroundVideo::get_instance(), 'showvideo' ) );

add_action( 'wp_enqueue_scripts', array( BackgroundVideo::get_instance(), 'enqueue_and_register_my_scripts' ) );

class BackgroundVideo{
    private static $instance = NULL;

    function __construct() {
    }

    public static function enqueue_and_register_my_scripts() {
      wp_enqueue_script( 'jquery.tubular', esc_url( get_template_directory_uri() ).'/js/jquery.tubular.1.0.js', array('jquery') );
    }

    public static function showvideo($atts){
        return "
        <script>
        (function($) {
            $('#wrapper').tubular({ videoId: '".$atts["videoid"]."' });
        })(jQuery);
        </script>
        ";

    }

    public static function get_instance() {
        // create an object
        self::$instance === NULL and self::$instance = new self;

        return self::$instance; // return the object
    }
}
