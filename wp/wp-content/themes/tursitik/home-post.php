<div class="post-wrap">
	<div class="post-thumbnail">
		<?php the_post_thumbnail( 'thumbnail' ) ?>
	</div>
	<div class="post-content">
		<div class="post-content__post-info">
			<div class="post-date"><?php the_time( 'd.m.Y' ) ?></div>
		</div>
		<div class="post-content__post-text">
			<div class="post-title"><?php the_title() ?></div>
			<?php the_field('on_home'); ?>
		</div>
		<div class="post-content__post-control"><a href="<?php the_permalink() ?>" class="btn-read-post">Читать далее >></a></div>
	</div>
</div>
