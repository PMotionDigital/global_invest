<?php
 /* 
 Template Name: Личный кабинет . Наши предложения
 */
get_header();
$mainWrapper = 'col-lg-8 col-md-10 col-lm-11 col-xs-12'; 
// $post_types = array(
// 	'otc_ipo',
// 	'venture_investments',
// 	'autor_strategy',
// 	'investement_case'
// ); 
$post_types = array(
	'otc_ipo' => array(50000, 100000),
	'venture_investments' => 100000,
	'autor_strategy' => 30000,
	'investement_case' => 10000
); 


?>
<section id="profile" class="profile dis-flex justify-content-center">
	<div class="col-lg-11 dis-flex justify-content-center">
		<div data-profile-loadwrap class="<?php echo $mainWrapper; ?> dis-flex flex-wrap-wrap baseline">
			<div class="profile_aside profile_aside--nav profile_white col-lg-4 col-xs-12">
				<div class="section-title type-2 bb">
					<h1>Наши предложения</h1>
				</div>
				<ul class="user-nav"> <?php
				$first = true;
             	foreach ($post_types as $type => $min): 
           			$post_type_obj = get_post_type_object($type);
                	?>
                	<li class="section-title type-3 <?php if($first == true){ echo 'active'; $first = false; } ?>" data-link-id="<?php echo $post_type_obj->name; ?>">
						<a href="<?php //echo $permalink; ?>"><?php echo $post_type_obj->label ?></a>
					</li>
                	<?php
                endforeach; ?>
                </ul>
			</div>
			<div class="col-lg-8 col-xs-12 padding-l">
				<div class="profile_content profile_white col-lg-12">
					<?php if(!wp_is_mobile()): ?>
					<div class="profile-offers_list-title dis-flex bb">
						<div class="section-title type-3"><h4>Название портфеля</h4></div>
						<div class="section-title type-3"><h4>Дата инспирации</h4></div>
						<div class="section-title type-3"><h4>Прогноз дохода</h4></div>
						<div class="section-title type-3"><h4>Минимальный срок</h4></div>
					</div>	
				<?php endif; ?>
					<?php 
					$posts = get_posts(array(
						'post_type' => 'otc_ipo',
						'numberposts' => -1
					));  
					if($posts): ?>
					<div class="profile-offers">
						<?php foreach ($posts as $post): setup_postdata($post);

						$type = get_field('tip_razmeshheniya');
						if($type == 'otc'){
							$min = 100000;
						} else if($type == 'ipo'){
							$min = 50000;
						} ?>
						<div class="profile-offers_item" data-post-id="<?php echo $post->ID; ?>">
							<div class="profile-offers_item-name">
								<!-- <?php if(wp_is_mobile()): ?>
									<div class="section-title type-3">
										<span>Название портфеля:</span>
									</div>
								<?php endif; ?> -->
								<?php the_title(); ?>
									
							</div>
							<div class="profile-offers_item-date">
								<?php if(wp_is_mobile()): ?>
									<div class="section-title type-3">
										<span>Дата инспирации:</span>
									</div>
								<?php endif; ?>
								<?php the_field('data_inspiraczii'); ?>
									
							</div>
							<div class="profile-offers_item-forecast">
								<?php if(wp_is_mobile()): ?>
									<div class="section-title type-3">
										<span>Прогноз дохода:</span>
									</div>
								<?php endif; ?>
								<?php the_field('prognoz_dohoda'); ?>
									
							
							</div>
							<div class="profile-offers_item-term">
								<?php if(wp_is_mobile()): ?>
									<div class="section-title type-3">
										<span>Минимальный срок:</span>
									</div>
								<?php endif; ?>
								<?php the_field('minimalnyj_srok'); ?>
							</div>
							<div class="profile-offers_item-buy button-modal" 
							data-min="<?php 
							$min_field = get_field('minimalnaya_summa');
							if($min_field):
								echo $min_field;
							else:
								echo $min; 
							endif;  ?>"
							data-modal="buy-case">Инвестировать</div>
						</div>
						<?php endforeach; wp_reset_postdata(); ?>
					</div>
					<?php endif; ?>
				</div>
			</div>
			
		</div>
	</div>
</section>

<?php 
get_footer();
