<div class="form-login">
    <div class="form-login_header">
        <div class="active" data-header="login">
            <h2>Войти</h2>
        </div>
        <div class="" data-header="register">
            <h2>Регистрация</h2>
        </div>
    </div>
    <div class="form-login_content">
        <div class="active" data-content="login">
            <div class="form-message"></div>
            <form data-id="login" class="ajax-auth">
                <?php wp_nonce_field('ajax-login-nonce', 'security'); ?>

                <div class="form-row">
                    <label for="">Логин</label>
                    <input type="text" class="fields" data-required class="required" name="username">
                </div>

                <div class="form-row pass">
                    <label for="">Пароль</label>
                    <div class="password">
                        <input type="password" id="log-input" class="fields" data-required class="required" name="password">
                        <button class="password-control"></button>
                    </div>

                </div>

                <a class="text-link" href="<?php echo wp_lostpassword_url(); ?>">Забыли пароль?</a>
                <div class="form-log">
                    <input type="checkbox" checked="" id="log_id">
                    <label for="log_id">Согласен с условиями обработки персональных данных</label>
                </div>

                <input class="submit-log submit_button button-login button type-1" type="submit" value="Войти">
            </form>
        </div>
        <div class="" data-content="register">
            <form data-id="register" class="ajax-auth">
                <?php wp_nonce_field('ajax-register-nonce', 'security_'); ?>
                <div class="form-row">
                    <label for="">Логин</label>
                    <input type="text" data-required name="new_user_name" class="required">
                </div>
                <div class="form-row">
                    <label for="">Телефон</label>
                    <input type="tel" data-required name="new_user_phone" class="required">
                </div>
                <div class="form-row">
                    <label for="">Email</label>
                    <input type="text" data-required class="required email" name="new_user_email">
                </div>

                <div class="form-row">
                    <label for="">Пароль</label>
                    <div class="password">
                        <input type="password" id="reg-input" data-required class="required" name="new_user_password">
                        <button class="password-reg"></button>
                    </div>
                </div>
                <div class="form-log">
                    <input type="checkbox" checked="" id="reg_id">
                    <label for="reg_id">Согласен с условиями обработки персональных данных</label>
                </div>
                <input class="submit_button button type-1" type="submit" value="Регистрация">
            </form>
        </div>
    </div>
</div>