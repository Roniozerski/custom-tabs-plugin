<?php
/**
 * Register ACF repeater fields for Custom Tabs with advanced content
 */

// Top-level variables
$tabs_group_key    = 'group_custom_tabs';
$tabs_group_title  = 'Custom Tabs';
$tabs_field_key    = 'field_tabs_repeater';
$tabs_field_name   = 'tabs';
$tabs_field_label  = 'Tabs';

// Tab fields
$tab_title_key     = 'field_tab_title';
$tab_title_name    = 'tab_title';
$tab_title_label   = 'Tab Title';

// Quote box
$quote_box_key     = 'field_quote_box';
$quote_box_name    = 'quote_box';
$quote_box_label   = 'Quote Box';


$quote_background_key    = 'field_quote_background';
$quote_background_name   = 'background';
$quote_background_label  = 'Background';

$quote_text_key    = 'field_quote_text';
$quote_text_name   = 'quote';
$quote_text_label  = 'Quote';

$quote_avatar_key  = 'field_quote_avatar';
$quote_avatar_name = 'avatar';
$quote_avatar_label= 'Avatar';

$quote_name_key    = 'field_quote_name';
$quote_name_name   = 'name';
$quote_name_label  = 'Name';

$quote_job_key     = 'field_quote_job';
$quote_job_name    = 'job';
$quote_job_label   = 'Job';

$quote_logo_key    = 'field_quote_logo';
$quote_logo_name   = 'logo';
$quote_logo_label  = 'Logo';

// Percentage box
$percentage_box_key    = 'field_percentage_box';
$percentage_box_name   = 'percentage_box';
$percentage_box_label  = 'Percentage Box';

$percentage_number_key = 'field_percentage_number';
$percentage_number_name= 'percentage_number';
$percentage_number_label='Percentage Number';

$percentage_content_key='field_percentage_content';
$percentage_content_name='percentage_content';
$percentage_content_label='Content';

// Link box
$link_box_key      = 'field_link_box';
$link_box_name     = 'link_box';
$link_box_label    = 'Link Box';

$link_key      = 'field_link';
$link_name     = 'link';
$link_label    = 'Link';

// Trusted by box
$trusted_by_key    = 'field_trusted_by';
$trusted_by_name   = 'trusted_by';
$trusted_by_label  = 'Trusted By Logos';

$trusted_logo_key  = 'field_trusted_logo';
$trusted_logo_name = 'logo';
$trusted_logo_label= 'Logo Image';

add_action('acf/init', function () use (
    $tabs_group_key, $tabs_group_title, $tabs_field_key, $tabs_field_name, $tabs_field_label,
    $tab_title_key, $tab_title_name, $tab_title_label,
    $tab_content_key, $tab_content_name, $tab_content_label,
    $quote_box_key, $quote_box_name, $quote_box_label,
    $quote_text_key, $quote_text_name, $quote_text_label,
    $quote_background_key, $quote_background_name, $quote_background_label,
    $quote_avatar_key, $quote_avatar_name, $quote_avatar_label,
    $quote_name_key, $quote_name_name, $quote_name_label,
    $quote_job_key, $quote_job_name, $quote_job_label,
    $quote_logo_key, $quote_logo_name, $quote_logo_label,
    $percentage_box_key, $percentage_box_name, $percentage_box_label,
    $percentage_number_key, $percentage_number_name, $percentage_number_label,
    $percentage_content_key, $percentage_content_name, $percentage_content_label,
    $link_box_key, $link_box_name, $link_box_label,
    $link_key, $link_name, $link_label,
    $trusted_by_key, $trusted_by_name, $trusted_by_label,
    $trusted_logo_key, $trusted_logo_name, $trusted_logo_label
) {

    if (!function_exists('acf_add_local_field_group')) return;

    acf_add_local_field_group([
        'key' => $tabs_group_key,
        'title' => $tabs_group_title,
        'fields' => [
            [
                'key' => $tabs_field_key,
                'label' => $tabs_field_label,
                'name' => $tabs_field_name,
                'type' => 'repeater',
                'button_label' => 'Add Tab',
                'sub_fields' => [
                    // Tab Title
                    [
                        'key' => $tab_title_key,
                        'label' => $tab_title_label,
                        'name' => $tab_title_name,
                        'type' => 'text',
                    ],
             
                    // Quote Box (Repeater for flexibility)
                    [
                        'key' => $quote_box_key,
                        'label' => $quote_box_label,
                        'name' => $quote_box_name,
                        'type' => 'group',
                        'sub_fields' => [
                                 [
                                'key' => $quote_background_key,
                                'label' => $quote_background_label,
                                'name' => $quote_background_name,
                                'type' => 'image',
                                'return_format' => 'url',
                            ],
                            [
                                'key' => $quote_text_key,
                                'label' => $quote_text_label,
                                'name' => $quote_text_name,
                                'type' => 'textarea',
                            ],
                            [
                                'key' => $quote_avatar_key,
                                'label' => $quote_avatar_label,
                                'name' => $quote_avatar_name,
                                'type' => 'image',
                                'return_format' => 'url',
                            ],
                            [
                                'key' => $quote_name_key,
                                'label' => $quote_name_label,
                                'name' => $quote_name_name,
                                'type' => 'text',
                            ],
                            [
                                'key' => $quote_job_key,
                                'label' => $quote_job_label,
                                'name' => $quote_job_name,
                                'type' => 'text',
                            ],
                            [
                                'key' => $quote_logo_key,
                                'label' => $quote_logo_label,
                                'name' => $quote_logo_name,
                                'type' => 'image',
                                'return_format' => 'url',
                            ],
                        ],
                    ],
                    // Percentage Box
                    [
                        'key' => $percentage_box_key,
                        'label' => $percentage_box_label,
                        'name' => $percentage_box_name,
                        'type' => 'group',
                        'sub_fields' => [
                            [
                                'key' => $percentage_number_key,
                                'label' => $percentage_number_label,
                                'name' => $percentage_number_name,
                                'type' => 'number',
                            ],
                            [
                                'key' => $percentage_content_key,
                                'label' => $percentage_content_label,
                                'name' => $percentage_content_name,
                                'type' => 'textarea',
                            ],
                        ],
                    ],
                    // Link Box
                    [
                        'key' => $link_box_key,
                        'label' => $link_box_label,
                        'name' => $link_box_name,
                        'type' => 'group',
                        'sub_fields' => [
                            [
                                'key' => $link_key,
                                'label' => $link_label,
                                'name' => $link_name,
                                'type' => 'link',
                            ],
                        ],
                    ],
                    // Trusted By Logos (Repeater)
                    [
                        'key' => $trusted_by_key,
                        'label' => $trusted_by_label,
                        'name' => $trusted_by_name,
                        'type' => 'repeater',
                        'button_label' => 'Add Logo',
                        'sub_fields' => [
                            [
                                'key' => $trusted_logo_key,
                                'label' => $trusted_logo_label,
                                'name' => $trusted_logo_name,
                                'type' => 'image',
                                'return_format' => 'url',
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'custom-tabs-settings',
                ],
            ],
        ],
    ]);
});
