<?php

add_action('acf/init', function () {

    if (!function_exists('acf_add_options_page')) {
        return;
    }

    acf_add_options_page([
        'page_title' => 'Custom Tabs Settings',
        'menu_title' => 'Custom Tabs',
        'menu_slug'  => 'custom-tabs-settings',
        'capability' => 'manage_options',
        'redirect'   => false,
    ]);
});
