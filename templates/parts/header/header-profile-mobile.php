<div class="header-mobile col-lg-12">
    <div class="header-mobile-top dis-flex">
        <div class="header-mobile-logo col-xs-8">
            <a href="/"><img src="<?php echo get_template_directory_uri()?>/dist/images/logo.png"></a>
            <div class="header-mobile-burger">
            
            </div>
        </div>
        <div class="header-mobile-meta header-right dis-flex align-items-center justify-content-end col-xs-4">
            <div class="header-auth logout">
                <a href="<?php echo wp_logout_url( home_url() ); ?>" title="Выход"></a>
            </div>
        </div>
    </div>
    <div class="header-mobile-nav">
        <?php wp_nav_menu([
            'theme_location'  => 'profile',
            'menu_class'      => 'menu',
        ]); ?>
        <div class="footer-left"> 
            <span>Контакты</span>
            <a href="tel:<?php the_field('telefon_kompanii_1', 'option'); ?>"><?php the_field('telefon_kompanii_1', 'option'); ?></a>
            <a href="tel:<?php the_field('telefon_kompanii_2', 'option'); ?>"><?php the_field('telefon_kompanii_2', 'option'); ?></a>
            <a href="mailto:<?php the_field('pochta_kompanii', 'option'); ?>"><?php the_field('pochta_kompanii', 'option'); ?></a>
        </div>
    </div>
</div>