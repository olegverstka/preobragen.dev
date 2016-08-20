<?php

// ! File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }
$extra_class = array(
	'type' => 'textfield',
	'heading' => esc_html__( 'Extra class name', 'citytours' ),
	'param_name' => 'class',
	'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'citytours' )
);
$content_area = array(
	"type" => "textarea_html",
	"heading" => esc_html__( "Content", 'citytours' ),
	"param_name" => "content",
	"description" => esc_html__( "Enter your content.", 'citytours' ),
	"admin_label" => true,
);

if ( is_admin() ) { 
	wp_register_script( 'ct_vc_custom_js', CT_TEMPLATE_DIRECTORY_URI . '/inc/js_composer/js/custom.js' );
	wp_localize_script( 'ct_vc_custom_js', 'ajaxurl', admin_url( 'admin-ajax.php' ) );
	wp_enqueue_script( 'ct_vc_custom_js' );
	wp_enqueue_style( 'ct_vc_custom_css', CT_TEMPLATE_DIRECTORY_URI . '/inc/js_composer/css/custom.css' );
}

// ! Removing unwanted shortcodes
vc_remove_element("vc_widget_sidebar");
vc_remove_element("vc_wp_search");
vc_remove_element("vc_wp_meta");
vc_remove_element("vc_wp_recentcomments");
vc_remove_element("vc_wp_calendar");
vc_remove_element("vc_wp_pages");
vc_remove_element("vc_wp_tagcloud");
vc_remove_element("vc_wp_custommenu");
vc_remove_element("vc_wp_text");
vc_remove_element("vc_wp_posts");
vc_remove_element("vc_wp_links");
vc_remove_element("vc_wp_categories");
vc_remove_element("vc_wp_archives");
vc_remove_element("vc_wp_rss");
vc_remove_element("vc_gallery");
vc_remove_element("vc_teaser_grid");
// vc_remove_element("vc_btn");
vc_remove_element("vc_cta_button");
vc_remove_element("vc_posts_grid");
vc_remove_element("vc_images_carousel");
vc_remove_element("vc_posts_slider");
vc_remove_element("vc_carousel");
vc_remove_element("vc_message");
vc_remove_element("vc_progress_bar");
// vc_remove_element("vc_row");

vc_add_param("vc_row", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => esc_html__("Is Container", 'citytours'),
	"param_name" => "is_container",
	"value" => array( esc_html__( 'yes', 'citytours' ) => 'yes' ),
	"description" => "This option will add container class to this row. Please check bootstrap container class for more detail.",
	"def" => ""
));

/* reviews Shortcode */
vc_map( array(
	"name" => "Технология",
	"base" => "technology",
	"icon" => "technology",
	"class" => "",
	"category" => "настройки",
	"params" => array(
		array(
			'type' => 'textfield',
			'heading' => "Заголовок технологии",
			'param_name' => 'title_tech',
			'admin_label' => true
		),
		array(
			'type' => 'textfield',
			'heading' => "Текст технологии",
			'param_name' => 'text_tech',
			'admin_label' => true
		),
		array(
			'type' => 'textfield',
			'heading' => "Изображение технологии",
			'param_name' => 'img_tech',
			'admin_label' => true
		),
		$extra_class
	)
) );


// Replace rows and columns classes
function ct_vc_shortcode_css_class( $class_string, $tag, $atts ) {
	if ($tag =='vc_row' || $tag =='vc_row_inner') {
        if ( strpos($class_string, 'inner-container') === false ) {
		$class_string = str_replace('vc_row-fluid', 'row', $class_string);
        }
    }
    if ( $tag == 'vc_row_inner' ) {
		if ( !empty( $atts['add_clearfix'] ) ) {
			$class_string .= ' add-clearfix';
		}
	}

	if ($tag =='vc_column' || $tag =='vc_column_inner') {
		if ( !(function_exists('vc_is_inline') && vc_is_inline()) ) {
            if( preg_match('/vc_col-(\w{2})-(\d{1,2})/', $class_string) ) {
                $class_string = str_replace('vc_column_container', '', $class_string);
            }
			$class_string = preg_replace('/vc_col-(\w{2})-(\d{1,2})/', 'col-$1-$2', $class_string);
			$class_string = preg_replace('/vc_hidden-(\w{2})/', 'hidden-$1', $class_string);
		}
	}

	return $class_string;
}

add_filter('vc_shortcodes_css_class', 'ct_vc_shortcode_css_class', 10, 3);
