<?php while (have_posts()) : the_post(); ?>

	<article class="post">
	
		<h1 class="title">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php the_title() ?>
			</a>
		</h1>
		<div class="post-meta">
			<?php if( comments_open() ) : ?>
				<span class="comments-link">
					<?php disqus_count('calvinx'); ?>
				</span>
			<?php endif; ?>
		
		</div><!--/post-meta -->
		
		<div class="the-content">
	    		<?php the_excerpt(); ?>
		</div>

		<div class="meta clearfix">
	    		<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">Read More ?</a>
		</div><!-- Meta -->

	</article>

<?php endwhile; ?>
