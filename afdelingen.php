<head>
    <?php
        /*
        Template Name: afdelingen
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
            }
        });
    </script>
    
</head>

<body>

<?php
        // Haal de huidige URL op
        $current_url = esc_url( $_SERVER['REQUEST_URI'] );
        if ( false !== strpos( $current_url, '/show-en-marchingband-vios/' ) ) {
            $customId = 'sidebar-smb'; 
        } 
        else if ( false !== strpos( $current_url, '/dweilorkest-dorst/' ) ) {
            $customId = 'sidebar-dorst'; 
        } 
        else if ( false !== strpos( $current_url, '/twirlpower/' ) ) {
            $customId = 'sidebar-twirlpower'; 
        } 
        else if ( false !== strpos( $current_url, '/amstelblazers-collectief/' ) ) {
            $customId = 'sidebar-abc'; 
        } 
        else if ( false !== strpos( $current_url, '/muziekpietenbende/' ) ) {
            $customId = 'sidebar-mpb'; 
        } 
        else if ( false !== strpos( $current_url, '/winterwonderband/' ) ) {
            $customId = 'sidebar-wwb'; 
        } 
        else {
            $customId = 'sidebar-1';
        };
?>

<div class ="site-wrapper">
        <div class ="site-content">    
            <div class="grid-container">
                <div class="column">
                    <?php
                        if (have_posts()) :
                            while (have_posts()) : the_post();
                    ?>
                                <article class = "tekst" <?php post_class(); ?>>
                                    <h2><?php the_title(); ?></h2>
                                    <div class="post-content">
                                        <?php the_content(); ?>
                                    </div>
                                </article>
                        <?php
                            endwhile;
                        else :
                            echo '<p>Geen berichten gevonden.</p>';
                        endif;
                        ?>
                </div>
                <div class="columnsb">
                    <div class = "schaling">
                        <div class="sidebar1">
                            <?php dynamic_sidebar($customId); ?>
                        </div>
                    </div>
                </div>
            </div>
                        
        </div>
        <?php
        get_footer();
        ?>
    </div>

    <script>
        if (window.innerWidth <= 650) {
            const innerDiv = document.getElementsByClassName("sidebar1");
            const outerDiv = document.getElementsByClassName('columnsb');
            const midDiv = document.getElementsByClassName('schaling');
            // Pas de stijl van de buitenste div aan op basis van de hoogte van de binnenste div
            outerDiv[0].style.height = innerDiv[0].clientHeight + 'px';
            innerDiv[0].style.width = midDiv[0].clientWidth + 'px';
        };

        //de socials naast elkaar zetten
        if (document.getElementsByClassName('socials').length >0){
            
            var socialsDiv = document.querySelector('.socials');
            var groepDiv = socialsDiv.querySelector('div'); 
            groepDiv.classList.add('socials');
        }
    </script>
</body>