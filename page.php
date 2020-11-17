<?php
get_header();
$mainWrapper = 'col-lg-8 col-md-10 col-lm-11 col-xs-11';
?>

<section class="article dis-flex justify-content-center">
	<div class="col-lg-11 dis-flex justify-content-center">
		<div class="<?php echo $mainWrapper; ?>">

		<?php
		if ( function_exists('yoast_breadcrumb') ) {
		yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
		}
		?>
		<div class="single-content col-lg-8 col-lm-12 col-xs-12">
			<h1><?php the_title() ?></h1>

			<?php the_content(); ?>
		</div>
		</div>
	</div>
</section>

<?php get_template_part('partials/content', 'time'); ?>

<?php get_footer(); ?>