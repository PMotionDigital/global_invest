<?php
$user = wp_get_current_user();  ?>
<div class="col-lg-8 col-xs-12 padding-l changable">
	<div class="col-lg-12 profile_content profile_white">
		<div class="section-title type-2 bb">
			<h2>История операций</h2>
		</div>
		<?php if (have_rows('istoriya_operaczij', $user)) : ?>
			<div class="profile-history">
				<?php if (!wp_is_mobile()) : ?>
					<div class="profile-history_row title-row">
						<div class="profile-history_row-item section-title type-3">
							<p>Тип операции</p>
						</div>
						<div class="profile-history_row-item section-title type-3">
							<p>Сумма</p>
						</div>
						<div class="profile-history_row-item section-title type-3">
							<p>Данные</p>
						</div>
						<div class="profile-history_row-item section-title type-3">
							<p>Статус</p>
						</div>
						<div class="profile-history_row-item section-title type-3">
							<p>Дата</p>
						</div>
					</div>
				<?php endif; ?>

				<?php
				$repeater = array_reverse(get_field('istoriya_operaczij', $user));
				foreach ($repeater as $i => $row) : ?>
					<div class="profile-history_row">
						<div class="profile-history_row-item">
							<?php
							if (wp_is_mobile()) {
								echo '<span class="section-title type-3"><span>Тип операции: </span></span>';
							};
							$type_data = $row['tip_operaczii'];
							
							if ($row['product']) :
								//echo '<br><span class="product-name" style="display: inline-block; opacity: .8; padding-top: .3rem;">' . get_the_title($row['product']) . '</span>';
								echo 'Продажа '.get_the_title($row['product']);
							else:
								echo $type_data['label'];
							endif; ?>
						</div>
						<div class="profile-history_row-item">
							<?php
							if (wp_is_mobile()) {
								echo '<span class="section-title type-3"><span>Сумма: </span></span>';
							};
							echo number_format($row['summa'], 2, ',', ' ');
							$currency = $row['valyuta'];
							echo ' ' . $currency['label']; ?>
						</div>
						<div class="profile-history_row-item">
							<?php
							if (wp_is_mobile()) {
								echo '<span class="section-title type-3"><span>Данные: </span></span>';
							};
							$payment_data = $row['dannye'];
							if ($type_data['value'] == 'buy') {
								$post_type = get_post($row['product'])->post_type;
								$type_label = get_post_type_object( $post_type )->label;
								echo $type_label;
							} else {
								echo $payment_data['label'];
							}

							?>
						</div>

						<?php $status_data = $row['status']; ?>
						<div class="profile-history_row-item <?php echo $status_data['value'] ?>">
							<?php
							if (wp_is_mobile()) {
								echo '<span class="section-title type-3"><span>Статус: </span></span>';
							};
							echo $status_data['label']; ?>
						</div>
						<div class="profile-history_row-item">
							<?php
							if (wp_is_mobile()) {
								echo '<span class="section-title type-3"><span>Дата: </span></span>';
							};
							echo $row['data']; ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</div>