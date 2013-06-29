<?php while (have_posts()) : the_post(); ?>

	<article class="post">
	
		<h2>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php the_title() ?>
			</a>
		</h2>
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
