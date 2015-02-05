<?php get_header(); ?>

<div class="main-wrapper center-container">
<div class="left"> <!-- Left content -->
<div class="col span12">

<?php if (have_posts()): while (have_posts()): the_post(); ?>

<article>
<h2 class="headline"><?php the_title(); ?></h2>

<?php the_content(); ?>

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
