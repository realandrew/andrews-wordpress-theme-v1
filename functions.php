<?php

function followandrew_theme_support() {
  add_theme_support('title-tag'); // Adds dynamic title tag support
  add_theme_support('custom-logo'); // Adds custom logo support
  add_theme_support('post-thumbnails'); // Adds post thumbnails ("featured images") support
}

add_action('after_setup_theme', 'followandrew_theme_support');

function followandrew_menus() {
  $locations = array (
    'primary' => "Primary/Nav Menu",
    'footer' => "Footer/Secondary Menu"
  );
  register_nav_menus($locations);
}

add_action('init', 'followandrew_menus');

function followandrew_register_styles() {
  $version = wp_get_theme()->get('Version');
  wp_enqueue_style('followandrew-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css', array(), '4.4.1', 'all');
  wp_enqueue_style('followandrew-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css', array(), '5.13.0', 'all');
  wp_enqueue_style('followandrew-style', get_template_directory_uri().'/style.css', array('followandrew-bootstrap'), $version, 'all');
}

add_action('wp_enqueue_scripts', 'followandrew_register_styles');

function followandrew_register_scripts() {
  $version = wp_get_theme()->get('Version');
  wp_enqueue_script('followandrew-jquery', 'https://code.jquery.com/jquery-3.4.1.slim.min.js', array(), '3.4.1', true);
  wp_enqueue_script('followandrew-popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', array(), '1.16.0', true);
  wp_enqueue_script('followandrew-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array('followandrew-jquery', 'followandrew-popper'), '4.4.1', true);
  wp_enqueue_script('followandrew-script', get_template_directory_uri().'/assets/js/main.js', array('followandrew-bootstrap'), $version, true);
}

add_action('wp_enqueue_scripts', 'followandrew_register_scripts');

function followandrew_widgets() {
  register_sidebar(array(
    'name' => 'Sidebar Area',
    'id' => 'sidebar-1',
    'description' => 'Sidebar Widget Area',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<ul class="social-list list-inline py-3 mx-auto">',
    'after_title' => '</ul>'
  ));
  register_sidebar(array(
    'name' => 'Footer Area',
    'id' => 'footer-1',
    'description' => 'Footer Widget Area',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => ''
  ));
}

add_action('widgets_init', 'followandrew_widgets');

?>