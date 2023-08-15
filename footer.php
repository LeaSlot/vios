<!DOCTYPE html>
<html lang="en">


<body>
    <div class="sponsors">
        Onze sponsoren
    </div>
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

<script>
    (function() {
        var carousel = document.querySelector('.carousel');
        var carouselItems = document.querySelectorAll('.carousel-item');
        var currentIndex = 0;
        var itemWidth = carouselItems[0].offsetWidth; // Breedte van elk item
        var slideInterval;

        function showSlide(index) {
            var translateValue = index * -itemWidth;
            carousel.style.transform = 'translateX(' + translateValue + 'px)';
        }

        function startCarousel() {
            slideInterval = setInterval(function() {
                currentIndex = (currentIndex + 1) % (carouselItems.length - 3); // Aanpassing om oneindige lus te behouden
                showSlide(currentIndex);
            }, 5000); // Wijzig 5000 naar je gewenste interval in milliseconden
        }

        startCarousel();
    })();
</script>


 
    <div class="footer">
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
    
</body>
</html>