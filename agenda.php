<head>
    <?php
    /*
    Template Name: agenda
    */
    get_header();
    ?>
</head>

<body>



<div class ="site-wrapper">
        <div class ="site-content">    
            <div class = "agenda">
                <?php
                    if (have_posts()) {
                        while (have_posts()) { the_post();
                ?>
                <article class = "tekst" <?php post_class(); ?>>
                    <h2><?php the_title(); ?></h2>
                    <div class="post-content">
                        <?php the_content(); ?>
                    </div>
                </article>
                <?php
                }}
                else {
                    echo '<p>Geen berichten gevonden.</p>';
                }
                ?>
            </div>
                        
        </div>
        <?php
        get_footer();
        ?>
    </div>
</body>