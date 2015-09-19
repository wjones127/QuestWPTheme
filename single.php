<?php get_header(); ?>

<div class="main-wrapper center-container">

<div class="section group">
<div class="col span9">

<?php if (have_posts()): while (have_posts()): the_post(); ?>

<article>
<h1><?php the_title(); ?></h2>

<?php 
# Get the subtitle
$subtitle = get_post_meta($post->ID, "subtitle", true);
if ($subtitle != '') {
?>
<h2 class="subtitle"><?php echo $subtitle; } ?></h3>

<p class="altauthor center">
<span><?php getAuthors();?></span><span><?php the_date(); ?></span>
</p>

<?php # FEATURE IMAGE
      # Need to remove responsive images first
      #responsive_feature_image($post->ID, 'full-width'); ?>
<?php #if(get_post(get_post_thumbnail_id())->post_excerpt) {
#	  echo '<p class="caption">';
#	  echo get_post(get_post_thumbnail_id())->post_excerpt;
#	  echo '</p>';
#} ?>

<div class="content-container">
<?php the_content(); ?>
</div>

</article>
<?php endwhile; endif; ?>

<div class="comments-container">
<h3>Comments</h3>
<?php comments_template(); ?>
</div>

</div>
<div class="col span3">
<?php get_sidebar(); ?>
</div>
</div>

<?php get_footer(); ?>
