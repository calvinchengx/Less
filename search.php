<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php bloginfo('name'); ?> | <?php if( is_home() ) : echo bloginfo( 'description' ); endif; ?><?php wp_title( '', true ); ?></title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php get_header() ?>

<div class="container">
	<div id="primary">
		<div id="content" role="main">

		    <?php if (have_posts()) : ?>
			<?php 
			// This will load/include the file post-search.php 
			//and result will be displayed as formatted in this file
			get_template_part( 'post' , 'search'); 
			?>
		    <?php else : ?>
			<p>Sorry, it does not exist !</p>
		    <?php endif; ?>

		</div>
	</div> 
</div><!-- END .container --> 

</body>
</html>
