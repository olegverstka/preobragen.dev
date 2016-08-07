$(document).ready(function(){
	var delay=350, setTimeoutConst;

	$('.menu>li').hover(
		function () {
			var ths = $(this);
			setTimeoutConst = setTimeout(function(){
				ths.addClass('view');
				ths.closest('.menu').find('.sub-menu').slideUp(0);
				ths.find('.sub-menu').css('z-index', 5000).slideDown(0);
			}, delay);
		},
		function () {
			var ths = $(this);
			ths.removeClass('view');
			setTimeout(function() {
				if (!ths.hasClass('view')) {
					ths.find('.sub-menu').css('z-index', 1000).slideUp(300);
				}
			},1000);
			clearTimeout(setTimeoutConst );
		}
	);
});