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
  if($_SERVER['SERVER_NAME'] == '127.0.0.1'){
    // dev
    wp_enqueue_script('starter_theme-scripts-dev', 'http://localhost:8080/site.js');
  }
  else 
  {
    $include_url = get_template_directory_uri();
    $include_url = str_replace('https://', '//', $include_url);
    
    //live
    wp_enqueue_style('theme-css', $include_url.'/assets/site.css', array(), date("is"), false);
    wp_enqueue_script('theme-appjs', $include_url .'/assets/site.js', array(), date("is"), true ); 
  }

}

add_action( 'wp_enqueue_scripts', 'theme_scripts' );

//===================
// Includes folder includes
//===================
require_once('inc/includes.php');
