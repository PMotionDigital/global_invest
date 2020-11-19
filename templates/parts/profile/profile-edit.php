<?php
$user = wp_get_current_user();  ?>
<div class="col-lg-8 col-xs-12 padding-l changable">
    <div class="col-lg-12 profile_content profile_white">
        <div class="section-title type-2 bb">
            <h2>Личные данные</h2>
        </div>
        
        <form class="form-login form-login--settings profile-form--edit" id="data-fields_form" action="update_user_profile" method="post" enctype="multipart/form-data">
            <div class="form-message"></div>    
            <div class="form-row">
                <label for="">Email</label>
                <input value="<?php the_author_meta('user_email', $user->ID); ?>" type="text" class="email" name="new_user_email">
            </div>
            <div class="form-row">
                <label for="">Телефон</label>
                <input type="tel" value="<?php echo get_field('nomer_telefona', 'user_' . $user->ID); ?>" data-required="" name="new_user_phone" class="required" autocomplete="off" data-intl-tel-input-id="2" placeholder="8 (912) 345-67-89">
            </div>
            <div class="form-row form-row--password">
                <label for="">Пароль</label>
                <div class="password-edit">
                    <input placeholder="новый пароль" id="edit-input" type="password" name="new_user_password" value="<?php the_author_meta('user_password', $user->ID); ?>">
                    <button class="password-edit--open"></button>
                </div>
                <input type="hidden" name="user-id" data-user-id="<?php echo $user->ID; ?>" value="<?php echo $user->ID; ?>">
            </div>
            <input class="submit_settings disabled submit_button button-login button type-1" type="submit" value="Сохранить">
        </form>
    </div>
</div>