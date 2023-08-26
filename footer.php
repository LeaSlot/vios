<!DOCTYPE html>
<html lang="en">



<body>

    <!--Maakt de class die nodig is om de kleur van de footer aan te passen naar de afdeling-->
    <?php
        // Haal de huidige URL op
        $current_url = esc_url( $_SERVER['REQUEST_URI'] );
        if ( false !== strpos( $current_url, '/show-en-marchingband-vios/' ) ) {
            $custom_class = 'sitecolorsmb'; 
        } 
        else if ( false !== strpos( $current_url, '/dweilorkest-dorst/' ) ) {
            $custom_class = 'sitecolordorst'; 
        } 
        else if ( false !== strpos( $current_url, '/twirlpower/' ) ) {
            $custom_class = 'sitecolortwirlpower'; 
        } 
        else if ( false !== strpos( $current_url, '/amstelblazers-collectief/' ) ) {
            $custom_class = 'sitecolorabc'; 
        } 
        else if ( false !== strpos( $current_url, '/muziekpietenbende/' ) ) {
            $custom_class = 'sitecolormpb'; 
        } 
        else if ( false !== strpos( $current_url, '/winterwonderband/' ) ) {
            $custom_class = 'sitecolorwwb'; 
        } 
        else {
            $custom_class = 'sitecolorviosfooter'; 
        }
        
        $categories = get_the_category();
        $category_class = '';
        foreach ($categories as $category) {
            $category_class .= $category->slug;
        }
        if ($category_class == 'smb') {
            $custom_class = 'sitecolorsmb';
        }
        else if ($category_class == 'dorst') {
            $custom_class = 'sitecolordorst'; 
        } 
        else if ($category_class == 'twirlpower') {
            $custom_class = 'sitecolortwirlpower'; 
        } 
        else if ($category_class == 'abc') {
            $custom_class = 'sitecolorabc'; 
        } 
        else if ($category_class == 'mpb') {
            $custom_class = 'sitecolormpb'; 
        } 
        else if ($category_class == 'wwb') {
            $custom_class = 'sitecolorwwb'; 
        } 
        else if ($category_class == 'algemeen') {
            $custom_class = 'sitecolorvioshead'; 
        }
    ?>

    <!--Zorgt voor de balk boven de carousel-->
    <div class="sponsors <?php echo $custom_class; ?>">
        
    </div>

    <!--Maakt de carousel-->
    <div class="carousel-container">
        <div class="carousel">
            <?php
            $carousel_items = new WP_Query(array(
                'post_type' => 'carousel_item', // Vervang met de naam van je aangepaste posttype
                'posts_per_page' => -1,
            ));

            while ($carousel_items->have_posts()) {
                $carousel_items->the_post();
                $image_url = get_the_post_thumbnail_url();
                $external_url = get_post_meta(get_the_ID(), 'external_link', true); // Haal de URL naar de externe website op
                echo '<div class="carousel-item">';
                if ($external_url) {
                    echo '<a href="' . esc_url($external_url) . '" target="_blank">'; // Opent de link in een nieuw tabblad
                }
                echo '<img src="' . esc_url($image_url) . '" alt="' . esc_attr($caption) . '">';
                if ($external_url) {
                    echo '</a>';
                }
                echo '</div>';
            }

            wp_reset_postdata();
            ?>
        </div>
    </div>
 
    <!--Maakt het menu onder de carousel-->
    <div class="footer <?php echo $custom_class; ?>">
        <?php
            wp_nav_menu(
                array(
                    'menu' =>'footer',
                    'container_class' => 'footermenu1',
                    'container_id' => 'footermenu2',
                    'theme_location' => 'footer',
                )
            );
        ?>
    </div>
    

    <script>
        //Zorgt voor de werking van het carousel
        var carousel = document.querySelector('.carousel');
        var carouselItems = document.querySelectorAll('.carousel-item');
        var currentIndex = 0;
        var visibleItems = 5;

        function updateVisibleItems() {
            if (window.innerWidth > 1200) {
                visibleItems = 5;
            }
            if (window.innerWidth <= 1200) {
                visibleItems = 4;
            }
            if (window.innerWidth <= 900) {
                visibleItems = 3;
            }
            if (window.innerWidth <= 720) {
                visibleItems = 2;
            }
            if (window.innerWidth <= 450) {
                visibleItems = 1;
            }
        }

        function setCarouselWidth(element) {
            element.style.width = window.innerWidth/visibleItems-1 +'px';
        }

        function updateItemWidth() {
            itemWidth = carouselItems[0].offsetWidth;
        }

        function startCarousel() {
            slideInterval = setInterval(function() {
            currentIndex = (currentIndex + 1) % (carouselItems.length - (visibleItems - 1));
            showSlide(currentIndex);
            }, 5000);
        }

        function showSlide(index) {
            var translateValue = index * -itemWidth;
            carousel.style.transform = 'translateX(' + translateValue + 'px)';
        }

        // Stel het juiste aantal zichtbare items in bij het laden van de pagina
            updateVisibleItems(); 
            carouselItems.forEach(setCarouselWidth)
            updateItemWidth();
            startCarousel();

        // Voeg event listeners toe om het aantal zichtbare items bij te werken bij resizen
            window.addEventListener('resize', function() {
                updateVisibleItems();
                carouselItems.forEach(setCarouselWidth)
                updateItemWidth();
                showSlide(currentIndex); // Toon de huidige dia op basis van bijgewerkte informatie
            });  
    </script>
</body>
</html>