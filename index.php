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
        
        <div class="grid-container">
            <div class="column">
                <div class="sidebar">
                    <?php dynamic_sidebar('sidebar-1'); ?>
                </div>

            </div>
            <div class="column">
                <div class="sidebar">
                    <?php dynamic_sidebar('sidebar-2'); ?>
                </div>
            </div>
        </div>
        
    <?php
    get_footer();
    ?>
</body>
</html>