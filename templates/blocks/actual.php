<?php
$mainWrapper = 'col-lg-8 col-md-10 col-lm-11 col-xs-11'; ?>

<?php

$product = get_field('produkty');

if ($product !== 'otc_ipo') : ?>

    <section class="wp-block-actual page-content-gutenberg actual dis-flex justify-content-center">

        <div class="col-lg-12">
            <div class="title">
                <h2>
                    <?php if (get_field('zagolovok')) :
                        the_field('zagolovok');
                    else :
                        echo 'Актуальные идеи';
                    endif; ?> </h2>
            </div>
            <div class="actual-items">
                <?php
                if (get_field('kollichestvo_zapisej')) :
                    $numberposts = get_field('kollichestvo_zapisej');
                else :
                    $numberposts = 3;
                endif;
                $posts = get_posts(array(
                    'posts_per_page'    => $numberposts,
                    'post_type'            => $product
                ));
                global $post;

                if ($posts) : foreach ($posts as $post) :
                        setup_postdata($post);
                ?>
                        <div class="actual-item" data-post-id="<?php echo $post->ID; ?>">
                            <div class="actual-item__icon">
                                <img src="<?php the_field('logotip_kompanii', $post->ID); ?>" alt="<?php the_title(); ?>">
                            </div>
                            <div class="actual-item__span"> <span><?php the_field('sektor', $post->ID); ?></span>
                            </div>
                            <div class="actual-item__name"><span class="profile-offers_item-name"><?php the_title();  ?></span>
                            </div>
                            <div class="actual-item__spec"><span><?php the_field('kratkoe_opisanie_kompanii', $post->ID); ?></span>
                            </div>
                            <div class="actual-item__list">
                                <ul>
                                    <li><span>
                                            <?php
                                            if (pll_current_language() == 'en') :
                                                echo 'Prognoz dohoda:';
                                            else :
                                                echo 'Прогноз дохода:';
                                            endif; ?>
                                        </span><span><?php the_field('prognoz_dohoda', $post->ID); ?></span>
                                    </li>
                                    <li> <span>
                                            <?php
                                            if (pll_current_language() == 'en') :
                                                echo 'Period:';
                                            else :
                                                echo 'Период инвестирования:';
                                            endif; ?>
                                        </span><span><?php the_field('period_investirovaniya', $post->ID); ?></span>
                                    </li>
                                </ul>
                            </div>
                            <?php
                            if (current_user_can('subscriber')) : ?>
                                <div class="actual-item__link profile-offers_item-buy">
                                    <a href="#" class="button-modal" data-min="30000" data-modal="buy-case">
                                    <?php
                                            if (pll_current_language() == 'en') :
                                                echo 'invest';
                                            else :
                                                echo 'инвестировать';
                                            endif; ?>
                                    </a>
                                </div>
                            <?php else : ?>
                                <div class="actual-item__link">
                                    <a href="#" class="button-modal" data-modal="login">
                                    <?php
                                            if (pll_current_language() == 'en') :
                                                echo 'invest';
                                            else :
                                                echo 'инвестировать';
                                            endif; ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>
        </div>

    </section>
<?php else : ?>

    <section class="wp-block-actual actual dis-flex justify-content-center">

        <div class="col-lg-12">
            <div class="title">
                <h2>
                    <?php if (get_field('zagolovok')) :
                        the_field('zagolovok');
                    else :
                        echo 'Актуальные идеи';
                    endif; ?>
                </h2>
            </div>

            <div class="tabs">
                <div class="tabs-nav">
                    <div class="tabs-nav__item is-active" data-tab-name="tab-1">
                        <div class="title">OTC</div>
                    </div>
                    <div class="tabs-nav__item choosed" data-tab-name="tab-2">
                        <div class="title">IPO</div>
                    </div>
                </div>
                <div class="tabs__content">
                    <div class="tab tab-1 is-active">
                        <div class="actual-items">
                            <?php
                            $posts = get_posts(array(
                                'posts_per_page'    => -1,
                                'post_type'            => 'otc_ipo',
                                'meta_key'            => 'tip_razmeshheniya',
                                'meta_value'        => 'otc'
                            ));

                            if ($posts) :
                            ?>
                                <?php
                                foreach ($posts as $post) :
                                    setup_postdata($post);
                                ?>
                                    <div class="actual-item" data-post-id="<?php echo $post->ID; ?>">
                                        <div class="actual-item__icon">
                                            <img src="<?php echo get_field('logotip_kompanii'); ?>" alt="<?php the_title(); ?>">
                                        </div>
                                        <div class="actual-item__span"> <span><?php echo get_field('tip_razmeshheniya'); ?></span>
                                        </div>
                                        <div class="actual-item__name"><span class="profile-offers_item-name"><?php the_title(); ?></span>
                                        </div>
                                        <div class="actual-item__spec"><span><?php the_field('kratkoe_opisanie_kompanii'); ?></span>
                                        </div>
                                        <?php if (get_field('tip_razmeshheniya') !== 'tco') { ?>
                                            <div class="actual-item__list">
                                                <ul>
                                                    <li><span>Цена предложения: </span><span><?php the_field('czena_predlozheniya'); ?></span>
                                                    </li>
                                                    <li> <span>Последний раунд: </span><span><?php the_field('poslednij_raund'); ?></span>
                                                    </li>
                                                    <li><span>Оценка последнего раунда: </span><span><?php the_field('oczenka_poslednego_raunda'); ?></span>
                                                    </li>
                                                    <li><span>Цена за акцию на последнем раунде:</span><span><?php the_field('czena_za_akcziyu_na_poslednem_raunde'); ?></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        <?php } ?>
                                        <?php
                                        if (current_user_can('subscriber')) : ?>
                                            <div class="actual-item__link profile-offers_item-buy">
                                                <a href="#" class="button-modal" data-modal="buy-case">инвестировать</a>
                                            </div>
                                        <?php else : ?>
                                            <div class="actual-item__link">
                                                <a href="#" class="button-modal" data-min="100000" data-modal="login">инвестировать</a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                                <?php wp_reset_postdata(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="tab tab-2">
                        <div class="actual-items">
                            <?php
                            $posts = get_posts(array(
                                'posts_per_page'    => -1,
                                'post_type'            => 'otc_ipo',
                                'meta_key'            => 'tip_razmeshheniya',
                                'meta_value'        => 'ipo'
                            ));

                            if ($posts) :
                            ?>
                                <?php
                                foreach ($posts as $post) :
                                    setup_postdata($post);
                                ?>
                                    <div class="actual-item">
                                        <div class="actual-item__icon">
                                            <img src="<?php echo get_field('logotip_kompanii'); ?>" alt="<?php the_title(); ?>">
                                        </div>
                                        <div class="actual-item__span"> <span><?php echo get_field('tip_razmeshheniya'); ?></span>
                                        </div>
                                        <div class="actual-item__name"><span><?php the_title(); ?></span>
                                        </div>
                                        <div class="actual-item__spec"><span><?php the_field('kratkoe_opisanie_kompanii'); ?></span>
                                        </div>
                                        <?php if (get_field('tip_razmeshheniya') == 'ipo') { ?>
                                            <div class="actual-item__list">
                                                <ul>
                                                    <li><span>Прогноз дохода: </span><span><?php the_field('prognoz_dohoda'); ?></span>
                                                    </li>
                                                    <li> <span>Текущая цена: </span><span><?php the_field('tekushhaya_czena'); ?></span>
                                                    </li>
                                                    <li> <span>Заявка до: </span><span><?php the_field('zayavka_do'); ?></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        <?php } ?>
                                        <?php
                                        if (current_user_can('subscriber')) : ?>
                                            <div class="actual-item__link profile-offers_item-buy">
                                                <a href="#" class="button-modal" data-min="50000" data-modal="buy-case">инвестировать</a>
                                            </div>
                                        <?php else : ?>
                                            <div class="actual-item__link">
                                                <a href="#" class="button-modal" data-modal="login">инвестировать</a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                                <?php wp_reset_postdata(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
<?php endif; ?>