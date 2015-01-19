<?php get_header(); ?>

<div class="main-wrapper center-container">
<div class="left"> <!-- Left content -->
<div class="col span12">

<?php if (have_posts()): while (have_posts()): the_post(); ?>

<article>
<h2 class="headline"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
<!--<h3 class="subtitle"></h3>-->
<p class="author center"><?php the_author(); ?> |
<?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?>
</p>
<!-- Featured image -->
<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); ?>
<img src="<?php echo $feat_image ?>" class="full-width">
<p class="caption">
    <?php echo get_post(get_post_thumbnail_id())->post_content; ?>
</p>


<?php echo the_content(); ?>
</article>
<?php endwhile; endif; ?>

</div>
</div> <!-- End left content container -->
<div class="right">
<div class="col span12">
<?php get_sidebar(); ?>
</div>
</div>

<?php get_footer(); ?>
