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

<header id="masthead" class="site-header" role="banner">
	<div class="container">
		
		<div class="gravatar">
			<?php 
				// grab admin email and their photo
				$admin_email = get_option('admin_email');
				echo get_avatar( $admin_email, 100 ); 
			?>
		</div><!--/ author -->
		
		<div id="brand">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a> &mdash; <span><?php echo get_bloginfo( 'description' ); ?></span></h1>
		</div><!-- /brand -->
	

		<nav role="navigation" class="site-navigation main-navigation">
			<ul class="custom-menu">
				<li><a href="/say-hello/">Hello right back to you!</a></li>
				<li><a href="/about/">I love designing and creating usable products</a></li>
			</ul>
			
		</nav><!-- .site-navigation .main-navigation -->
		
		<div class="clear"></div>
	</div><!--/container -->

	<div class="container">
		<nav role="navigation" class="site-navigation main-navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav>
		<div class="search">
			<?php get_search_form(); ?>
		</div>
	</div><!--/container -->
		
</header><!-- #masthead .site-header -->

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
