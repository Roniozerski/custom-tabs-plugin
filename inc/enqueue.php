<?php
/**
 * Enqueue styles & scripts.
 */

add_action('wp_enqueue_scripts', function () {

   // Load Adobe Fonts (Proxima Nova kit)
    wp_enqueue_style(
        'ctp-adobe-fonts',
        'https://use.typekit.net/wuz0gtr.css',
        [],
        null
    );


wp_enqueue_style(
    'ctp-style',
    CTP_URL . 'assets/css/style.css',
    [],
    filemtime($css_path)
);


    wp_enqueue_script(
        'ctp-tabs',
        CTP_URL . 'assets/js/tabs.js',
        [],
        CTP_VERSION,
        true
    );
});
