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
            if (window.innerWidth <= 950) {
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
            if (window.innerWidth <= 950) {
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
            if (window.innerWidth <= 950) {
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
            if (window.innerWidth <= 950) {
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
            if (window.innerWidth <= 950) {
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
    <header class="header">
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
            <button onclick="mobielmenu()" class="toggle-nav">&#9776;</button>
        </div>
        <div class="tabelnav">
            <nav id="uitklapmenu1" class="uitklapmenu">
                <div class="afdelingdiv">
                    <a onclick = "afdelingenmobiel()" id= "buttonafdeling" class = "hoofditem">Afdelingen <span class = "pijl">&#11167;</span></a>
                    <?php
                        wp_nav_menu(
                            array(
                                'menu' =>'afdelingen',
                                'container_class' => 'afdeling1',
                                'container_id' => 'afdeling2',
                                'theme_location' => 'afdelingen',
                            )
                        );
                    ?>
                </div>
                <div class="opleidingdiv">
                    <a onclick = "opleidingenmobiel()" id="buttonopleiding" class = "hoofditem">Opleidingen <span class = "pijl">&#11167;</span></a>
                    <?php
                        wp_nav_menu(
                            array(
                                'menu' =>'opleidingen',
                                'container_class' => 'opleiding1',
                                'container_id' => 'opleiding2',
                                'theme_location' => 'opleidingen',
                            )
                        );
                    ?>
                </div>
                <div class="galerijdiv">
                    <a onclick = "galerijmobiel()" id="buttongalerij" class = "hoofditem">Galerij <span class = "pijl">&#11167;</span></a>
                    <?php
                        wp_nav_menu(
                            array(
                                'menu' =>'galerij',
                                'container_class' => 'galerij1',
                                'container_id' => 'galerij2',
                                'theme_location' => 'galerij',
                            )
                        );
                    ?>
                </div>
                <div class="supportdiv">
                    <a href="/viostest/support-vios" class="hoofditem">Support VIOS</a>
                </div>
                <div class="agendadiv">
                    <a href="/viostest/agenda" class="hoofditem">Agenda</a>
                </div>
                <div class ="nieuwsdiv">
                    <a onclick = "nieuwsmobiel()" id="buttonnieuws" class = "hoofditem">Nieuws <span class = "pijl">&#11167;</span></a>
                    <?php
                        wp_nav_menu(
                            array(
                                'menu' =>'nieuws',
                                'container_class' => 'nieuws1',
                                'container_id' => 'nieuws2',
                                'theme_location' => 'nieuws',
                            )
                        );
                    ?>
                </div>
                <div class = "contactdiv">
                    <a onclick = "contactmobiel()" id="buttoncontact" class = "hoofditem">Contact <span class = "pijl">&#11167;</span></a>
                    <?php
                        wp_nav_menu(
                            array(
                                'menu' =>'contact',
                                'container_class' => 'contact1',
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