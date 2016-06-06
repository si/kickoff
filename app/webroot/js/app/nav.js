$(function(){
    $('button.toggle-nav').on('click', function() {
        $(this).toggleClass('expand');
    });
    
	$(".slick-nav").slick({
		dots: true,
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		draggable: true,
	});
});