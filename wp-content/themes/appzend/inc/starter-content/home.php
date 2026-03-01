<?php
/**
 * Home starter content.
 */
$default_home_content = '
	<!-- wp:pattern {"slug":"appzend/hero"} /-->
	<!-- wp:pattern {"slug":"appzend/features"} /-->  
	<!-- wp:pattern {"slug":"appzend/about"} /-->
	<!-- wp:pattern {"slug":"appzend/call-to-action"} /-->
	<!-- wp:pattern {"slug":"appzend/service"} /-->
	<!-- wp:pattern {"slug":"appzend/team"} /-->
';

return array(
	'post_type'    => 'page',
	'post_title'   => _x( 'Home', 'Theme starter content', 'appzend' ),
	'template' => 'full-width.php',
	'post_content' => $default_home_content,
);