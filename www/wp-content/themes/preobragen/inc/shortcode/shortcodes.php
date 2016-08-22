<?php
/*
 * Shortcodes Class
 */
if ( ! class_exists( 'MWShortcodes') ) :
class MWShortcodes {

	public $shortcodes = array(
		"container",
		"row",
		"column",
		"one_half",
		"one_third",
		"one_fourth",
		"two_third",
		"three_fourth",
		"blockquote",
		"button",
		"banner",
		"checklist",
		"icon_box",
		"tabs",
		"tab",
		"tooltip",
		"toggles",
		"toggle",
		"review",
		"icon_list",
		"pricing_table",
		"parallax_block",
		"technology",
		"infrastructure",
		"improvement",
		"document"
	 );

	function __construct() {
		add_action( 'init', array( $this, 'add_shortcodes' ) );
		add_filter('the_content', array( $this, 'filter_eliminate_autop' ) );
		add_filter('widget_text', array( $this, 'filter_eliminate_autop' ) );
	}

	/* ***************************************************************
	* **************** Remove AutoP tags *****************************
	* **************************************************************** */
	function filter_eliminate_autop( $content ) {
		$block = join( "|", $this->shortcodes );

		// replace opening tag
		$content = preg_replace( "/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/", "[$2$3]", $content );

		// replace closing tag
		$content = preg_replace( "/(<p>)?\[\/($block)](<\/p>|<br \/>)/", "[/$2]", $content );
		return $content;
	}

	/* ***************************************************************
	* **************** Add Shortcodes ********************************
	* **************************************************************** */
	function add_shortcodes() {
		foreach ( $this->shortcodes as $shortcode ) {
			$function_name = 'shortcode_' . $shortcode ;
			add_shortcode( $shortcode, array( $this, $function_name ) );
		}
	}

	/* ***************************************************************
	* *************** Grid System ************************************
	* **************************************************************** */
	//shortcode container
	function shortcode_container( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'class' => ''
		), $atts ) );

		$class = empty( $class )?'':( ' ' . $class );
		$result = '<div class="container' . esc_attr( $class ) . '">';
		$result .= do_shortcode( $content );
		$result .= '</div>';
		return $result;
	}

	//shortcode row
	function shortcode_row( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'class' => ''
		), $atts ) );

		$class = empty( $class )?'':( ' ' . $class );
		$result = '<div class="row' . esc_attr( $class ) . '">';
		$result .= do_shortcode( $content );
		$result .= '</div>';
		return $result;
	}


	//shortcode column
	function shortcode_column( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'lg'        => '',
			'md'        => '',
			'sms'        => '',
			'sm'        => '',
			'xs'        => '',
			'lgoff'        => '',
			'mdoff'        => '',
			'smsoff'        => '',
			'smoff'        => '',
			'xsoff'        => '',
			'lghide'    => '',
			'mdhide'    => '',
			'smshide'    => '',
			'smhide'    => '',
			'xshide'    => '',
			'lgclear'    => '',
			'mdclear'    => '',
			'smsclear'    => '',
			'smclear'    => '',
			'xsclear'    => '',
			'class'        => ''
		), $atts ) );

		$devices = array( 'lg', 'md', 'sm', 'sms', 'xs' );
		$classes = array();
		foreach ( $devices as $device ) {

			//grid column class
			if ( ${$device} != '' ) $classes[] = 'col-' . $device . '-' . ${$device};

			//grid offset class
			$device_off = $device . 'off';
			if ( ${$device_off} != '' ) $classes[] = 'col-' . $device . '-offset-' . ${$device_off};

			//grid hide class
			$device_hide = $device . 'hide';
			if ( ${$device_hide} == 'yes' ) $classes[] =  'hidden-' . $device;

			//grid clear class
			$device_clear = $device . 'clear';
			if ( ${$device_clear} == 'yes' ) $classes[] = 'clear-' . $device;

		}
		if ( ! empty( $class ) ) $classes[] = $class;

		$result = '<div class="' . esc_attr(  implode(' ', $classes) ) . '">';
		$result .= do_shortcode($content);
		$result .= '</div>';

		return $result;
	}

	//shortcode one_half
	function shortcode_one_half( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'class' => '',
			'offset' => 0,
		), $atts ) );

		$class = empty( $class )?'':( ' ' . $class );
		if ( $offset != 0 ) $class .= ' col-sm-offset-' . $offset;
		
		$result = '<div class="col-sm-6' . esc_attr( $class ) . ' one-half">';
		$result .= do_shortcode($content);
		$result .= '</div>';

		return $result;
	}

	//shortcode one_third
	function shortcode_one_third( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'class' => '',
			'offset' => 0,
		), $atts ) );

		$class = empty( $class )?'':( ' ' . $class );
		if ( $offset != 0 ) $class .= ' col-sm-offset-' . $offset;
		
		$result = '<div class="col-sm-4' . esc_attr( $class ) . ' one-third">';
		$result .= do_shortcode($content);
		$result .= '</div>';

		return $result;
	}

	//shortcode two_third
	function shortcode_two_third( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'class' => '',
			'offset' => 0,
		), $atts ) );

		$class = empty( $class )?'':( ' ' . $class );
		if ( $offset != 0 ) $class .= ' col-sm-offset-' . $offset;
		
		$result = '<div class="col-sm-8' . esc_attr( $class ) . ' two-third">';
		$result .= do_shortcode($content);
		$result .= '</div>';

		return $result;
	}

	//shortcode one_fourth
	function shortcode_one_fourth( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'class' => '',
			'offset' => 0,
		), $atts ) );

		$class = empty( $class )?'':( ' ' . $class );
		if ( $offset != 0 ) $class .= ' col-sm-offset-' . $offset;
		
		$result = '<div class="col-sm-3 ' . esc_attr( $class ) . ' one-fourth">';
		$result .= do_shortcode($content);
		$result .= '</div>';

		return $result;
	}

	//shortcode three_fourth
	function shortcode_three_fourth( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'class' => '',
			'offset' => 0,
		), $atts ) );

		$class = empty( $class )?'':( ' ' . $class );
		if ( $offset != 0 ) $class .= ' col-sm-offset-' . $offset;
		
		$result = '<div class="col-sm-9 ' . esc_attr( $class ) . ' three-fourth">';
		$result .= do_shortcode($content);
		$result .= '</div>';

		return $result;
	}

	/* ***************************************************************
	* **************** Blockquote Shortcode **************************
	* **************************************************************** */
	function shortcode_blockquote( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'class' => ''
		), $atts) );

		$class = empty( $class )?'':( ' ' . $class );
		$result = '';
		$result .= '<blockquote class="' . esc_attr( 'styled' . $class ) . '">';
		$result .= do_shortcode( $content );
		$result .= '</blockquote>';

		return $result;
	}

	/* ***************************************************************
	* **************** Button Shortcode **************************
	* **************************************************************** */
	function shortcode_button( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'class' => '',
			'style' => '',
			'size' => '',
			'target' => '_self', //available values 5 ( _blank|_self|_parent|_top|framename )
			'link' => '#',
		), $atts) );

		$class = empty( $class )?'':( ' ' . $class );
		$styles = array( 'outline', 'white', 'green' );
		$sizes = array( 'medium', 'full' );
		if ( ! in_array( $style, $styles ) ) $style = '';
		if ( ! in_array( $size, $sizes ) ) $size = '';
		if ( $size == 'full' ) $size = 'btn-full';
		$classes = array( 'btn_1' );
		if ( ! empty( $style ) ) $classes[] = $style;
		if ( ! empty( $size ) ) $classes[] = $size;
		if ( ! empty( $class ) ) $classes[] = $class;
		
		$result = '';
		$result .= '<a href="' . esc_url( $link ) . '" class="' . esc_attr( implode( ' ', $classes ) ) . '" target="' . esc_attr( $target ) . '">';
		$result .= do_shortcode( $content );
		$result .= '</a>';

		return $result;
	}

	/* ***************************************************************
	* **************** Banner Shortcode **************************
	* **************************************************************** */
	function shortcode_banner( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'class' => '',
			'style' => '',
		), $atts) );

		$class = empty( $class )?'':( ' ' . $class );
		$styles = array( 'colored' );
		if ( ! in_array( $style, $styles ) ) $style = '';
		$result = '';
		$result .= '<div class="banner ' . esc_attr( $style . $class ) . ' ">';
		$result .= do_shortcode( $content );
		$result .= '</div>';

		return $result;
	}

	/* ***************************************************************
	* **************** Check List Shortcode *****************************
	* **************************************************************** */
	function shortcode_checklist($atts, $content = null) {

		extract( shortcode_atts( array(
			'class' => '',
		), $atts) );

		$class = empty( $class )?'':( ' ' . $class );
		$class = 'list_ok' . $class;
		$result = str_replace( '<ul>', '<ul class="' . esc_attr( $class ) . '">', $content);
		$result = str_replace( '<li>', '<li>', $result);
		$result = do_shortcode( $result );

		return $result;
	}

	/* ***************************************************************
	* **************** Icon Box Shortcode *****************************
	* **************************************************************** */
	function shortcode_icon_box($atts, $content = null) {

		extract( shortcode_atts( array(
			'class' => '',
			'icon_class' => '',
			'style' => '',
		), $atts) );

		$styles = array( 'style2', 'style3' );
		if ( ! in_array( $style, $styles ) ) $style = '';
		$class = empty( $class )?'':( ' ' . $class );
		$class = 'ct-icon-box ' . $style . $class;
		$result = '';
		$result .= '<div class="' . esc_attr( $class ) . '">';
		if ( ! empty( $icon_class ) ) :
			$result .= '<i class="' . esc_attr( $icon_class ) . '"></i>';
		endif;
		$result .= do_shortcode( $content );
		$result .= '</div>';

		return $result;
	}

	/* ***************************************************************
	* **************** Tabs Shortcode ********************************
	* **************************************************************** */
	function shortcode_tabs($atts, $content = null) {
		$variables = array( 'active_tab_index' => '1', 'class'=>'' );
		extract( shortcode_atts( $variables, $atts ) );

		$result = '';

		preg_match_all( '/\[tab(.*?)]/i', $content, $matches, PREG_OFFSET_CAPTURE );
		$tab_titles = array();

		if ( isset( $matches[0] ) ) {
			$tab_titles = $matches[0];
		}
		if ( count( $tab_titles ) ) {

			$result .= sprintf( '<div class="%s"><ul class="nav nav-tabs">', esc_attr( $class ) );
			$uid = uniqid();
			foreach ( $tab_titles as $i => $tab ) {
				preg_match( '/title="([^\"]+)"/i', $tab[0], $tab_matches, PREG_OFFSET_CAPTURE );
				if ( isset( $tab_matches[1][0] ) ) {
					$active_class = '';
					$active_attr = '';
					if ( $active_tab_index - 1 == $i ) {
						$active_class = ' class="active"';
						$active_attr = ' active="true"';
					}

					$result .= '<li '. $active_class . '><a href="' . esc_url( '#' . $uid . $i ) . '" data-toggle="tab">' . esc_html( $tab_matches[1][0] ) . '</a></li>';

					$before_content = substr($content, 0, $tab[1]);
					$current_content = substr($content, $tab[1]);
					$current_content = preg_replace('/\[tab/', '[tab id="' . $uid . $i . '"' . $active_attr, $current_content, 1);
					$content = $before_content . $current_content;
				}
			}
			$result .= '</ul>';
			$result .= '<div class="tab-content">';
			$result .= do_shortcode( $content );
			$result .= '</div>';
			$result .= '</div>';
		} else {
			$result .= do_shortcode( $content );
		}

		return $result;
	}

	/* ***************************************************************
	* **************** Tab Shortcode ********************************
	* **************************************************************** */
	function shortcode_tab($atts, $content = null) {
		extract( shortcode_atts( array(
			'title' => '',
			'id'	=> '',
			'active'=> '',
			'class' => ''
		), $atts) );

		$classes = array( 'tab-pane' );
		if ( $active == 'true' || $active == 'yes' ) {
			$classes[] = 'active';
		}
		if ( $class != '' )  {
			$classes[] = $class;
		}
		return sprintf( '<div id="%s" class="%s">%s</div>',
			esc_attr( $id ),
			esc_attr( implode(' ', $classes) ),
			do_shortcode( $content )
		);
	}

	/* ***************************************************************
	* **************** ToolTip Shortcode *****************************
	* **************************************************************** */
	function shortcode_tooltip($atts, $content = null) {
		extract( shortcode_atts( array(
			'title' => '',
			'style' => '',
			'effect' => 1,
			'position' => 'top',
			'class' => ''
		), $atts) );

		if ( $style == 'advanced' ) {
			$effects = array( 1, 2, 3, 4 );
			if ( ! in_array( $effect, $effects ) ) $effect = 1;
			$classes = array( 'tooltip_styled', 'tooltip-effect-' . esc_attr( $effect ) );
			if ( $class != '' ) { $classes[] = $class; }
			$result = sprintf( '<div class="%s"><span class="tooltip-item">%s</span><div class="tooltip-content">', esc_attr( implode(' ', $classes) ), do_shortcode( $content ) );
			$result .= esc_html( $title );
			$result .= '</div></div>';
		} else {
			$classes = array( 'tooltip-1' );
			if ( $class != '' ) { $classes[] = $class; }
			$positions = array( 'top', 'bottom', 'left', 'right' );
			if ( ! in_array( $position, $positions ) ) $position = 'top';
			$result = '';
			$result .= sprintf( '<a href="#" class="%s" data-placement="%s" title="%s">', esc_attr( implode(' ', $classes) ), esc_attr( $position ), esc_attr( $title ) );
			$result .= do_shortcode( $content );
			$result .= '</a>';
		}

		return $result;
	}

	// toggles
	public $toggles_index = 1; //to generate unique accordion id
	public $toggles_type = 'toggle'; //toggle type ( accordion|toggle )

	/* ***************************************************************
	* **************** toggles Shortcode *****************************
	* **************************************************************** */
	function shortcode_toggles( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'toggle_type'	=> 'accordion',
			'class' 		=> ''
		), $atts ) );

		$this->toggles_type = $toggle_type;
		$classes = array( 'panel-group' );
		if ( $class != '' ) { $classes[] = $class; }
		$result = '<div class="' . esc_attr( implode( ' ', $classes ) ) . '" id="toggles-' . $this->toggles_index . '">';
		$result .= do_shortcode( $content );
		$result .= "</div>";
		$this->toggles_index++;
		return $result;
	}

	/* ***************************************************************
	* **************** toggle Shortcode ******************************
	* **************************************************************** */
	function shortcode_toggle( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'title'		=> '',
			'active' => 'no',
			'class' 	=> ''
		), $atts ) );

		static $toggle_id = 1;

		$data_parent = '';
		if ( $this->toggles_type == "accordion" ) {
			$data_parent = ' data-parent="#toggles-' . $this->toggles_index . '"';
		}

		$result = '';
		$class = 'panel panel-default' . (empty( $class ) ? '': ( ' ' . $class ));
		$class_in = ( $active === 'yes') ? ' in':'';
		$class_collapsed = ( $active === 'yes') ? '' : ' collapsed';
		$class_icon = ( $active === 'yes') ? 'icon-minus' : 'icon-plus';

		$result .= '<div class="' . esc_attr( $class ) . '"><div class="panel-heading">';
		$result .= '<h4 class="panel-title"><a class="accordion-toggle' . $class_collapsed . '" href="#toggle-' . $toggle_id . '" data-toggle="collapse"' . $data_parent . '>';
		$result .= esc_html( $title ) . '<i class="indicator pull-right ' . $class_icon . '"></i></a></h4></div>';
		$result .= '<div class="panel-collapse collapse' . $class_in . '" id="toggle-' . $toggle_id . '"><div class="panel-body"><p>';
		$result .= do_shortcode( $content );
		$result .= '</p></div></div></div>';

		$toggle_id++;

		return $result;
	}
	/* ***************************************************************
	* **************** technology Shortcode ******************************
	* **************************************************************** */
	function shortcode_technology( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'title_tech'		=> '',
				'text_tech'         => '',
				'img_tech'      	=> ''
		), $atts ) );

		$result = "";

		$result .= '<div class="row">';
		$result .= '<div class="item_snip">';
		$result .= '<div class="col-md-1"><img src="'. $img_tech .'" alt=""></div>';
		$result .= '<div class="col-md-11"><h3>'. $title_tech .'</h3><p>'. $text_tech .'</p></div>';
		$result .= '</div><!-- .item_snip -->';
		$result .= '</div>';

		return $result;
	}
	/* ***************************************************************
	* **************** Infrastructure Shortcode ******************************
	* **************************************************************** */
	function shortcode_infrastructure( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'title_infstr'		=> '',
				'text_infstr'       => '',
				'img_infstr'     	=> ''
		), $atts ) );

		$result = "";
		$result .= '<div class="col-md-3">';
		$result .= '<div class="item_too">';
		$result .= '<div class="img_too"><img src="'. $img_infstr .'" alt=""></div>';
		$result .= '<h3>'. $title_infstr .'</h3><p>'. $text_infstr .'</p>';
		$result .= '</div>';
		$result .= '</div>';

		return $result;
	}

	/* ***************************************************************
	* **************** Improvement Shortcode ******************************
	* **************************************************************** */
	function shortcode_improvement( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'title'		=> '',
				'class'         => '',
		), $atts ) );

		$result = '';
		$result .= '<div class="improvement '.$class.'">';
		$result .= '<div class="item_left">';
		$result .= '<i></i>';
		$result .= '</div>';
		$result .= '<div class="item_right">';
		$result .= '<p>'.$title.'</p>';
		$result .= '</div>';
		$result .= '</div>';

		return $result;
	}
	/* ***************************************************************
	* **************** Document Shortcode ******************************
	* **************************************************************** */
	function shortcode_document( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'title'		=> '',
				'class'     => '',
				'link'      => ''
		), $atts ) );

		$result = '';
		$result .= '<div class="col-md-3">';
		$result .= '<div class="doc_item">';
		$result .= '<div class="doc_item_wrap">';
		$result .= '<a target="_blank" href="'. $link .'"><i class="demo-icon '. $class .'"></i>'. $title .'</a>';
		$result .= '</div>';
		$result .= '</div>';
		$result .= '</div>';

		return $result;
	}
}
endif;