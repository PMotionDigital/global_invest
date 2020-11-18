<?php /* Template Name: Венчурные инвестиции */ ?>
<?php
get_header();
$mainWrapper = 'col-lg-8 col-md-10 col-lm-11 col-xs-11';
?>

<section class="venture dis-flex justify-content-center">
	<div class="col-lg-11 dis-flex justify-content-center">
		<div class="<?php echo $mainWrapper; ?>">
			<div class="title">
				<h1>Венчурные инвестиции:<br>получаем прибыль или долю <br>в компании-стартапе</h1>
			</div>
			<div class="venture-paragraph">
				<p class="paragraph-big">Венчурные инвестиции — это долгосрочные (от 3 до 10 лет) вложения в стартапы
					<br>на ранних стадиях их развития в обмен на часть прибыли или долю в компании.
				</p>
				<p>Риски высоки, но и потенциальный выигрыш очень привлекателен.</p>
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
			<div class="actual-items">
				<?php
				$posts = get_posts(array(
					'posts_per_page'	=> -1,
					'post_type'			=> 'venture_investments'
				));

				if ($posts) : foreach ($posts as $post) :
						setup_postdata($post);
				?>
						<div class="actual-item" data-post-id="<?php echo $post->ID; ?>">
							<div class="actual-item__icon">
							<img src="<?php echo get_field('logotip_kompanii'); ?>" alt="<?php the_title(); ?>">
							</div>
							<div class="actual-item__span"> <span><?php the_field('sector'); ?></span>
							</div>
							<div class="actual-item__name profile-offers_item-name"><span><?php the_title();  ?></span>
							</div>
							<div class="actual-item__spec"><span><?php the_field('kratkoe_opisanie_kompanii'); ?></span>
							</div>
							<div class="actual-item__list">
								<ul>
									<li><span>Размер инвестиций: </span><span><?php the_field('razmer_investiczij'); ?></span>
									</li>
									<li> <span>Условия: </span><span><?php the_field('usloviya'); ?></span>
									</li>
									<li class="stadia col-lg-6">
										<span>Стадия: </span>
										<span><?php the_field('stadiya'); ?></span>
										<div class="line">
											<div class="subline" style="width:<?php the_field('stadiya'); ?>;"></div>
										</div>
									</li>
									<li class="location"><span><?php the_field('lokacziya'); ?></span>
									</li>
								</ul>
							</div>
							<?php 
							if(current_user_can('subscriber')): ?>
								<div class="actual-item__link profile-offers_item-buy">
									<a href="#" class="button-modal" 
									data-min="100000"
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
</section>
<section class="why dis-flex justify-content-center">
	<div class="col-lg-11 dis-flex justify-content-center">
		<div class="<?php echo $mainWrapper; ?>">
			<div class="title">
				<h2>Зачем люди выбирают <br>это направление</h2>
			</div>
			<div class="why-design">
				<div class="why-design__icon">
					<img src="<?php echo get_template_directory_uri() ?>/static/img/assets/why/w1.png" alt="Why">
				</div>
				<div class="why-design__text"><span>Основная причина — доходность. Венчурные инвестиции являются<br>самым высокодоходным активом в мире, а успешные <br>вкладчики плотно сидят в списках Forbes.</span>
				</div>
			</div>
			<div class="why-items">
				<div class="why-item">
					<p>Для понимания порядка цифр: первые инвестиции в Google составили всего $100.000, в Facebook — $500.000, в Apple — $150.000. Сегодня даже минимальные доли этих компаний стоят десятки миллиардов долларов. Текущие капитализации
						Apple и Google превышают триллион долларов, а капитализация Facebook составляет $600 миллиардов.
					</p>
				</div>
				<div class="why-item">
					<p>Существует также неденежная причина, по которой инвесторов тянет в венчур. Грубо говоря, это эмоции. Так, инвестиции в металлургический завод дают только прибыль. Вклады в Tesla или SpaceX дают прибыль и причастность к инновационному
						бизнесу. А крупные инвестиции в подобные компании превращают инвестора в рок-звезду венчурного мира.
					</p>
				</div>
			</div>
			<div class="title">
				<h2>Как работают венчурные инвестиции</h2>
			</div>
			<div class="why-works">
				<div class="why-works__item">
					<p>Задача венчурного инвестора — найти компанию, которая многократно вырастет, окупит вложения и заработает прибыль сверху. Причем лучше отыскать одну суперзвезду и потерять деньги на остальных сделках, чем попасть в несколько
						средних компаний.
					</p>
					<p>В классическом виде венчурная математика выглядит так:</p>
					<ul class="how-ul how-ul__red">
						<li><span>Инвестор вкладывает деньги в десять компаний</span>
						</li>
						<li><span>Три компании погибают в первый год</span>
						</li>
						<li><span>Еще три компании погибают во второй год</span>
						</li>
						<li><span>Три компании показывают посредственный рост</span>
						</li>
						<li><span>Одна компания взлетает, увеличивая инвестиции в десятки или сотни раз</span>
						</li>
					</ul>
				</div>
				<div class="why-works__item">
					<p class="paragraph-big">Конечно, в зависимости стадии развития венчурных проектов математика может меняться.</p>
					<p>Если инвестор финансирует компании на совсем ранней стадии, то число неудач увеличивается. За это он получает хорошую долю за небольшие деньги.</p>
					<p class="paragraph-small">Такого спонсора называют бизнес-ангелом, а раунд финансирования — ангельским раундо</p>
					<p class="paragraph-small">Средний размер доли инвестора на ангельском раунде составляет 5%-10%.</p>
					<p class="paragraph-small">Средний размер инвестиций — от $100K до $1M.</p>
					<p class="paragraph-big">Если инвестор финансирует компании, которые проверили бизнес-модель, получили клиентов и имеют растущую выручку, то число неудач сокращается.</p>
					<p class="paragraph-small">Но растет и стоимость входа: средний чек начинается с $10M.</p>
					<p class="paragraph-small">Такие сделки происходят на литеральных раундах, а основными инвесторами выступают крупные фонды.</p>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="general dis-flex justify-content-center">
	<div class="col-lg-11 dis-flex justify-content-center">
		<div class="<?php echo $mainWrapper; ?>">
			<div class="general-wrapper">
				<p class="paragraph-big">В общем виде правило такое: чем раньше зайти в сделку, тем больше рисков и тем выше прибыль.</p>
				<p class="paragraph-big">При этом средний срок венчурной инвестиции составляет 7-10 лет.</p>
				<p>Широкий венчурный капитал все равно обгоняет фондовые индексы. Согласно данным Cambridge Associates, за двадцать пять лет он показал 13,38% ежегодной доходности против 9,83% доходности индекса S&P 500.</p>
				<p>А доходность венчурного капитала ранних стадий составила 54,4%.</p>
			</div>
		</div>
	</div>
</section>

<section class="examples dis-flex justify-content-center">
	<div class="col-lg-11 dis-flex justify-content-center">
		<div class="<?php echo $mainWrapper; ?>">
			<div class="title">
				<h2>Известные примеры</h2>
			</div>
			<div class="subtitle"><span>Несколько недавних нашумевших историй, <br>которые принесли миллиарды долларов венчурным капиталистам.</span>
			</div>
			<div class="examples-items">
				<div class="examples-item">
					<div class="examples-item__icon">
						<img src="<?php echo get_template_directory_uri() ?>/static/img/assets/examples/e1.png" alt="Examples Icon">
					</div>
					<div class="examples-item__name">Uber</div>
					<div class="examples-item__title">
						<h4>Международный <br>такси-сервис Uber</h4>
					</div>
					<div class="examples-item__paragraph">
						<p>Запустился в 2009 году, сегодня работает в 76 странах мира. Акции Uber торгуются на бирже, а капитализация компании составляет $64b. Однако еще в 2010 году Uber оценивался в $4m на ангельском раунде. Стоимость Uber выросла
							в 16 000 раз за восемь лет.
						</p>
					</div>
					<div class="examples-item__price"><span>капитализация компании составляет:</span><span>$64b</span>
					</div>
				</div>
				<div class="examples-item">
					<div class="examples-item__icon">
						<img src="<?php echo get_template_directory_uri() ?>/static/img/assets/examples/e2.png" alt="Examples Icon">
					</div>
					<div class="examples-item__name">Zoom</div>
					<div class="examples-item__title">
						<h4>Сервис видеоконференций Zoom</h4>
					</div>
					<div class="examples-item__paragraph">
						<p>Основан в 2009 году и сегодня имеет 750k пользователей. Акции Zoom торгуются на бирже, капитализация компании составляет $24b. Оценка компании на Series А была в тысячу раз меньше и составляла $24,5m. С того момента прошло
							семь лет.
						</p>
					</div>
					<div class="examples-item__price"><span>капитализация компании составляет:</span><span>$24b</span>
					</div>
				</div>
				<div class="examples-item">
					<div class="examples-item__icon">
						<img src="<?php echo get_template_directory_uri() ?>/static/img/assets/examples/e3.png" alt="Examples Icon">
					</div>
					<div class="examples-item__name">Airbnb</div>
					<div class="examples-item__title">
						<h4>Сервис аренды <br>частного жилья Airbnb</h4>
					</div>
					<div class="examples-item__paragraph">
						<p>Фактически тот же Uber, только для аренды жилья, а не для заказа такси. Airbnb запустился в 2008 году и сегодня оценивается в $35b. Это один из немногих венчурных проектов, который имеет положительную операционную прибыль.
							Оценка компании на ангельском раунде была $2,5m. Она выросла в 14 000 раз.
						</p>
					</div>
					<div class="examples-item__price"><span>капитализация компании составляет:</span><span>$35b</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_template_part('partials/content', 'time'); ?>
<?php get_footer(); ?>