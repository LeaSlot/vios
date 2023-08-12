<!DOCTYPE html>
<html lang="en">


<body>
    <div class="sponsors">
        
    </div>
    <div class="footer">
        <?php
            wp_nav_menu(
                array(
                    'menu' =>'footer',
                    'container_class' => 'footermenu1',
                    'container_id' => 'footermenu2',
                    'theme_location' => 'footer',
                )
            );
        ?>
    </div>
    
</body>
</html>