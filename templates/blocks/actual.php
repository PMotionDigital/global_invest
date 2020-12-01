<?php
$mainWrapper = 'col-lg-8 col-md-10 col-lm-11 col-xs-11'; ?>

<section class="wp-block-actual page-content-gutenberg actual dis-flex justify-content-center">

    <div class="">
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
                'post_type'            => 'autor_strategy'
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
                                <li><span>Прогноз дохода: </span><span><?php the_field('prognoz_dohoda', $post->ID); ?></span>
                                </li>
                                <li> <span>Период инвестирования: </span><span><?php the_field('period_investirovaniya', $post->ID); ?></span>
                                </li>
                            </ul>
                        </div>
                        <?php
                        if (current_user_can('subscriber')) : ?>
                            <div class="actual-item__link profile-offers_item-buy">
                                <a href="#" class="button-modal" data-min="30000" data-modal="buy-case">инвестировать</a>
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

</section>