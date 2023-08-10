<!DOCTYPE html>
<html lang="en">

<body>
    <footer class="footer">
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
    </footer>
</body>
</html>