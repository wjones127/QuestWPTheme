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

<?php getAuthorHTime(); ?>

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



<?php
# First we need to get a list of categories to display. This is set in the Theme
# Options panel.

$category_names = get_option('pu_theme_options')['pu_textbox'];
$category_names = str_replace(' ', '', $category_names);
$category_names = explode(',', $category_names);

function categoryStories($category_slug) {
    # TODO : Need to get url and title of category
    $category = get_category_by_slug($category_slug);
    $cat_url = get_category_link( $category->term_id );
    $cat_name = $category->name;
?>
    <h3><a class="button" href="<?php echo $cat_url; ?>">
	<?php echo $cat_name; ?>
    </a></h3>
    <ul class="story-list">
	<?php
	rewind_posts();
	$post_query = array(
	    'post__not_in' => $do_not_duplicate,
	    'posts_per_page' => 5,
	    'category_name' => $category,
	);
	query_posts($post_query);
	if (have_posts()):
	 $post = $post[0];
	$c = 0;
	while (have_posts()) : the_post();
	$c++;
	?>
	    <li class="story">
		<h4><a href="<?php the_permalink(); ?>">
		    <?php the_title(); ?>
		</a></h4>
	<?php
	# Include the image with the first post, if it exists
	if ($c == 1):
	 if ( has_post_thumbnail( $post_id ) ) : 
	 $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
	?>
	    <a href="<?php the_permalink(); ?>">
		<?php responsive_feature_image($post->ID, 'full-width'); ?>
	    </a>
	    <?php
	    endif;
	    getAuthorHTime();
	    the_excerpt();
	    else:
        getAuthorHTime();
	    endif; 
?>
	    </li>
	<?php
	endwhile;
	endif;
	?>
    </ul>
<?php
}


?>

<div class="main-wrapper center-container">
<?php 
foreach ($category_names as $i => $category) {
    if ($i % 2 == 0) {
?>
    <div class="section group">
	<div class="col span6">
	    <?php categoryStories($category); ?>
	</div>
<?php
# Need to make sure row is closed up if this is the last category
if ($i == count($category_names) - 1) {
    echo '</div>';
}
    } else { 
?>
	<div class="col span6">
	    <?php categoryStories($category); ?>
	</div>
    </div>
<?php } } ?>



<?php get_footer(); ?>


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
