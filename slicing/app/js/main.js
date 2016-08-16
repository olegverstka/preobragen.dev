jQuery(document).ready(function(){
	var delay=350, setTimeoutConst;

	jQuery('.menu>li').hover(
		function () {
			var ths = jQuery(this);
			setTimeoutConst = setTimeout(function(){
				ths.addClass('view');
				ths.closest('.menu').find('.sub-menu').slideUp(0);
				ths.find('.sub-menu').css('z-index', 5000).slideDown(0);
			}, delay);
		},
		function () {
			var ths = jQuery(this);
			ths.removeClass('view');
			setTimeout(function() {
				if (!ths.hasClass('view')) {
					ths.find('.sub-menu').css('z-index', 1000).slideUp(300);
				}
			},1000);
			clearTimeout(setTimeoutConst );
		}
	);

	jQuery('ul.tabs__caption').on('click', 'li:not(.active)', function() {
		jQuery(this)
		.addClass('active').siblings().removeClass('active')
		.closest('div.tabs').find('div.tabs__content').removeClass('active').eq($(this).index()).addClass('active');
	});

	jQuery("select").styler();

});