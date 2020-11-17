<?php /* Template Name: О нас */ ?>
<?php
get_header();
$mainWrapper = 'col-lg-8 col-md-10 col-lm-11 col-xs-11';
?>
<section class="about dis-flex justify-content-center">
	<div class="col-lg-11 dis-flex justify-content-center">
		<div class="<?php echo $mainWrapper; ?>">
			<div class="title">
				<h1><?php the_field('about_title') ?></h1>
			</div>
			<div class="about-paragraph">
				<p class="paragraph-big">
					<?php the_field('about_subtitle'); ?>
				</p>
				<p>
					<?php the_field('about_text'); ?>
				</p>
			</div>
		</div>
	</div>
</section>

<section class="around dis-flex justify-content-center">
	<div class="col-lg-11 dis-flex justify-content-center">
		<div class="<?php echo $mainWrapper; ?>">
			<div class="around-wrapper">
				<div class="around-left">
					<div class="title">
						<h2><?php the_field('around_title') ?></h2>
					</div>
					<div class="around-paragraph">

						<?php $aroundLoop = get_field('around_loop'); ?>
						<?php foreach ($aroundLoop as $loop) : ?>
							<p class="paragraph-big">
								<?php echo $loop['title']; ?>
							</p>
							<p><?php echo $loop['text'] ?></p>
						<?php endforeach; ?>

					</div>
				</div>
				<div class="around-right">
					<div class="around-image">
						<img src="<?php echo get_template_directory_uri() ?>/static/img/assets/around/ar1.jpg" alt="Around">
					</div>
					<div class="around-plan">

						<div class="around-plan__items">
							<?php $planeLoop = get_field('plane_loop'); ?>
							<?php foreach ($planeLoop as $plane) : ?>
								<div class="around-plan__item">
									<?php $planeInter = $plane['plane_inter']; ?>
									<span>
										<?php foreach ($planeInter as $inter) : ?>
											<?php echo $inter['big'] ?><i><?php echo $inter['value'] ?></i>
										<?php endforeach; ?>
									</span>
									<span><?php echo $plane['text'] ?></span>
								</div>
							<?php endforeach; ?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_template_part('partials/content', 'time'); ?>

<?php get_footer(); ?>