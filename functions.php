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

# Add images sizes
add_image_size('feat_large', '1200', '675', true);
add_image_size('feat_medium', '720', '405', true);
add_image_size('feat_small', '480', '270', true);



function responsive_feature_image($id, $class='') {
if ( has_post_thumbnail() ) {
    $image_id = get_post_thumbnail_id($id);
    $small = wp_get_attachment_image_src( $image_id, 'feat_small')[0];
	$medium = wp_get_attachment_image_src( $image_id, 'feat_medium')[0];
	$large = wp_get_attachment_image_src( $image_id, array(1200, 675))[0];
	$alt_text = get_post_meta($id, '_wp_attachment_image_alt', true);
    # The script will take care of the src
    echo '<img ';
    echo 'class="'.$class.'" ';
    echo 'sizes="(min-width: 1200) 1200px, 100%" ';
    echo 'srcset="'.$small.' 480w, '.$medium.' 720w, '.$large.' 1200w"';
    echo 'alt="'.$alt_text.'">';
}
}

function getAuthors() {
    # echos the authors' names
    $guest_author = get_post_meta($post->ID, "guest-author", true);
    if ($guest_author != '') echo $guest_author;
    elseif (function_exists('coauthors_posts_links')) {
	coauthors_posts_links(); }
    else the_author();
}

function getAuthorHTime() {
    echo '<p class="altauthor"><span>';
    getAuthors();
    echo '</span><span>';
    echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago';
    echo '</span></p>';
}


function pu_theme_menu() {
    add_theme_page('Theme Options','Theme Options','manage_options',
		   'theme-options.php', 'themePage');
}

add_action('admin_menu', 'pu_theme_menu');

function themePage() {
?>
    <div class="section panel">
	<h1>Custom Theme Options</h1>
	<form method="post" enctype="multipart/form-data" action="options.php">
            <?php 
            settings_fields('pu_theme_options'); 
            
            do_settings_sections('pu_theme_options.php');
            ?>
            <p class="submit">  
                <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />  
            </p>  
            
	</form>
    </div>
    <?php
}

add_action('admin_init', 'pu_register_settings');

function pu_register_settings()
{
    // Register the settings with Validation callback
    register_setting( 'pu_theme_options', 'pu_theme_options', 'pu_validate_settings' );

    // Add settings section
    add_settings_section( 'pu_text_section', 'Text box Title', 'pu_display_section', 'pu_theme_options.php' );

    // Create textbox field
    $field_args = array(
      'type'      => 'text',
      'id'        => 'pu_textbox',
      'name'      => 'pu_textbox',
      'desc'      => 'List the slug names of categories to be displayed on the homepage, separated by commas.',
      'std'       => '',
      'label_for' => 'pu_textbox',
      'class'     => 'css_class'
    );

    add_settings_field( 'homepage_categories', 'Categories to Display on Homepage',
'pu_display_setting', 'pu_theme_options.php', 'pu_text_section', $field_args );
}

function pu_display_section($section){ 

}

function pu_display_setting($args)
{
    extract( $args );

    $option_name = 'pu_theme_options';

    $options = get_option( $option_name );

    switch ( $type ) {  
          case 'text':  
              $options[$id] = stripslashes($options[$id]);  
              $options[$id] = esc_attr( $options[$id]);  
              echo "<input class='regular-text$class' type='text' id='$id' name='" . $option_name . "[$id]' value='$options[$id]' />";  
              echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";  
          break;  
    }
}

function pu_validate_settings($input)
{
  foreach($input as $k => $v)
  {
    $newinput[$k] = trim($v);
    
    // Check the input is a letter or a number
    if(!preg_match('/^[A-Z0-9 _,]*$/i', $v)) {
      $newinput[$k] = '';
    }
  }

  return $newinput;
}



?>
