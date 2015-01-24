<?php

add_theme_support( 'post-thumbnails' ); 
# Registering the Menus
function register_menu() {
    register_nav_menu('main-menu', __('Main Menu'));
    register_nav_menu('footer', __('Footer'));
}
add_action('init', 'register_menu');


/**
 * Register Sidebar
 */
function quest_register_sidebars() {

    /* Register the primary sidebar. */
    register_sidebar(
        array(
            'id' => 'sidebar',
            'name' => __( 'Sidebar Widget Area', 'quest' ),
            'description' => __( 'Widgets that go on sidebar on the right. Does not render on the home page.', 'quest' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
        )
    );

    /* Repeat register_sidebar() code for additional sidebars. */
}
add_action( 'widgets_init', 'quest_register_sidebars' );


function responsive_feature_image($id, $class='') {
if ( has_post_thumbnail() ) {
    $small = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'thumbnail')[0]; 
	$medium = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'medium')[0];
	$large = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'large')[0];
	$alt_text = get_post_meta($id, '_wp_attachment_image_alt', true);
    # echo '<img src="'.$small.'" ';
    # The script will take care of the src
    echo '<img ';
    echo 'class="'.$class.'" ';
    echo 'sizes="(min-width: 1200) 1200px, 100%" ';
    echo 'srcset="'.$small.' 480w, '.$medium.' 720w, '.$large.'1200w"';
    echo 'alt="'.$alt_text.'">';
}
}
?>
