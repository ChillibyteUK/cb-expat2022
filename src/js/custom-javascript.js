// Add your custom JS here.
(function($){
	$(document).on('scroll', function () {
		var $nav = $("#wrapper-navbar");
		// $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height() );
		$nav.toggleClass('scrolled', $(this).scrollTop() > 50 );
	});

    $( ".news_selector" ).on('click',function() {
        $(".news_selector").removeClass("active");
        $( this ).toggleClass( "active" );
    });

    var observer = new IntersectionObserver(function(entries) {
        if (entries[0].isIntersecting == true) {
            $('#stickyButton').css('z-index','-9999');
        }
        else {
            $('#stickyButton').css('z-index','1');
        }
    }, { root: null });
    observer.observe(document.querySelector("footer"));

    $('.accordion-body').on('show.bs.collapse', function () {
        $(this).closest("table")
            .find(".collapse.in")
            .not(this)
            // .collapse('toggle')
    });

})(jQuery);