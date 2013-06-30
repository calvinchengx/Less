<?php get_header('html_head') ?>

<header id="masthead" class="site-header" role="banner">
	<div class="container no-bottom-padding">
		
		
		<div id="brand">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a> <span><?php echo get_bloginfo( 'description' ); ?></span></h1>
		</div><!-- /brand -->

		<div class="sg-wrapper">
			<div class="gravatar">
				<?php 
					// grab admin email and their photo
					$admin_email = get_option('admin_email');
					echo get_avatar( $admin_email, 60 ); 
				?>
			</div><!--/ author -->
			<?php get_search_form(); ?>
		</div>

		<div class="clear"></div>
		
	</div><!--/container -->

		
</header><!-- #masthead .site-header -->
