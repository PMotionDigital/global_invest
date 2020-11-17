<?php 
$user = wp_get_current_user();  ?>
<div class="col-lg-8 col-xs-12 padding-l changable">
	<div class="col-lg-12 profile_content profile_white">
		<div class="section-title type-2 bb">
			<h2>Перевод средств</h2>
		</div>
			<script>
				wpcf7.initForm(jQuery('.profile-form .wpcf7-form'));
				console.log('free money '+localStorage.getItem('free_money'));
				jQuery('[name="your-payment"]').attr('placeholder','До '+Number(localStorage.getItem('free_money')).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ").replace('.',',') + ' $');
				jQuery('[name="your-payment"]').attr('max', localStorage.getItem('free_money'));



			</script>
		<div class="profile-form">
			<?php echo do_shortcode('[contact-form-7 id="775" title="Вывод средств"]'); ?>
		</div>
		<script>
			if(localStorage.getItem('free_money') <= 0) {
				jQuery('.profile-form').html(`
					<div class="section-title type-2">
						<h3>Вывод средств недоступен</h3>
					</div>

				`);
			}
		</script>
		<?php if(have_rows('rekvizity', $user)): ?>
		<div class="profile-req">
			<div class="profile-req_title">
				<h4>Мои реквизиты</h4>
			</div>
			<ul class="profile-req_wrap">
			<?php while(have_rows('rekvizity', $user)): the_row(); ?>
				<li>
					<div><?php the_sub_field('zagolovok'); ?></div>
					<div><?php the_sub_field('znachenie'); ?></div>
				</li>
			<?php endwhile; ?>
			</ul>
		</div>
		<?php endif; ?>
	</div>
</div>