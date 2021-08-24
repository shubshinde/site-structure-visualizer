<?php

add_action('admin_menu', 'SSVP_menu_page');

function SSVP_menu_page()
{
    add_menu_page(
        'Site Structure Visualizer', // page title
        'Site Structure Visualizer', // menu link text
        'manage_options', // capability to access the page
        'ssvp-dashboard', // page URL slug
        'SSVP_option_page_content', // callback function /w content
        'dashicons-networking', // menu icon
        99 // priority
    );
}

function SSVP_option_page_content()
{
	include SSVP_PLUGIN_PATH . '/template-parts/SSVP-options-content.php';
}
