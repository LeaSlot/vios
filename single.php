<head>
    <?php
        get_header();
    ?>    
</head>

<body>
    <div class ="site-wrapper">
        <div class ="site-content">    
            <div class="plainText">
                
                    <?php
                        if (have_posts()) :
                            while (have_posts()) : the_post();
                    ?>


                    <div id="post-<?php the_ID(); ?>" class="individual-post">
                        <article class = "fulltext" <?php post_class(); ?>>
                            <h2><?php the_title(); ?></h2>
                            <div class="post-content">
                                <?php the_content(); ?>
                            </div>
                        </article>
                    </div>

                                
                        <?php
                            endwhile;
                        else :
                            echo '<p>Geen berichten gevonden.</p>';
                        endif;
                        ?>
                
            </div>
                        
        </div>
        <?php
        get_footer();
        ?>
    </div>
</body>