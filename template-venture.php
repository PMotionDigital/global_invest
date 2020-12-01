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