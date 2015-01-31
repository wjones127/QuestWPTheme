<?php get_header(); ?>

<div class="main-wrapper center-container">

<div class="left"> <!-- Left content -->
<div class="col span12">

<div class="pagination-container center"> <?php echo paginate_links(); ?> </div>

<ul class="story-list">
    <?php if (have_posts()): while (have_posts()): the_post(); ?>
	<li class="story">
	    <h2 class="headline"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
	    <p class="byline center"><?php the_author(); ?> |
		<?php echo human_time_diff( get_the_time('U'), 
					    current_time('timestamp') ) . ' ago'; ?>
	    </p>
	    <?php responsive_feature_image($post->ID, 'full-width'); ?>
	    <?php the_excerpt(); ?>
	</li>
    <?php endwhile; endif; ?>
</ul> <!-- .story-list -->

<div class="pagination-container center"> <?php echo paginate_links(); ?> </div>

</div>
</div> <!-- End left content container -->

<div class="right">
    <div class="col span12">
	<?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?>
