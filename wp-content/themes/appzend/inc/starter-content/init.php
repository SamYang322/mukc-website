<?php
    
function appzend_starter_content_setup(){

    add_theme_support( 'starter-content', array(
        

        'posts' => array(
            'home'    => require __DIR__ . '/home.php',
            'contact' => require __DIR__ . '/contact.php',
            'services' => require __DIR__ . '/service.php',
            'about' => require __DIR__ . '/about.php',
            'blog' => require __DIR__ . '/blog.php',
            'team' => require __DIR__ . '/team.php',
        ),
        
        'options' => array(
            'show_on_front' => 'page',
            'page_on_front' => '{{home}}',
            'page_for_posts' => '{{blog}}',
            // Our Custom
            'blogdescription' => 'Just another WordPress site ',
            
        ),
        'theme_mods' => array(
            'appzend_breadcrumbs_image' => 'https://demo.sparklewpthemes.com/appzend/v1/wp-content/uploads/sites/2/2021/03/pexels-the-coach-space-2977581.jpg'
        ),

        'nav_menus' => array(
            'menu-1' => array(
				'name' => __( 'Top Menu', 'appzend' ),
				'items' => array(
					'page_home',
					'page_about',
					'page_blog',
					'page_contact',
          
                    
					'page_service' => array(
						'type' => 'post_type',
						'object' => 'page',
						'object_id' => '{{services}}',
					),

                    'page_team' => array(
						'type' => 'post_type',
						'object' => 'page',
						'object_id' => '{{team}}',
					),
				),
			),
		),
    ));
}
add_action( 'after_setup_theme', 'appzend_starter_content_setup', 20 );