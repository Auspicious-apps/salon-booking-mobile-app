$(document).ready(function() {
  $("#testimonial-slider").owlCarousel({
    loop: true,
		            center: true,
		            items: 3,
		            autoplay: true,
		            dots:true,
		            autoplayTimeout: 8500,
		            smartSpeed: 450,
		            responsive: {
		              0: {
		                items: 1
		              },
		              768: {
		                items: 2
		              },
		              1170: {
		                items: 3
		              }
		            }
  });
});




$(document).ready(function() {

	$('.navbar-toggle').click(function() {

		$(this).toggleClass('active');
	});

	$('.sub-menu').click(function(){
		$('body').toggleClass('menuopen');
		
	});

});





$(window).scroll(function() {
	if ($(this).scrollTop() > 0) {
		$('header').addClass("sticky");
	} else {
		$('header').removeClass("sticky");
	}
});

