
<body>
    <?php
        get_header();
    ?>
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
                        <div class="sidebar1">
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
</body>