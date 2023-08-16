<!DOCTYPE html>
<html lang="en">


<body>
    <div class="sponsors">
        
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
  var visibleItems = 4; // Aantal zichtbare items per keer (standaard 4)

  function updateVisibleItems() {
    if (window.innerWith > 1200) {
        visibileItems = 4;
    }
    if (window.innerWidth <= 1200) {
      visibleItems = 3; // Toon drie items op kleinere schermen
    }
    if (window.innerWidth <= 900) {
        visibleItems = 2;
    }
    if (window.innerWidth <= 650) {
      visibleItems = 1; // Toon één item op nog kleinere schermen
    }
  }

  function updateItemWidth() {
    itemWidth = carouselItems[0].offsetWidth;
  }

  function showSlide(index) {
    var translateValue = index * -itemWidth;
    carousel.style.transform = 'translateX(' + translateValue + 'px)';
  }

  function startCarousel() {
    slideInterval = setInterval(function() {
      currentIndex = (currentIndex + 1) % (carouselItems.length - (visibleItems - 1));
      showSlide(currentIndex);
    }, 5000);
  }

  updateVisibleItems(); // Stel het juiste aantal zichtbare items in bij het laden van de pagina
  updateItemWidth();
  startCarousel();

  // Voeg event listeners toe om het aantal zichtbare items bij te werken bij resizen
  window.addEventListener('resize', function() {
    updateVisibleItems();
    updateItemWidth();
    showSlide(currentIndex); // Toon de huidige dia op basis van bijgewerkte informatie
  });
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