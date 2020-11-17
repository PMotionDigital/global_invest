<?php
get_header();
$mainWrapper = 'col-lg-8 col-md-10 col-lm-11 col-xs-11';
?>

<section class="article dis-flex justify-content-center">
	<div class="col-lg-11 dis-flex justify-content-center">
		<div class="<?php echo $mainWrapper; ?>">

		<a href="/novosti/" class="single-back">
			&#8592; Вернуться в новости
		</a>
		<div class="single-content col-lg-8 col-lm-12 col-xs-12">
			<h1><?php the_title() ?></h1>
			<?php

				//$info = file_get_contents('https://finnhub.io/api/v1/quote?symbol=AAPL&token=bttiuof48v6or4rafi40');
				//$info = json_decode($info, true);
				//print_r($info);	

			 the_content(); ?>

		</div>
		</div>
	</div>
</section>

<?php get_template_part('partials/content', 'time'); ?>

<?php get_footer(); ?>