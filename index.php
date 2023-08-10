<!DOCTYPE html>
<html lang="en">

<head>
    
    <!-- Meta zorgt voor de responsiveness voor mobiel-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php
        wp_head();
    ?>
</head>

<body>

    <?php
    get_header();
    ?>
        
        <div class="sidebar">
            <?php dynamic_sidebar('sidebar-1'); ?>
        </div>
        
        
    <?php
    get_footer();
    ?>
</body>
</html>