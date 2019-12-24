<?php

add_action( 'wp_enqueue_scripts', 'misha_css_and_js' );

function misha_css_and_js(){


	wp_enqueue_style( 'lib', get_stylesheet_directory_uri() . '/css/libs.min.css', array(), null );
	wp_enqueue_style( 'main', get_stylesheet_directory_uri() . '/css/main.css', array(), time() );
	wp_enqueue_style( 'media1', get_stylesheet_directory_uri() . '/css/css/media.css', array(), null );


	wp_enqueue_script( 'jquery' );
	//wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-2.2.4.min.js', array(), null, true );
	wp_enqueue_script( 'main', get_stylesheet_directory_uri() . '/js/main.js', array( 'jquery' ), null, true );

}


register_nav_menus(
	array(
		'head_menu' => 'Меню на шапке',
		'foot_menu' => 'Меню в футере',
	)
);


add_theme_support( 'post-thumbnails' );

add_image_size( 'prevnext', 160, 109, true );

function d($data){
    echo "<pre>".print_r($data,true)."</pre>";
}