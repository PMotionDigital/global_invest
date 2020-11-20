<?php

global $current_user, $wp_roles;

function update_user_profile()
{

    $userID = esc_attr($_POST['user-id']);
    $userMail = esc_attr($_POST['new_user_email']);
    $userPass = esc_attr($_POST['new_user_password']);
    $userPhone = esc_attr($_POST['new_user_phone']);

    $error = array();

    /* Update user information. */

    if (!empty($userMail)) { // обновляем почту
        if (!is_email($userMail))
            $error[] = __('The Email you entered is not valid.  please try again.', 'profile');
        else {
            wp_update_user(array('ID' => $userID, 'user_email' => $userMail));
        }
    }

    if (!empty($userPass)) { // обновляем пароль
        wp_update_user(array('ID' => $userID, 'user_pass' => $userPass));
    }



    if (!empty($userPhone)) { // обновляем номер телефона
        update_field('nomer_telefona', $userPhone, 'user_' . $userID);
    }

    echo json_encode(array(
        'name' => $userPass,
        'error' => $error
    ));

    die;
}

add_action('wp_ajax_update_user_profile', 'update_user_profile');
