<?php
// Опции темы
include('functions/settings.php');
// Отключение админбара для всех пользователей кроме Администратора
if ( ! current_user_can( 'manage_options' ) ) {
	show_admin_bar( false );
}
define( 'MW_INC_DIR', get_template_directory() . '/inc' );

require_once( MW_INC_DIR . '/shortcode/init.php' );
require_once( MW_INC_DIR . '/js_composer/init.php' );
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
/*
 * Хлебные крошки для WordPress (breadcrumbs)
 *
 * $sep  - разделитель. По умолчанию ' » '
 * $l10n - массив. для локализации. См. переменную $l10n_def.
 * $args - массив. дополнительные аргументы.
 * version 0.4
*/
function kama_breadcrumbs( $sep = 0, $l10n = array(), $args = array() ){
	global $post, $wp_query, $wp_post_types;

	// для локализации
	$l10n_def = array(
			'home'       => 'Главная',
			'paged'      => 'Страница %s',
			'_404'       => 'Ошибка 404',
			'search'     => 'Результаты поиска по запросу - <b>%s</b>',
			'author'     => 'Архив автора: <b>%s</b>',
			'year'       => 'Архив за <b>%s</b> год',
			'month'      => 'Архив за: <b>%s</b>',
			'day'        => '',
			'attachment' => 'Медиа: %s',
			'tag'        => 'Записи по метке: <b>%s</b>',
			'tax_tag'    => '%s из "%s" по тегу: <b>%s</b>',
	);

	$args_def = array(
			'on_front_page'   => true, // выводить крошки на главной странице
			'show_post_title' => '<li>%s</li>', // показывать ли название записи в конце (последний элемент). Для записей, страниц, вложений
	);

	$loc  = (object) array_merge( $l10n_def, $l10n );
	$args = (object) array_merge( $args_def, $args );

	if( $sep === 0 ) $sep = ' » ';

	$w1 = '<ul class="breadcrumbs">';
	$w2 = '</ul>';
	$patt1 = '<li><a href="%s">';
	$sep .= '</li>'; // закрываем span после разделителя!
	$link = $patt1.'%s</a>';
	$last = '<li class="active">';
	$last_text = '</li>';

	$pg_end = '';
	if( $paged = $wp_query->query_vars['paged'] ){
		$pg_patt = $patt1;
		$pg_end = '</a>'. $sep . sprintf( $loc->paged, $paged );
	}

	$out = '';
	if( is_front_page() ){
		return $args->on_front_page ? (print $w1 .( $paged ? sprintf( $pg_patt, get_bloginfo('url') ) : '' ) . $loc->home . $pg_end . $w2) : '';
	}
	elseif( is_404() ){
		$out = $last . $loc->_404 . $last_text;
	}
	elseif( is_search() ){
		$out = sprintf( $loc->search, strip_tags( $GLOBALS['s'] ) );
	}
	elseif( is_author() ){
		$q_obj = &$wp_query->queried_object;
		$out = ( $paged ? sprintf( $pg_patt, get_author_posts_url( $q_obj->ID, $q_obj->user_nicename ) ):'') . sprintf( $loc->author, $q_obj->display_name ) . $pg_end;
	}
	elseif( is_year() || is_month() || is_day() ){
		$y_url  = get_year_link( $year=get_the_time('Y') );
		$m_url  = get_month_link( $year, get_the_time('m') );
		$y_link = sprintf( $link, $y_url, $year);
		$m_link = sprintf( $link, $m_url, get_the_time('F'));
		if( is_year() )
			$out = ( $paged?sprintf( $pg_patt, $y_url):'') . sprintf( $loc->year, $year ) . $pg_end;
		elseif( is_month() )
			$out = $y_link . $sep . ( $paged ? sprintf( $pg_patt, $m_url ) : '') . sprintf( $loc->month, get_the_time('F') ) . $pg_end;
		elseif( is_day() ){
			$out = $y_link . $sep . $m_link . $sep . get_the_time('l');
		}
	}

	// Страницы и древовидные типы записей
	elseif( $wp_post_types[ $post->post_type ]->hierarchical ){
		$parent = $post->post_parent;
		$crumbs = array();
		while( $parent ){
			$page = & get_post( $parent );
			$crumbs[] = sprintf( $link, get_permalink( $page->ID ), $page->post_title );
			$parent = $page->post_parent;
		}
		$crumbs = array_reverse( $crumbs );

		foreach( $crumbs as $crumb ) $out .= $crumb . $sep;

		$out = $out . $last . ( $args->show_post_title ? $post->post_title : '') . $last_text;
	}
	// Таксономии, вложения и не древовидные типы записей
	else
	{
		// Определяем термины
		if( is_singular() ){
			if( ! $taxonomies ){
				$taxonomies = get_taxonomies( array('hierarchical' => true, 'public' => true) );
				if( count( $taxonomies ) == 1 ) $taxonomies = 'category';
			}
			if( $term = get_the_terms( $post->post_parent ? $post->post_parent : $post->ID, $taxonomies ) ){
				$term = array_shift( $term );
			}
		}
		else
			$term = $wp_query->get_queried_object();

		//if( ! $term && ! is_attachment() ) return print "Error: Taxonomy is not defined!";

		if( $term ){
			$pg_term_start = ( $paged && $term->term_id ) ? sprintf( $pg_patt, get_term_link( (int) $term->term_id, $term->taxonomy ) ) : '';

			if( is_attachment() ){
				if( ! $post->post_parent )
					$out = sprintf( $loc->attachment, $post->post_title );
				else
					$out = __crumbs_tax( $term->term_id, $term->taxonomy, $sep, $link ) . sprintf( $link, get_permalink( $post->post_parent ), get_the_title( $post->post_parent ) ) . $sep . $last . ( $args->show_post_title ? $post->post_title : '') . $last_text;
			}
			elseif( is_single() ){
				$out = __crumbs_tax( $term->parent, $term->taxonomy, $sep, $link ) . sprintf( $link, get_term_link( (int) $term->term_id, $term->taxonomy ), $term->name ). $sep . $last . ( $args->show_post_title ? $post->post_title : '') . $last_text;
				// Метки, архивная страница типа записи, произвольные одноуровневые таксономии
			}
			elseif( ! is_taxonomy_hierarchical( $term->taxonomy ) ){
				// метка
				if( is_tag() ) {
					$out = $pg_term_start . $last  . sprintf( $loc->tag, $term->name ) . $pg_end . $last_text;
				}
				// таксономия
				elseif( is_tax() ){
					$post_label = $wp_post_types[ $post->post_type ]->labels->name;
					$tax_label = $GLOBALS['wp_taxonomies'][ $term->taxonomy ]->labels->name;
					$out = $pg_term_start . sprintf( $loc->tax_tag, $post_label, $tax_label, $term->name ) .  $pg_end;
				}
			}
			// Рубрики и таксономии
			else
				$out = __crumbs_tax( $term->parent, $term->taxonomy, $sep, $link ) . $pg_term_start . $last . $term->name . $pg_end . $last_text;
		}
	}

	// замена ссылки на архивную страницу для типа записи
	$home_after = apply_filters('kama_breadcrumbs_home_after', false );

	// ссылка на архивную страницу произвольно типа поста
	if( isset( $post->post_type ) && ! in_array( $post->post_type, array('post','page','attachment') ) ){
		$pt_name = $wp_post_types[ $post->post_type ]->labels->name;
		$pt_url  = get_post_type_archive_link( $post->post_type );
		$home_after = ( is_post_type_archive() && ! $paged ) ? $pt_name : ( sprintf( $link, $pt_url, $pt_name ). ($pg_end?$pg_end:$sep) );
	}


	$home = sprintf( $link, home_url(), $loc->home ). $sep . $home_after;

	return print apply_filters('kama_breadcrumbs', $w1. $home . $out .$w2 );
}
function __crumbs_tax( $term_id, $tax, $sep, $link ){
	$termlink = array();
	while( (int) $term_id ){
		$term2      = get_term( $term_id, $tax );
		$termlink[] = sprintf( $link, get_term_link( (int) $term2->term_id, $term2->taxonomy ), $term2->name ). $sep;
		$term_id    = (int) $term2->parent;
	}

	$termlinks = array_reverse( $termlink );

	return implode('', $termlinks );
}