<?php

/**
 * Functions page
 *
* @author       dvlpr
 * @package      Wordpress
 * @subpackage   northeast
 * @version      1.0
 * @since        1.0
 */



//===================
// Enqueue scripts and styles.
//===================
function theme_scripts() {
  $include_url = get_template_directory_uri();
  $include_url = str_replace('https://', '//', $include_url);

  // dev script
  wp_enqueue_script('starter_theme-scripts-dev', 'http://localhost:8080/site.js');

  // problemen met docker, later even chique maken
 // wp_enqueue_style('theme-css', $include_url.'/assets/main.css', array(), date("is"), false);
 // wp_enqueue_script('theme-appjs', $include_url .'/assets/main.js', array(), date("is"), true );
  
  // load assets (prod)
  // wp_enqueue_style('starter_theme-style', get_template_directory_uri() . '/dist/site.css');
  // wp_enqueue_script('starter_theme-scripts', get_template_directory_uri() . '/dist/site.js');
  // wp_enqueue_script('starter_theme-admin-scripts', get_template_directory_uri() . '/dist/admin.js');

}

add_action( 'wp_enqueue_scripts', 'theme_scripts' );

//===================
// Includes folder includes
//===================
require_once('inc/includes.php');
