<?php
get_header();
$mainWrapper = 'col-lg-8 col-md-10 col-lm-11 col-xs-11';
?>

<section class="article dis-flex justify-content-center">
    <div class="col-lg-11 dis-flex justify-content-center">
        <div class="<?php echo $mainWrapper; ?>">
            <div class="single-content col-lg-12 col-lm-12 col-xs-12 col-md-12 dis-flex flex-wrap-wrap">
                <div class="single-content_left actual-items col-lg-4 col-lm-12 col-xs-12 ">
                    <div class="actual-item" data-post-id="<?php echo $post->ID; ?>">
                        <div class="actual-item__icon">
                            <img src="<?php echo get_field('logotip_kompanii'); ?>" alt="<?php the_title(); ?>">
                        </div>
                        <div class="actual-item__name"><span class="profile-offers_item-name">Tesla Inc</span>
                        </div>
                        <?php if (get_field('tip_razmeshheniya') !== 'tco') { ?>
                            <div class="actual-item__list">
                                <ul>
                                    <li><span>Сайт: </span><span>www.tesla.com</span>
                                    </li>
                                    <li> <span>Сектор: </span><span>Цикличные компании</span>
                                    </li>
                                    <li><span>Штаб квартира: </span><span>Palo Alto, CA 94304-1317 U.S.</span>
                                    </li>
                                    <li><span>Кол-во сотрудников:</span><span>48 016</span>
                                    </li>
                                    <li><span>Год основания:</span><span>2010</span>
                                    </li>
                                </ul>
                            </div>
                        <?php } ?>
                        <?php
                        if (current_user_can('subscriber')) : ?>
                            <div class="actual-item__link profile-offers_item-invest">
                                <a href="#" class="button-modal" data-modal="buy-case">инвестировать</a>
                            </div>
                        <?php else : ?>
                            <div class="actual-item__link">
                                <a href="#" class="button-modal" data-modal="login">инвестировать</a>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="actual-item" data-post-id="<?php echo $post->ID; ?>">
                        <div class="actual-item__name"><span class="profile-offers_item-name">Данные о компании</span>
                        </div>
                        <?php if (get_field('tip_razmeshheniya') !== 'tco') { ?>
                            <div class="actual-item__list">
                                <ul>
                                    <li>
                                        <p>Дата IPO: </p><strong>21.10.2020</strong>
                                    </li>
                                    <li>
                                        <p>Цена предложения: </p><strong>461.30 $</strong>
                                    </li>
                                    <li>
                                        <p>Ценовой диапозон: </p><strong>447,35 - 465,90 $</strong>
                                    </li>
                                    <li>
                                        <p>Предлогаемые акции: </p><strong>48.045.394</strong>
                                    </li>
                                    <li>
                                        <p>Всего акций:</p><strong>931.808.630</strong>
                                    </li>
                                    <li>
                                        <p>Размер сделки:</p><strong>28</strong>
                                    </li>
                                </ul>
                            </div>
                        <?php } ?>

                    </div>
                    <div class="actual-item" data-post-id="<?php echo $post->ID; ?>">
                        <div class="actual-item__name"><span class="profile-offers_item-name">Финансовые коэффициенты за 2020 год</span>
                        </div>
                        <?php if (get_field('tip_razmeshheniya') !== 'tco') { ?>
                            <div class="actual-item__list">
                                <ul>
                                    <li>
                                        <p>LTM Продажи: </p><strong>?</strong>
                                    </li>
                                    <li>
                                        <p>Годовой рост: </p><strong>522.65%</strong>
                                    </li>
                                    <li>
                                        <p>Валовая прибыль: </p><strong>18.84 %</strong>
                                    </li>
                                    <li>
                                        <p>EBITDA: </p><strong>107.49%</strong>
                                    </li>
                                    <li>
                                        <p>Чистая прибыль:</p><strong>104 000 000</strong>
                                    </li>
                                </ul>
                            </div>
                        <?php } ?>

                    </div>
                    <div class="actual-item" data-post-id="<?php echo $post->ID; ?>">
                        <div class="actual-item__name"><span class="profile-offers_item-name">Баланс на 21.10.2020</span>
                        </div>
                        <?php if (get_field('tip_razmeshheniya') !== 'tco') { ?>
                            <div class="actual-item__list">
                                <ul>
                                    <li>
                                        <p>Наличные: </p><strong>Цифра</strong>
                                    </li>
                                    <li>
                                        <p>Активы: </p><strong>Цифра</strong>
                                    </li>
                                    <li>
                                        <p>Долг: </p><strong>Цифра</strong>
                                    </li>
                                    <li>
                                        <p>Капитал: </p><strong>Цифра</strong>
                                    </li>
                                </ul>
                            </div>
                        <?php } ?>

                    </div>
                    <div class="actual-item" data-post-id="<?php echo $post->ID; ?>">
                        <div class="actual-item__name"><span class="profile-offers_item-name">Коэффициент оценки за 2020 год</span>
                        </div>
                        <?php if (get_field('tip_razmeshheniya') !== 'tco') { ?>
                            <div class="actual-item__list">
                                <ul>
                                    <li>
                                        <p>Рыночная капитализация: </p><strong> 426 610 098 176</strong>
                                    </li>
                                    <li>
                                        <p>P/E: </p><strong>76.07</strong>
                                    </li>
                                    <li>
                                        <p>P/S: </p><strong>57.77</strong>
                                    </li>
                                </ul>
                            </div>
                        <?php } ?>

                    </div>
                    <div class="actual-item" data-post-id="<?php echo $post->ID; ?>">
                        <div class="actual-item__name"><span class="profile-offers_item-name">Условия инвестирования</span>
                        </div>
                        <?php if (get_field('tip_razmeshheniya') !== 'tco') { ?>
                            <div class="actual-item__list">
                                <ul>
                                    <li>
                                        <p>Комиссия: </p><strong>20% success fee</strong>
                                    </li>
                                    <li>
                                        <p>Комиссия за вход: </p><strong>3,5%</strong>
                                    </li>
                                    <li>
                                        <p>Комиссия за выход: </p><strong>1,5%</strong>
                                    </li>
                                </ul>
                            </div>
                        <?php } ?>

                    </div>
                </div>

                <div class="single-content_right text-block col-lg-8 col-lm-12 col-xs-12">
                    <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container">
                        <div id="tradingview_c6898" style="height: 450px;margin-top: 2rem"></div>
                        <div class="tradingview-widget-copyright"><a href="https://in.tradingview.com/symbols/NASDAQ-AAPL/" rel="noopener" target="_blank"><span class="blue-text">AAPL Chart</span></a> by TradingView</div>
                        <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                        <script type="text/javascript">
                            new TradingView.widget({
                                "autosize": true,
                                "symbol": "NASDAQ:AAPL",
                                "interval": "D",
                                "timezone": "Etc/UTC",
                                "theme": "light",
                                "style": "1",
                                "locale": "in",
                                "toolbar_bg": "#f1f3f6",
                                "enable_publishing": false,
                                "allow_symbol_change": true,
                                "container_id": "tradingview_c6898"
                            });
                        </script>
                    </div>
                    <!-- TradingView Widget END -->
                    <div class="text-item">
                        <h2>О компании</h2>
                        <p>Tesla Inc. — американская компания, производитель электрокаров и компонентов силовых агрегатов. Компания владеет собственной сетью продаж и техобслуживания, поставляет компоненты другим автопроизводителям. Tesla Inc. основана в 2003 году, презентация первого автомобиля компании — Tesla Roadster — состоялась в 2006 году.
                        </p>
                    </div>
                    <div class="text-item text-item--key">
                        <h2>Ключевые инвесторы </h2>
                        <div class="text-item_block dis-flex">
                            <ul class="block-item_one">
                                <li>Elon Musk</li>
                                <li>Ira Matthew Ehrenpreis</li>
                                <li>Kimbal Musk</li>
                                <li>Jerome M. Guillen</li>
                                <li>Robyn M. Denholm</li>
                            </ul>
                            <ul class="block-item_two">
                                <li>James Rupert Murdoch</li>
                                <li>Lawrence J. Ellison</li>
                                <li>Kathleen Wilson-Thompson</li>
                                <li>Zachary Kirkhorn</li>
                                <li>Hiromichi Mizuno</li>
                            </ul>
                        </div>
                    </div>
                    <div class="text-item text-item--key">
                        <h2>Оценка компании GSI</h2>
                        <p>Акции TSLA лихорадит на фоне потока противоречивых новостей. В считаные дни бумаги способны делать по 15-20% как вверх, так и вниз. Формально ситуацию последних двух лет можно назвать широким торговым диапазоном, но амплитуда колебаний поражает.</p>

                        <p>Медианный таргет аналитиков на 12 мес. составляет $430 при текущей котировке в $406. В теории наблюдается дисконт к средней оценке фундаментальной стоимости, однако, с учетом волатильности TSLA он минимальный. При этом таргеты за последние пару месяцев имеют широкий разброс от $245 до $450.</p>

                        <p>На мой взгляд, при наличии желания и возможностей на отскоках имеет смысл открывать шорты, ибо рисков больше, чем позитивных факторов. Ближайшая поддержка по TSLA — $280-275. Следующий уровень в рамках долгосрочного торгового диапазона — $250-240. Мой долгосрочный целевой ориентир
                            по Tesla — $220.
                        </p>
                    </div>
                </div>
            </div>
            <div class="news-items col-lg-12 col-lm-12 col-xs-12 dis-flex flex-wrap-wrap">
                <div class="news-item">

                    <div class="news-item__date"><span>26 </span>Август 2020</div>
                    <div class="news-item__wrapper">
                        <a href="http://dev.global.ru/2020/08/26/minekonomrazvitiya-razrabotalo-novye-kriterii-dlya-vydachi-zolotyh-viz-%e2%84%964/" class="news-item__photo">
                            <img width="768" height="410" src="http://dev.global.ru/wp-content/uploads/2020/10/apple-768x410.jpg" class="attachment-medium_large size-medium_large wp-post-image" alt="" loading="lazy" srcset="http://dev.global.ru/wp-content/uploads/2020/10/apple-768x410.jpg 768w, http://dev.global.ru/wp-content/uploads/2020/10/apple-300x160.jpg 300w, http://dev.global.ru/wp-content/uploads/2020/10/apple-1024x547.jpg 1024w, http://dev.global.ru/wp-content/uploads/2020/10/apple-1536x820.jpg 1536w, http://dev.global.ru/wp-content/uploads/2020/10/apple.jpg 1920w" sizes="(max-width: 768px) 100vw, 768px"> </a>
                        <div class="news-item__text">
                            <div class="news-item__catg"><a href="http://dev.global.ru/analitika/">Аналитика</a>
                            </div>
                            <a href="http://dev.global.ru/2020/08/26/minekonomrazvitiya-razrabotalo-novye-kriterii-dlya-vydachi-zolotyh-viz-%e2%84%964/" class="news-item__title">
                                <h4>Сплит акций Apple. Ответы на вопросы — Что будет дальше? Когда покупать?</h4>
                            </a>
                            <div class="news-item__paragraph">
                                <p></p>
                                <p>Совет директоров&nbsp;Apple&nbsp;одобрил дробление (сплит) акций компании в пропорции&nbsp;4 к 1. Это значит, что общее количество акций в обращении увеличится в […]</p>
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="news-items col-lg-12 col-lm-12 col-xs-12 dis-flex flex-wrap-wrap">
                <div class="news-item">

                    <div class="news-item__date"><span>26 </span>Август 2020</div>
                    <div class="news-item__wrapper">
                        <a href="http://dev.global.ru/2020/08/26/minekonomrazvitiya-razrabotalo-novye-kriterii-dlya-vydachi-zolotyh-viz-%e2%84%964/" class="news-item__photo">
                            <img width="768" height="410" src="http://dev.global.ru/wp-content/uploads/2020/10/apple-768x410.jpg" class="attachment-medium_large size-medium_large wp-post-image" alt="" loading="lazy" srcset="http://dev.global.ru/wp-content/uploads/2020/10/apple-768x410.jpg 768w, http://dev.global.ru/wp-content/uploads/2020/10/apple-300x160.jpg 300w, http://dev.global.ru/wp-content/uploads/2020/10/apple-1024x547.jpg 1024w, http://dev.global.ru/wp-content/uploads/2020/10/apple-1536x820.jpg 1536w, http://dev.global.ru/wp-content/uploads/2020/10/apple.jpg 1920w" sizes="(max-width: 768px) 100vw, 768px"> </a>
                        <div class="news-item__text">
                            <div class="news-item__catg"><a href="http://dev.global.ru/analitika/">Аналитика</a>
                            </div>
                            <a href="http://dev.global.ru/2020/08/26/minekonomrazvitiya-razrabotalo-novye-kriterii-dlya-vydachi-zolotyh-viz-%e2%84%964/" class="news-item__title">
                                <h4>Сплит акций Apple. Ответы на вопросы — Что будет дальше? Когда покупать?</h4>
                            </a>
                            <div class="news-item__paragraph">
                                <p></p>
                                <p>Совет директоров&nbsp;Apple&nbsp;одобрил дробление (сплит) акций компании в пропорции&nbsp;4 к 1. Это значит, что общее количество акций в обращении увеличится в […]</p>
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('partials/content', 'time'); ?>

<?php get_footer(); ?>