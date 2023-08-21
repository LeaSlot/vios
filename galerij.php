<head>
    <?php
        /*
        Template Name: galerij
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

        function showImg(n) {
            var setn = document.getElementById('set' + n);
            var close = document.getElementsByClassName('open');
            for (var i = 0; i < close.length; i++) {
                close[i].style.display = 'none'; 
            }
            setn.style.display = 'block';
        }


    </script>
    
</head>

<body <?php body_class('smb'); ?>>

<div class ="site-wrapper">
    <div class ="site-content sitecolorsmb">  
        <div class = "schaal">

            <?php
                // Plaats deze code in de templatebestand waar je de albums en afbeeldingen wilt weergeven

                // Haal alle termen (albums) op uit de 'album' taxonomie
                $albums = get_terms(array(
                    'taxonomy' => 'album',
                    'hide_empty' => false,
                ));
                $albumnr = 0;

                foreach ($albums as $album) {
                    echo '<a onclick = "showImg(' . $albumnr .')" class = "imgKnop ">';
                    echo '<h2>' . esc_html($album->name) . '</h2>';
                    echo '</a>';
                    // Haal afbeeldingen op die aan dit album zijn toegewezen
                    $images = get_posts(array(
                        'post_type' => 'attachment',
                        'numberposts' => -1,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'album',
                                'field' => 'term_id',
                                'terms' => $album->term_id,
                            ),
                        ),
                    ));?>

                    

                    <div id = "<?php echo 'set' . $albumnr; ?>" class = "open">
                        <?php
                            foreach ($images as $image) {
                                $image_url = wp_get_attachment_url($image->ID);
                                $image_alt = get_post_meta($image->ID, '_wp_attachment_image_alt', true);
                                echo '<div class = "afbeeldingen">';
                                echo '<img src="' . esc_url($image_url) . '" alt="' . esc_attr($image_alt) . '">';
                                echo '</div>';
                            }
                        ?>
                        <script>
                            var setn = document.getElementById('<?php echo "set" . $albumnr;?>');
                            console.log(setn)
                            setn.style.display = 'none';
                        </script>
                        <?php
                            $albumnr +=1;
                        ?>
                    </div>
                <?php }
            ?>
        </div>
    </div>

<?php

get_footer();
?>
</div>
</body>
