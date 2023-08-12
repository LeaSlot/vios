
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
                                <div class="logos">
                                    <?php dynamic_sidebar('sidebar-2'); ?>
                                </div>

                            </div>
                            <div class="column1">
                                <div class="logos">
                                    <?php dynamic_sidebar('sidebar-3'); ?>
                                </div>
                            </div>
                            <div class="column1">
                                <div class="logos">
                                    <?php dynamic_sidebar('sidebar-4'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="grid-container1">
                            <div class="column1">
                                <div class="logos">
                                    <?php dynamic_sidebar('sidebar-5'); ?>
                                </div>

                            </div>
                            <div class="column1">
                                <div class="logos">
                                    <?php dynamic_sidebar('sidebar-6'); ?>
                                </div>
                            </div>
                            <div class="column1">
                                <div class="logos">
                                    <?php dynamic_sidebar('sidebar-7'); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- tablet versie -->
                    <div class ="row2">
                        <div class="grid-container2">
                            <div class="column1">
                                <div class="logos">
                                    <?php dynamic_sidebar('sidebar-2'); ?>
                                </div>

                            </div>
                            <div class="column1">
                                <div class="logos">
                                    <?php dynamic_sidebar('sidebar-3'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class ="row2">
                        <div class="grid-container2">
                            <div class="column1">
                                <div class="logos">
                                    <?php dynamic_sidebar('sidebar-4'); ?>
                                </div>

                            </div>
                            <div class="column1">
                                <div class="logos">
                                    <?php dynamic_sidebar('sidebar-5'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class ="row2">
                        <div class="grid-container2">
                            <div class="column1">
                                <div class="logos">
                                    <?php dynamic_sidebar('sidebar-6'); ?>
                                </div>

                            </div>
                            <div class="column1">
                                <div class="logos">
                                    <?php dynamic_sidebar('sidebar-7'); ?>
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