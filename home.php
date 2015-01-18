<?php get_header(); ?>


<!-- ***************************************************************************
                                  SLIDER GALLERY
**************************************************************************** -->
<div class="center-container">
<div id="slider" class="gallery-container swipe">
<div class="featured-gallery swipe-wrap">
<?php query_posts( 'category_name=slider&posts_per_page=5' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
    <div class="slide">
	<h2 class="headline featured-headline">
	    <a href="<?php the_permalink(); ?>">
		<?php echo the_title(); ?>
	    </a>
	</h2>
	<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
	<a href="<?php the_permalink(); ?>">
	    <img src="<?php echo '$feat_image' ?>">
	</a>
    </div>
<?php 
# Adds the ID of the post to a list so we know which posts to not duplicate in later sections
$do_not_duplicate[] = $post->ID;
endwhile; 
?>
</div><!-- End .featured-gallery -->

<!-- Indicator for where the slider is -->
<div class="counter">
<div class="counter-on"></div><div></div><div></div><div></div><div></div>
</div>

</div> <!-- End .gallery-container -->
</div> <!-- End center-container -->


<div class="main-wrapper center-container">
<div class="section group">

<!-- First 5 columns -->
<div id="featured-news" class="col span5">
<!-- News Stories -->
<h3><a href="category.html">Latest News</a></h3>
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
    <h4><a href="<?php echo the_permalink() ?>">
	<?php echo the_title() ?>
    </a></h4>
    <?php
    # If there is a feature image for the post, show it
    if ( has_post_thumbnail( $post_id ) ) : 
     $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
    ?>
	<a href="<?php the_permalink(); ?>">
	    <img src="<?php echo '$feat_image' ?>">
	</a>
    <?php endif ?>
    <p class="byline">by <?php the_author(); ?> | <?php the_date(); ?></p>
    <?php the_excerpt(); ?>
</li>
<?php else : ?>
<li class="story">
    <h4><a href="<?php echo the_permalink() ?>">
	<?php echo the_title() ?>
    </a></h4>
    <p class="byline">by <?php the_author(); ?> | <?php the_date(); ?></p>
</li>
<?php 
endif;
endwhile;
endif; ?>







<!-- SLIDER JAVASCRIPT -->

<script src="<?php bloginfo('template_directory'); ?>/Swipe/swipe.js"></script>
<script>
window.counter = {
    element: document.getElementsByClassName('counter')[0],
    switchCounter: function(index) {
        for (var i=0; i<window.counter.element.children.length; i++) {
            window.counter.element.children[i].className="";
        }
        window.counter.element.children[index].className='counter-on';
    },
};

window.mySwipe = new Swipe(document.getElementById('slider'), {
  startSlide: 0,
  speed: 400,
  auto: 3000,
  continuous: true,
  disableScroll: false,
  stopPropagation: false,
  callback: function(index, elem) {
    window.counter.switchCounter(index);
  },
  transitionEnd: function(index, elem) {}
});

window.counter.goTo = function(index) {
    window.mySwipe.stop();
    window.counter.switchCounter(index);
    window.mySwipe.slide(index, 400);
};


for (var i=0; i<5; i++) {
    console.log(i);
    element = window.counter.element.children[i];
    console.log(element);
    element.id = i
    element.addEventListener("click", function() {
        window.counter.goTo(this.id);
    });
};
</script>


<?php get_footer(); ?>
