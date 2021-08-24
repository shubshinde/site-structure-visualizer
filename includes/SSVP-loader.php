<?php 


function SSVP_load_styles_scripts() {

    // froosty scripts
    wp_register_style( 'froosty-bootstrap-css', SSVP_PLUGIN_URL . 'assets/css/froosty-bootstrap.min.css', '', rand() );
    wp_register_script( 'froosty-bootstrap-js', SSVP_PLUGIN_URL . 'assets/js/froosty-bootstrap.min.js', array(), rand(), true );
    // plugin scripts
    wp_register_style( 'SSVP-main-css', SSVP_PLUGIN_URL . 'assets/css/SSVP-main.css', '', rand() );
    wp_register_script( 'SSVP-main-js', SSVP_PLUGIN_URL . 'assets/js/SSVP-main.js', array(), rand(), true );
    wp_register_script( 'SSVP-generate-data-js', SSVP_PLUGIN_URL . 'assets/js/SSVP-generate-data.js', array(), rand(), true );
    wp_register_script( 'SSVP-d3-js', SSVP_PLUGIN_URL . 'assets/js/SSVP-d3.js', array(), '5.16.0', true );
    wp_register_script( 'SSVP-d3-selection-multi-js', SSVP_PLUGIN_URL . 'assets/js/SSVP-d3-selection-multi.js', array(), '1.0.1', true );

}
add_action( 'admin_enqueue_scripts', 'SSVP_load_styles_scripts' );




// load files

// include SSVP_PLUGIN_PATH . '/includes/SSVP-api-routes.php';
include SSVP_PLUGIN_PATH . '/includes/SSVP-options.php';