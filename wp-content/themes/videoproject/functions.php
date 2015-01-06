<?php

add_action( 'wp_enqueue_scripts', 'enqueue_and_register_my_scripts' );

function enqueue_and_register_my_scripts() {
  wp_enqueue_script( 'bootstrap', esc_url( get_template_directory_uri() ).'/js/bootstrap.min.js', array('jquery') );
  wp_enqueue_style( 'bootstrap.css', esc_url( get_template_directory_uri() ).'/css/bootstrap.min.css' );
  wp_enqueue_style( 'videoproject', esc_url( get_template_directory_uri() ).'/style.css', array('bootstrap.css') );
}

?>
