<?php 

function subscribe_redirect(){
  	if( is_admin() && !defined('DOING_AJAX') && ( current_user_can('subscriber') ) ){
    	wp_redirect(home_url());
    	exit;
  	}
}
function disable_admin_bar() { 
    if ( current_user_can('subscriber') ) {
        add_filter('show_admin_bar', '__return_false'); 
    }
}

function redirect_after_logout(){
    wp_redirect(home_url());
    exit();
}

function ajax_login(){

    // First check the nonce, if it fails the function will break
    check_ajax_referer( 'ajax-login-nonce', 'security' );

    // Nonce is checked, get the POST data and sign user on
    $info = array();
    $info['user_login'] = $_POST['username'];
    $info['user_password'] = $_POST['password'];
    $info['remember'] = true;

    $redirect = false;
    $redirect_link = get_permalink(get_page_by_title('Личный кабинет'));

    $user_signon = wp_signon( $info, false );
    if ( !is_wp_error($user_signon) ){
        wp_set_current_user($user_signon->ID);
        wp_set_auth_cookie($user_signon->ID);
        $message = __('Успешно!');
        $redirect = true;
    } else {
    	$message = __('Неправильно введен логин или пароль');
    }
    echo json_encode(array(
    	'redirect' => $redirect, 
    	'message'=> $message,
    	'redirect_link' => $redirect_link
    ));
    die();
}

function ajax_register() {

	// First check the nonce, if it fails the function will break
    check_ajax_referer( 'ajax-register-nonce', 'security_' );

	$new_user_name = stripcslashes($_POST['new_user_name']);
	$new_user_email = stripcslashes($_POST['new_user_email']);
	$new_user_password = $_POST['new_user_password'];
	$user_nice_name = strtolower($_POST['new_user_email']);
	$user_phone = $_POST['new_user_phone'];
	$user_data = array(
	    'user_login' => $new_user_name,
	    'user_email' => $new_user_email,
	    'user_pass' => $new_user_password,
	    'user_nicename' => $new_user_name,
	    'display_name' => $new_user_first_name,
	    'role' => 'subscriber'
	);
	$user_id = wp_insert_user($user_data);
	$redirect = false;
	$redirect_link = get_permalink(get_page_by_title('Личный кабинет'));
	if (!is_wp_error($user_id)) {
	    $message = 'Аккаунт создан';
	    wp_new_user_notification($user_id);
	    wp_set_current_user($user_id);
        wp_set_auth_cookie($user_id);

        update_field('nomer_telefona', $user_phone, 'user_'.$user_id);
	    $redirect = true;
	} else {
	    if (isset($user_id->errors['empty_user_login'])) {
	        $message = 'Имя и Email являются обязательными полями';
	    } elseif (isset($user_id->errors['existing_user_login'])) {
	        $message = 'Пользователь с таким именем уже существует';
	    } else {
	        $message = 'Произошла ошибка, пожалуйста, внимательно заполните форму регистрации';
	    }
	}

	echo json_encode(array(
		'message' => $message,
		'redirect' => $redirect,
		'redirect_link' => $redirect_link
	));
	die;
}

add_action( 'after_setup_theme', 'disable_admin_bar' );
add_action('init','subscribe_redirect');
add_action('wp_logout','redirect_after_logout');
add_action( 'wp_ajax_nopriv_ajaxLogin', 'ajax_login' );
add_action('wp_ajax_nopriv_ajaxRegister', 'ajax_register');
add_action( 'wp_ajax_ajaxLogin', 'ajax_login' );
add_action('wp_ajax_ajaxRegister', 'ajax_register');