<?php /* Template Name: Вопрос - ответ*/ ?>
<?php
	get_header();
	$mainWrapper = 'col-lg-8 col-md-10 col-lm-11 col-xs-11';

	add_filter( 'body_class','my_class_names' );
	function my_class_names( $classes ) {
		$body_color = 'pizdaqaaqaaaaaaa';
			
		$classes = $body_color;
		
		return $classes;
	}
?>

<section class="qa dis-flex flex-wrap-wrap justify-content-center">
	<div class="col-lg-11 dis-flex justify-content-center">
		<div class="<?php echo $mainWrapper; ?>">
			<div class="title">
				<h1><?php the_field('faq_title'); ?></h1>
			</div>
		</div>
	</div>
	<div class="qa-wrapper col-lg-12 dis-flex justify-content-center">
		<div class="col-lg-11 dis-flex justify-content-center">
			<div class="<?php echo $mainWrapper; ?>">
				<div class="title">
					<h2><?php the_field('faq_subtitle'); ?></h2>
				</div>
				<div class="faq-items">
					<?php $faqLoop = get_field('faq_loop'); ?>
					<?php foreach ($faqLoop as $point) : ?>
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
					<?php endforeach; ?>


				</div>
			</div>
		</div>
	</div>
</section>
<?php get_template_part('partials/content', 'time'); ?>


<?php get_footer(); ?>