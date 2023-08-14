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
        wp_enqueue_style('viostest-styleheader', get_template_directory_uri(). "/styleheader.css", array(), 1.0, 'all');
        wp_enqueue_style('viostest-stylefooter', get_template_directory_uri(). "/stylefooter.css", array(), 1.0, 'all');
        wp_enqueue_style('viostest-stylesidebar', get_template_directory_uri(). "/stylesidebar.css", array(), 1.0, 'all');
        wp_enqueue_style('viostest-stylefrontpage', get_template_directory_uri(). "/stylefrontpage.css", array(), 1.0, 'all');
    }
    add_action('wp_enqueue_scripts', 'viostest_register_styles');


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

    //Maakt de slider in wordpress
    function custom_carousel_item_post_type() {
        register_post_type('carousel_item', array(
            'label' => 'Carousel Items',
            'public' => true,
            'menu_icon' => 'dashicons-images-alt2',
            'supports' => array('title', 'thumbnail'),
        ));
    }
    add_action('init', 'custom_carousel_item_post_type');


    //Maakt de sidebar
    function vios_register_sidebars() {
        register_sidebar(array(
            'name' => __('Sidebar', 'viostest1'),
            'id' => 'sidebar-1',
            'description' => __('Dit is de rechter sidebar.', 'viostest1'),
            'before_widget' => '<div class="widget1">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title1">',
            'after_title' => '</h2>',
        ));
        register_sidebar(array(
            'name' => __('SMB', 'viostest1'),
            'id' => 'smb',
            'description' => __('Dit is het linker widgetgebied voor logos.', 'viostest1'),
            'before_widget' => '<div class="widget">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
          ));
        register_sidebar(array(
            'name' => __('Dorst', 'viostest1'),
            'id' => 'dorst',
            'description' => __('Dit is het middelste widgetgebied voor logos.', 'viostest1'),
            'before_widget' => '<div class="widget">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        ));
        register_sidebar(array(
            'name' => __('TwirlPower', 'viostest1'),
            'id' => 'twirlpower',
            'description' => __('Dit is het rechter widgetgebied voor logos.', 'viostest1'),
            'before_widget' => '<div class="widget">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        ));
        register_sidebar(array(
            'name' => __('ABC', 'viostest1'),
            'id' => 'abc',
            'description' => __('Dit is het rechter widgetgebied voor logos.', 'viostest1'),
            'before_widget' => '<div class="widget">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        ));
        register_sidebar(array(
            'name' => __('MPB', 'viostest1'),
            'id' => 'mpb',
            'description' => __('Dit is het rechter widgetgebied voor logos.', 'viostest1'),
            'before_widget' => '<div class="widget">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        ));
        register_sidebar(array(
            'name' => __('WWB', 'viostest1'),
            'id' => 'wwb',
            'description' => __('Dit is het rechter widgetgebied voor logos.', 'viostest1'),
            'before_widget' => '<div class="widget">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        ));
        register_sidebar(array(
            'name' => __('footer', 'viostest1'),
            'id' => 'sponsoren',
            'description' => __('Dit widgetgebied voor de sponsoren.', 'viostest1'),
            'before_widget' => '<div class="widget">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        ));
      }
      add_action('widgets_init', 'vios_register_sidebars');

    //Zorgt voor de shortcode om berichten op te halen met smb slug
    function custom_latest_smb_post() {
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 1,
            'category_name' => 'smb',
            'orderby' => 'date',
            'order' => 'DESC'
        );
    
        $query = new WP_Query($args);
    
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                echo '<div class="latest-post">';
                echo '<a href="' . get_permalink() . '" class="post-titel">' . get_the_title() . '</a>';
                $aantalwoorden = wp_trim_words(get_the_excerpt(), 20);
                echo '<div class="post-content">' . $aantalwoorden . '</div>';
                echo '<a href="' . get_permalink() . '" class="read-more">Lees meer</a>';
                echo '</div>';
            }
        }
    
        wp_reset_postdata();
    }
    
    function custom_latest_smb_post_shortcode() {
        ob_start();
        custom_latest_smb_post();
        return ob_get_clean();
    }
    add_shortcode('latest_smb_post', 'custom_latest_smb_post_shortcode');
    
    //Zorgt voor de shortcode om berichten op te halen met dorst slug
    function custom_latest_dorst_post() {
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 1,
            'category_name' => 'dorst',
            'orderby' => 'date',
            'order' => 'DESC'
        );
    
        $query = new WP_Query($args);
    
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                echo '<div class="latest-post">';
                echo '<a href="' . get_permalink() . '" class="post-titel">' . get_the_title() . '</a>';
                $aantalwoorden = wp_trim_words(get_the_excerpt(), 20);
                echo '<div class="post-content">' . $aantalwoorden . '</div>';
                echo '<a href="' . get_permalink() . '" class="read-more">Lees meer</a>';
                echo '</div>';
            }
        }
    
        wp_reset_postdata();
    }
    
    function custom_latest_dorst_post_shortcode() {
        ob_start();
        custom_latest_dorst_post();
        return ob_get_clean();
    }
    add_shortcode('latest_dorst_post', 'custom_latest_dorst_post_shortcode');
    
    //Zorgt voor de shortcode om berichten op te halen met twirlpower slug
    function custom_latest_twirlpower_post() {
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 1,
            'category_name' => 'twirlpower',
            'orderby' => 'date',
            'order' => 'DESC'
        );
    
        $query = new WP_Query($args);
    
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                echo '<div class="latest-post">';
                echo '<a href="' . get_permalink() . '" class="post-titel">' . get_the_title() . '</a>';
                $aantalwoorden = wp_trim_words(get_the_excerpt(), 20);
                echo '<div class="post-content">' . $aantalwoorden . '</div>';
                echo '<a href="' . get_permalink() . '" class="read-more">Lees meer</a>';
                echo '</div>';
            }
        }
    
        wp_reset_postdata();
    }
    
    function custom_latest_twirlpower_post_shortcode() {
        ob_start();
        custom_latest_twirlpower_post();
        return ob_get_clean();
    }
    add_shortcode('latest_twirlpower_post', 'custom_latest_twirlpower_post_shortcode');
    
    //Zorgt voor de shortcode om berichten op te halen met abc slug
    function custom_latest_abc_post() {
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 1,
            'category_name' => 'abc',
            'orderby' => 'date',
            'order' => 'DESC'
        );
    
        $query = new WP_Query($args);
    
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                echo '<div class="latest-post">';
                echo '<a href="' . get_permalink() . '" class="post-titel">' . get_the_title() . '</a>';
                $aantalwoorden = wp_trim_words(get_the_excerpt(), 20);
                echo '<div class="post-content">' . $aantalwoorden . '</div>';
                echo '<a href="' . get_permalink() . '" class="read-more">Lees meer</a>';
                echo '</div>';
            }
        }
    
        wp_reset_postdata();
    }
    
    function custom_latest_abc_post_shortcode() {
        ob_start();
        custom_latest_abc_post();
        return ob_get_clean();
    }
    add_shortcode('latest_abc_post', 'custom_latest_abc_post_shortcode');
    
    //Zorgt voor de shortcode om berichten op te halen met mpb slug
    function custom_latest_mpb_post() {
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 1,
            'category_name' => 'mpb',
            'orderby' => 'date',
            'order' => 'DESC'
        );
    
        $query = new WP_Query($args);
    
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                echo '<div class="latest-post">';
                echo '<a href="' . get_permalink() . '" class="post-titel">' . get_the_title() . '</a>';
                $aantalwoorden = wp_trim_words(get_the_excerpt(), 20);
                echo '<div class="post-content">' . $aantalwoorden . '</div>';
                echo '<a href="' . get_permalink() . '" class="read-more">Lees meer</a>';
                echo '</div>';
            }
        }
    
        wp_reset_postdata();
    }
    
    function custom_latest_mpb_post_shortcode() {
        ob_start();
        custom_latest_mpb_post();
        return ob_get_clean();
    }
    add_shortcode('latest_mpb_post', 'custom_latest_mpb_post_shortcode');
    
    //Zorgt voor de shortcode om berichten op te halen met wwb slug
    function custom_latest_wwb_post() {
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 1,
            'category_name' => 'wwb',
            'orderby' => 'date',
            'order' => 'DESC'
        );
    
        $query = new WP_Query($args);
    
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                echo '<div class="latest-post">';
                echo '<a href="' . get_permalink() . '" class="post-titel">' . get_the_title() . '</a>';
                $aantalwoorden = wp_trim_words(get_the_excerpt(), 20);
                echo '<div class="post-content">' . $aantalwoorden . '</div>';
                echo '<a href="' . get_permalink() . '" class="read-more">Lees meer</a>';
                echo '</div>';
            }
        }
    
        wp_reset_postdata();
    }
    
    function custom_latest_wwb_post_shortcode() {
        ob_start();
        custom_latest_wwb_post();
        return ob_get_clean();
    }
    add_shortcode('latest_wwb_post', 'custom_latest_wwb_post_shortcode');
    
?>