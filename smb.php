<body <?php body_class('smb'); ?>>
<?php
/*
Template Name: smb
*/
get_header();
?>



<div class ="site-wrapper">
        <div class ="site-content sitecolor">    
            <div class="grid-container">
                <div class="columntext">
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
</body>