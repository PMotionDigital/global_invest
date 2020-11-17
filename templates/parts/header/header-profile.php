
<?php if(is_page('lichnyj-kabinet')): ?>
<div class="header-logo profile col-lg-2 col-md-1">
   <a href="<?php echo home_url()?>" class="logo">
        <img src="<?php echo get_template_directory_uri()?>/dist/images/logo.png" alt="Logo">
    </a>
   
</div>
<?php else: ?>
<div class="header-logo col-lg-2 col-md-1">
    <a href="<?php echo home_url()?>" class="logo">
        <img src="<?php echo get_template_directory_uri()?>/dist/images/logo.png" alt="Logo">
    </a>
</div>
<?php endif; ?>
<div class="header-menu col-lg-6 col-md-7">
    <nav class="menu">
        <?php wp_nav_menu([
            'theme_location'  => 'profile',
            'menu_class'      => 'menu',
        ]); ?>
    </nav>
</div>
<div class="header-right col-lg-4">
    <div class="header-register">
        <!-- <a href="#"><span>Регистрация</span></a> -->
        <a href="tel:<?php the_field('telefon_kompanii_1', 'option'); ?>"><?php the_field('telefon_kompanii_1', 'option'); ?></a>
    </div>
    <div class="header-auth logout">
        <a href="<?php echo wp_logout_url( home_url() ); ?>" title="Выход"></a>
    </div>
</div>