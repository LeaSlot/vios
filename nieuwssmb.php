<head>

<?php
/*
Template Name: nieuwssmb
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

<body <?php body_class('nieuwssmb'); ?>>

<div class ="site-wrapper">
        <div class ="site-content sitecolorsmb">    
            <div class="grid-container">
                <div class="columnnieuws">
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
                            <?php dynamic_sidebar('sidebar-1'); ?>
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
    </script>
</body>