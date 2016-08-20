jQuery(document).ready(function(){

	// Выпадающее меню
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

	// Табы
	jQuery('ul.tabs__caption').on('click', 'li:not(.active)', function() {
		jQuery(this)
		.addClass('active').siblings().removeClass('active')
		.closest('div.tabs').find('div.tabs__content').removeClass('active').eq($(this).index()).addClass('active');
	});

	// Стилизация селектов
	jQuery("select").styler();

	// Выбор подъезда
	jQuery('.staircase_img input[type="radio"]').on('change', function(e){
		jQuery(".staircase_img .front_door").removeClass('checked');
	});

	jQuery('#number_1').on('change', function(e){
		if(jQuery("#number_1").prop("checked")) {
			jQuery("#staircase_1").addClass('checked');
		} else {
			jQuery("#staircase_1").removeClass('checked');
			jQuery(".staircase_img .front_door").removeClass('checked');
		}
	});
	jQuery('#number_2').on('change', function(e){
		if(jQuery("#number_2").prop("checked")) {
			jQuery("#staircase_2").addClass('checked');
		} else {
			jQuery("#staircase_2").removeClass('checked');
			jQuery(".staircase_img .front_door").removeClass('checked');
		}
	});
	jQuery('#number_3').on('change', function(e){
		if(jQuery("#number_3").prop("checked")) {
			jQuery("#staircase_3").addClass('checked');
		} else {
			jQuery("#staircase_3").removeClass('checked');
			jQuery(".staircase_img .front_door").removeClass('checked');
		}
	});
	
	// Выбор этажа
	jQuery('.floor_wrap input[type="radio"]').on('change', function(e){
		jQuery(".floor_wrap .floor_item label").removeClass('checked_floor');
	});

	jQuery('#floor_5').on('change', function(e){
		if(jQuery("#floor_5").prop("checked")) {
			jQuery("#floor_label_5").addClass('checked_floor');
		} else {
			jQuery("#floor_label_5").removeClass('checked_floor');
			jQuery(".floor_wrap .floor_item label").removeClass('checked_floor');
		}
	});
	jQuery('#floor_4').on('change', function(e){
		if(jQuery("#floor_4").prop("checked")) {
			jQuery("#floor_label_4").addClass('checked_floor');
		} else {
			jQuery("#floor_label_4").removeClass('checked_floor');
			jQuery(".floor_wrap .floor_item label").removeClass('checked_floor');
		}
	});
	jQuery('#floor_3').on('change', function(e){
		if(jQuery("#floor_3").prop("checked")) {
			jQuery("#floor_label_3").addClass('checked_floor');
		} else {
			jQuery("#floor_label_3").removeClass('checked_floor');
			jQuery(".floor_wrap .floor_item label").removeClass('checked_floor');
		}
	});
	jQuery('#floor_2').on('change', function(e){
		if(jQuery("#floor_2").prop("checked")) {
			jQuery("#floor_label_2").addClass('checked_floor');
		} else {
			jQuery("#floor_label_2").removeClass('checked_floor');
			jQuery(".floor_wrap .floor_item label").removeClass('checked_floor');
		}
	});
	jQuery('#floor_1').on('change', function(e){
		if(jQuery("#floor_1").prop("checked")) {
			jQuery("#floor_label_1").addClass('checked_floor');
		} else {
			jQuery("#floor_label_1").removeClass('checked_floor');
			jQuery(".floor_wrap .floor_item label").removeClass('checked_floor');
		}
	});

	// Выбор квартиры
	jQuery('.apartment_wrap input[type="radio"]').on('change', function(e){
		jQuery(".apartment_wrap .apartament_wrap_item").removeClass('checked_apartament');
	});
	jQuery('#apartament_item_1').on('change', function(e){
		if(jQuery("#apartament_item_1").prop("checked")) {
			jQuery("#apartament_wrap_item_1").addClass('checked_apartament');
		} else {
			jQuery("#apartament_wrap_item_1").removeClass('checked_apartament');
			jQuery(".apartment_wrap .apartament_wrap_item").removeClass('checked_apartament');
		}
	});
	jQuery('#apartament_item_2').on('change', function(e){
		if(jQuery("#apartament_item_2").prop("checked")) {
			jQuery("#apartament_wrap_item_2").addClass('checked_apartament');
		} else {
			jQuery("#apartament_wrap_item_2").removeClass('checked_apartament');
			jQuery(".apartment_wrap .apartament_wrap_item").removeClass('checked_apartament');
		}
	});
	jQuery('#apartament_item_3').on('change', function(e){
		if(jQuery("#apartament_item_3").prop("checked")) {
			jQuery("#apartament_wrap_item_3").addClass('checked_apartament');
		} else {
			jQuery("#apartament_wrap_item_3").removeClass('checked_apartament');
			jQuery(".apartment_wrap .apartament_wrap_item").removeClass('checked_apartament');
		}
	});
	jQuery('#apartament_item_4').on('change', function(e){
		if(jQuery("#apartament_item_4").prop("checked")) {
			jQuery("#apartament_wrap_item_4").addClass('checked_apartament');
		} else {
			jQuery("#apartament_wrap_item_4").removeClass('checked_apartament');
			jQuery(".apartment_wrap .apartament_wrap_item").removeClass('checked_apartament');
		}
	});
	jQuery('#apartament_item_5').on('change', function(e){
		if(jQuery("#apartament_item_5").prop("checked")) {
			jQuery("#apartament_wrap_item_5").addClass('checked_apartament');
		} else {
			jQuery("#apartament_wrap_item_5").removeClass('checked_apartament');
			jQuery(".apartment_wrap .apartament_wrap_item").removeClass('checked_apartament');
		}
	});
	jQuery('#apartament_item_6').on('change', function(e){
		if(jQuery("#apartament_item_6").prop("checked")) {
			jQuery("#apartament_wrap_item_6").addClass('checked_apartament');
		} else {
			jQuery("#apartament_wrap_item_6").removeClass('checked_apartament');
			jQuery(".apartment_wrap .apartament_wrap_item").removeClass('checked_apartament');
		}
	});
	jQuery('#apartament_item_7').on('change', function(e){
		if(jQuery("#apartament_item_7").prop("checked")) {
			jQuery("#apartament_wrap_item_7").addClass('checked_apartament');
		} else {
			jQuery("#apartament_wrap_item_7").removeClass('checked_apartament');
			jQuery(".apartment_wrap .apartament_wrap_item").removeClass('checked_apartament');
		}
	});
	jQuery('#apartament_item_8').on('change', function(e){
		if(jQuery("#apartament_item_8").prop("checked")) {
			jQuery("#apartament_wrap_item_8").addClass('checked_apartament');
		} else {
			jQuery("#apartament_wrap_item_8").removeClass('checked_apartament');
			jQuery(".apartment_wrap .apartament_wrap_item").removeClass('checked_apartament');
		}
	});
	jQuery('#apartament_item_9').on('change', function(e){
		if(jQuery("#apartament_item_9").prop("checked")) {
			jQuery("#apartament_wrap_item_9").addClass('checked_apartament');
		} else {
			jQuery("#apartament_wrap_item_9").removeClass('checked_apartament');
			jQuery(".apartment_wrap .apartament_wrap_item").removeClass('checked_apartament');
		}
	});
	jQuery('#apartament_item_10').on('change', function(e){
		if(jQuery("#apartament_item_10").prop("checked")) {
			jQuery("#apartament_wrap_item_10").addClass('checked_apartament');
		} else {
			jQuery("#apartament_wrap_item_10").removeClass('checked_apartament');
			jQuery(".apartment_wrap .apartament_wrap_item").removeClass('checked_apartament');
		}
	});
	jQuery(".apartament_wrap_item label").click(function(event) {
		var textLabel = jQuery(this).text();
		console.log(textLabel);
		jQuery("#name_apartament").text(textLabel);
	});

	// Объекты на карте
	jQuery('#scver').hover(
		function(){
			jQuery("#bulet_scver").css("display", "block");
		},
		function(){
			jQuery("#bulet_scver").css("display", "none");
	});
	jQuery('#sadik').hover(
		function(){
			jQuery("#bulet_sadik").css("display", "block");
		},
		function(){
			jQuery("#bulet_sadik").css("display", "none");
	});
	jQuery('#school').hover(
		function(){
			jQuery("#bulet_school").css("display", "block");
		},
		function(){
			jQuery("#bulet_school").css("display", "none");
	});
	jQuery('#shop').hover(
		function(){
			jQuery("#bulet_shop").css("display", "block");
		},
		function(){
			jQuery("#bulet_shop").css("display", "none");
	});
	jQuery('#club').hover(
		function(){
			jQuery("#bulet_club").css("display", "block");
		},
		function(){
			jQuery("#bulet_club").css("display", "none");
	});
	jQuery('#ozero').hover(
		function(){
			jQuery("#bulet_ozero").css("display", "block");
		},
		function(){
			jQuery("#bulet_ozero").css("display", "none");
	});
});