<?php 
$user = wp_get_current_user();  ?>
<div class="col-lg-8 col-xs-12 padding-l changable">
	<div class="col-lg-12 profile_content profile_white">
		<div class="section-title type-2 bb">
			<h2>Поддержка</h2>
		</div>
		<script>
			wpcf7.initForm(jQuery('.profile-form .wpcf7-form'));
		</script>
		<div class="profile-form support">
			<?php echo do_shortcode('[contact-form-7 id="777" title="Поддержка"]'); ?>
		</div>
	</div>
</div>
