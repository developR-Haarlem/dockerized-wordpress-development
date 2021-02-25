<?php
//===================
// Add theme support
//===================
function theme_name_setup() {
	add_theme_support( 'align-wide' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_post_type_support( 'page', 'excerpt' );
}
add_action( 'after_setup_theme', 'theme_name_setup' );

# CLEANUP
function dvlpr_clean_header() {
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
  }
  add_action( 'init', 'dvlpr_clean_header' );


add_filter( 'style_loader_src', 'dvlpr_remove_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'dvlpr_remove_ver_css_js', 9999 );

 function dvlpr_remove_ver_css_js( $src ){
	// hide wp version, but allow voor main css en js 
	if ( strpos( $src, 'ver=' ) && !strpos( $src, 'main') )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}

add_action( 'admin_menu', 'dvlpr_remove_menus' );
function dvlpr_remove_menus(){
  remove_menu_page( 'edit.php' );
  remove_menu_page( 'edit-comments.php' );
}

function remove_dashboard_widgets(){
	global $wp_meta_boxes;
  
	unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now'] );
	unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press'] );
	unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_primary'] );
	update_user_meta( get_current_user_id(), 'show_welcome_panel', false );
	remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
	remove_meta_box( 'rg_forms_dashboard', 'dashboard', 'side' );
  }
  add_action( 'wp_dashboard_setup', 'remove_dashboard_widgets' );

//disable gutenberg
add_filter('use_block_editor_for_post', '__return_false', 10);
add_filter('use_block_editor_for_post_type', '__return_false', 10);
function smartwp_remove_wp_block_library_css(){
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-block-style' ); // Remove WooCommerce block CSS
} 
add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 );

function defer_parsing_of_js( $url ) {
	if ( is_user_logged_in() ) return $url; //don't break WP Admin
	if ( FALSE === strpos( $url, '.js' ) ) return $url;
	// if ( strpos( $url, 'jquery.js' ) ) return $url;
	return str_replace( ' src', ' defer src', $url );
}
add_filter( 'script_loader_tag', 'defer_parsing_of_js', 10 );