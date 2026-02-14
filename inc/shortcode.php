<?php

/**
 * Shortcode: [custom_tabs]
 * Renders tabs from ACF Options Page (tabs repeater) using clean HTML structure.
 */

 // ----------------------------
 // ACF field names (vars on top)
 // ----------------------------

/**
 * Shortcode callback
 */


function ctp_render_tabs_shortcode($atts = [])
{
    $plugin_url = plugin_dir_url(dirname(__FILE__));
    // Fetch tabs from ACF Options Page
    $tabs = get_field('tabs', 'option');

    if (empty($tabs) || !is_array($tabs)) {
        return '';
    }

    // Unique ID to support multiple shortcodes on same page
    $instance_id = 'ctp-tabs-' . wp_rand(1000, 999999);

    ob_start();
?>
    <section class="ctp-tabs" id="<?php echo esc_attr($instance_id); ?>">
        <div class="ctp-tabs__inner">

            <!-- Tabs Navigation -->
            <div class="ctp-tabs__nav" role="tablist" aria-label="Tabs Navigation">
                <?php foreach ($tabs as $i => $tab):
                    $title = $tab['tab_title'] ?? '';
                    if (!$title) continue;

                    $is_active = ($i === 0);
                    $tab_id = $instance_id . '-tab-' . $i;
                    $panel_id = $instance_id . '-panel-' . $i;
                ?>
                    <button
                        type="button"
                        class="ctp-tabs__nav-btn <?php echo $is_active ? 'is-active' : ''; ?>"
                        role="tab"
                        aria-selected="<?php echo $is_active ? 'true' : 'false'; ?>"
                        aria-controls="<?php echo esc_attr($panel_id); ?>"
                        id="<?php echo esc_attr($tab_id); ?>"
                        data-ctp-tab="<?php echo esc_attr($i); ?>">
                        <?php echo esc_html($title); ?>
                    </button>
                <?php endforeach; ?>
            </div>

            <!-- Tabs Panels -->
            <div class="ctp-tabs__panels">
                <?php foreach ($tabs as $i => $tab):

                    $title = $tab['tab_title'] ?? '';
                    if (!$title) continue;

                    $is_active = ($i === 0);
                    $panel_id = $instance_id . '-panel-' . $i;
                    $tab_id = $instance_id . '-tab-' . $i;

                    // Quote box
                    $quote_box   = $tab['quote_box'] ?? [];
                    $quote_background       = $quote_box['background'] ?? '';
                    $quote_background_mobile = $quote_box['background_mobile'] ?? '';
                    $quote       = $quote_box['quote'] ?? '';
                    $avatar      = $quote_box['avatar'] ?? '';
                    $name        = $quote_box['name'] ?? '';
                    $job         = $quote_box['job'] ?? '';
                    $quote_logo  = $quote_box['logo'] ?? '';

                    // Percentage box
                    $percentage_box     = $tab['percentage_box'] ?? [];
                    $percentage_number  = $percentage_box['percentage_number'] ?? '';
                    $percentage_content = $percentage_box['percentage_content'] ?? '';

                    // Link box (ACF link returns array: url/title/target)
                    $link_box = $tab['link_box'] ?? [];
                    $link     = $link_box['link'] ?? null;

                    // Trusted by logos
                    $trusted_by = $tab['trusted_by'] ?? [];
                ?>
                    <div
                        class="ctp-tabs__panel <?php echo $is_active ? 'is-active' : ''; ?>"
                        role="tabpanel"
                        aria-labelledby="<?php echo esc_attr($tab_id); ?>"
                        id="<?php echo esc_attr($panel_id); ?>"
                        data-ctp-panel="<?php echo esc_attr($i); ?>">
                        <div class="ctp-tabs__panel-inner">

                            <!-- Quote Box -->
                            <?php if ($quote || $avatar || $name || $job || $quote_logo): ?>
                                <div class="ctp-quote">
                                    <?php if ($quote_background_mobile || $quote_background): ?>
                                        <div class="ctp-quote__bg">
                                            <picture>
                                                <?php if ($quote_background): ?>
                                                    <source
                                                        srcset="<?php echo esc_url($quote_background); ?>"
                                                        media="(min-width: 481px)">
                                                <?php endif; ?>
                                                <img
                                                    src="<?php echo esc_url($quote_background_mobile ?: $quote_background); ?>"
                                                    alt="quote background">

                                            </picture>
                                        </div>

                                    <?php endif; ?>


                                    <div class="ctp-quote__content">
                                        <?php if ($quote): ?>
                                            <img src="<?php echo esc_url($plugin_url . 'assets/images/quote.png') ?>" alt="quote" />
                                            <p class="ctp-quote__text"><?php echo $quote; ?></p>
                                        <?php endif; ?>
                                    </div>

                                    <div class="ctp-quote__meta">
                                        <?php if ($avatar): ?>
                                            <div class="ctp-quote__avatar">
                                                <img src="<?php echo esc_url($avatar); ?>" alt="<?php echo esc_attr($name ?: ''); ?>" loading="lazy" />
                                            </div>
                                        <?php endif; ?>

                                        <div class="ctp-quote__person">
                                            <?php if ($name): ?>
                                                <p class="ctp-quote__name"><?php echo esc_html($name); ?></p>
                                            <?php endif; ?>
                                            <?php if ($job): ?>
                                                <p class="ctp-quote__job"><?php echo esc_html($job); ?></p>
                                            <?php endif; ?>
                                        </div>

                                        <?php if ($quote_logo): ?>
                                            <div class="ctp-quote__logo">
                                                <img src="<?php echo esc_url($quote_logo); ?>" alt="Company logo" loading="lazy" />
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="ctp-two_boxes">
                                <!-- Percentage Box -->
                                <?php if ($percentage_number !== '' || $percentage_content): ?>
                                    <div class="ctp-percentage">
                                        <?php if ($percentage_number !== ''): ?>
                                            <p class="ctp-percentage__number">
                                                <?php echo esc_html($percentage_number); ?>%
                                            </p>
                                        <?php endif; ?>

                                        <?php if ($percentage_content): ?>
                                            <p class="ctp-percentage__content">
                                                <?php echo esc_html($percentage_content); ?>
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>

                                <!-- Link Box -->
                                <?php if (is_array($link) && !empty($link['url'])): ?>
                                    <?php
                                    $link_url    = $link['url'];
                                    $link_title  = $link['title'] ?: '';
                                    $link_target = !empty($link['target']) ? $link['target'] : '_self';
                                    ?>
                                    <a class="ctp-linkbox" href="<?php echo esc_url($link_url); ?>"
                                        target="<?php echo esc_attr($link_target); ?>"
                                        rel="<?php echo $link_target === '_blank' ? 'noopener noreferrer' : 'nofollow'; ?>">

                                        <div class="ctp-linkbox__link">

                                            <?php echo esc_html($link_title); ?>
                                        </div>
                                        <?php if ($link_title): ?>
                                            <img src="<?php echo esc_url($plugin_url . 'assets/images/right_arrow.svg') ?>" alt="arrow" />

                                        <?php endif; ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                            <!-- Trusted By Logos -->
                            <?php if (!empty($trusted_by) && is_array($trusted_by)): ?>
                                <div class="ctp-trusted">
                                    <div class="ctp-trusted__title">

                                        <h4>TRUSTED BY</h4>
                                    </div>
                                    <div class="ctp-trusted__logos">

                                        <?php foreach ($trusted_by as $row):
                                            $logo_url = $row['logo'] ?? '';
                                            if (!$logo_url) continue;
                                        ?>
                                            <div class="ctp-trusted__logo">
                                                <img src="<?php echo esc_url($logo_url); ?>" alt="Trusted by logo" loading="lazy" />
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </section>
<?php

    return ob_get_clean();
}

add_shortcode('custom_tabs', 'ctp_render_tabs_shortcode');
