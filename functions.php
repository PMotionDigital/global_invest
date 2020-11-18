<?php

include 'func/func-user-sort.php'; // подключаем сортировку юзеров в админке

add_action('wp_enqueue_scripts', 'theme_media');
// add_action('wp_print_styles', 'theme_name_scripts'); // можно использовать этот хук он более поздний
function theme_media()
{
	wp_enqueue_style('main-css', get_template_directory_uri() . '/static/css/main.min.css"');

	//wp_enqueue_script('common-js', get_template_directory_uri() . '/static/js/main.min.js', array('jquery'), '1.0.0', true);
	//wp_enqueue_script('add-js', get_template_directory_uri() . '/static/js/add.js', array('jquery'), '1.0.0', true);
}

add_filter('excerpt_length', function () {
	return 20;
});

add_theme_support( 'menus' );

add_action('wp_enqueue_scripts', 'remove_some_stylesheet', 20);


add_filter('woocommerce_enqueue_styles', '__return_empty_array');


function remove_some_stylesheet()
{
	wp_dequeue_style('flexslider');
	wp_dequeue_style('owl-carousel');
	wp_dequeue_style('owl-theme');
	wp_dequeue_style('font-awesome');
	wp_dequeue_style('wp-pagenavi');

	wp_deregister_script('flexslider');
	wp_deregister_script('googlemapapis');
	wp_deregister_script('easing');
	wp_deregister_script('jflickrfeed');
	wp_deregister_script('playlist');
	wp_deregister_script('jplayer');
}

function mytheme_add_woocommerce_support()
{
	add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'mytheme_add_woocommerce_support');

function remove_admin_login_header()
{
	remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_admin_login_header');

//add_filter('show_admin_bar', '__return_false');

add_theme_support('post-thumbnails'); // для всех типов постов



add_filter('upload_mimes', 'wpuf_allow_x_rar', 10, 2);

function wpuf_allow_x_rar($t, $user)
{
	$t['rar'] = 'application/x-rar';
	$t['rar'] = 'application/x-rar-compressed';
	return $t;
}

add_action('after_setup_theme', 'theme_register_nav_menu');
function theme_register_nav_menu(){
	register_nav_menu('primary', 'Главное меню');
}

add_action('after_setup_theme', 'theme_register_profile_menu');
function theme_register_profile_menu(){
	register_nav_menu('profile', 'Меню профиль');
}

add_action('after_setup_theme', 'theme_register_footer_menu');
function theme_register_footer_menu(){
	register_nav_menu('footer', 'Меню в футере');
}

add_action('after_setup_theme', 'theme_register_category_menu');
function theme_register_category_menu(){
	register_nav_menu('category', 'Меню в категориях');
}

add_action('after_setup_theme', 'theme_register_mobile_menu');
function theme_register_mobile_menu(){
	register_nav_menu('mobile', 'Меню мобильное');
}

function my_myme_types($mime_types)
{
	$mime_types['svg'] = 'image/svg+xml'; // поддержка SVG
	return $mime_types;
}
add_filter('upload_mimes', 'my_myme_types', 1, 1);


if (function_exists('acf_add_options_page')) {

	acf_add_options_page(array(
		'page_title'  => 'Контактные данные',
		'menu_title'  => 'Контактные данные',
		'menu_slug'   => 'theme-contacts-settings',
		'capability'  => 'edit_posts',
		'redirect'    => false
	));

	acf_add_options_page(array(
		'page_title'  => 'Блок актуальных акций',
		'menu_title'  => 'Блок актуальных акций',
		'menu_slug'   => 'actual-promotion-block',
		'capability'  => 'edit_posts',
		'redirect'    => false
	));

	acf_add_options_page(array(
		'page_title'  => 'Меню сайта',
		'menu_title'  => 'Меню сайта',
		'menu_slug'   => 'general-menu',
		'capability'  => 'edit_posts',
		'redirect'    => false
	));

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title' 	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability' 	=> 'edit_posts',
		'redirect' 	=> false
	));

}

// wp nav custom

// add_filter( 'nav_menu_css_class', 'wpse_menu_item_id_class', 10, 2 ); 
// wp_nav_menu( $args );
// remove_filter( 'nav_menu_css_class', 'wpse_menu_item_id_class', 10, 2 );
// function wpse_menu_item_id_class( $classes, $item )
// {
//     if( isset( $item->object_id ) )
//         $classes[] = sprintf( 'wpse-object-id-%d', $item->object_id );

//     return $classes;
// }


// on send ok

add_action( 'wp_footer', 'mycustom_wp_footer' );
 
function mycustom_wp_footer() {
?>
	<script type="text/javascript">
        function noteForm () {
            setTimeout(function(){
                jQuery('#note_form .note_form-text').text(jQuery('.wpcf7-response-output').text());
                jQuery('#note_form').addClass('show');
            }, 500);   

            setTimeout(function(){
                jQuery('#note_form').removeClass('show');
                
            }, 5500); 
        }
        document.addEventListener('wpcf7mailsent', function(event) {
			noteForm();
        }, false);
        document.addEventListener('wpcf7invalid', function(event) {
            noteForm();
        }, false);
        document.addEventListener('wpcf7spam', function(event) {
            noteForm();
        }, false);
        document.addEventListener('wpcf7mailfailed', function(event) {
            noteForm();
        }, false);
        document.addEventListener('wpcf7submit', function(event) {
			noteForm();
			
        }, false);
    </script>
    <?php
}

// add_filter('pll_get_post_types', 'fixwp_add_acf_pll', 10, 2);
// function fixwp_add_acf_pll( $post_types, $is_settings ) {
//     $post_types[] = 'acf';
//     return $post_types;
// }


add_filter( 'auth_cookie_expiration',  'cookie_expiration_new', 20, 3 );
function cookie_expiration_new ( $expiration, $user_id, $remember ) {
	// Время жизни cookies для администратора
	if ( $remember && user_can( $user_id, 'manage_options' ) ) {
		// Если установлена галочка
		if ( $remember == true ) {
			return 20 * DAY_IN_SECONDS;
		}
		// Если не установлена
		return 5 * DAY_IN_SECONDS;
	}
	// Для всех остальных пользователей
	// Если установлена галочка
	if ( $remember == true ) {
		return DAY_IN_SECONDS / 24;
	}
	// Если не установлена
	return DAY_IN_SECONDS / 24;
}
// includes functions 
include 'func/func-stocks.php';
include 'func/func-login.php';
include 'func/func-profile-page.php';
include 'func/func-upload.php';
include 'func/func-profile-payments.php';


// автообновление версии файлов

function enqueue_versioned_script($handle, $src = false, $deps = array(), $in_footer = false)
{
	wp_enqueue_script($handle, get_template_directory_uri() . $src, $deps, filemtime(get_template_directory() . $src), $in_footer);
}

function enqueue_versioned_style($handle, $src = false, $deps = array(), $media = 'all')
{
	wp_enqueue_style($handle, get_template_directory_uri() . $src, $deps = array(), filemtime(get_template_directory() . $src), $media);
}

function themename_scripts()
{
	enqueue_versioned_style('my-theme-style', $theme_uri . '/dist/css/production.min.css');
	enqueue_versioned_script('my-theme-script', $theme_uri . '/dist/js/production.min.js', array('jquery'), true);
}

add_action('wp_enqueue_scripts', 'themename_scripts');
