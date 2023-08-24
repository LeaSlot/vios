<!DOCTYPE html>
<html lang="en">

<head>
    
    <!-- Meta zorgt voor de responsiveness voor mobiel-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Sophia de Waard">
    <meta name="contributor" content="Jens Meeuwis">

    <?php
    /**
     * Template Name: vioswebsite
     * Author: Sophia de Waard
     * Contributor: Jens Meeuwis
     * Description: Muziekvereniging VIOS Mijdrecht
     */
    ?>

    
    <?php
        wp_head();
    ?>

    

    <script>

        var menus = ["afdeling2", "opleiding2", "nieuws2", "contact2"];

        function mobielmenu() {
            var klapmenu = document.getElementById('uitklapmenu1');
            if (klapmenu.style.display == 'block'){
                klapmenu.style.display = 'none';
            }
            else{
                klapmenu.style.display = 'block';
            }
        }

        function openen(openend) {
            var open = document.getElementById(openend);
            if (open.style.display == 'block'){
                menus.forEach(sluiten)
            }
            else {
                menus.forEach(sluiten)
                open.style.display= 'block';
            }   
        }

        function sluiten(menu) {
            var element = document.getElementById(menu);
            element.style.display = 'none';
        }

        function naarGroot(menu) {
            var element = document.getElementById(menu);
            element.style.display = '';
        }
 
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 980) {
                menus.forEach(naarGroot)
                var klapmenu = document.getElementById('uitklapmenu1');
                klapmenu.style.display = ''
            }
        });
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
            $custom_class = 'sitecolorvioshead'; 
        }

        $categories = get_the_category();
        $category_class = '';
        foreach ($categories as $category) {
            $category_class .= $category->slug;
        }
        if ($category_class == 'smb') {
            $custom_class = 'sitecolorsmb';
        }
        else if ($category_class == 'dorst') {
            $custom_class = 'sitecolordorst'; 
        } 
        else if ($category_class == 'twirlpower') {
            $custom_class = 'sitecolortwirlpower'; 
        } 
        else if ($category_class == 'abc') {
            $custom_class = 'sitecolorabc'; 
        } 
        else if ($category_class == 'mpb') {
            $custom_class = 'sitecolormpb'; 
        } 
        else if ($category_class == 'wwb') {
            $custom_class = 'sitecolorwwb'; 
        } 
        else if ($category_class == 'algemeen') {
            $custom_class = 'sitecolorvioshead'; 
        }
    ?>

    <header class="header <?php echo $custom_class; ?>">
        <div class = "tabelmobiel">
            <!--mobiele-->
            <button onclick="mobielmenu()" class="toggle-nav <?php echo $custom_class; ?>">&#9776;</button>
        </div>


        <div class = "tabellogo">
            <?php
                if(function_exists('the_custom_logo')){
                    $custom_logo_id = get_theme_mod('custom_logo');
                    $logo = wp_get_attachment_image_src($custom_logo_id);
                }
            ?>
            <a href= "/viostest"><img class="logo" src = "<?php echo $logo[0] ?>"></a>
            
        </div>


        <div class="tabelnav">
            <nav id="uitklapmenu1" class="uitklapmenu">
                <div class="afdelingdiv">
                    <a onclick = "openen('afdeling2')" id= "buttonafdeling" class = "hoofditem <?php echo $custom_class; ?>">Vereniging <span class = "pijl">&#11167;</span></a>
                    <?php
                        wp_nav_menu(
                            array(
                                'menu' =>'afdelingen',
                                'container_class' => 'afdeling1 ' . $custom_class,
                                'container_id' => 'afdeling2',
                                'theme_location' => 'afdelingen',
                            )
                        );
                    ?>
                </div>
                <div class="opleidingdiv">
                    <a onclick = "openen('opleiding2')" id="buttonopleiding" class = "hoofditem <?php echo $custom_class; ?>">Opleidingen <span class = "pijl">&#11167;</span></a>
                    <?php
                        wp_nav_menu(
                            array(
                                'menu' =>'opleidingen',
                                'container_class' => 'opleiding1 ' . $custom_class,
                                'container_id' => 'opleiding2',
                                'theme_location' => 'opleidingen',
                            )
                        );
                    ?>
                </div>
                <div class="supportdiv">
                    <a href="/viostest/support-vios" class="hoofditem <?php echo $custom_class; ?>">Support VIOS</a>
                </div>
                <div class="agendadiv">
                    <a href="/viostest/agenda" class="hoofditem">Agenda</a>
                </div>
                <div class ="nieuwsdiv">
                    <a onclick = "openen('nieuws2')" id="buttonnieuws" class = "hoofditem <?php echo $custom_class; ?>">Nieuws <span class = "pijl">&#11167;</span></a>
                    <?php
                        wp_nav_menu(
                            array(
                                'menu' =>'nieuws',
                                'container_class' => 'nieuws1 ' . $custom_class,
                                'container_id' => 'nieuws2',
                                'theme_location' => 'nieuws',
                            )
                        );
                    ?>
                </div>
                <div class = "contactdiv">
                    <a onclick = "openen('contact2')" id="buttoncontact" class = "hoofditem <?php echo $custom_class; ?>">Contact <span class = "pijl">&#11167;</span></a>
                    <?php
                        wp_nav_menu(
                            array(
                                'menu' =>'contact',
                                'container_class' => 'contact1 ' . $custom_class,
                                'container_id' => 'contact2',
                                'theme_location' => 'contact',
                            )
                        );
                    ?>
                </div>
            </nav>
        </div>
        

    </header>
    
</body>
</html>