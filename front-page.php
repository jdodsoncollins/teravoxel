<?php get_header(); ?>

<div class="row">
  <div class="span10 offset1">

<!-- Start the Loop. -->
 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

 <?php if ( in_category('3') ) { ?>
           <div class="component">
 <?php } else { ?>
           <div class="component">
 <?php } ?>


 <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>


 <small><?php the_time('F jS, Y') ?> by <?php the_author_posts_link() ?></small>


 <div class="entry">
   <?php the_content(); ?>
 </div>



 <p class="postmetadata">Posted in <?php the_category(', '); ?></p>
 </div> 


 <?php endwhile; else: ?>

 <p>Sorry, no posts matched your criteria.</p>


 <?php endif; ?>
	
	  </div>

</div>



<?php get_footer(); ?>