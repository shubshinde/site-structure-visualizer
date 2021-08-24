<script>
    const SSVP_SITE_URL = '<?php echo SSVP_SITE_URL; ?>';
</script>


<?php

include SSVP_PLUGIN_PATH . '/includes/SSVP-data-engine.php';

wp_enqueue_style('froosty-bootstrap-css');
wp_enqueue_script('froosty-bootstrap-js');
wp_enqueue_style('SSVP-main-css');
wp_enqueue_script('SSVP-main-js');
wp_enqueue_script('SSVP-d3-js');
wp_enqueue_script('SSVP-generate-data-js');

?>


<div class="froosty">

    <div class="mt-5 froosty-masthead bg-white shadow col-lg-3 col-md-4">

        <div class="row">
            <img class="col-lg-4" style="margin-left: 10px; margin-right: 10px; margin-top: 10px; width: 80px; height: 55px; margin-right: 10px !important;" src="<?php echo esc_url(SSVP_LOGO_URL); ?>" alt="">

            <h4 class="text-muted col-lg-8 mt-3">
                Site Structure Visualizer
                <p>
                    <big>
                        by <a target="_blank" style="text-decoration: none;" href="https://profiles.wordpress.org/shubshinde/#content-plugins"> <span class="text-primary">Shubham Shinde</span> </a>
                    </big>
                </p>
            </h4>
        </div>

    </div>

    <div class="main-box shadow bg-white p-3 mt-2">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">

                <button class="nav-link active" id="nav-list-tab" data-bs-toggle="tab" data-bs-target="#nav-list" type="button" role="tab" aria-controls="nav-list" aria-selected="false">
                    <span class="dashicons dashicons-editor-ol"></span>
                    List
                </button>

                <button class="nav-link" id="nav-tree-tab" data-bs-toggle="tab" data-bs-target="#nav-tree" type="button" role="tab" aria-controls="nav-tree" aria-selected="true">
                    <span class="dashicons dashicons-networking"></span>
                    Tree
                </button>

                <button class="nav-link" id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about" type="button" role="tab" aria-controls="nav-about" aria-selected="true">
                    <span class="dashicons dashicons-admin-users"></span>
                    About Me
                </button>


            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">

            <div class="tab-pane fade show active" id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab">
                <?php include SSVP_PLUGIN_PATH . '/template-parts/view-tabs/tab-list-view.php'; ?>
            </div>

            <div class="tab-pane fade" id="nav-tree" role="tabpanel" aria-labelledby="nav-tree-tab">
                <?php include SSVP_PLUGIN_PATH . '/template-parts/view-tabs/tab-tree-view.php'; ?>
            </div>

            <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                <?php include SSVP_PLUGIN_PATH . '/template-parts/view-tabs/tab-about-us.php'; ?>
            </div>

        </div>
    </div>
</div>



<style>
    .notice-warning {
        display: none;
    }

    .tab-pane {
        min-height: 300px;
    }

    .main-box {
        max-width: 95%;
    }

    .nav-link {
        color: #2271b1 !important;
        font-size: 14px !important;
    }

    .tab-content {
        padding: 20px;
    }

    .list-section {
        margin-left: 50px;
    }
</style>