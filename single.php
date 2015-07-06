<?php get_header(); ?>

<div class="row">
  <div class="span10 offset1">
	  <div class="component">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<h1><?php the_title(); ?></h1>
		<p class="post_time"><em><?php the_time('l, F jS, Y'); ?></em></p>

	  	<?php the_content(); ?>

	  	<hr>
		<?php comments_template(); ?>

	<?php endwhile; else: ?>
		<p><?php _e('Sorry, this page does not exist.'); ?></p>
	<?php endif; ?>
  </div>
  </div>
</div>

<?php get_footer(); ?>
