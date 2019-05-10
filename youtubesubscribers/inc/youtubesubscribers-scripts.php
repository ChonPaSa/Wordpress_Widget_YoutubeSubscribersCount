<?php

//Load Scripts and styles
function ytsc_add_scripts(){

    //Enqueue the stylesheet
    wp_enqueue_style( 'ytsc-main-style', plugins_url().'/youtubesubscribers/css/style.css' );

    //Enqueue js
    wp_enqueue_script( 'ytsc-main-script', plugins_url().'/youtubesubscribers/js/main.js' );

    //Enqueue the Youtube Script
    wp_register_script( 'google', 'https://apis.google.com/js/platform.js');
    wp_enqueue_script( 'google');

}

add_action('wp_enqueue_scripts','ytsc_add_scripts');
