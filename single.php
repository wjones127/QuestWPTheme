<?php get_header(); ?>

<div class="main-wrapper center-container">
<div class="left"> <!-- Left content -->
<div class="col span12">

<?php if (have_posts()): while (have_posts()): the_post(); ?>

<article>
<h2 class="headline"><?php the_title(); ?></h2>

<?php 
# Get the subtitle
$subtitle = get_post_meta($post->ID, "subtitle", true);
if ($subtitle != '') {
?>
<h3 class="subtitle"><?php echo $subtitle; } ?></h3>

<p class="author center">
<?php 
$guest_author = get_post_meta($post->ID, "guest-author", true);
if ($guest_author != '') {
    echo $guest_author; }
elseif (function_exists('coauthors_posts_links')) {
    coauthors_posts_links(); }
else {
    the_author();; } ?> |
<?php the_date(); ?>
</p>
<?php # FEATURE IMAGE
      # Need to remove responsive images first
      #responsive_feature_image($post->ID, 'full-width'); ?>
<?php #if(get_post(get_post_thumbnail_id())->post_excerpt) {
#	  echo '<p class="caption">';
#	  echo get_post(get_post_thumbnail_id())->post_excerpt;
#	  echo '</p>';
#} ?>

<?php the_content(); ?>

</article>
<?php endwhile; endif; ?>

<div class="comments-container">
<h3>Comments</h3>
<?php comments_template(); ?>
</div>

</div>
</div> <!-- End left content container -->
<div class="right">
<div class="col span12">
<?php get_sidebar(); ?>
</div>
</div>

<?php get_footer(); ?>
