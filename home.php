<?php get_header(); ?>


<!-- ***************************************************************************
                                  FEATURED STORIES
**************************************************************************** -->
<section class="featured-stories">

<?php 
query_posts( 'category_name=slider&posts_per_page=1' );
while ( have_posts() ) : the_post(); 
# Store the post id for getting the picture
$image_id = get_post_thumbnail_id($post->ID);
?>

<div class="featured-image"></div>

    <div class="center-container">
	<div class="featured-headline-container">
	    <h2 class="headline featured-headline">
		<a href="<?php the_permalink(); ?>">
		    <?php echo the_title(); ?>
		</a>
	    </h2>

	    <p class="byline">by 
<?php 
$guest_author = get_post_meta($post->ID, "guest-author", true);
if ($guest_author != '') {
    echo $guest_author; }
elseif (function_exists('coauthors_posts_links')) {
    coauthors_posts_links(); }
else {
    the_author();; } ?> |

	<?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?>
	    </p>

	</div>
    </div>


<?php
# Adds the ID of the post to a list so we know which posts to not duplicate in later sections
$do_not_duplicate[] = $post->ID;
endwhile; 
?>
</section><!-- End .featured-stories -->


<!-- ***************************************************************************
                              STORIES BY CATEGORY
**************************************************************************** -->

<div class="main-wrapper center-container">
<div class="section group">
<div class="col span6">

<!-- News Stories -->
<h3><a class="button" href="/category/news/"">Latest News</a></h3>
<ul class="story-list">
<?php 
rewind_posts();
$news = array(
    'post__not_in' => $do_not_duplicate,
    'posts_per_page' => 5,
    'category_name' => news,
);
query_posts($news);
if (have_posts()) :
$post = $posts[0]; $c = 0;
while (have_posts()) : the_post();
# For the first post, have the image, if there is one
$c++;
if ( $c == 1) :
?>
<li class="story">
    <h4><a href="<?php the_permalink() ?>">
	<?php echo the_title() ?>
    </a></h4>
    <?php
    # If there is a feature image for the post, show it
    if ( has_post_thumbnail( $post_id ) ) : 
     $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
    ?>
	<a href="<?php the_permalink(); ?>">
	    <?php responsive_feature_image($post->ID, 'full-width'); ?>
	</a>
    <?php endif ?>
    <p class="byline">by 

<?php 
$guest_author = get_post_meta($post->ID, "guest-author", true);
if ($guest_author != '') {
    echo $guest_author; }
elseif (function_exists('coauthors_posts_links')) {
    coauthors_posts_links(); }
else {
    the_author();; } ?> |

	<?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?>
    </p>
    <?php the_excerpt(); ?>
</li>
<?php else : ?>
<li class="story">
    <h4><a href="<?php the_permalink() ?>">
	<?php echo the_title() ?>
    </a></h4>
    <p class="byline">by

<?php 
$guest_author = get_post_meta($post->ID, "guest-author", true);
if ($guest_author != '') {
    echo $guest_author; }
elseif (function_exists('coauthors_posts_links')) {
    coauthors_posts_links(); }
else {
    the_author();; } ?> |

	<?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?>
    </p>
</li>
<?php 
endif;
endwhile;
endif; ?>
</ul>


</div>
<div class="col span6">

<!-- Features Stories -->
<h3><a class="button" href="/category/features">Features</a></h3>
<ul class="story-list">
<?php 
rewind_posts();
$features = array(
    'post__not_in' => $do_not_duplicate,
    'posts_per_page' => 5,
    'category_name' => features,
);
query_posts($features);
if (have_posts()) :
$post = $posts[0]; $c = 0;
while (have_posts()) : the_post();
# For the first post, have the image, if there is one
$c++;
if ( $c == 1) :
?>
<li class="story">
    <h4><a href="<?php echo the_permalink() ?>">
	<?php echo the_title() ?>
    </a></h4>
    <?php
    # If there is a feature image for the post, show it
    if ( has_post_thumbnail( $post_id ) ) : 
    ?>
	<a href="<?php the_permalink(); ?>">
	    <?php responsive_feature_image($post->ID, 'full-width'); ?>
	</a>
    <?php endif ?>
    <p class="byline">by
<?php 
$guest_author = get_post_meta($post->ID, "guest-author", true);
if ($guest_author != '') {
    echo $guest_author; }
elseif (function_exists('coauthors_posts_links')) {
    coauthors_posts_links(); }
else {
    the_author();; } ?> |
 
	<?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?>
    </p>
    <?php the_excerpt(); ?>
</li>
<?php else : ?>
<li class="story">
    <h4><a href="<?php echo the_permalink() ?>">
	<?php echo the_title() ?>
    </a></h4>
    <p class="byline">by 
<?php 
$guest_author = get_post_meta($post->ID, "guest-author", true);
if ($guest_author != '') {
    echo $guest_author; }
elseif (function_exists('coauthors_posts_links')) {
    coauthors_posts_links(); }
else {
    the_author();; } ?> |

	<?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?>
    </p>
</li>
<?php 
endif;
endwhile;
endif; ?>
</ul>

</div>
</div><!-- End .section .group -->
<div class="section group">
<div class="col span6">

<!-- Letters -->
<h3><a class="button" href="/category/opinion/">Letters</a></h3>
<ul class="story-list">
<?php 
rewind_posts();
$letters = array(
    'post__not_in' => $do_not_duplicate,
    'posts_per_page' => 5,
    'category_name' => opinion,
);
query_posts($letters);
if (have_posts()) :
$post = $posts[0]; $c = 0;
while (have_posts()) : the_post();
# For the first post, have the image, if there is one
$c++;
if ( $c == 1) :
?>
<li class="story">
    <h4><a href="<?php echo the_permalink() ?>">
	<?php echo the_title() ?>
    </a></h4>
    <?php
    # If there is a feature image for the post, show it
    if ( has_post_thumbnail( $post_id ) ) :     ?>
	<a href="<?php the_permalink(); ?>">
	    <?php responsive_feature_image($post->ID, 'full-width'); ?>
	</a>
    <?php endif ?>
    <p class="byline">by 
<?php 
$guest_author = get_post_meta($post->ID, "guest-author", true);
if ($guest_author != '') {
    echo $guest_author; }
elseif (function_exists('coauthors_posts_links')) {
    coauthors_posts_links(); }
else {
    the_author();; } ?> |

	<?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?>
    </p>
    <?php the_excerpt(); ?>
</li>
<?php else : ?>
<li class="story">
    <h4><a href="<?php echo the_permalink() ?>">
	<?php echo the_title() ?>
    </a></h4>
    <p class="byline">by
<?php 
$guest_author = get_post_meta($post->ID, "guest-author", true);
if ($guest_author != '') {
    echo $guest_author; }
elseif (function_exists('coauthors_posts_links')) {
    coauthors_posts_links(); }
else {
    the_author();; } ?> |
	<?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?>
    </p>
</li>
<?php 
endif;
endwhile;
endif; ?>
</ul>


</div>
<div class="col span6">

<!-- Entertainment Stories -->
<h3><a class="button" href="/category/entertainment/">Entertainment</a></h3>
<ul class="story-list">
<?php 
rewind_posts();
$entertainment = array(
    'post__not_in' => $do_not_duplicate,
    'posts_per_page' => 5,
    'category_name' => entertainment,
);
query_posts($entertainment);
if (have_posts()) :
$post = $posts[0]; $c = 0;
while (have_posts()) : the_post();
# For the first post, have the image, if there is one
$c++;
if ( $c == 1) :
?>
<li class="story">
    <h4><a href="<?php echo the_permalink() ?>">
	<?php echo the_title() ?>
    </a></h4>
    <?php
    # If there is a feature image for the post, show it
    if ( has_post_thumbnail( $post_id ) ) :   ?>
	<a href="<?php the_permalink(); ?>">
	    <?php responsive_feature_image($post->ID, 'full-width'); ?>
	</a>
    <?php endif ?>
    <p class="byline">by 
<?php 
$guest_author = get_post_meta($post->ID, "guest-author", true);
if ($guest_author != '') {
    echo $guest_author; }
elseif (function_exists('coauthors_posts_links')) {
    coauthors_posts_links(); }
else {
    the_author();; } ?> |

	<?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?>
    </p>
    <?php the_excerpt(); ?>
</li>
<?php else : ?>
<li class="story">
    <h4><a href="<?php echo the_permalink() ?>">
	<?php echo the_title() ?>
    </a></h4>
    <p class="byline">by 
<?php 
$guest_author = get_post_meta($post->ID, "guest-author", true);
if ($guest_author != '') {
    echo $guest_author; }
elseif (function_exists('coauthors_posts_links')) {
    coauthors_posts_links(); }
else {
    the_author();; } ?> |

	<?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?>
    </p>
</li>
<?php 
endif;
endwhile;
endif; ?>
</ul>


</div>

</div><!-- End .section .group -->

<div class="section group">
<div class="col span6">

<!-- Creative Stories -->
<h3><a class="button" href="/category/creative/">Creative</a></h3>
<ul class="story-list">
<?php 
rewind_posts();
$creative = array(
    'post__not_in' => $do_not_duplicate,
    'posts_per_page' => 5,
    'category_name' => creative,
);
query_posts($creative);
if (have_posts()) :
$post = $posts[0]; $c = 0;
while (have_posts()) : the_post();
# For the first post, have the image, if there is one
$c++;
if ( $c == 1) :
?>
<li class="story">
    <h4><a href="<?php echo the_permalink() ?>">
	<?php echo the_title() ?>
    </a></h4>
    <?php
    # If there is a feature image for the post, show it
    if ( has_post_thumbnail( $post_id ) ) :   ?>
	<a href="<?php the_permalink(); ?>">
	    <?php responsive_feature_image($post->ID, 'full-width'); ?>
	</a>
    <?php endif ?>
    <p class="byline">by 
<?php 
$guest_author = get_post_meta($post->ID, "guest-author", true);
if ($guest_author != '') {
    echo $guest_author; }
elseif (function_exists('coauthors_posts_links')) {
    coauthors_posts_links(); }
else {
    the_author();; } ?> |

	<?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?>
    </p>
    <?php the_excerpt(); ?>
</li>
<?php else : ?>
<li class="story">
    <h4><a href="<?php echo the_permalink() ?>">
	<?php echo the_title() ?>
    </a></h4>
    <p class="byline">by 
<?php 
$guest_author = get_post_meta($post->ID, "guest-author", true);
if ($guest_author != '') {
    echo $guest_author; }
elseif (function_exists('coauthors_posts_links')) {
    coauthors_posts_links(); }
else {
    the_author();; } ?> |

	<?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?>
    </p>
</li>
<?php 
endif;
endwhile;
endif; ?>
</ul>


</div>
<div class="col span6">



</div>
</div> <!-- End .section .group -->





<!-- css for the feature story image -->
<style>
@media only screen and (max-width: 767px) {
    .featured-image {
	background: url(
	    "<?php echo wp_get_attachment_image_src( $image_id, 'feat_medium')[0] ?>"
	) center center no-repeat;
	background-size: auto 100%;
    }
}
@media only screen and (min-width: 768px) {
    .featured-image {
	background: url(
	    "<?php echo wp_get_attachment_image_src( $image_id, 'feat_large')[0] ?>"
	) center center no-repeat fixed;
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;

    }
}

.featured-stories > div {
}

</style>



<?php get_footer(); ?>
