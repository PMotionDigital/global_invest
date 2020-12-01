<?php
get_header();
$mainWrapper = 'col-lg-8 col-md-10 col-lm-11 col-xs-11';

global $post;
?>

<section class="article dis-flex justify-content-center" data-post-id="<?php echo $post->ID; ?>">
    <div class="col-lg-11 dis-flex justify-content-center">
        <div class="<?php echo $mainWrapper; ?>">
            <div class="single-content col-lg-12 col-lm-12 col-xs-12 col-md-12 dis-flex flex-wrap-wrap">
                <div class="single-content_left actual-items col-lg-4 col-lm-12 col-xs-12 ">
                    <?php if (have_rows('dopinfa')) : ?>
                        <?php $counter = 0; ?>
                        <?php while (have_rows('dopinfa')) : the_row(); ?>
                            <div class="actual-item <?php if ($counter !== 0) {
                                                        echo 'actual-item--without-padding';
                                                    } ?>">
                                <?php if ($counter == 0) { ?>
                                    <div class="actual-item__icon">
                                        <img src="<?php echo get_field('logotip_kompanii'); ?>" alt="<?php the_title(); ?>">
                                    </div>
                                    <div class="actual-item__name">
                                        <span class="profile-offers_item-name">
                                            <?php the_title(); ?>
                                        </span>
                                    </div>
                                <?php } ?>
                                <?php the_sub_field('opisanie') ?>
                                <?php
                                if ($counter == 0) {
                                    if (current_user_can('subscriber')) : ?>
                                        <div class="actual-item__link profile-offers_item-invest">
                                            <a href="#" class="button-modal" data-modal="buy-case">инвестировать</a>
                                        </div>
                                    <?php else : ?>
                                        <div class="actual-item__link">
                                            <a href="#" class="button-modal" data-modal="login">инвестировать</a>
                                        </div>
                                <?php endif;
                                } ?>
                            </div>
                            <?php $counter++; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>

                <div class="single-content_right text-block col-lg-8 col-lm-12 col-xs-12">
                    <div class="graphik-content dis-flex">
                        <!-- TradingView Widget BEGIN -->
                        <div class="tradingview-widget-container col-lg-9 col-xs-11">
                            <canvas id="offer-chart"></canvas>
                            <div class="chartjs-tooltip" id="tooltip-0"></div>
                            <div class="chartjs-tooltip" id="tooltip-1"></div>
                        </div>
                        <!-- TradingView Widget END -->
                        <div class="graphik-content--comment col-lg-3 col-xs-11">
                            <?php if (have_rows('dinamika_czen')) : $check = true;
                                while (have_rows('dinamika_czen')) : the_row(); ?>
                                    <div class="comment-block <?php if ($check) {
                                                                    echo 'active';
                                                                } ?>">
                                        <span>Раунд: <strong><?php the_sub_field('raund'); ?></strong></span>
                                        <span>Капитализация: <strong>$ <?php
                                                                        $num = floatval(get_sub_field('czena'));
                                                                        $newNum = $num;
                                                                        if ($num / 1000000000 >= 1) {
                                                                            $sym = 'B';
                                                                            $newNum = $num / 1000000000;
                                                                        } else if ($num / 1000000 >= 1) {
                                                                            $sym = 'M';
                                                                            $newNum = $num / 1000000;
                                                                        } else if ($num / 1000 >= 1) {
                                                                            $sym = 'K';
                                                                            $newNum = $num / 1000;
                                                                        }
                                                                        $newNum = number_format($newNum, 2, ',', ' ');
                                                                        echo $newNum . ' ' . $sym;
                                                                        ?></strong></span>
                                        <span>Цена за акцию: <strong><?php the_sub_field('czena_za_akcziyu'); ?></strong></span>
                                        <span>Дата: <strong><?php the_sub_field('data'); ?></strong></span>
                                    </div>
                            <?php
                                    $check = false;
                                endwhile;
                            endif; ?>
                        </div>
                    </div>
                    <?php the_content(); ?>
                </div>
            </div>
            <div class="news-items col-lg-12 col-lm-12 col-xs-12 dis-flex flex-wrap-wrap">
                <?php
                $featured_posts = get_field('novosti_po_kompanii');
                if ($featured_posts) : ?>
                    <?php foreach ($featured_posts as $post) :

                        // Setup this post for WP functions (variable must be named $post).
                        setup_postdata($post); ?>

                        <div class="news-item">

                            <div class="news-item__date">
                                <span>
                                    <?php echo get_the_date('d') ?>
                                </span>
                                <span>
                                    <?php echo get_the_date('m') ?>.<?php echo get_the_date('y') ?>
                                </span>
                            </div>
                            <div class="news-item__wrapper">
                                <a href="<?php the_permalink(); ?>" class="news-item__photo">
                                    <?php the_post_thumbnail(); ?>
                                </a>
                                <div class="news-item__text">
                                    <div class="news-item__catg">
                                        <?php
                                        $cats = get_the_category();
                                        foreach ($cats as $cat) :
                                        ?>
                                            <span class="post-tag small"><?php echo $cat->name; ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                    <a href="<?php the_permalink(); ?>" class="news-item__title">
                                        <h4><?php the_title(); ?></h4>
                                    </a>
                                    <div class="news-item__paragraph">
                                        <?php the_excerpt(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                    <?php
                    // Reset the global post object so that the rest of the page works correctly.
                    wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('partials/content', 'time'); ?>

<?php get_footer(); ?>