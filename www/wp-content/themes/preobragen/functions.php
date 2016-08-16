<?php
// Отключение админбара для всех пользователей кроме Администратора
if ( ! current_user_can( 'manage_options' ) ) {
	show_admin_bar( false );
}

// Убираем лишнее из секции head html документа
//add_action('init', 'remove_else_link');

function remove_else_link() {
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'index_rel_link' );
	remove_action( 'wp_head', 'wp_shortlink_wp_head');
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'feed_links_extra', 3 );
}

/**
* Загружаемые скрипты и стили
*/
function load_style_script() {
		// Подключение своих скриптов js и jQuery
		wp_enqueue_script( 'jquery' );
		wp_register_script('vendor', get_template_directory_uri().'/js/vendor.js', array(), '1.0', true);
		wp_enqueue_script('vendor');
		wp_register_script('main', get_template_directory_uri().'/js/main.js', array(), '1.0', true);
		wp_enqueue_script('main');

		// Подключение стилей к шаблону
		wp_enqueue_style('style', get_template_directory_uri().'/style.css');
}
/**
* Загружаем скрипты и стили
*/
add_action('wp_enqueue_scripts', 'load_style_script');
/**
* Поддержка меню
*/
register_nav_menus(array(
	'header_menu' => 'Меню в шапке',
	'footer_menu' => 'Меню в подвале'
));
/**
* Поддержка миниатюр
*/
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size(200, 150);
add_image_size('post-secondary-image-thumbnail', 300, 300);
/**
* Удаление атрибутов heigth и width у картинок
*/
add_filter('post_thumbnail_html', 'remove_width_attribute', 10);
add_filter('image_send_to_editor', 'remove_width_attribute', 10);
 
function remove_width_attribute($html) {
   $html = preg_replace('/(width|height)="\d*"\s/', "", $html);
   return $html;
}