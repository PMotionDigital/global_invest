<?php
/* 
 Template Name: Личный кабинет 
 */
//acf_form_head();
get_header();
$mainWrapper = 'col-lg-8 col-md-10 col-lm-11 col-xs-12';

if (is_user_logged_in()) :
	$user = wp_get_current_user();
	$autorizated = get_field('aktivirovannyj_profil', $user);

	if ($autorizated == 'true') :

?>
		<section id="profile" class="profile dis-flex justify-content-center">
			<div class="col-lg-11 dis-flex justify-content-center">
				<div data-profile-loadwrap class="<?php echo $mainWrapper; ?> dis-flex flex-wrap-wrap baseline">
					<div class="col-lg-4 col-xs-12">
						<div class="profile_top-nav profile_white col-lg-12 dis-flex">
							<a href="/lichnyj-kabinet/" class="profile_top-nav-item current">
								<div class="image">
									<img src="<?php bloginfo('template_url'); ?>/dist/images/icons/profile.svg" alt="">
								</div>
								<span class="title-tooltip">Профиль</span>
							</a>
							<a href="#" data-link="docs" class="profile_top-nav-item">
								<div class="image">
									<img src="<?php bloginfo('template_url'); ?>/dist/images/icons/docs.svg" alt="">
								</div>
								<span class="title-tooltip">Документы</span>
							</a>
							<a href="#" data-link="transaction" class="profile_top-nav-item">
								<div class="image">
									<img src="<?php bloginfo('template_url'); ?>/dist/images/icons/transaction.svg" alt="">
								</div>
								<span class="title-tooltip">Вывод средств</span>
							</a>
							<a href="#" data-link="top-up" class="profile_top-nav-item">
								<div class="image">
									<img src="<?php bloginfo('template_url'); ?>/dist/images/icons/top_up.svg" alt="">
								</div>
								<span class="title-tooltip">Пополнить счет</span>
							</a>
							<a href="#" data-link="history" class="profile_top-nav-item">
								<div class="image">
									<img src="<?php bloginfo('template_url'); ?>/dist/images/icons/history.svg" alt="">
								</div>
								<span class="title-tooltip">История операций</span>
							</a>
							<a href="#" data-link="support" class="profile_top-nav-item">
								<div class="image">
									<img src="<?php bloginfo('template_url'); ?>/dist/images/icons/support.svg" alt="">
								</div>
								<span class="title-tooltip">Поддержка</span>
							</a>
							<a href="#" data-link="profile-edit" class="profile_top-nav-item">
								<div class="image">
									<img src="<?php bloginfo('template_url'); ?>/dist/images/icons/settings.svg" alt="">
								</div>
								<span class="title-tooltip">Изменить данные</span>
							</a>
						</div>
						<div class="profile_aside profile_white col-lg-12">
							<div class="<?php if (wp_is_mobile()) {
											echo 'mobile';
										}; ?> section-title type-2 bb">
								<h1>Ваш портфель</h1>
							</div>
							<div class="profile_aside-content">
								<div class="user-main bb dis-flex justify-content-between flex-wrap-wrap">
									<div class="user-name">
										<p class="nice-name"><?php echo $user->user_nicename; ?></p>
										<p class="user-id"><?php the_field('id_polzovatelya', $user); ?></p>
									</div>

									<?php
									if (have_rows('produkty', $user)) :
										$haverows = true; ?>

										<?php
										# задействованные средства
										$all_money = 0;
										# заработанные средства
										$money_income = 0;
										# балланс по сумме платежей
										$money_payments = 0;
										#-------------------------

										$money_parts = array();

										while (have_rows('istoriya_operaczij', $user)) : the_row();
											if ((get_sub_field('tip_operaczii')['value'] == 'in' || get_sub_field('tip_operaczii')['value'] == 'buy') && get_sub_field('status')['value'] == 'success') {
												$money_payments += get_sub_field('summa');
											} else if (get_sub_field('tip_operaczii')['value'] == 'out' && get_sub_field('status')['value'] == 'success') {
												$money_payments -= get_sub_field('summa');
											}
										//print_r(get_sub_field('tip_operaczii')); echo ' ';
										endwhile;

										while (have_rows('produkty', $user)) : the_row();
											$product = get_sub_field('produkt');
											if ($product) :
												$post_type = get_post_type_object($product->post_type)->labels->singular_name;
												$waiting = get_field('ozhidaet_publikacziyu', $product->ID);
												$sum = get_sub_field('summa_investiczij');
												$status = get_sub_field('status');
												$chart_data = array();
												if ($status == 'true' || $status = 'wait' && !$waiting) :
													if ($waiting !== 'true') {
														$price_change = get_field('dohod_v', $product->ID);

														$cp = get_field('czena_v', $product->ID);
														$sp = get_sub_field('czena_pri_pokupke');
														if ($cp && $sp) {
															$price_change = ($cp - $sp) / $sp * 100;
														}
														if ($price_change) :
															$price_income = $sum * $price_change * 0.01;
															$money_income += $price_income;
														endif;
													} else {
														$price_income = 0;
													}

													if ($money_parts[$post_type]) {
														$money_parts[$post_type]['invest'] += $sum;
														$money_parts[$post_type]['income'] += $price_income;
													} else {
														$money_parts[$post_type] = array();
														$money_parts[$post_type]['invest'] = intval($sum);
														$money_parts[$post_type]['income'] = intval($price_income);
													};

													$all_money += get_sub_field('summa_investiczij');
												endif;
											endif;
										endwhile;
										$free_money = ($money_payments - $all_money); ?>
										<script>
											window.localStorage.setItem('free_money', '<?php echo $free_money; ?>');
										</script>
										<div class="user-main_money">
											<?php //echo $money_payments + $money_income; 
											echo number_format($money_payments, 2, ',', ' ') . ' $'; ?>
										</div>
										<?php
										if ($money_income < 0) {
											$className = 'negative';
										} else {
											$className = '';
										}
										?>
										<div class="user-money_status <?php echo $className; ?> col-lg-12">
											<div class="dis-flex justify-content-between">
												<div class="section-title type-3">
													<h4>Доходность:</h4>
												</div>
												<div class="">
													<span>
														<span class="arrow"></span>
														<?php echo number_format(abs($money_income), 2, ',', ' ') . ' $'; ?>
													</span>
													<span class="percent">
														(<?php echo number_format(abs($money_income) / $money_payments * 100, 2, ',', ' ') . ' %'; ?>)
													</span>
												</div>
											</div>
										</div>
								</div>
								<div class="user-money bb">
									<div class="user-money_item">
										<div class="section-title type-3">
											<p>задействованные средства:</p>
										</div>
										<div class="money"><?php echo number_format($all_money, 2, ',', ' ') . ' $'; ?></div>
									</div>
									<div class="user-money_item">
										<div class="section-title type-3">
											<p>свободные средства:</p>
										</div>
										<div class="money"><?php echo number_format($free_money, 2, ',', ' ') . ' $'; ?></div>
									</div>
									<?php
										$colors = array(
											'rgba(239,173,4, 1)',
											'rgba(74,157,9, 1)',
											'rgba(6,52,169, 1)',
											'rgba(198,44,44, 1)',
											'rgba(93,44,198, 1)',
											'rgba(39,131,223, 1)'
										);
										$c_count = 0;
										foreach ($money_parts as $name => $part) : ?>
										<div class="user-money_item">
											<div class="section-title type-3">
												<p><?php echo $name; ?>:</p>
											</div>
											<div class="money">
												<?php echo number_format($part['invest'] + $part['income'], 2, ',', ' ') . ' $'; ?>
											</div>
										</div>
									<?php
											if ($money_income != 0) {
												$chart_data_income['labels'][] = array(
													'name' => $name,
													'value' => $part['income'] / $money_income * 100,
													'color' => $colors[$c_count]
												);
											}
											if ($money_payments != 0) {
												$chart_data['labels'][] = array(
													'name' => $name,
													'value' => $part['invest'] / $money_payments * 100,
													'color' => $colors[$c_count]
												);
											}
											$c_count++;
										endforeach;
										$chart_data['all'] = intval($money_payments);
										$chart_data_income['all'] = floatval($money_income);

										if ($money_payments != 0) {
											$chart_data['labels'][] = array(
												'name' => 'свободные средства',
												'value' => $free_money / $money_payments * 100,
												'color' => 'rgba(217,221,229, 1)'
											);
										} ?>
								</div>

							<?php
									endif; ?>

							<div class="user-controlls">
								<button data-link="top-up" class="" type="button">Ввод средств</button>
								<button data-link="transaction" class="<?php if (!$haverows) {
																			echo 'disabled';
																		} ?>" type="button">Вывод средств</button>
							</div>
							</div>
						</div>
					</div>
					<div class="profile_content col-lg-8 col-xs-12 changable">
						<?php if (have_rows('produkty', $user)) : ?>

							<div class="chart-tabs tabs">
								<div class="chart-tabs_header">
									<div class="section-title type-2 active" data-tab="1">
										<h2>Размещение портфеля</h2>
									</div>
									<div class="section-title type-2" data-tab="2">
										<h2>Доходность</h2>
									</div>
								</div>
								<div class="chart-tabs_content">
									<div class="chart-wrap dis-flex flex-wrap-wrap" data-tab-content="1">
										<div class="chart-data-json">
											<?php echo json_encode($chart_data); ?>
										</div>
										<div class="col-lg-6 col-xs-12">
											<canvas id="chart" width="300" height="300"></canvas>
										</div>
										<div class="col-lg-6 col-xs-12">
											<div id="chart-legend"></div>
										</div>
										<div class="chart-value-display">
											<span class="val"></span>
										</div>
									</div>

									<div class="active chart-wrap dis-flex flex-wrap-wrap" data-tab-content="2">
										<div class="chart-data-json2">
											<?php echo json_encode($chart_data_income); ?>
										</div>
										<div class="col-lg-6 col-xs-12">
											<canvas id="chart2" width="300" height="300"></canvas>
										</div>
										<div class="col-lg-6 col-xs-12">
											<div id="chart-legend2"></div>
										</div>
										<div class="chart-value-display">
											<span class="val"></span>
										</div>
									</div>
								</div>
							</div>





						<?php endif; ?>
					</div>
					<?php if (have_rows('produkty', $user)) : ?>
						<div class="profile_white profile_products col-lg-12 changable">




							<div class="bb product-row title-row">
								<div class="section-title type-2">
									<h3>Ваши продукты</h3>
								</div>
								<div class="section-title type-3">
									<p>сумма инвестиций</p>
								</div>
								<div class="section-title type-3">
									<p>доход в $</p>
								</div>
								<div class="section-title type-3">
									<p>доход в %</p>
								</div>
							</div>
							<?php while (have_rows('produkty', $user)) : the_row();
								$status = get_sub_field('status');
								$product = get_sub_field('produkt');
								$sum = get_sub_field('summa_investiczij');
								if ($product && $sum) : ?>
									<div class="product-row <?php if ($status !== 'true') {
																echo 'inactive';
															}; ?>">
										<?php


										$post_type = get_post_type_object($product->post_type)->labels->singular_name;
										$waiting = get_field('ozhidaet_publikacziyu', $product->ID);
										?>
										<div class="product-row_item">
											<p class="product-name"><?php echo $product->post_title; ?></p>
											<p class="product-type"><?php echo $post_type; ?></p>
										</div>
										<div class="product-row_item">
											<?php if (wp_is_mobile()) {
												echo '<span class="section-title type-3"><span>сумма инвестиций: </span></span>';
											}; ?>
											<?php
											echo number_format($sum, 2, ',', ' ') . ' $';  ?>
										</div>

										<?php
										if ($status == 'true') :

											if ($waiting == 'true') : ?>
												<div class="product-row_item">Ожидает публикации</div>
												<div class="product-row_item">Дата публикации <?php the_field('data_publikaczii', $product->ID); ?></div> <?php
																																						else :
																																							$price_change = get_field('dohod_v', $product->ID);
																																							$pc = $price_change;
																																							$cp = get_field('czena_v', $product->ID);
																																							$sp = get_sub_field('czena_pri_pokupke');
																																							if ($cp && $sp) {
																																								$price_change = ($cp - $sp) / $sp * 100;
																																								$pc = $price_change;
																																							}
																																							$price_income = $sum * $price_change * 0.01;


																																							$className = '';
																																							if ($price_income > 0) {
																																								$price_income = '+' . number_format($price_income, 2, ',', ' ') . ' $';
																																								$price_change = '+' . number_format($price_change, 2, ',', ' ') . ' %';
																																								$className = 'positive';
																																							} else {
																																								$price_income = number_format($price_income, 2, ',', ' ') . ' $';
																																								$price_change = number_format($price_change, 2, ',', ' ') . ' %';
																																							};
																																							if ($price_income < 0) {
																																								$className = 'negative';
																																							}


																																							?>

												<?php if (wp_is_mobile()) : ?>
													<div class="product-row_item <?php echo $className; ?>">
														<span class="section-title type-3">
															<span>Доход: </span>
														</span>
														<?php echo $price_income . ' ' . '<span class="per">(' . $price_change . ')</span>'; ?>

													</div>
												<?php else : ?>
													<div class="product-row_item <?php echo $className; ?>">

														<?php echo $price_income; ?>

													</div>
													<div class="product-row_item <?php echo $className; ?>">

														<?php echo $price_change; ?>

													</div>
												<?php endif; ?>
												<div class="button-modal" data-inc="<?php echo $sum + $sum * $pc * 0.01; ?>" data-index="<?php echo get_row_index(); ?>" data-product="<?php echo $product->ID; ?>" data-modal="realize">Реализовать</div>
										<?php endif;
																																					elseif ($status == 'false') :
																																						echo '<span class="unactive">Не подтверждено</span>';
																																					elseif ($status == 'wait') :
																																						echo '<span class="unactive">Ожидание реализации</span>';
																																					elseif ($status == 'success') :
																																						echo '<span class="dis-none">Реализовано</span>';
																																					endif; ?>
									</div>
							<?php
								endif;
							endwhile; ?>
						</div>
					<?php endif; ?>




				</div>
			</div>
		</section>
	<?php

	else :
		// not active user template 
		get_template_part('templates/parts/profile/not-active-profile');
	endif;

// auth form
else : ?>
	<section class="static-form">
		<?php get_template_part('templates/parts/profile/login'); ?>
	</section> <?php
			endif;
			get_footer(); ?>