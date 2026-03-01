<?php

/**
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme The Photograph for publication on WordPress.org
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

require_once get_template_directory() . '/inc/tgm/class-tgm-plugin-activation.php';

add_action('tgmpa_register', 'the_photograph_register_required_plugins', 0);
function the_photograph_register_required_plugins()
{
	$plugins = array(
		array(
			'name'      => 'Superb Addons',
			'slug'      => 'superb-blocks',
			'required'  => false,
		)
	);

	$config = array(
		'id'           => 'the-photograph',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => true,
		'message'      => '',
	);

	tgmpa($plugins, $config);
}


function the_photograph_pattern_styles()
{
	wp_enqueue_style('the-photograph-patterns', get_template_directory_uri() . '/assets/css/patterns.css', array(), filemtime(get_template_directory() . '/assets/css/patterns.css'));
	if (is_admin()) {
		global $pagenow;
		if ('site-editor.php' === $pagenow) {
			// Do not enqueue editor style in site editor
			return;
		}
		wp_enqueue_style('the-photograph-editor', get_template_directory_uri() . '/assets/css/editor.css', array(), filemtime(get_template_directory() . '/assets/css/editor.css'));
	}
}
add_action('enqueue_block_assets', 'the_photograph_pattern_styles');


add_theme_support('wp-block-styles');

// Removes the default wordpress patterns
add_action('init', function () {
	remove_theme_support('core-block-patterns');
});

// Register customer The Photograph pattern categories
function the_photograph_register_block_pattern_categories()
{
	register_block_pattern_category(
		'header',
		array(
			'label'       => __('Header', 'the-photograph'),
			'description' => __('Header patterns', 'the-photograph'),
		)
	);
	register_block_pattern_category(
		'call_to_action',
		array(
			'label'       => __('Call To Action', 'the-photograph'),
			'description' => __('Call to action patterns', 'the-photograph'),
		)
	);
	register_block_pattern_category(
		'content',
		array(
			'label'       => __('Content', 'the-photograph'),
			'description' => __('The Photograph content patterns', 'the-photograph'),
		)
	);
	register_block_pattern_category(
		'teams',
		array(
			'label'       => __('Teams', 'the-photograph'),
			'description' => __('Team patterns', 'the-photograph'),
		)
	);
	register_block_pattern_category(
		'banners',
		array(
			'label'       => __('Banners', 'the-photograph'),
			'description' => __('Banner patterns', 'the-photograph'),
		)
	);
	register_block_pattern_category(
		'contact',
		array(
			'label'       => __('Contact', 'the-photograph'),
			'description' => __('Contact patterns', 'the-photograph'),
		)
	);
	register_block_pattern_category(
		'layouts',
		array(
			'label'       => __('Layouts', 'the-photograph'),
			'description' => __('layout patterns', 'the-photograph'),
		)
	);
	register_block_pattern_category(
		'testimonials',
		array(
			'label'       => __('Testimonial', 'the-photograph'),
			'description' => __('Testimonial and review patterns', 'the-photograph'),
		)
	);

}

add_action('init', 'the_photograph_register_block_pattern_categories');









// Initialize information content
require_once trailingslashit(get_template_directory()) . 'inc/vendor/autoload.php';

use SuperbThemesThemeInformationContent\ThemeEntryPoint;
add_action("init", function () {
ThemeEntryPoint::init([
    'type' => 'block', // block / classic
    'theme_url' => 'https://superbthemes.com/the-photograph/',
    'demo_url' => 'https://superbthemes.com/demo/the-photograph/',
    'features' => array(
    	array(
    		'title' => __("Theme Designer", "the-photograph"),
    		'icon' => "lego-duotone.webp",
    		'description' => __("Choose from over 300 designs for footers, headers, landing pages & all other theme parts.", "the-photograph")
    	),
    	   	array(
    		'title' => __("Editor Enhancements", "the-photograph"),
    		'icon' => "1-1.png",
    		'description' => __("Enhanced editor experience, grid systems, improved block control and much more.", "the-photograph")
    	),
    	array(
    		'title' => __("Custom CSS", "the-photograph"),
    		'icon' => "2-1.png",
    		'description' => __("Add custom CSS with syntax highlight, custom display settings, and minified output.", "the-photograph")
    	),
    	array(
    		'title' => __("Animations", "the-photograph"),
    		'icon' => "wave-triangle-duotone.webp",
    		'description' => __("Animate any element on your website with one click. Choose from over 50+ animations.", "the-photograph")
    	),
    	array(
    		'title' => __("WooCommerce Integration", "the-photograph"),
    		'icon' => "shopping-cart-duotone.webp",
    		'description' => __("Choose from over 100 unique WooCommerce designs for your e-commerce store.", "the-photograph")
    	),
    	array(
    		'title' => __("Responsive Controls", "the-photograph"),
    		'icon' => "arrows-out-line-horizontal-duotone.webp",
    		'description' => __("Make any theme mobile-friendly with SuperbThemes responsive controls.", "the-photograph")
    	)
    )
]);
});