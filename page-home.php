<?php /* Template Name: Главная */ ?>

<?php get_header(); ?>
    <section id="home" class="home">
      <div class="content">
        <div class="home-stocks">
          <div class="home-stocks__item">
            <div class="home-stocks__name">Nikkei 225</div>
            <div class="home-stocks__total">22.478,79</div>
            <div class="home-stocks__diff"><span>+123,33 </span><span>+0,55%</span>
            </div>
          </div>
          <div class="home-stocks__item">
            <div class="home-stocks__name">Nikkei 225</div>
            <div class="home-stocks__total">22.478,79</div>
            <div class="home-stocks__diff"><span class="negative">-123,33    </span><span class="negative">-0,55%</span>
            </div>
          </div>
          <div class="home-stocks__item">
            <div class="home-stocks__name">DAX</div>
            <div class="home-stocks__total">22.478,79</div>
            <div class="home-stocks__diff"><span>+143,97    </span><span> +1,17%</span>
            </div>
          </div>
          <div class="home-stocks__item">
            <div class="home-stocks__name">Nikkei 225</div>
            <div class="home-stocks__total">22.478,79</div>
            <div class="home-stocks__diff"><span>+123,33 </span><span>+0,55%</span>
            </div>
          </div>
          <div class="home-stocks__item">
            <div class="home-stocks__name">Nikkei 225</div>
            <div class="home-stocks__total">22.478,79</div>
            <div class="home-stocks__diff"><span class="negative">-123,33    </span><span class="negative">-0,55%</span>
            </div>
          </div>
          <div class="home-stocks__item">
            <div class="home-stocks__name">DAX</div>
            <div class="home-stocks__total">22.478,79</div>
            <div class="home-stocks__diff"><span>+143,97    </span><span> +1,17%</span>
            </div>
          </div>
          <div class="home-stocks__item">
            <div class="home-stocks__name">Nikkei 225</div>
            <div class="home-stocks__total">22.478,79</div>
            <div class="home-stocks__diff"><span>+123,33 </span><span>+0,55%</span>
            </div>
          </div>
        </div>
        <div class="title">
          <h1><?php the_field('home_title')?></h1>
        </div>
        <div class="subtitle"><span><?php the_field('home_subtitle')?></span>
        </div>
        <div class="home-form">
          <?php echo do_shortcode('[contact-form-7 id="166" html_class="form" title="]')?>
        </div>
      </div>
    </section>
  </div>
</div>
<div class="index-wrapper">
  <div class="index-wrapper__left">
    <div class="index-count"><span>1</span><span>8</span>
    </div>
    <div class="index-arrow">
      <a href="#home">
      <img src="<?php echo get_template_directory_uri()?>/static/img/assets/actual/arr.svg" alt="Arrow TOp">
      </a><span>Увеличить доход</span>
      <a href="#deposit">
      <img src="<?php echo get_template_directory_uri()?>/static/img/assets/actual/arr.svg" alt="Arrow Down">
      </a>
    </div>
  </div>
  <div class="index-wrapper__right">
    <section id="changes" class="changes">
      <div class="content">
        <div class="changes-top">
          <div class="changes-top__slides">
            <?php $homeAdvantages = get_field('home_advantages'); ?>
            <?php foreach($homeAdvantages as $adv): ?>
            <div class="changes-top__slide">
              <span><?php echo $adv['text']?></span>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="title">
          <h2>Следим за изменениями рынка</h2>
          <!-- <a href="#">статьи</a> -->
        </div>
        <!-- <div class="changes-preview">
          <div class="changes-preview__item">
            <div class="changes-preview__date date"><span>29</span><span>мая / 2020 </span>
            </div>
            <div class="changes-preview__wrapper">
              <div class="changes-preview__photo">
                <img src="<?php echo get_template_directory_uri()?>/static/img/assets/changes/p1.jpg" alt="Changes">
              </div>
              <div class="changes-preview__text">
                <div class="changes-preview__catg"><a href="#">Категория</a><a href="#">Категория 2</a>
                </div>
                <div class="changes-preview__title">
                  <h4>Минэкономразвития разработало новые критерии для выдачи «золотых виз»</h4>
                </div>
                <div class="changes-preview__paragraph">
                  <p>Сегмент сервисных апартаментов испытал настоящий
                    <br>инвестиционный бум в последние годы.
                    <br>Объем первичного рынка в 2019 году вырос почти вдвое,
                    <br>а инвесторам обещали стабильный доход и растущий турпоток.
                  </p>
                </div>
                <div class="changes-preview__all"><a href="#">читать полностью</a>
                </div>
              </div>
            </div>
          </div>
          <div class="changes-preview__item">
            <div class="changes-preview__date date"><span>29</span><span>мая / 2020 </span>
            </div>
            <div class="changes-preview__wrapper">
              <div class="changes-preview__photo">
                <img src="<?php echo get_template_directory_uri()?>/static/img/assets/changes/p2.jpg" alt="Changes">
              </div>
              <div class="changes-preview__text">
                <div class="changes-preview__catg"><a href="#">Категория</a><a href="#">Категория 2</a>
                </div>
                <div class="changes-preview__title">
                  <h4>Инвесторов снова волнует нефть</h4>
                </div>
                <div class="changes-preview__paragraph">
                  <p>Мировые рынки продолжают находиться
                    <br>под влиянием ситуации с возможным
                    <br>началом второй волны после начала
                    <br>плавного ослабления карантинных мер
                    <br>в некоторых странах мира.
                  </p>
                </div>
                <div class="changes-preview__all"><a href="#">читать полностью</a>
                </div>
              </div>
            </div>
          </div>
        </div> -->
        <div class="changes-news">
          <div class="changes-news__slides">
          <?php
            $args = array(
            'post_type'   => 'post',
            'post_status' => 'publish',
            );
            
            $posts = new WP_Query( $args );
            if( $posts->have_posts() ) :
            while( $posts->have_posts() ) : $posts->the_post(); 
          ?>
            <!-- Change Item -->
            <div class="changes-news__slide">
              <!-- <ul class="changes-news__catg">
                <li><a href="#">Категория</a>
                </li>
                <li><a href="#">Категория 2 </a>
                </li>
              </ul> -->
              <div class="changes-news__date date"><span><?php echo get_the_date('d')?></span><span><?php echo get_the_date('m')?>.<?php echo get_the_date('y')?> </span>
              </div>
              <a href="<?php the_permalink()?>" class="changes-news__title">
                <h4><?php the_title()?></h4>
              </a>
              <div class="changes-news__paragraph">
                <p><?php the_excerpt();?></p>
              </div>
            </div>
            <!-- End Services Item -->
            <?php endwhile; wp_reset_query() ?>
          <?php endif; ?>  
          </div>
          <!-- <a href="#" class="changes-all"><span>Смотреть статьи</span><span>08</span></a> -->
        </div>
      </div>
    </section>
  </div>
</div>
<div class="index-wrapper index-two">
  <div class="index-wrapper__left">
    <div class="index-count"><span>2</span><span>8</span>
    </div>
    <div class="index-arrow">
      <a href="#changes">
      <img src="<?php echo get_template_directory_uri()?>/static/img/assets/actual/arr.svg" alt="Arrow TOp">
      </a><span>Выгодные предложения</span>
      <a href="#offers">
      <img src="<?php echo get_template_directory_uri()?>/static/img/assets/actual/arr.svg" alt="Arrow Down">
      </a>
    </div>
  </div>
  <div class="index-wrapper__right">
    <section id="deposit" class="deposit">
      <div class="content">
        <div class="deposit-wrapper">
          <div class="deposit-content">
            <div class="title">
              <h2><?php the_field('deposit_title')?></h2>
            </div>
            <div class="subtitle">
              <h4><?php the_field('deposit_subtitle')?></h4>
            </div>
            <div class="deposit-paragraph">
              <?php the_field('deposit_paragraph'); ?>
            </div>
            <div class="deposit-link"><a href="#">Узнать больше</a>
            </div>
          </div>
          <div class="deposit-items">
            <div class="deposit-item"></div>
            <?php $depositLoop = get_field('deposit_loop'); ?>
            <?php foreach ($depositLoop as $item): ?>
            <!-- Deposit Item -->
            <div class="deposit-item">
              <div class="deposit-item__icon">
                <img src="<?php echo $item['icon'] ?>" alt="Deposit">
              </div>
              <div class="deposit-item__text"><span><?php echo $item['text']?></span>
              </div>
            </div>
            <!-- End Deposit Item -->
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
<div class="index-wrapper index-three">
  <div class="index-wrapper__left">
    <div class="index-count"><span>3</span><span>8</span>
    </div>
    <div class="index-arrow">
      <a href="#deposit">
      <img src="<?php echo get_template_directory_uri()?>/static/img/assets/actual/arr.svg" alt="Arrow TOp">
      </a><span>Посчитать прибыль</span>
      <a href="#calculator">
      <img src="<?php echo get_template_directory_uri()?>/static/img/assets/actual/arr.svg" alt="Arrow Down">
      </a>
    </div>
  </div>
  <div class="index-wrapper__right">
    <section id="offers" class="offers">
      <div class="content">
        <div class="title">
          <h2><?php the_field('offers_title')?></h2>
        </div>
      </div>
      <div class="content content-full">
        <div class="offers-items">
        <?php $offersLoop = get_field('offers_loop'); ?>
        <?php foreach($offersLoop as $offers): ?>
          <div class="offers-item">
            <div class="offers-item__photo">
            <?php $offersImage = $offers['image'];?>
              <img src="<?php echo $offersImage['sizes']['large'] ?>" alt="Offers">
            </div>
            <div class="offers-item__info">
              <h4><?php echo $offers['title']; ?></h4>
              <p><?php echo $offers['text']?></p>
              <a href="#" data-text="Узнать больше"
                class="button button-small"><span>Узнать больше </span></a>
            </div>
          </div>
        <?php endforeach; ?>
        </div>
      </div>
    </section>
  </div>
</div>
<div class="index-wrapper index-four">
  <div class="index-wrapper__left">
    <div class="index-count"><span>4</span><span>8</span>
    </div>
    <div class="index-arrow">
      <a href="#offers">
      <img src="<?php echo get_template_directory_uri()?>/static/img/assets/actual/arr.svg" alt="Arrow TOp">
      </a><span>Преимущества</span>
      <a href="#advantages">
      <img src="<?php echo get_template_directory_uri()?>/static/img/assets/actual/arr.svg" alt="Arrow Down">
      </a>
    </div>
  </div>
  <div class="index-wrapper__right">
    <section id="calculator" class="calculator">
      <div class="content">
        <div class="calculator-wrapper">
          <div class="calculator-title">
            <h3>Посчитайте вашу возможную <br>прибыль за отчетный период</h3>
          </div>
          <div class="calculator-form">
            <?php echo do_shortcode('[contact-form-7 id="110" title="Посчитать доход"]'); ?>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
<section id="stocks" class="stocks">
  <div class="content content-full">
    <div class="stocks-items">
      <div class="stocks-item">
        <div class="stocks-item__icon">
          <img src="<?php echo get_template_directory_uri()?>/static/img/assets/actual/tesla.png" alt="Tesla">
        </div>
        <div class="stocks-item__span">Акции</div>
        <div class="stocks-item__name">
          <h4>Tesla Motors</h4>
        </div>
        <div class="stocks-item__chart">
          <img src="<?php echo get_template_directory_uri()?>/static/img/assets/stocks/s1.svg" alt="Stocks Item">
        </div>
        <div class="stocks-item__prices">
          <div class="stocks-item__price"><span>текущая цена</span><span>1 002,95</span>
          </div>
          <div class="stocks-item__price"><span>дневное изменение</span><span>+163,48%</span>
          </div>
        </div>
        <div class="stocks-item__invest"><a href="#">инвестировать</a>
        </div>
      </div>
      <div class="stocks-item">
        <div class="stocks-item__icon">
          <img src="<?php echo get_template_directory_uri()?>/static/img/assets/actual/tesla.png" alt="Tesla">
        </div>
        <div class="stocks-item__span">Акции</div>
        <div class="stocks-item__name">
          <h4>Tesla Motors</h4>
        </div>
        <div class="stocks-item__chart">
          <img src="<?php echo get_template_directory_uri()?>/static/img/assets/stocks/s2.svg" alt="Stocks Item">
        </div>
        <div class="stocks-item__prices">
          <div class="stocks-item__price"><span>текущая цена</span><span>1 002,95</span>
          </div>
          <div class="stocks-item__price minus"><span>дневное изменение</span><span>-57,48%</span>
          </div>
        </div>
        <div class="stocks-item__invest"><a href="#">инвестировать</a>
        </div>
      </div>
      <div class="stocks-item">
        <div class="stocks-item__icon">
          <img src="<?php echo get_template_directory_uri()?>/static/img/assets/actual/tesla.png" alt="Tesla">
        </div>
        <div class="stocks-item__span">Акции</div>
        <div class="stocks-item__name">
          <h4>Tesla Motors</h4>
        </div>
        <div class="stocks-item__chart">
          <img src="<?php echo get_template_directory_uri()?>/static/img/assets/stocks/s1.svg" alt="Stocks Item">
        </div>
        <div class="stocks-item__prices">
          <div class="stocks-item__price"><span>текущая цена</span><span>1 002,95</span>
          </div>
          <div class="stocks-item__price"><span>дневное изменение</span><span>+163,48%</span>
          </div>
        </div>
        <div class="stocks-item__invest"><a href="#">инвестировать</a>
        </div>
      </div>
      <div class="stocks-item">
        <div class="stocks-item__icon">
          <img src="<?php echo get_template_directory_uri()?>/static/img/assets/actual/tesla.png" alt="Tesla">
        </div>
        <div class="stocks-item__span">Акции</div>
        <div class="stocks-item__name">
          <h4>Tesla Motors</h4>
        </div>
        <div class="stocks-item__chart">
          <img src="<?php echo get_template_directory_uri()?>/static/img/assets/stocks/s2.svg" alt="Stocks Item">
        </div>
        <div class="stocks-item__prices">
          <div class="stocks-item__price"><span>текущая цена</span><span>1 002,95</span>
          </div>
          <div class="stocks-item__price minus"><span>дневное изменение</span><span>-57,48%</span>
          </div>
        </div>
        <div class="stocks-item__invest"><a href="#">инвестировать</a>
        </div>
      </div>
      <div class="stocks-item">
        <div class="stocks-item__icon">
          <img src="<?php echo get_template_directory_uri()?>/static/img/assets/actual/tesla.png" alt="Tesla">
        </div>
        <div class="stocks-item__span">Акции</div>
        <div class="stocks-item__name">
          <h4>Tesla Motors</h4>
        </div>
        <div class="stocks-item__chart">
          <img src="<?php echo get_template_directory_uri()?>/static/img/assets/stocks/s1.svg" alt="Stocks Item">
        </div>
        <div class="stocks-item__prices">
          <div class="stocks-item__price"><span>текущая цена</span><span>1 002,95</span>
          </div>
          <div class="stocks-item__price"><span>дневное изменение</span><span>+163,48%</span>
          </div>
        </div>
        <div class="stocks-item__invest"><a href="#">инвестировать</a>
        </div>
      </div>
      <div class="stocks-item">
        <div class="stocks-item__icon">
          <img src="<?php echo get_template_directory_uri()?>/static/img/assets/actual/tesla.png" alt="Tesla">
        </div>
        <div class="stocks-item__span">Акции</div>
        <div class="stocks-item__name">
          <h4>Tesla Motors</h4>
        </div>
        <div class="stocks-item__chart">
          <img src="<?php echo get_template_directory_uri()?>/static/img/assets/stocks/s1.svg" alt="Stocks Item">
        </div>
        <div class="stocks-item__prices">
          <div class="stocks-item__price"><span>текущая цена</span><span>1 002,95</span>
          </div>
          <div class="stocks-item__price"><span>дневное изменение</span><span>+163,48%</span>
          </div>
        </div>
        <div class="stocks-item__invest"><a href="#">инвестировать</a>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="index-wrapper index-five">
  <div class="index-wrapper__left">
    <div class="index-count"><span>5</span><span>8</span>
    </div>
    <div class="index-arrow">
      <a href="#calculator">
      <img src="<?php echo get_template_directory_uri()?>/static/img/assets/actual/arr.svg" alt="Arrow TOp">
      </a><span>Ответы на вопросы</span>
      <a href="#faq">
      <img src="<?php echo get_template_directory_uri()?>/static/img/assets/actual/arr.svg" alt="Arrow Down">
      </a>
    </div>
  </div>
  <div class="index-wrapper__right">
    <section id="advantages" class="advantages">
      <div class="advantages-mockup">
        <img src="<?php echo get_template_directory_uri()?>/static/img/assets/advantages/adv.png" srcset="<?php echo get_template_directory_uri()?>/static/img/assets/advantages/adv@2x.png 2x" alt="Advantages">
      </div>
      <div class="content">
        <div class="advantages-wrapper">
          <div class="title">
            <h2><?php the_field('advantages_title')?></h2>
          </div>
          <div class="adv-items">

          <?php $advLoop = get_field('advantages_loop'); ?>
          <?php foreach($advLoop as $adv): ?>
            <!-- Adv Item -->
            <div class="adv-item">
              <div class="adv-item__icon">
                <img src="<?php echo $adv['icon']['url']?>" alt="Advantages Icon">
              </div>
              <div class="adv-item__text"><span><?php echo $adv['text']?></span>
              </div>
            </div>
            <!-- End Adv Item -->
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
<div class="index-wrapper index-six">
  <div class="index-wrapper__left">
    <div class="index-count"><span>6</span><span>8</span>
    </div>
    <div class="index-arrow">
      <a href="#advantages">
      <img src="<?php echo get_template_directory_uri()?>/static/img/assets/actual/arr.svg" alt="Arrow TOp">
      </a><span>Главные новости</span>
      <a href="#advice">
      <img src="<?php echo get_template_directory_uri()?>/static/img/assets/actual/arr.svg" alt="Arrow Down">
      </a>
    </div>
  </div>
  <div class="index-wrapper__right">
    <section id="faq" class="faq">
      <div class="faq-image">
        <img src="<?php echo get_template_directory_uri()?>/static/img/assets/faq/faq.jpg" alt="Faq image">
      </div>
      <div class="content">
        <div class="faq-wrapper">
          <div class="title">
            <h2>Отвечаем на ваши вопросы</h2>
          </div>
          <div class="faq-items">
            
          <?php $faqLoop = get_field('faq_loop', 70); ?>
            <?php foreach($faqLoop as $point): ?>
            <?php $isHome = $point['tohome']; ?>
            <?php if($isHome): ?>
              <!-- Faq Item -->
              <div class="faq-item">
                <div class="faq-item__controll"><i></i><i></i>
                </div>
                <div class="faq-item__question"><span><?php echo $point['question']?></span>
                </div>
                <div class="faq-item__answer">
                  <p><?php echo $point['answer']?></p>
                </div>
              </div>
              <!-- End Faq Item -->
              <?php endif; ?>
            <?php endforeach;?> 
          </div>
        </div>
      </div>
    </section>
    <section class="faq-additional">
      <div class="content">
        <div class="faq-link"><a href="<?php the_permalink(70)?>">смотреть еще<img src="<?php echo get_template_directory_uri()?>/static/img/assets/faq/arr.svg" alt=""></a>
        </div>
      </div>
    </section>
  </div>
</div>
<div class="index-wrapper index-eight">
  <div class="index-wrapper__left">
    <div class="index-count"><span>8</span><span>8</span>
    </div>
  </div>
  <div class="index-wrapper__right">
    <?php  get_template_part('partials/content','time'); ?>
  </div>
</div>


<?php get_footer(); ?>
