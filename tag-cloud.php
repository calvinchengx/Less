<?php
/**
Template Name: Tag Cloud
*/

get_header() ?>

<div class="container">
	
	<div id="primary">
		<div id="content" role="main">
			<?php wp_tag_cloud(); ?>
		</div>
	</div>

</div>

<?php get_footer() ?>
