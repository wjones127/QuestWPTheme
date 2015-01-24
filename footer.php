<!-- Footer -->
<div class="section group">
<div class="col span12">
<!-- Small top Menu -->
<!--<p class="center">
<a href="#">About</a> | 
<a href="#">Submissions</a> | 
<a href="#">Advertise</a> | 
<a href="#">Contact Us</a>
</p>-->
<?php 
if ( has_nav_menu( 'footer' ) ) { 
    /* if menu location 'footer' exists then use custom menu */
    wp_nav_menu( array( 'theme_location' => 'footer',
    'container_class' => 'footer center',
    'depth' => -1,
    ) ); 
} ?>


<p class="center">Copyright &copy; 2014 | Theme by Will Jones</p>
</div>
</div>

<?php wp_footer();?>
</body>



<!-- Scripts for images -->
<script>
 // Picture element HTML5 shiv
 document.createElement( "picture" );
</script>
<script src="<?php bloginfo('template_directory'); ?>/js/picturefill.min.js" async></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script>
// Now for the stuff relating to the menu bar
window.menuButton = {
    switchStates: function() {
	if ($('#menu-button').hasClass('active-button')) {
	    $('#menu-button').removeClass('active-button');
	    $('.navigation-container').addClass('closed');
	}
	else {
	    $('#menu-button').addClass('active-button');
	    $('.navigation-container').removeClass('closed');
	}
    },
}

$('#menu-button').click(window.menuButton.switchStates);
</script>


<!-- Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Rufina:700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Playfair+Display:700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Source+Serif+Pro:700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Abril+Fatface' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lora:700' rel='stylesheet' type='text/css'>

</html>
