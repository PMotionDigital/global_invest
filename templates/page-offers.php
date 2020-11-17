<?php /* Template Name: Наши предложения */ ?>
<?php
get_header();
$mainWrapper = 'col-lg-8 col-md-10 col-lm-11 col-xs-11';
?>
<section id="offers" class="offers dis-flex flex-wrap-wrap justify-content-center">
	<div class="col-lg-11">
		<div class="section-title text-center">
			<h2><?php the_field('offers_title') ?></h2>
		</div>
	</div>
	<div class="col-lg-11">
		<div class="offers-items">
			<?php $offersLoop = get_field('offers_loop', 7); ?>
			<?php $counter = 1;
			foreach ($offersLoop as $offers) : ?>
				<div class="offers-item item-count-<?php echo $counter; ?>">
					<div class="offers-item__photo">
						<?php $offersImage = $offers['image']; ?>
						<img src="<?php echo $offersImage['sizes']['large'] ?>" alt="Offers">
					</div>
					<div class="offers-item__info col-lg-8">
						<h4><?php echo $offers['title']; ?></h4>
						<p><?php echo $offers['text'] ?></p>
						<a href="#" data-text="Узнать больше" class="button button-small">
							<span>Узнать больше </span>
							<div class="bg">
								<img src="https://images.unsplash.com/photo-1507679799987-c73779587ccf?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1351&q=80">
							</div>
						</a>
					</div>
				</div>
			<?php $counter++;
			endforeach; ?>
		</div>
	</div>
</section>
<?php get_template_part('partials/content', 'time'); ?>

<?php get_footer(); ?>