<?php
get_header();
$mainWrapper = 'col-lg-8 col-md-10 col-lm-11 col-xs-11';
?>

<section id="home" class="dis-flex justify-content-center">
	<div class="col-lg-11 dis-flex justify-content-center">
		<div class="<?php echo $mainWrapper; ?>">
			<div class="home-stocks">
				<div class="home-stocks-track dis-flex">
					<?php $counterItems = 1; ?>
					<?php if (have_rows('spisok_kompanij', 'option')) : ?>
						<?php while (have_rows('spisok_kompanij', 'option')) : the_row(); ?>
							<div class="home-stocks__item" data-item="<?php echo $counterItems; ?>" data-name="<?php the_sub_field('zagolovok_kompanii_publichnyj'); ?>">
								<div class="home-stocks__name"><?php the_sub_field('zagolovok_kompanii_publichnyj'); ?></div>
								<div class="home-stocks__total">0,00</div>
								<div class="home-stocks__diff"><span>+0,0 </span><span>+0,0%</span>
								</div>
							</div>
							<?php $counterItems++; ?>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
			<div class="title">
				<h1><?php the_field('home_title') ?></h1>
			</div>
			<div class="subtitle col-lg-9 col-md-8 col-xs-12 col-lm-12"><span><?php the_field('home_subtitle') ?></span>
			</div>
			<div class="home-form">
				<?php echo do_shortcode('[contact-form-7 id="166" html_class="form" title="]') ?>
			</div>
		</div>
	</div>
	<!-- <div class="section-bg">
		<img data-parallax="35" src="http://dev.globalsecureinvest.com/wp-content/uploads/2020/09/home.jpg">
	</div> -->
</section>


<section id="changes" class="changes dis-flex justify-content-center">
	<div class="col-lg-11 dis-flex justify-content-center">
		<div class="<?php echo $mainWrapper; ?>">
			<div id="changes-change">
				<div class="changes-top">
					<div class="changes-top__slides">
						<?php $homeAdvantages = get_field('home_advantages'); ?>
						<?php foreach ($homeAdvantages as $adv) : ?>
							<div class="changes-top__slide">
								<span><?php echo $adv['text'] ?></span>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
			<div class="title">
				<h2>Следим за изменениями рынка</h2>
			</div>
			<div class="changes-news">
				<div class="changes-news__slides main">
					<?php
					$args = array(
						'post_type'   => 'post',
						'post_status' => 'publish',
						'posts_per_page' => 2,
						'meta_query'	=> array(
							'relation'		=> 'AND',
							array(
								'key'	 	=> 'goryachaya_novost',
								'value'	  	=> '"da"',
								'compare' 	=> 'LIKE',
							)
						),
					);

					$posts = new WP_Query($args);
					if ($posts->have_posts()) :
						while ($posts->have_posts()) : $posts->the_post();
					?>
							<!-- Change Item -->
							<a href="<?php the_permalink(); ?>" class="changes-news__slide">
								<div class="changes-news__date date">
									<span>
										<?php echo get_the_date('d') ?>
									</span>
									<span>
										<?php echo get_the_date('m') ?>.<?php echo get_the_date('y') ?>
									</span>
								</div>
								<div class="changes-news__content">
									<div class="changes-news__categories">
										<?php
										$cats = get_the_category();
										foreach ($cats as $cat) :
										?>
											<span class="post-tag small"><?php echo $cat->name; ?></span>
										<?php endforeach; ?>
									</div>
									<div class="changes-news__title">
										<h4><?php the_title() ?></h4>
									</div>
									<div class="changes-news__paragraph">
										<?php the_excerpt(20); ?>
									</div>
									<div class="changes-news__more">
										Читать полностью
									</div>
									<div class="changes-news__content_bg">
										<?php the_post_thumbnail(); ?>
									</div>
								</div>
							</a>
							<!-- End Services Item -->
						<?php endwhile;
						wp_reset_query() ?>
					<?php endif; ?>
				</div>
			</div>
			<div class="changes-news__slides notmain">
				<?php
				$args = array(
					'post_type'   => 'post',
					'post_status' => 'publish',
					'posts_per_page' => 3,
					'meta_query'	=> array(
						'relation'		=> 'AND',
						array(
							'key'	 	=> 'goryachaya_novost',
							'value'	  	=> '"da"',
							'compare' 	=> 'NOT LIKE',
						)
					),
				);

				$posts = new WP_Query($args);
				if ($posts->have_posts()) :
					while ($posts->have_posts()) : $posts->the_post();
				?>
						<!-- Change Item -->
						<div class="changes-news__slide">
							<div class="changes-news__date date"><span><?php echo get_the_date('d') ?></span><span><?php echo get_the_date('m') ?>.<?php echo get_the_date('y') ?> </span>
							</div>
							<a href="<?php the_permalink() ?>" class="changes-news__title">
								<h4><?php the_title() ?></h4>
							</a>
							<div class="changes-news__paragraph">
								<p><?php the_excerpt(); ?></p>
							</div>
						</div>
						<!-- End Services Item -->
					<?php endwhile;
					wp_reset_query() ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
	</div>
</section>


<section id="deposit" class="deposit dis-flex justify-content-center">
	<div class="col-lg-11 dis-flex justify-content-center">
		<div class="<?php echo $mainWrapper; ?>">
			<div class="deposit-wrapper">
				<div class="deposit-content">
					<div class="title">
						<h2><?php the_field('deposit_title') ?></h2>
					</div>
					<div class="subtitle">
						<h4><?php the_field('deposit_subtitle') ?></h4>
					</div>
					<div class="deposit-paragraph">
						<?php the_field('deposit_paragraph'); ?>
					</div>
					<div class="deposit-link"><a href="https://globalsecureinvest.com/o-nas/">Узнать больше</a>
					</div>
				</div>
				<div class="deposit-items">
					<div class="deposit-item"></div>
					<?php $depositLoop = get_field('deposit_loop'); ?>
					<?php foreach ($depositLoop as $item) : ?>
						<!-- Deposit Item -->
						<div class="deposit-item">
							<div class="deposit-item__icon">
								<img src="<?php echo $item['icon'] ?>" alt="Deposit">
							</div>
							<div class="deposit-item__text"><span><?php echo $item['text'] ?></span>
							</div>
						</div>
						<!-- End Deposit Item -->
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>


<section id="offers" class="offers dis-flex flex-wrap-wrap justify-content-center">
	<div class="col-lg-11">
		<div class="section-title text-center">
			<h2><?php the_field('offers_title') ?></h2>
		</div>
	</div>
	<div class="col-lg-11">
		<div class="offers-items">
			<?php $offersLoop = get_field('offers_loop'); ?>
			<?php $counter = 1;
			foreach ($offersLoop as $offers) : ?>
				<div class="offers-item item-count-<?php echo $counter; ?>">
					<div class="offers-item__photo">
						<?php $offersImage = $offers['image']; ?>
						<img src="<?php echo $offersImage['sizes']['large'] ?>" alt="Offers">
					</div>
					<div class="offers-item__info col-lg-8 col-md-10">
						<h4><?php echo $offers['title']; ?></h4>
						<p><?php echo $offers['text'] ?></p>
						<a href="<?php echo $offers['ssylka']; ?>" data-text="Узнать больше" class="button button-small">
							<span>Узнать больше </span>
							<div class="bg"></div>
						</a>
					</div>
				</div>
			<?php $counter++;
			endforeach; ?>
		</div>
	</div>
</section>


<!-- <section id="calculator" class="calculator dis-flex flex-wrap-wrap justify-content-center">
	<div class="col-lg-11 dis-flex justify-content-center">
		<div class="<?php echo $mainWrapper; ?>">
			<div class="calculator-wrapper">
				<div class="calculator-title">
					<h3>Посчитайте вашу возможную <br>прибыль за отчетный период</h3>
				</div>
				<div class="calculator-form">
					<div role="form" class="wpcf7">
						<div class="screen-reader-response" role="alert" aria-live="polite"></div>
						<form action="" method="" data-form-calc class="wpcf7-form init" novalidate="novalidate">
							<div class="form-group">
								<label>Продукт</label><span class="wpcf7-form-control-wrap menu-980">
									<div class="">
										<select data-input-name="category">
											<option value="otc">Выберите продукт</option>
											<option value="otc">OTC</option>
											<option data-month value="ipo">IPO</option>
											<option value="invest">Венчурные инвестиции</option>
											<option value="portfolio">Портфельное инвестирование</option>
											<option value="strategy">Авторские стратегии</option>
										</select>
									</div>
								</span>
							</div>
							<div class="form-group form-group__hide">
								<label class="sum">
									Сумма вклада
									<div class="error-message" style="position: absolute; bottom:0; right:0; color: red;"></div>
								</label>
								<span class="wpcf7-form-control-wrap text-967">
									<input type="number" data-input-name="sum" placeholder="Например: 50000 €">
								</span>
							</div>
							
							<div class="form-group form-group__hide">
								<label class="date">
									Срок вклада
									<div class="error-message" style="position: absolute; bottom:0; right:0; color: red;"></div>
								</label>
								<span class="wpcf7-form-control-wrap text-456">
									<input type="number" type="text" data-input-name="date" placeholder="Например: 12 месяцев">
								</span>
							</div>
							<div class="form-group form-group__hide">
								<button class="button-calc" type="button">
									<span>Расчитать доход</span><br>
								</button>
							</div>
							<div class="error-message"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section> -->


<?php get_template_part('templates/parts/actual-stocks', 'charts') ?>


<section id="advantages" class="advantages dis-flex flex-wrap-wrap justify-content-center">
	<div class="col-lg-11 dis-flex justify-content-center">
		<div class="<?php echo $mainWrapper; ?>">
			<!-- <div class="advantages-mockup col-lg-5 col-xs-12">
			<img src="<?php echo get_template_directory_uri() ?>/static/img/assets/advantages/adv.png" srcset="<?php echo get_template_directory_uri() ?>/static/img/assets/advantages/adv@2x.png 2x" alt="Advantages">
		</div> -->
			<div class="col-lg-12 col-xs-12">
				<div class="advantages-wrapper">
					<div class="title">
						<h2><?php the_field('advantages_title') ?></h2>
					</div>
					<div class="adv-items dis-grid grid-col-lg-3 grid-col-xs-1">

						<?php $advLoop = get_field('advantages_loop'); ?>
						<?php foreach ($advLoop as $adv) : ?>
							<!-- Adv Item -->
							<div class="adv-item">
								<div class="adv-item__icon">
									<img src="<?php echo $adv['icon']['url'] ?>" alt="Advantages Icon">
								</div>
								<div class="adv-item__text"><span><?php echo $adv['text'] ?></span>
								</div>
							</div>
							<!-- End Adv Item -->
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<div class="dis-flex justify-content-center">
	<div class="col-lg-11 dis-flex flex-wrap-wrap justify-content-center">
		<section id="faq" class="faq col-lg-9 col-md-12 col-xs-12">
			<div class="faq-image">
				<img src="<?php echo get_template_directory_uri() ?>/static/img/assets/faq/faq.jpg" alt="Faq image">
			</div>
			<div class="">
				<div class="faq-wrapper">
					<div class="title">
						<h2>Отвечаем на ваши вопросы</h2>
					</div>
					<div class="faq-items col-lg-8 col-xs-12">

						<?php $faqLoop = get_field('faq_loop', 70); ?>
						<?php foreach ($faqLoop as $point) : ?>
							<?php $isHome = $point['tohome']; ?>
							<?php if ($isHome) : ?>
								<!-- Faq Item -->
								<div class="faq-item">
									<div class="faq-item__controll"><i></i><i></i>
									</div>
									<div class="faq-item__question"><span><?php echo $point['question'] ?></span>
									</div>
									<div class="faq-item__answer">
										<p><?php echo $point['answer'] ?></p>
									</div>
								</div>
								<!-- End Faq Item -->
							<?php endif; ?>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</section>
		<section class="faq-additional <?php echo $mainWrapper; ?>">
			<div class="">
				<div class="faq-link"><a href="<?php the_permalink(70) ?>">смотреть еще<img src="<?php echo get_template_directory_uri() ?>/static/img/assets/faq/arr.svg" alt=""></a>
				</div>
			</div>
		</section>
	</div>
</div>


<div class="dis-flex justify-content-center">
	<div class="col-lg-12">
		<?php get_template_part('partials/content', 'time'); ?>
	</div>
</div>


<?php get_footer(); ?>