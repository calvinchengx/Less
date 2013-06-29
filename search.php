
<?php get_header() ?>

<div class="container">
	<div id="primary">
		<div id="content" role="main">

		    <?php if (have_posts()) : ?>
		    	<h1 class="title">
			Displaying <?php echo $wp_query->post_count; ?> results
			</h1> 
			<?php 
			// This will load/include the file post-search.php 
			//and result will be displayed as formatted in this file
			get_template_part( 'post' , 'search'); 
			?>
		    <?php else : ?>
			<h1 class="title">No results</h1>
			<p>Sorry, we can't seem to find what you are looking for!</p>
		    <?php endif; ?>

		</div>
	</div> 
</div><!-- END .container --> 

<?php get_footer(); ?>

