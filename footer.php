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
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/picturefill.min.js" async></script>
<script src="<?php bloginfo('template_directory'); ?>/js/dropcap.js/dropcap.min.js"></script>

<script>
// Now for the stuff relating to the menu bar
window.menuButton = {
    menuButton: window.getElementById('menu-button'),
    navContainer: window.getElementsByClass('navigation-container'),
    switchStates: function() {
        this.toggleClass(this.menuButton,
                         'active-button',
                         /(^|\s)active-button($|\s)/);
        this.toggleClass(this.navContainer,
                         'closed',
                         /(^|\s)closed($|\s)/);
    },
    toggleClass: function(element, className, classRegex) {
        var match = classRegex.exec(element.className);
	    if (match === null) element.className += ' ' + className;
        else element.className = element.className.replace(classRegex, '');
    },
}

$('#menu-button').click(window.menuButton.switchStates);


</script>

<script src="<?php bloginfo('template_directory'); ?>/js/add_dropcap.js"></script>

<!-- Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Lora:700,700italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Libre+Baskerville:700' rel='stylesheet' type='text/css'>
<?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds.

</html>
