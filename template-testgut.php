<?php /* Template Name: ОТС и IPO test */ ?>
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
			      
			<?php if(have_rows('otc_loop')): ?>
            <?php while(have_rows('otc_loop')): the_row(); ?>
					<div class="otc-item">
						<span><?php the_sub_field('name'); ?></span>
						<p><?php the_sub_field('text'); ?></p>
					</div>
			<?php endwhile; endif; ?>
			</div>
		</div>
	</div>
</section>
<section class="page-content"> 
	<?php the_content(); ?>
</section>
<?php get_template_part('partials/content', 'time'); ?>

<?php get_footer(); ?>