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

				<?php if (have_rows('otc_loop')) : ?>
					<?php while (have_rows('otc_loop')) : the_row(); ?>
						<div class="otc-item">
							<span><?php the_sub_field('name'); ?></span>
							<p><?php the_sub_field('text'); ?></p>
						</div>
				<?php endwhile;
				endif; ?>
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