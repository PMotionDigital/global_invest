<?php
get_header();
$mainWrapper = 'col-lg-8 col-md-10 col-lm-11 col-xs-11';
?>
<section class="news dis-flex justify-content-center">
	<div class="col-lg-11 dis-flex justify-content-center">
		<div class="<?php echo $mainWrapper; ?>">
		<?php
		//if ( function_exists('yoast_breadcrumb') ) {
		//yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
		//}
		?>
			<div class="news-title">
				<h2>Будьте в курсе <br>последних событий</h2>
			</div>
			<div class="news-categories">
				<?php wp_nav_menu([
					'theme_location'  => 'category',
					'menu_class'      => 'global-tags',
					'container'       => 'ul',
				]); ?>
			</div>

			<!-- News Items -->
			<?php if (have_posts()) : ?>
				<div class="news-items">
					<?php while (have_posts()) : the_post(); ?>
						<!-- News Item -->
						<div class="news-item">
							<?php $categoryID = get_the_ID(); ?>

							<?php $categoryPost = get_the_category($categoryID)[0]; ?>
							<div class="news-item__date"><span><?php echo get_the_date('j') ?> </span><?php echo get_the_date('F Y') ?></div>
							<div class="news-item__wrapper">
								<a href="<?php the_permalink() ?>" class="news-item__photo">
									<?php the_post_thumbnail('medium_large') ?>
								</a>
								<div class="news-item__text">
									<div class="news-item__catg"><a href="<?php echo get_term_link($categoryPost->term_id) ?>"><?php echo $categoryPost->name; ?></a>
									</div>
									<a href="<?php the_permalink() ?>" class="news-item__title">
										<h4><?php the_title() ?></h4>
									</a>
									<div class="news-item__paragraph">
										<p><?php the_excerpt() ?></p>
									</div>
								</div>
							</div>
						</div>
						<!-- End News Item -->
					<?php endwhile; ?>
				</div>
				<!-- End News Items -->
			<?php endif; ?>
		</div>
	</div>
</section>

<?php get_template_part('partials/content', 'time'); ?>


<?php get_footer(); ?>