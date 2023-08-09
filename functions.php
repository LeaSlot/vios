<?php
    function viostest_theme_support(){
        //Add dynamic title tag support
        add_theme_support('title-tag');
        add_theme_support('custom-logo');
        add_theme_support('post-thumbnails');
        }   
    add_action('after_setup_theme', 'viostest_theme_support');
    
    //Laadt de CSS
    function viostest_register_styles(){
        wp_enqueue_style('viostest-style', get_template_directory_uri(). "/style.css", array(), 1.0, 'all');
    }
    add_action('wp_enqueue_scripts', 'viostest_register_styles');


    //Laadt javascript in 

//HELP!!!!
    function enqueue_custom_script() {
        wp_enqueue_script('custom-script', get_template_directory_uri() . '/js/main.js', array('jquery'), null, true);
    }
    
    add_action('wp_enqueue_scripts', 'enqueue_custom_script');


    //Laad je menus maken in wordpress zelf
    function viostest_menus(){
        $locations=array(
            'afdelingen' => "Hoofdmenu afdelingen",
            'opleidingen' => "Hoofdmenu opleidingen",
            'galerij' => "Hoofdmenu gallerij",
            'nieuws' => "Hoofdmenu nieuws",
            'contact' => "Hoofdmenu contact",
            'footer' => "Footer menu items"
        );
        register_nav_menus($locations);
    }
    add_action('init', 'viostest_menus');

?>