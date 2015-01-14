
// Stuf for the Gallery
fGallery = {
    div: $('.featured-gallery'),
    currentPos: 1,
    maxSlides: 5,
    goTo: function(n) {
	// Sets the new position of the slides
	// Animation is taken care of by CSS
	newPos = '-' + ((n-1) * 100) + '%';
	this.div.css('left', newPos);
	// Set current position
	this.currentPos = n;
    },
    next: function() {
	// If there is another slide
	if (this.currentPos < this.maxSlides) {
	    // Go to the next one
	    this.goTo(this.currentPos + 1);
	} else{
	    // Otherwise go to first slide
	    this.goTo(1);
	}
    },
    prev: function() {
	// If there is a previous slide
	if (this.currentPos > 1) {
	    // Go to the previous slide
	    this.goTo(this.currentPos - 1);
	} else {
	    // Otherwise go to the last slide
	    this.goTo(this.maxSlides);
	}
    }
}


// Stuff for the Mobile Menu
function switchStates() {
    if ($('#menu-button').hasClass('active-button')) {
	$('#menu-button').removeClass('active-button');
	//$('.search-box').addClass('closed');
	//$('.main-menu').addClass('closed');
	$('.navigation-container').addClass('closed');
    }
    else {
	$('#menu-button').addClass('active-button');
	//$('.search-box').removeClass('closed');
	//$('.main-menu').removeClass('closed');
	$('.navigation-container').removeClass('closed');
    }
}

$('#menu-button').click(switchStates);
//window.setInterval('fGallery.next()', 5000);
