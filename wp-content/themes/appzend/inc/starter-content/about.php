<?php
/**
 * Contact starter content.
 */
return array(
	'post_type'    => 'page',
	'post_title'   => _x( 'About', 'Theme starter content', 'appzend' ),
	'template' => 'full-width.php',
	'post_content' => '
		<!-- wp:pattern {"slug":"appzend/about"} /-->
		<!-- wp:pattern {"slug":"appzend/service"} /-->
	',
);