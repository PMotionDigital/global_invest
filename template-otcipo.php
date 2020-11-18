<?php /* Template Name: ОТС и IPO */ ?>
<?php
get_header();
$mainWrapper = 'col-lg-8 col-md-10 col-lm-11 col-xs-11';
?>
<section class="otc dis-flex justify-content-center">
	<div class="col-lg-11 dis-flex justify-content-center">
		<div class="<?php echo $mainWrapper; ?>">
			<div class="title">
				<h1><?php the_field('otc_title') ?></h1>
			</div>
			<div class="otc-wrapper">
			      
			<?php if(have_rows('otc_loop')): ?>
            <?php while(have_rows('otc_loop')): the_row(); ?>
					<div class="otc-item">
						<span><?php the_sub_field('name'); ?></span>
						<p><?php the_sub_field('text'); ?></p>
					</div>
			<?php endwhile; endif; ?>
			</div>
		</div>
	</div>
</section>
<section class="actual dis-flex justify-content-center">
	<div class="col-lg-11 dis-flex justify-content-center">
		<div class="<?php echo $mainWrapper; ?>">
			<div class="title">
				<h2>Актуальные идеи</h2>
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
								'posts_per_page'	=> -1,
								'post_type'			=> 'otc_ipo',
								'meta_key'			=> 'tip_razmeshheniya',
								'meta_value'		=> 'otc' 
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
										if(current_user_can('subscriber')): ?>
										<div class="actual-item__link profile-offers_item-buy">
											<a href="#" class="button-modal" data-modal="buy-case">инвестировать</a>
										</div>
										<?php else: ?>
										<div class="actual-item__link">
											<a href="#" class="button-modal" 
											data-min="100000"
											data-modal="login">инвестировать</a>
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
								'posts_per_page'	=> -1,
								'post_type'			=> 'otc_ipo',
								'meta_key'			=> 'tip_razmeshheniya',
								'meta_value'		=> 'ipo'
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
										if(current_user_can('subscriber')): ?>
										<div class="actual-item__link profile-offers_item-buy">
											<a href="#" class="button-modal" 
											data-min="50000"
											data-modal="buy-case">инвестировать</a>
										</div>
										<?php else: ?>
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
	</div>
</section>
<section class="what dis-flex justify-content-center">
	<div class="col-lg-11 dis-flex justify-content-center">
		<div class="<?php echo $mainWrapper; ?>">
			<div class="title">
				<h2>Что мы ищем</h2>
			</div>
			<div class="what-top">
				<div class="what-top__icon">
					<img src="<?php echo get_template_directory_uri() ?>/static/img/assets/what/wtop.png" alt="What Top">
				</div>
				<div class="what-top__text">
					<p>Преимущественно американские компании в сфере информационных технологий и разработчиков программного обеспечения для средних и крупных компаний (b2b).</p>
				</div>
			</div>
			<div class="what-texted">
				<p>Это бизнес-аналитика, облачные сервисы, кибербезопасность, биотехнологии, инструменты для разработчиков и автоматизации бизнес-процессов.</p>
				<p>Также мы следим за стартапами, которые занимаются разработкой аппаратного обеспечения для оптимизации новых технологий (искусственный интеллект и машинное обучение).</p>
			</div>
			<div class="what-red">
				<h2>Почему в первую очередь  мы затрагиваем сферу высоких  технологий, искусственного интеллекта  и биотехнологический сектор</h2>
			</div>
			<div class="what-bottom">
				<div class="what-bottom__image">
					<img src="<?php echo get_template_directory_uri() ?>/static/img/assets/what/image.jpg" alt="">
				</div>
				<div class="what-bottom__item">
					<span>Во-первых,</span>
					<p>Это один из самых быстрорастущих секторов американской экономики наряду со здравоохранением. Согласно статистике, за 2018 год 26 технологических компаний провели IPO в США и показали среднюю доходность 50%.</p>
				</div>
				<div class="what-bottom__item">
					<span>Во-вторых,</span>
					<p>В Global Secure Invest есть возможность экспертизы с точки зрения потенциала продукта. Большинство фондов имеют опыт оценки стартапов по финансовым показателям, но не могут оценить продукт с профессиональной точки зрения. Global
						Secure Invest занимается разработкой собственного программного обеспечения — у нас такой опыт есть.
					</p>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="how dis-flex justify-content-center">
	<div class="col-lg-11 dis-flex justify-content-center">
		<div class="<?php echo $mainWrapper; ?>">
			<div class="title">
				<h2> Как мы ищем</h2>
			</div>
			<div class="what-top">
				<div class="what-top__icon">
					<img src="<?php echo get_template_directory_uri() ?>/static/img/assets/how/how.png" alt="What Top">
				</div>
				<div class="what-top__text">
					<p>Мы проанализировали технологические компании,
						<br>которые за последние три года выходили на IPO,
						<br>и выявили следующие факторы:
					</p>
				</div>
			</div>
			<div class="how-wrapper">
				<div class="how-image">
					<img src="<?php echo get_template_directory_uri() ?>/static/img/assets/how/hoow.jpg" alt="How">
				</div>
				<div class="how-content">
					<h3>Количественные факторы</h3>
					<div class="how-content__wrp">
						<div class="how-content__icon">
							<img src="<?php echo get_template_directory_uri() ?>/static/img/assets/how/how2.png" alt="How Icon">
						</div>
						<div class="how-content__text">Компании, которые провели IPO, перед
							<br>размещением в среднем выглядели так:
						</div>
					</div>
					<div class="how-list">
						<ul class="how-ul">
							<li><span>возраст:</span><span>10–11 лет;</span>
							</li>
							<li><span>выручка за последние 12 месяцев:</span><span>$150–250 млн;</span>
							</li>
							<li><span>общий объем инвестиций за все раунды:</span><span> $200–450 млн;</span>
							</li>
							<li><span>стоимость компании на последнем раунде:</span><span> 1–3 млрд;</span>
							</li>
							<li><span>последний раунд до IPO: </span><span>15–24 месяцев;</span>
							</li>
							<li><span>наличие известных венчурных фондов среди инвесторов;</span>
							</li>
							<li><span>в среднем за 1–3 года до IPO стартапы наняли нового CFO с опытом продажи компании.</span><span></span>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="strategy dis-flex justify-content-center">
	<div class="col-lg-11 dis-flex justify-content-center">
		<div class="<?php echo $mainWrapper; ?>">
			<div class="title">
				<h2>Наша основная стратегия — поиск <br>единорогов не дороже $3 млрд</h2>
			</div>
			<div class="strategy-big">
				<p>Бывает так, что оценки самых известных стартапов преувеличены и могут не оправдать ожидания широкого круга инвесторов (как это было с Domo, Dropbox и Snapchat).
				</p>
				<p>В то же время компании с оценкой ниже $1 млрд слишком малы, в большинстве случаев не подходят под нашу стратегию риск-доходности.
				</p>
			</div>
			<div class="strategy-items">
				<div class="strategy-item">
					<p>Мы также обращаем внимание, есть ли среди инвесторов известные венчурные фонды или фонды прямых инвестиций, а не только частные инвесторы. Первые не просто дают деньги, но и принимают активное участие в управлении компанией
						(часто партнеры фондов входят в совет директоров).
					</p>
					<p>За счет связей и человеческого капитала они помогают построить бизнес-процессы и открывают доступ на новые рынки — это способствует повышению стоимости компании в будущем.</p>
				</div>
				<div class="strategy-item">
					<p>Также мы выбираем компании, которые планируют в скором времени выйти на IPO, чтобы не ждать дохода от инвестиций много лет, а получить деньги через 1–3 года.</p>
					<p>Один из индикаторов скорого IPO — если компания нанимает нового финансового директора. Согласно исследованию Forbes, 75% стартапов, попавших в выборку, за 12–36 месяцев до IPO нанимали нового финансового директора. Также бывает,
						что топ-менеджеры компании сами дают прогнозы планируемого выхода на биржу.
					</p>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="plan dis-flex justify-content-center">
	<div class="col-lg-11 dis-flex justify-content-center">
		<div class="<?php echo $mainWrapper; ?>">
			<div class="plan-items">
				<div class="plan-item">
					<div class="plan-item__name">
						<h3>Качественные факторы</h3>
					</div>
					<div class="plan-item__design">
						<div class="plan-item__icon">
							<img src="<?php echo get_template_directory_uri() ?>/static/img/assets/plan/p1.png" alt="Plan Icon">
						</div>
						<div class="plan-item__text"><span>Оценка выполненных финансовых обязательств и реализация их проектов перед инвесторами.</span>
						</div>
					</div>
					<div class="plan-item__content">
						<p>Технологические компании проходят дополнительный тест: если непрофессионал за одну–две минуты может понять, чем занимается стартап, особенно в сфере b2b, — это плохой знак, который, скорее всего, означает, что у компании
							много аналогов и конкурентов
						</p>
						<p>Сейчас ИТ-компании разрабатывают настолько сложные продукты, что их суть может понять только специалист с техническим бэкграундом.</p>
					</div>
				</div>
				<div class="plan-item">
					<div class="plan-item__name">
						<h3>Продукт</h3>
					</div>
					<div class="plan-item__design">
						<div class="plan-item__icon">
							<img src="<?php echo get_template_directory_uri() ?>/static/img/assets/plan/p2.png" alt="Plan Icon">
						</div>
						<div class="plan-item__text"><span>Анализируя продукт компании, <br>стоит задать несколько <br>ключевых вопросов:</span>
						</div>
					</div>
					<div class="plan-item__content">
						<ul class="how-ul">
							<li><span> Какую конкретную проблему решает продукт, и реальная ли эта проблема?</span>
							</li>
							<li><span>Насколько инновационна технология продукта?</span>
							</li>
							<li><span>Есть ли известные компании среди клиентов?</span>
							</li>
							<li><span>Какие отзывы у клиентов?</span>
							</li>
							<li><span>Есть ли у основателей зарегистрированные патенты или интеллектуальная собственность?</span>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="app dis-flex justify-content-center">
	<div class="col-lg-11 dis-flex justify-content-center">
		<div class="<?php echo $mainWrapper; ?>">
			<div class="app-big">
				<p>Исходя из нашего опыта, лучше выбирать тот продукт, который нацелен на корпоративных клиентов. Стартапы, работающие по модели b2b, обычно более стабильны, чем те, которые продают свой продукт частным клиентам. Бизнес b2b-компаний
					основан на долгосрочных контрактах, не так подвержен скачкам в экономике и изменениям настроений пользователей.
				</p>
			</div>
			<div class="app-wrapper">
				<div class="app-text">
					<p>Дополнительно мы смотрим отзывы о продукте.</p>
					<p>Если это приложение, то рейтинг Facebook, App Store и Google Play.</p>
					<p>Если стартап разрабатывает корпоративное программное обеспечение,
						<br>изучаем отзывы на G2 Crowd, Gartner и Reddit.
					</p>
				</div>
				<div class="app-icons">
					<ul>
						<li>
							<a href="#" target="_blank">
								<img src="<?php echo get_template_directory_uri() ?>/static/img/assets/app/a1.svg" alt="App Icon">
							</a>
						</li>
						<li>
							<a href="#" target="_blank">
								<img src="<?php echo get_template_directory_uri() ?>/static/img/assets/app/a2.svg" alt="App Icon">
							</a>
						</li>
						<li>
							<a href="#" target="_blank">
								<img src="<?php echo get_template_directory_uri() ?>/static/img/assets/app/a3.svg" alt="App Icon">
							</a>
						</li>
						<li>
							<a href="#" target="_blank">
								<img src="<?php echo get_template_directory_uri() ?>/static/img/assets/app/a4.svg" alt="App Icon">
							</a>
						</li>
						<li>
							<a href="#" target="_blank">
								<img src="<?php echo get_template_directory_uri() ?>/static/img/assets/app/a5.svg" alt="App Icon">
							</a>
						</li>
						<li>
							<a href="#" target="_blank">
								<img src="<?php echo get_template_directory_uri() ?>/static/img/assets/app/a6.svg" alt="App Icon">
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="app-big">
				<p>Еще один плюс — наличие у основателей патентов и интеллектуальной
					<br>собственности на разрабатываемый продукт. Это сможет обезопасить
					<br>от потенциальных конкурентов в будущем.
				</p>
			</div>
		</div>
	</div>
</section>
<section class="idea dis-flex justify-content-center">
	<div class="col-lg-11 dis-flex justify-content-center">
		<div class="<?php echo $mainWrapper; ?>">
			<div class="idea-items">
				<div class="idea-item">
					<div class="idea-item__name">
						<h3>Команда</h3>
					</div>
					<div class="idea-item__design">
						<div class="idea-design__icon">
							<img src="<?php echo get_template_directory_uri() ?>/static/img/assets/idea/i1.png" alt="Idea">
						</div>
						<div class="idea-design__text"><span>Команда стартапа — один из ключевых механизмов в будущем успехе компании. При анализе этого пункта мы обращаем внимание:</span>
						</div>
					</div>
					<div class="idea-item__text">
						<p>Кто основатели, есть ли у них опыт работы в успешных компаниях.</p>
						<p>Есть ли у основателей опыт продажи стартапов в прошлом.</p>
						<p>Часто бывает, что они уже продали не одну компанию Google или Facebook, прежде чем запускать текущий бизнес («серийные предприниматели»).</p>
						<p>Насколько активно растет команда стартапа, есть ли у компании открытые вакансии. Позитивный знак, если стартапы активно ищут новых людей, а, значит, создают точки роста по новым направлениям и в новых регионах.</p>
					</div>
				</div>
				<div class="idea-item">
					<div class="idea-item__name">
						<h3>Модель бизнеса</h3>
					</div>
					<div class="idea-item__design">
						<div class="idea-design__icon">
							<img src="<?php echo get_template_directory_uri() ?>/static/img/assets/idea/i2.png" alt="IDea">
						</div>
						<div class="idea-design__text"><span>У компании может быть сервис, решающий насущную проблему, и крутая команда, но она легко может утратить свой источник выручки. Так было со Snapchat — в Instagram вышли сториз, и бизнес Snapchat начал активно терять долю рынка.</span>
						</div>
					</div>
					<div class="idea-item__content">
						<ul class="how-ul">
							<li><span>Какие основные источники выручки у компании? </span>
							</li>
							<li><span>Насколько устойчива эта модель в нынешних условиях?</span>
							</li>
							<li> <span>Есть ли возможность проверить размеры выручки относительно количества клиентов и цены за пользование продуктом?</span>
							</li>
							<li> <span>Легко ли сделать похожий продукт?</span>
							</li>
						</ul>
					</div>
				</div>
				<div class="idea-item">
					<div class="idea-item__name">
						<h3>Конкуренты</h3>
					</div>
					<div class="idea-item__design">
						<div class="idea-design__icon">
							<img src="<?php echo get_template_directory_uri() ?>/static/img/assets/idea/i3.png" alt="IDea">
						</div>
						<div class="idea-design__text"><span>Исходя из анализа рынка мы находим актуальных конкурентов и выясняем, чем выбранная компания от них отличается. Часто бывает, что мы анализируем стартап, замечаем конкурента и начинаем рассматривать его как потенциального кандидата для инвестиции.</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="evaluation dis-flex justify-content-center">
	<div class="col-lg-11 dis-flex justify-content-center">
		<div class="<?php echo $mainWrapper; ?>">
			<div class="title">
				<h2>Как работает оценка <br>сравнительным анализом:</h2>
			</div>
			<div class="evaluation-items">
				<div class="evaluation-item">
					<div class="evaluation-item__number"><span>01</span>
					</div>
					<div class="evaluation-item__text"><span>Мы определяем <br>список компаний.</span>
					</div>
				</div>
				<div class="evaluation-item">
					<div class="evaluation-item__number"><span>02</span>
					</div>
					<div class="evaluation-item__text"><span>Находим выручку компании на момент IPO или поглощения в форме S-1, либо в других открытых источниках.<i>Также находим стоимость компании на размещении/при продаже.</i></span>
					</div>
				</div>
				<div class="evaluation-item">
					<div class="evaluation-item__number"><span>03</span>
					</div>
					<div class="evaluation-item__text"><span> Считаем средний показатель <br>Price-to-Sales по индустрии.</span>
					</div>
				</div>
				<div class="evaluation-item">
					<div class="evaluation-item__number"><span>04</span>
					</div>
					<div class="evaluation-item__text"><span>Определяем стоимость стартапа<br>согласно среднему показателю <br>по индустрии.</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="rating dis-flex justify-content-center">
	<div class="col-lg-11 dis-flex justify-content-center">
		<div class="<?php echo $mainWrapper; ?>">
			<div class="title">
				<h2>Оценка компании</h2>
			</div>
			<div class="rating-text">
				<p>Мы анализируем текущую цену компании исходя из P/S (помним: на момент выхода компании на IPO — 15x, на момент поглощения — 23х). Допустим, если компания оценена инвесторами в $2 млрд, при этом выручка компании находится в районе
					$100 млн (P/S = 20x) и отсутствуют данные по росту клиентов и выручки — есть большие риски купить компанию по завышенной оценке.
				</p>
				<p class="paragraph-big">Исходя из этого, мы нацелены на стартапы, которые оценены не дороже 15х относительно своей выручки.</p>
				<p>Вдобавок мы обращаем внимание на изменение стоимости компании со временем: стабильно растущая оценка стартапа на каждом раунде инвестиций — позитивный фактор. Также смотрим, как давно компания провела последний раунд: если стартап
					последний раз привлекал инвестиции более трех лет назад, при этом отсутствуют данные по росту выручки и клиентов, это можно расценивать как негативный фактор.
				</p>
			</div>
		</div>
	</div>
</section>
<section class="where dis-flex justify-content-center">
	<div class="col-lg-11 dis-flex justify-content-center">
		<div class="<?php echo $mainWrapper; ?>">
			<div class="title">
				<h2>Где мы ищем</h2>
			</div>
			<div class="where-design">
				<div class="where-design__icon">
					<img src="<?php echo get_template_directory_uri() ?>/static/img/assets/where/w1.svg" alt="Where Icon">
				</div>
				<div class="where-design__text"><span>Потенциальные Цукерберги пока не носят галстучки и не выступают в Конгрессе США. Да, инвестиции на последних раундах — это уже не стартапы в общежитии, а довольно большие компании, но, чтобы их найти, надо знать, где искать.</span>
				</div>
			</div>
			<div class="where-items">
				<div class="where-item">
					<p>В первую очередь мы изучаем рейтинги компаний, которые занимаются аналитикой стартапов — CB Insights, Pitchbook. Также смотрим более известные рейтинги, такие как The cloud 100 от Forbes, Technology Fast 500 от Deloitte и Cybersecurity
						500.
					</p>
				</div>
				<div class="where-item">
					<p>А также текущие раунды инвестиций ведущих венчурных фондов: Andreessen Horowitz, Kleiner Perkins, Sequoia Capital, Accel, New Enterprise Associates. Мониторим новости рынка венчурных инвестиций на Silicon Valley Business Journal
						и Crunchbase.
					</p>
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_template_part('partials/content', 'time'); ?>

<?php get_footer(); ?>