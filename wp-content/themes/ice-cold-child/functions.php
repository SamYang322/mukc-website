<?php
/**
 * Ice Cold Child Theme - Functions
 */

/* ------------------------------------------------------------------
   0. Force our custom front-page.php to load no matter what WordPress
      reading settings say. Priority 1 beats the Ice Cold theme filter.
   ------------------------------------------------------------------ */
add_filter('template_include', 'mukc_force_front_page_template', 1);
function mukc_force_front_page_template($template)
{
    if (is_front_page()) {
        $custom = get_stylesheet_directory() . '/front-page.php';
        if (file_exists($custom)) {
            return $custom;
        }
    }
    return $template;
}

/* ------------------------------------------------------------------
   1. Register nav menu location (child theme level)
   ------------------------------------------------------------------ */
add_action('after_setup_theme', 'mukc_child_setup');
function mukc_child_setup()
{
    register_nav_menus([
        'top' => __('Primary Navigation', 'ice-cold-child'),
    ]);
}

/* ------------------------------------------------------------------
   2. Strip ALL parent-theme styles + scripts on the front page.
      Runs at priority 9999 so it fires after the parent registers them.
   ------------------------------------------------------------------ */
add_action('wp_enqueue_scripts', 'mukc_front_page_nuke_assets', 9999);
function mukc_front_page_nuke_assets()
{
    // Runs on any MUKC custom page that manages its own styles
    $is_custom_page = is_front_page() || is_page('about-mukc') || is_page('our-people');
    if (!$is_custom_page) {
        return;
    }

    $styles = [
        'wpicecold-bootstrap',
        'wpicecold-fontawesome-style',
        'wpicecold-animate-css',
        'wpicecold-style',
        'wpicecold-site-style',
        'ice-cold-parent-style',
        'ice-cold-child-style',
    ];
    foreach ($styles as $h) {
        wp_dequeue_style($h);
        wp_deregister_style($h);
    }

    $scripts = [
        'wpicecold-bootstrap-js',
        'wpicecold-tothetop-js',
        'wpicecold-nav-js',
        'wpicecold-page-loader-js',
        'wpicecold-smoothscroll-js',
        'wpicecold-front-page-media-js',
    ];
    foreach ($scripts as $h) {
        wp_dequeue_script($h);
        wp_deregister_script($h);
    }
}

/* ------------------------------------------------------------------
   3. Non-front pages: load parent then child stylesheet
   ------------------------------------------------------------------ */
add_action('wp_enqueue_scripts', 'mukc_child_enqueue_styles');
function mukc_child_enqueue_styles()
{
    $is_custom_page = is_front_page() || is_page('about-mukc') || is_page('our-people') || is_page('journey') || is_page('gear') || is_page('contact');
    if ($is_custom_page) {
        return;
    }
    wp_enqueue_style('ice-cold-parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('ice-cold-child-style', get_stylesheet_uri(), ['ice-cold-parent-style']);
}
