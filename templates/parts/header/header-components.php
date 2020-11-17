<div class="header-logo col-lg-2 col-md-1">
    <a href="<?php echo home_url()?>" class="logo">
        <img src="<?php echo get_template_directory_uri()?>/dist/images/logo.png" alt="Logo">
    </a>
</div>
<div class="header-menu col-lg-6 col-md-7">
    <nav class="menu">
        <?php wp_nav_menu([
            'theme_location'  => 'primary',
            'menu_class'      => 'menu',
        ]); ?>
    </nav>
</div>
<div class="header-right col-lg-4">
    <div class="header-register">
        <!-- <a href="#"><span>Регистрация</span></a> -->
        <a href="tel:<?php the_field('telefon_kompanii_1', 'option'); ?>"><?php the_field('telefon_kompanii_1', 'option'); ?></a>
    </div>
    <?php if(current_user_can('subscriber')): ?>
        <div class="header-auth logged">
            <a href="/lichnyj-kabinet" title="Личный кабинет"></a>
            <div class="header-auth_dropdown">
                <ul class="">
                    <li>
                       <a href="/lichnyj-kabinet" title="Профиль">Профиль</a>
                    </li>
                    <li>
                      <a href="<?php echo wp_logout_url( home_url() ); ?>" title="Выход">Выход</a>
                    </li>
                </ul>
            </div>
        </div>
    <?php else: ?>
        <div class="header-auth">
            <button class="button-modal" data-modal="login"></button>
        </div>
    <?php endif; ?>
</div>