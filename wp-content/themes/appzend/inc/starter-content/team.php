<?php
/**
 * Contact starter content.
 */
return array(
	'post_type'    => 'page',
	'post_title'   => _x( 'Team', 'Theme starter content', 'appzend' ),
	'construction_light_page_layouts' => 'no',
	'template' => 'full-width.php',
	'post_content' => '
	<!-- wp:spacer {"height":61} -->
	<div style="height:61px" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer -->

	<!-- wp:pattern {"slug":"appzend/team"} /-->
	
	<!-- wp:pattern {"slug":"appzend/service"} /-->

	<!-- wp:spacer {"height":61} -->
	<div style="height:61px" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer -->

	',
);