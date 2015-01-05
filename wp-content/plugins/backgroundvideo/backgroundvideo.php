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

class BackgroundVideo{
    protected static $videourl= "";
    protected static $instance = NULL;
    function __construct() {

    }

    function setvideo($atts){
     $videourl=$atts["videourl"];
    }

    function showvideo($atts){
        return "
        <script>
        $('document').ready(function() {
            var options = { videoId: '".$atts["videoid"]."', start: 3 };
            $('#wrapper').tubular(options);
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