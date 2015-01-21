<?php
function responsive_feature_image($id, $class='') {
    $small = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'thumbnail')[0]; 
	$medium = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'medium')[0];
	$large = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'large')[0];
	$alt_text = get_post_meta($id, '_wp_attachment_image_alt', true);
    echo '<img src="'.$small.'" ';
    echo 'class="'.$class.'" ';
    echo 'sizes="(min-width: 1200) 1200px, 100%" ';
    echo 'srcset="'.$small.' 480w, '.$medium.' 720w, '.$large.'1200w"';
    echo 'alt="'.$alt_text.'">';
}

?>