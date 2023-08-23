<!DOCTYPE html>
<html lang="en">

<head>
    
    <!-- Meta zorgt voor de responsiveness voor mobiel-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        wp_head();
    ?>

    

    <script>
        

        let menuactief = false;
        let menuactiefafdelingen = false;

        function mobielmenu() {
            var klapmenu = document.getElementById('uitklapmenu1');
            if (menuactief == false){
                klapmenu.style.display = 'block';
                menuactief = true
            }
            else{
                klapmenu.style.display = 'none';
                menuactief = false
            }
        }

        function afdelingenmobiel(){
            if (window.innerWidth <= 1075) {
                var klapmenuafdeling = document.getElementById("afdeling2");
                if (menuactiefafdelingen == false){
                    klapmenuafdeling.style.display = 'block';
                    menuactiefafdelingen = true
                }
                else{
                    klapmenuafdeling.style.display = 'none';
                    menuactiefafdelingen = false
                }
            }
        }

        function opleidingenmobiel(){
            if (window.innerWidth <= 1075) {
                var klapmenuafdeling = document.getElementById("opleiding2");
                if (menuactiefafdelingen == false){
                    klapmenuafdeling.style.display = 'block';
                    menuactiefafdelingen = true
                }
                else{
                    klapmenuafdeling.style.display = 'none';
                    menuactiefafdelingen = false
                }
            }
        }

        function galerijmobiel(){
            if (window.innerWidth <= 1075) {
                var klapmenuafdeling = document.getElementById("galerij2");
                if (menuactiefafdelingen == false){
                    klapmenuafdeling.style.display = 'block';
                    menuactiefafdelingen = true
                }
                else{
                    klapmenuafdeling.style.display = 'none';
                    menuactiefafdelingen = false
                }
            }
        }

        function nieuwsmobiel(){
            if (window.innerWidth <= 1075) {
                var klapmenuafdeling = document.getElementById("nieuws2");
                if (menuactiefafdelingen == false){
                    klapmenuafdeling.style.display = 'block';
                    menuactiefafdelingen = true
                }
                else{
                    klapmenuafdeling.style.display = 'none';
                    menuactiefafdelingen = false
                }
            }
        }

        function contactmobiel(){
            if (window.innerWidth <= 1075) {
                var klapmenuafdeling = document.getElementById("contact2");
                if (menuactiefafdelingen == false){
                    klapmenuafdeling.style.display = 'block';
                    menuactiefafdelingen = true
                }
                else{
                    klapmenuafdeling.style.display = 'none';
                    menuactiefafdelingen = false
                }
            }
        }

        function naargroot () {
            var klapmenu = document.getElementById('uitklapmenu1');
            klapmenu.style.display = '';
            menuactief = false;
            var klapmenuafdeling = document.getElementById("afdeling2");
            klapmenuafdeling.style.display = '';
            var klapmenuafdeling = document.getElementById("opleiding2");
            klapmenuafdeling.style.display = '';
            var klapmenuafdeling = document.getElementById("galerij2");
            klapmenuafdeling.style.display = '';
            var klapmenuafdeling = document.getElementById("nieuws2");
            klapmenuafdeling.style.display = '';
            var klapmenuafdeling = document.getElementById("contact2");
            klapmenuafdeling.style.display = '';
            menuactiefafdelingen = false;
        }

        window.addEventListener('resize', function() {
            if (window.innerWidth >= 1075) {
                naargroot()
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
    ?>
    <header class="header <?php echo $custom_class; ?>">
        <div class = "tabellogo">
            <?php
                if(function_exists('the_custom_logo')){
                    $custom_logo_id = get_theme_mod('custom_logo');
                    $logo = wp_get_attachment_image_src($custom_logo_id);
                }
            ?>
            <a href= "/viostest"><img class="logo" src = "<?php echo $logo[0] ?>"></a>
            
        </div>
        <div class = "tabelmobiel">
            <!--mobiele-->
            <button onclick="mobielmenu()" class="toggle-nav <?php echo $custom_class; ?>">&#9776;</button>
        </div>
        <div class="tabelnav">
            <nav id="uitklapmenu1" class="uitklapmenu">
                <div class="afdelingdiv">
                    <a onclick = "afdelingenmobiel()" id= "buttonafdeling" class = "hoofditem <?php echo $custom_class; ?>">Vereniging <span class = "pijl">&#11167;</span></a>
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
                    <a onclick = "opleidingenmobiel()" id="buttonopleiding" class = "hoofditem <?php echo $custom_class; ?>">Opleidingen <span class = "pijl">&#11167;</span></a>
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
                    <a onclick = "nieuwsmobiel()" id="buttonnieuws" class = "hoofditem <?php echo $custom_class; ?>">Nieuws <span class = "pijl">&#11167;</span></a>
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
                    <a onclick = "contactmobiel()" id="buttoncontact" class = "hoofditem <?php echo $custom_class; ?>">Contact <span class = "pijl">&#11167;</span></a>
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