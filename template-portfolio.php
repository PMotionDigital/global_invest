<?php /* Template Name: Инвестиционный портфель */ ?>
<?php
get_header();
$mainWrapper = 'col-lg-8 col-md-10 col-lm-11 col-xs-11';
?>

<section class="portfolio dis-flex justify-content-center">
	<div class="col-lg-11 dis-flex justify-content-center">
		<div class="<?php echo $mainWrapper; ?>">
			<div class="title">
				<h1>Собираем инвестиционный <br>портфель под контролем <br>аналитиков</h1>
			</div>
			<div class="portfolio-paragraph">
				<p class="paragraph-big">Инвестиционный портфель — это набор финансовых инструментов, отобранных
					<br>по критериям риска и доходности. На выбор активов влияют рекомендации
					<br>наших аналитиков.
				</p>
				<p>Такой вариант оптимально подходит для начинающих.</p>
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
					'post_type'			=> 'investement_case'
				));

				if ($posts) : foreach ($posts as $post) :
						setup_postdata($post);
				?>
						<div class="actual-item" data-post-id="<?php echo $post->ID; ?>">
							<div class="actual-item__icon">
								<img src="<?php the_field('logotip_kompanii'); ?>" alt="<?php the_title(); ?>">
							</div>
							<div class="actual-item__span"> <span><?php the_field('sektor'); ?></span>
							</div>
							<div class="actual-item__name profile-offers_item-name"><span><?php the_title();  ?></span>
							</div>
							<div class="actual-item__spec"><span><?php the_field('kratkoe_opisanie_kompanii'); ?></span>
							</div>
							<div class="actual-item__list">
								<ul>
									<li><span>Прогноз дохода: </span><span><?php the_field('prognoz_dohoda'); ?></span>
									</li>
									<li> <span>Дата инспирации: </span><span><?php the_field('data_inspiraczii'); ?></span>
									</li>
								</ul>
							</div>
							<?php 
							if(current_user_can('subscriber')): ?>
								<div class="actual-item__link profile-offers_item-buy">
									<a href="#" class="button-modal" data-modal="buy-case">инвестировать</a>
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

<section class="direction dis-flex justify-content-center">
	<div class="col-lg-11 dis-flex justify-content-center">
		<div class="<?php echo $mainWrapper; ?>">
			<div class="title">
				<h2>Подробнее о направлении работы</h2>
			</div>
			<div class="direction-paragraph">
				<p>Инвестиционные портфели формируются на период 6-12 месяцев из определенного
					<br>списка компаний на основании детального анализа наших специалистов.
				</p>
				<p>У каждого комплекта есть характеристики:</p>
			</div>
			<div class="direction-wrapper">
				<div class="direction-items">
					<div class="direction-item">
						<div class="direction-item__icon">
							<img src="<?php echo get_template_directory_uri() ?>/static/img/assets/direction/star.svg" alt="Star">
						</div>
						<div class="direction-item__text">
							<span>Тип <br>инструментов</span>
							<p>В состав портфеля могут входить только акции, только облигации, или он может быть смешанным.</p>
						</div>
					</div>
					<div class="direction-item">
						<div class="direction-item__icon">
							<img src="<?php echo get_template_directory_uri() ?>/static/img/assets/direction/star.svg" alt="Star">
						</div>
						<div class="direction-item__text">
							<span>Степень <br> риска</span>
							<p>Портфель может быть сбалансированным: в таком портфеле сочетаются низкорисковые бумаги с высокорисковыми или только инструменты со средним уровнем риска.</p>
						</div>
					</div>
				</div>
				<div class="direction-items">
					<div class="direction-item">
						<div class="direction-item__icon">
							<img src="<?php echo get_template_directory_uri() ?>/static/img/assets/direction/star.svg" alt="Star">
						</div>
						<div class="direction-item__text">
							<span>Степень <br> диверсификации</span>
							<p>Например, может быть портфель, в который входят бумаги только ИТ-компаний или крупныхгосударственных корпораций. Диверсификация достигается за счет включения бумаг из разных секторов и позволяет снизить степень риска
								вложений.
							</p>
						</div>
					</div>
					<div class="direction-item">
						<div class="direction-item__icon">
							<img src="<?php echo get_template_directory_uri() ?>/static/img/assets/direction/star.svg" alt="Star">
						</div>
						<div class="direction-item__text">
							<span>Горизонт <br>инвестирования</span>
							<p>Время, на которое
								<br>открывается портфель.
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="direction-how">
				<div class="title">
					<h2>Как аналитики формируют <br>портфель</h2>
				</div>
				<div class="direction-paragraph">
					<p>Задача аналитика — проанализировать компании и их ценные бумаги, а затем отобрать наиболее привлекательные, исходя из целей портфеля.</p>
					<p>В этом ему помогают информация и опыт.</p>
				</div>
				<div class="direction-points">
					<div class="direction-point">
						<div class="direction-point__top">
							<div class="direction-point__icon">
								<img src="<?php echo get_template_directory_uri() ?>/static/img/assets/direction/d1.svg" alt="Direction">
							</div>
							<div class="direction-point__span"> <span>Информация</span>
							</div>
						</div>
						<div class="direction-point__text">
							<p>Речь идет о доступе к различным ресурсам. Например, терминалам Bloomberg, Thomson Reuters, финансово-экономическим и отраслевым изданиям. Стоимость подписки на многие ресурсы слишком высока для обычного человека, поэтому
								доступ к информации является преимуществом при сотрудничестве с хедж-фондом Global Secure Invest.
							</p>
						</div>
					</div>
					<div class="direction-point">
						<div class="direction-point__top">
							<div class="direction-point__icon">
								<img src="<?php echo get_template_directory_uri() ?>/static/img/assets/direction/d1.svg" alt="Direction">
							</div>
							<div class="direction-point__span"><span>Опыт</span>
							</div>
						</div>
						<div class="direction-point__text">
							<p>Аналитики постоянно отслеживают и обсуждают с коллегами по инвестиционному бизнесу ситуацию на рынке, новости и отчетность эмитентов, изменения в законодательстве. Они также участвуют в телеконференциях и встречах с
								руководством компаний, где могут задать вопросы, касающиеся результатов деятельности компаний и их планов на будущее.
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="usa dis-flex justify-content-center">
	<div class="col-lg-11 dis-flex justify-content-center">
		<div class="<?php echo $mainWrapper; ?>">
			<div class="usa-items">
				<div class="usa-item">
					<p class="paragraph-big">В США на биржах NYSE и Nasdaq представлено около 4 тысяч компаний, в России на Московской бирже — 200. Соответственно, у инвестора на российском рынке будет более ограниченный выбор бумаг, поэтому оценка качества эмитентов
						приобретает еще большее значение.
					</p>
					<p>И это еще одно большое преимущество при сотрудничестве с Global Secure Invest, так как выбор
						<br>инструментов для формирования портфелей не ограничен.
					</p>
				</div>
				<div class="usa-item">
					<p class="paragraph-big">Другая важная задача наших аналитиков — периодически проводить ребалансировку портфеля, то есть заменять в нем ценные бумаги для достижения большей доходности и для минимизации рисков.</p>
					<p>Например, в период пандемии, многие крупные компании понесли большие убытки
						<br>и ребалансировка портфелей просто была необходима.
					</p>
					<p>С этой задачей компания Global Secure Invest справилась на отлично и смогла не только
						<br>минимизировать убытки, но и получить прибыль.
					</p>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="important dis-flex justify-content-center">
	<div class="col-lg-11 dis-flex justify-content-center">
		<div class="<?php echo $mainWrapper; ?>">
			<div class="title">
				<h2>Еще раз о том, что важно</h2>
			</div>
			<div class="important-paragraph">
				<p>Собрать инвестиционный портфель может любой человек, но у профессионалов
					<br>в этой области будет преимущество. Это как с выбором вина — можно ткнуть наугад
					<br>в дорогую бутылку и угадать, а можно воспользоваться мнением сомелье
					<br>и подобрать что-то действительно стоящее.
				</p>
				<p>За портфелем нужно следить и вносить в него изменения в зависимости от ситуации в экономике
					<br>и изменения инвестиционной привлекательности ценных бумаг. Это требует знаний и времени.
				</p>
			</div>
		</div>
	</div>
</section>
<?php get_template_part('partials/content', 'time'); ?>
<?php get_footer(); ?>