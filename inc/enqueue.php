<?php
/**
 * Enqueue styles & scripts.
 */

add_action('wp_enqueue_scripts', function () {

    wp_enqueue_style(
        'ctp-style',
        CTP_URL . 'assets/css/style.css',
        [],
        CTP_VERSION
    );

    wp_enqueue_script(
        'ctp-tabs',
        CTP_URL . 'assets/js/tabs.js',
        [],
        CTP_VERSION,
        true
    );
});
