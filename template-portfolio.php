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
									<a href="#" class="button-modal" 
									data-min="10000"
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

<!-- start content gutenberg -->
<section class="page-content page-content-gutenberg dis-flex justify-content-center">
	<div class="col-lg-11 dis-flex justify-content-center">
		<div class="<?php echo $mainWrapper; ?>">
			<?php the_content(); ?>
		</div>
	</div>
</section>
<!-- end content gutenberg -->
<?php get_template_part('partials/content', 'time'); ?>
<?php get_footer(); ?>