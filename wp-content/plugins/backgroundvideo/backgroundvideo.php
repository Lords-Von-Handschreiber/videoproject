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

add_action('wp_head', array( BackgroundVideo::get_instance(), 'getHeaderHtml' ) );

class BackgroundVideo{
    protected static $videourl= "";
    protected static $instance = NULL;
    function __construct() {

    }

    function setvideo($atts){
     $videourl=$atts["videourl"];
    }

    function getHeaderHtml() {
      $output = "<script src='".esc_url( get_template_directory_uri() )."/js/jquery.tubular.1.0.js'></script>";

      echo $output;
    }

    function showvideo($atts){
        return "
        <script>
        $(document).ready(function() {
            $('#wrapper').tubular({ videoId: '".$atts["videoid"]."', start: 3 });
        });
        </script>
        ";

    }

    public static function get_instance() {
        // create an object
        NULL === self::$instance and self::$instance = new self;

        return self::$instance; // return the object
    }
}
