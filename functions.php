<?php
    function vios_theme_support(){
        //Add dynamic title tag support
        add_theme_support('title-tag');
        add_theme_support('custom-logo');
        add_theme_support('post-thumbnails');
        }   
    add_action('after_setup_theme', 'vios_theme_support');
    
    function themename_custom_logo_setup() {
        $defaults = array(
            'height'               => 100,
            'width'                => 300,
            'flex-height'          => true,
            'flex-width'           => true,
            'unlink-homepage-logo' => true, 
        );
        add_theme_support( 'custom-logo', $defaults );
    }
    add_action( 'after_setup_theme', 'themename_custom_logo_setup' );

    //Laadt de CSS
        function vios_register_styles(){
            wp_enqueue_style('vios-style', get_template_directory_uri(). "/style.css", array(), 1.0, 'all');
            wp_enqueue_style('vios-styleheader', get_template_directory_uri(). "/styleheader.css", array(), 1.0, 'all');
            wp_enqueue_style('vios-stylefooter', get_template_directory_uri(). "/stylefooter.css", array(), 1.0, 'all');
            wp_enqueue_style('vios-stylesidebar', get_template_directory_uri(). "/stylesidebar.css", array(), 1.0, 'all');
            wp_enqueue_style('vios-stylefrontpage', get_template_directory_uri(). "/stylefrontpage.css", array(), 1.0, 'all');
            wp_enqueue_style('vios-stylenieuws', get_template_directory_uri(). "/stylenieuws.css", array(), 1.0, 'all');
        }
        add_action('wp_enqueue_scripts', 'vios_register_styles');


    //Laad je menus maken in wordpress zelf
        function vios_menus(){
            $locations=array(
                'afdelingen' => "Hoofdmenu afdelingen",
                'opleidingen' => "Hoofdmenu opleidingen",
                'nieuws' => "Hoofdmenu nieuws",
                'contact' => "Hoofdmenu contact",
                'footer' => "Footer menu items"
            );
            register_nav_menus($locations);
        }
        add_action('init', 'vios_menus');

        

    //Regelt de carousel
        function create_custom_post_type() {
            register_post_type('carousel_item',
                array(
                    'labels' => array(
                        'name' => __('Carousel Items'),
                        'singular_name' => __('Carousel Item')
                    ),
                    'public' => true,
                    'has_archive' => false,
                    'supports' => array('title', 'thumbnail')
                )
            );
        }
        add_action('init', 'create_custom_post_type');

    // Voeg aangepaste velden toe aan carousel-items
        function custom_carousel_item_metabox() {
            add_meta_box(
                'custom_carousel_item_metabox', // Unieke id voor de metabox
                'Link naar Externe Website', // Titel van de metabox
                'display_custom_carousel_item_metabox', // Callback functie om de inhoud van de metabox weer te geven
                'carousel_item', // Hier moet je het posttype van je carousel-items plaatsen
                'normal', // Plaatsing van de metabox (normal, side, etc.)
                'default' // Prioriteit van de metabox (default, high, low, etc.)
            );
        }

        function display_custom_carousel_item_metabox($post) {
            $external_link = get_post_meta($post->ID, 'external_link', true); // Hier plaats je de naam van het aangepaste veld
            wp_nonce_field(basename(__FILE__), 'custom_carousel_item_nonce'); // Voeg nonce toe voor beveiliging
            ?>
            <label for="external_link">Link naar externe website:</label>
            <input type="url" id="external_link" name="external_link" value="<?php echo esc_url($external_link); ?>">
            <?php
        }

        function save_custom_carousel_item_metabox($post_id) {
            if (!isset($_POST['custom_carousel_item_nonce']) || !wp_verify_nonce($_POST['custom_carousel_item_nonce'], basename(__FILE__))) {
                return;
            }

            if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
                return;
            }

            if ('carousel_item' === get_post_type($post_id)) {
                if (isset($_POST['external_link'])) {
                    update_post_meta($post_id, 'external_link', sanitize_text_field($_POST['external_link']));
                }
            }
        }

        add_action('add_meta_boxes', 'custom_carousel_item_metabox');
        add_action('save_post', 'save_custom_carousel_item_metabox');


    // Voeg categorieën toe aan pagina's
        function add_categories_to_pages() {
            register_taxonomy_for_object_type('category', 'page');
        }
        add_action('init', 'add_categories_to_pages');



    // Voeg een aangepast veld toe aan de categorie-editor voor CSS-class
        function custom_category_css_class_field($tag) {
            $custom_css_class = get_term_meta($tag->term_id, 'custom_css_class', true);
            ?>
            <tr class="form-field">
                <th scope="row" valign="top"><label for="custom_css_class">Aangepaste CSS-klasse</label></th>
                <td>
                    <input type="text" name="custom_css_class" id="custom_css_class" value="<?php echo esc_attr($custom_css_class); ?>">
                    <p class="description">Voer een aangepaste CSS-klasse in voor deze categorie.</p>
                </td>
            </tr>
            <?php
        }
        add_action('category_edit_form_fields', 'custom_category_css_class_field');

        // Sla de aangepaste CSS-klasse op
        function save_custom_category_css_class($term_id) {
            if (isset($_POST['custom_css_class'])) {
                $custom_css_class = sanitize_text_field($_POST['custom_css_class']);
                update_term_meta($term_id, 'custom_css_class', $custom_css_class);
            }
        }
        add_action('edited_category', 'save_custom_category_css_class');

    //Maakt de widgetgebieden
        function vios_register_sidebars() {
            register_sidebar(array(
                'name' => __('Sidebar', 'vios1'),
                'id' => 'sidebar-1',
                'description' => __('Dit is de rechter sidebar.', 'vios1'),
                'before_widget' => '<div class="widget1">',
                'after_widget' => '</div>',
                'before_title' => '<h2 class="widget-title1">',
                'after_title' => '</h2>',
            ));
            register_sidebar(array(
                'name' => __('Sidebarsmb', 'vios1'),
                'id' => 'sidebar-smb',
                'description' => __('Dit is de rechter sidebar voor smb.', 'vios1'),
                'before_widget' => '<div class="widget1 afd">',
                'after_widget' => '</div>',
                'before_title' => '<h2 class="widget-title1">',
                'after_title' => '</h2>',
            ));
            register_sidebar(array(
                'name' => __('Sidebardorst', 'vios1'),
                'id' => 'sidebar-dorst',
                'description' => __('Dit is de rechter sidebar voor dorst.', 'vios1'),
                'before_widget' => '<div class="widget1 afd">',
                'after_widget' => '</div>',
                'before_title' => '<h2 class="widget-title1">',
                'after_title' => '</h2>',
            ));
            register_sidebar(array(
                'name' => __('Sidebartwirlpower', 'vios1'),
                'id' => 'sidebar-twirlpower',
                'description' => __('Dit is de rechter sidebar voor twirlpower.', 'vios1'),
                'before_widget' => '<div class="widget1 afd">',
                'after_widget' => '</div>',
                'before_title' => '<h2 class="widget-title1">',
                'after_title' => '</h2>',
            ));
            register_sidebar(array(
                'name' => __('Sidebarabc', 'vios1'),
                'id' => 'sidebar-abc',
                'description' => __('Dit is de rechter sidebar voor abc.', 'vios1'),
                'before_widget' => '<div class="widget1 afd">',
                'after_widget' => '</div>',
                'before_title' => '<h2 class="widget-title1">',
                'after_title' => '</h2>',
            ));
            register_sidebar(array(
                'name' => __('Sidebarmpb', 'vios1'),
                'id' => 'sidebar-mpb',
                'description' => __('Dit is de rechter sidebar voor mpb.', 'vios1'),
                'before_widget' => '<div class="widget1 afd">',
                'after_widget' => '</div>',
                'before_title' => '<h2 class="widget-title1">',
                'after_title' => '</h2>',
            ));
            register_sidebar(array(
                'name' => __('Sidebarwwb', 'vios1'),
                'id' => 'sidebar-wwb',
                'description' => __('Dit is de rechter sidebar voor wwb.', 'vios1'),
                'before_widget' => '<div class="widget1 afd">',
                'after_widget' => '</div>',
                'before_title' => '<h2 class="widget-title1">',
                'after_title' => '</h2>',
            ));
            register_sidebar(array(
                'name' => __('SMB', 'vios1'),
                'id' => 'smb',
                'description' => __('Dit is het linker widgetgebied voor logos.', 'vios1'),
                'before_widget' => '<div class="widget">',
                'after_widget' => '</div>',
                'before_title' => '<h2 class="widget-title">',
                'after_title' => '</h2>',
            ));
            register_sidebar(array(
                'name' => __('Dorst', 'vios1'),
                'id' => 'dorst',
                'description' => __('Dit is het middelste widgetgebied voor logos.', 'vios1'),
                'before_widget' => '<div class="widget">',
                'after_widget' => '</div>',
                'before_title' => '<h2 class="widget-title">',
                'after_title' => '</h2>',
            ));
            register_sidebar(array(
                'name' => __('TwirlPower', 'vios1'),
                'id' => 'twirlpower',
                'description' => __('Dit is het rechter widgetgebied voor logos.', 'vios1'),
                'before_widget' => '<div class="widget">',
                'after_widget' => '</div>',
                'before_title' => '<h2 class="widget-title">',
                'after_title' => '</h2>',
            ));
            register_sidebar(array(
                'name' => __('ABC', 'vios1'),
                'id' => 'abc',
                'description' => __('Dit is het rechter widgetgebied voor logos.', 'vios1'),
                'before_widget' => '<div class="widget">',
                'after_widget' => '</div>',
                'before_title' => '<h2 class="widget-title">',
                'after_title' => '</h2>',
            ));
            register_sidebar(array(
                'name' => __('MPB', 'vios1'),
                'id' => 'mpb',
                'description' => __('Dit is het rechter widgetgebied voor logos.', 'vios1'),
                'before_widget' => '<div class="widget">',
                'after_widget' => '</div>',
                'before_title' => '<h2 class="widget-title">',
                'after_title' => '</h2>',
            ));
            register_sidebar(array(
                'name' => __('WWB', 'vios1'),
                'id' => 'wwb',
                'description' => __('Dit is het rechter widgetgebied voor logos.', 'vios1'),
                'before_widget' => '<div class="widget">',
                'after_widget' => '</div>',
                'before_title' => '<h2 class="widget-title">',
                'after_title' => '</h2>',
            ));
            register_sidebar(array(
                'name' => __('footer', 'vios1'),
                'id' => 'sponsoren',
                'description' => __('Dit widgetgebied voor de sponsoren.', 'vios1'),
                'before_widget' => '<div class="widget">',
                'after_widget' => '</div>',
                'before_title' => '<h2 class="widget-title">',
                'after_title' => '</h2>',
            ));
        }
        add_action('widgets_init', 'vios_register_sidebars');

    //Zorgt voor de shortcode smb_post om alle berichten op te halen met smb slug
        function custom_smb_post() {
            $posts_per_page = 10; // Aantal berichten per pagina
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; // Haal de huidige pagina op
        
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => $posts_per_page,
                'paged' => $paged,
                'category_name' => 'smb',
                'orderby' => 'date',
                'order' => 'DESC'
            );
        
            $query = new WP_Query($args);
        
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    echo '<div class="all-post">';
                    
                    // Display the post thumbnail (featured image)
                    if (has_post_thumbnail()) {
                        echo '<div class="post-thumbnail">';
                        the_post_thumbnail('thumbnail'); // You can change 'thumbnail' to other image size
                        echo '</div>';
                    }
                    
                    echo '<div class="post-tekst">';
                    echo '<a href="' . get_permalink() . '" class="post-title">' . get_the_title() . '</a>';
                    $aantalwoorden = wp_trim_words(get_the_excerpt(), 60);
                    echo '<div class="post-excerpt">' . $aantalwoorden . '</div>';
                    echo '<a href="' . get_permalink() . '" class="read-more">Zie meer</a>';
                    echo '</div>';
                    echo '</div>';
                }
        
                // Voeg de paginering toe
                echo '<div class="pagination">';
                echo paginate_links(array(
                    'total' => $query->max_num_pages,
                    'current' => $paged,
                ));
                echo '</div>';
            }
        
            wp_reset_postdata();
        }
        
        function custom_smb_post_shortcode() {
            ob_start();
            custom_smb_post();
            return ob_get_clean();
        }
        add_shortcode('smb_berichten', 'custom_smb_post_shortcode');
    
    
   


    //Zorgt voor de shortcode dorst_post om alle berichten op te halen met dorst slug
        function custom_dorst_post() {
            $posts_per_page = 10; // Aantal berichten per pagina
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; // Haal de huidige pagina op
        
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => $posts_per_page,
                'paged' => $paged,
                'category_name' => 'dorst',
                'orderby' => 'date',
                'order' => 'DESC'
            );
        
            $query = new WP_Query($args);
        
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    echo '<div class="all-post">';
                    
                    // Display the post thumbnail (featured image)
                    if (has_post_thumbnail()) {
                        echo '<div class="post-thumbnail">';
                        the_post_thumbnail('thumbnail'); // You can change 'thumbnail' to other image size
                        echo '</div>';
                    }
                    
                    echo '<div class="post-tekst">';
                    echo '<a href="' . get_permalink() . '" class="post-title">' . get_the_title() . '</a>';
                    $aantalwoorden = wp_trim_words(get_the_excerpt(), 60);
                    echo '<div class="post-excerpt">' . $aantalwoorden . '</div>';
                    echo '<a href="' . get_permalink() . '" class="read-more">Zie meer</a>';
                    echo '</div>';
                    echo '</div>';
                }
        
                // Voeg de paginering toe
                echo '<div class="pagination">';
                echo paginate_links(array(
                    'total' => $query->max_num_pages,
                    'current' => $paged,
                ));
                echo '</div>';
            }
        
            wp_reset_postdata();
        }
        
        function custom_dorst_post_shortcode() {
            ob_start();
            custom_dorst_post();
            return ob_get_clean();
        }
        add_shortcode('dorst_berichten', 'custom_dorst_post_shortcode');
        

    //Zorgt voor de shortcode twirlpower_post om alle berichten op te halen met twirlpower slug
        function custom_twirlpower_post() {
            $posts_per_page = 10; // Aantal berichten per pagina
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; // Haal de huidige pagina op
        
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => $posts_per_page,
                'paged' => $paged,
                'category_name' => 'twirlpower',
                'orderby' => 'date',
                'order' => 'DESC'
            );
        
            $query = new WP_Query($args);
        
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    echo '<div class="all-post">';
                    
                    // Display the post thumbnail (featured image)
                    if (has_post_thumbnail()) {
                        echo '<div class="post-thumbnail">';
                        the_post_thumbnail('thumbnail'); // You can change 'thumbnail' to other image size
                        echo '</div>';
                    }
                    
                    echo '<div class="post-tekst">';
                    echo '<a href="' . get_permalink() . '" class="post-title">' . get_the_title() . '</a>';
                    $aantalwoorden = wp_trim_words(get_the_excerpt(), 60);
                    echo '<div class="post-excerpt">' . $aantalwoorden . '</div>';
                    echo '<a href="' . get_permalink() . '" class="read-more">Zie meer</a>';
                    echo '</div>';
                    echo '</div>';
                }
        
                // Voeg de paginering toe
                echo '<div class="pagination">';
                echo paginate_links(array(
                    'total' => $query->max_num_pages,
                    'current' => $paged,
                ));
                echo '</div>';
            }
        
            wp_reset_postdata();
        }
        
        function custom_twirlpower_post_shortcode() {
            ob_start();
            custom_twirlpower_post();
            return ob_get_clean();
        }
        add_shortcode('twirlpower_berichten', 'custom_twirlpower_post_shortcode');


        
    
    
    //Zorgt voor de shortcode abc_post om alle berichten op te halen met abc slug
        function custom_abc_post() {
            $posts_per_page = 10; // Aantal berichten per pagina
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; // Haal de huidige pagina op
        
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => $posts_per_page,
                'paged' => $paged,
                'category_name' => 'abc',
                'orderby' => 'date',
                'order' => 'DESC'
            );
        
            $query = new WP_Query($args);
        
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    echo '<div class="all-post">';
                    
                    // Display the post thumbnail (featured image)
                    if (has_post_thumbnail()) {
                        echo '<div class="post-thumbnail">';
                        the_post_thumbnail('thumbnail'); // You can change 'thumbnail' to other image size
                        echo '</div>';
                    }
                    
                    echo '<div class="post-tekst">';
                    echo '<a href="' . get_permalink() . '" class="post-title">' . get_the_title() . '</a>';
                    $aantalwoorden = wp_trim_words(get_the_excerpt(), 60);
                    echo '<div class="post-excerpt">' . $aantalwoorden . '</div>';
                    echo '<a href="' . get_permalink() . '" class="read-more">Zie meer</a>';
                    echo '</div>';
                    echo '</div>';
                }
        
                // Voeg de paginering toe
                echo '<div class="pagination">';
                echo paginate_links(array(
                    'total' => $query->max_num_pages,
                    'current' => $paged,
                ));
                echo '</div>';
            }
        
            wp_reset_postdata();
        }
        
        function custom_abc_post_shortcode() {
            ob_start();
            custom_abc_post();
            return ob_get_clean();
        }
        add_shortcode('abc_berichten', 'custom_abc_post_shortcode');




    //Zorgt voor de shortcode mpb_post om alle berichten op te halen met mpb slug
        function custom_mpb_post() {
            $posts_per_page = 10; // Aantal berichten per pagina
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; // Haal de huidige pagina op
        
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => $posts_per_page,
                'paged' => $paged,
                'category_name' => 'mpb',
                'orderby' => 'date',
                'order' => 'DESC'
            );
        
            $query = new WP_Query($args);
        
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    echo '<div class="all-post">';
                    
                    // Display the post thumbnail (featured image)
                    if (has_post_thumbnail()) {
                        echo '<div class="post-thumbnail">';
                        the_post_thumbnail('thumbnail'); // You can change 'thumbnail' to other image size
                        echo '</div>';
                    }
                    
                    echo '<div class="post-tekst">';
                    echo '<a href="' . get_permalink() . '" class="post-title">' . get_the_title() . '</a>';
                    $aantalwoorden = wp_trim_words(get_the_excerpt(), 60);
                    echo '<div class="post-excerpt">' . $aantalwoorden . '</div>';
                    echo '<a href="' . get_permalink() . '" class="read-more">Zie meer</a>';
                    echo '</div>';
                    echo '</div>';
                }
        
                // Voeg de paginering toe
                echo '<div class="pagination">';
                echo paginate_links(array(
                    'total' => $query->max_num_pages,
                    'current' => $paged,
                ));
                echo '</div>';
            }
        
            wp_reset_postdata();
        }
        
        function custom_mpb_post_shortcode() {
            ob_start();
            custom_mpb_post();
            return ob_get_clean();
        }
        add_shortcode('mpb_berichten', 'custom_mpb_post_shortcode');
        
    

    //Zorgt voor de shortcode wwb_post om alle berichten op te halen met wwb slug
        function custom_wwb_post() {
            $posts_per_page = 10; // Aantal berichten per pagina
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; // Haal de huidige pagina op
        
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => $posts_per_page,
                'paged' => $paged,
                'category_name' => 'wwb',
                'orderby' => 'date',
                'order' => 'DESC'
            );
        
            $query = new WP_Query($args);
        
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    echo '<div class="all-post">';
                    
                    // Display the post thumbnail (featured image)
                    if (has_post_thumbnail()) {
                        echo '<div class="post-thumbnail">';
                        the_post_thumbnail('thumbnail'); // You can change 'thumbnail' to other image size
                        echo '</div>';
                    }
                    
                    echo '<div class="post-tekst">';
                    echo '<a href="' . get_permalink() . '" class="post-title">' . get_the_title() . '</a>';
                    $aantalwoorden = wp_trim_words(get_the_excerpt(), 60);
                    echo '<div class="post-excerpt">' . $aantalwoorden . '</div>';
                    echo '<a href="' . get_permalink() . '" class="read-more">Zie meer</a>';
                    echo '</div>';
                    echo '</div>';
                }
        
                // Voeg de paginering toe
                echo '<div class="pagination">';
                echo paginate_links(array(
                    'total' => $query->max_num_pages,
                    'current' => $paged,
                ));
                echo '</div>';
            }
        
            wp_reset_postdata();
        }
        
        function custom_wwb_post_shortcode() {
            ob_start();
            custom_wwb_post();
            return ob_get_clean();
        }
        add_shortcode('wwb_berichten', 'custom_wwb_post_shortcode');
        
?>