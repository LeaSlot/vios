<head>
    <?php
        /*
        Template Name: hoofdgalerij
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

<body>

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
        $custom_class = ''; 
    }
?>


<div class ="site-wrapper">
    
    <div class ="site-content <?php echo $custom_class; ?>">  
        <div class = "schaal">

            <?php
                $albums = get_terms(array(
                    'taxonomy' => 'album',
                    'hide_empty' => false,
                ));

                foreach ($albums as $album) {
                    $album_id = $album->term_id;
                    echo "<br><br>";

                    echo $album_id;
                    echo $album->name;


                    // Haal subalbums op voor dit album
                    $subalbums = get_children(array(
                        'post_parent' => $album_id,
                        'post_type' => 'album'
                    ));

                    if (!empty($subalbums)) {
                        echo "ik ben vader";
                    }
                }
            ?>


        </div>
    </div>

<?php

get_footer();
?>
</div>
</body>