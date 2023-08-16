<head>
    <?php
        /*
        Template Name: galerijsmb
        */
        get_header();
    ?>


    <script>
        window.addEventListener('resize', function() {
            const innerDiv = document.getElementsByClassName("sidebar1");
            const outerDiv = document.getElementsByClassName('columnsb');
            const midDiv = document.getElementsByClassName('schaling');
            if (window.innerWidth >= 650) {
                outerDiv[0].style.height = '';
                innerDiv[0].style.width = '';
            }
            else if (window.innerWidth <= 650) {

                // Pas de stijl van de buitenste div aan op basis van de hoogte van de binnenste div
                outerDiv[0].style.height = innerDiv[0].clientHeight + 'px';
                innerDiv[0].style.width = midDiv[0].clientWidth + 'px';
                console.log('in if else');
            }
        });
    </script>
    
</head>

<body <?php body_class('smb'); ?>>

<div class ="site-wrapper">
        <div class ="site-content sitecolorsmb">  



<?php

$args = array(
  'post_type' => 'attachment',
  'post_status' => 'inherit',
  'posts_per_page' => -1,
  'post_mime_type' => 'image', // Alleen afbeeldingen
);

$query = new WP_Query($args);

if ($query->have_posts()) :
  while ($query->have_posts()) : $query->the_post();
    $image_url = wp_get_attachment_url();
    $image_alt = get_post_meta(get_the_ID(), '_wp_attachment_image_alt', true);
    ?>

    <div class="image-item">
      <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
    </div>

  <?php endwhile;
  wp_reset_postdata();
else :
  echo 'Geen afbeeldingen gevonden.';
endif; ?>
</div>
<?php

get_footer();
?>
</div>
</body>