<head>
    <?php
        get_header();
    ?>
    <script>
        window.addEventListener('resize', function() {
            const innerDiv = document.getElementsByClassName("sidebar1");
            const outerDiv = document.getElementsByClassName('columnsb');
            const midDiv = document.getElementsByClassName('schaling');
            if (window.innerWidth >= 650) {
                outerDiv[0].style.height = '';
                innerDiv[0].style.width = '';
            }
            else if (window.innerWidth <= 650) {

                // Pas de stijl van de buitenste div aan op basis van de hoogte van de binnenste div
                outerDiv[0].style.height = innerDiv[0].clientHeight + 'px';
                innerDiv[0].style.width = midDiv[0].clientWidth + 'px';
                console.log('in if else');
            }
        });
    </script>
    
</head>


<body>
   
    <div class ="site-wrapper">
        <div class ="site-content">
            <div class="grid-container">
                <div class = "column">
                    <div class ="row">
                        <div class="grid-container1">
                            <div class="column1">
                                <div class="logos logossmb">
                                    <?php dynamic_sidebar('smb'); ?>
                                </div>

                            </div>
                            <div class="column1">
                                <div class="logos logosdorst">
                                    <?php dynamic_sidebar('dorst'); ?>
                                </div>
                            </div>
                            <div class="column1">
                                <div class="logos logostwirlpower">
                                    <?php dynamic_sidebar('twirlpower'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="grid-container1">
                            <div class="column1">
                                <div class="logos logosabc">
                                    <?php dynamic_sidebar('abc'); ?>
                                </div>

                            </div>
                            <div class="column1">
                                <div class="logos logosmpb">
                                    <?php dynamic_sidebar('mpb'); ?>
                                </div>
                            </div>
                            <div class="column1">
                                <div class="logos logoswwb">
                                    <?php dynamic_sidebar('wwb'); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- tablet versie -->
                    <div class ="row2">
                        <div class="grid-container2">
                            <div class="column1">
                                <div class="logos logossmb">
                                    <?php dynamic_sidebar('smb'); ?>
                                </div>

                            </div>
                            <div class="column1">
                                <div class="logos logosdorst">
                                    <?php dynamic_sidebar('dorst'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class ="row2">
                        <div class="grid-container2">
                            <div class="column1">
                                <div class="logos logostwirlpower">
                                    <?php dynamic_sidebar('twirlpower'); ?>
                                </div>

                            </div>
                            <div class="column1">
                                <div class="logos logosabc">
                                    <?php dynamic_sidebar('abc'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class ="row2">
                        <div class="grid-container2">
                            <div class="column1">
                                <div class="logos logosmpb">
                                    <?php dynamic_sidebar('mpb'); ?>
                                </div>

                            </div>
                            <div class="column1">
                                <div class="logos logoswwb">
                                    <?php dynamic_sidebar('wwb'); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="columnsb">
                    <div class = "schaling">
                        <div class="sidebar1 sidebarcolor">
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

    <script>
        if (window.innerWidth <= 650) {
            const innerDiv = document.getElementsByClassName("sidebar1");
            const outerDiv = document.getElementsByClassName('columnsb');
            const midDiv = document.getElementsByClassName('schaling');
            // Pas de stijl van de buitenste div aan op basis van de hoogte van de binnenste div
            outerDiv[0].style.height = innerDiv[0].clientHeight + 'px';
            innerDiv[0].style.width = midDiv[0].clientWidth + 'px';
        };
    </script>
</body>