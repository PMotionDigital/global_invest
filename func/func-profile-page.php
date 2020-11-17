<?php 

add_action('wp_ajax_setup_profile_page', 'setup_profile_page');
add_action('wp_ajax_profile_offers', 'profile_offers');
function setup_profile_page() {
	$templates = $_GET['templates'];
	//print_r($templates);
	$templateHtmls = array();
	foreach ($templates as $temp_name):
		ob_start();
			get_template_part('templates/parts/profile/'.$temp_name);
		$temp = ob_get_clean();	
		$templateHtmls[$temp_name] = $temp;
	endforeach;
	$output = array(
		'templates' => $templateHtmls
	);

	echo json_encode($output);
	die;
}

function profile_offers() {
	$slug = $_GET['slug'];

	$posts = get_posts(array(
		'post_type' => $slug,
		'numberposts' => -1
	));  
	global $post;

	$post_types = array(
		'otc_ipo' => array(50000, 100000),
		'venture_investments' => 100000,
		'autor_strategy' => 30000,
		'investement_case' => 10000
	); 
	
	if($posts): ?>
		<div class="profile-offers">
			<?php foreach ($posts as $post): setup_postdata($post);
			$type = get_field('tip_razmeshheniya');
			$min = $post_types[$slug];
			if($type == 'otc'){
				$min = $min[1];
			} else if($type == 'ipo'){
				$min = $min[0];
			} ?>
			<div class="profile-offers_item" data-post-id="<?php echo $post->ID; ?>">
							<div class="profile-offers_item-name">
								<?php if(wp_is_mobile()): ?>
									<div class="section-title type-3">
										<span>Название портфеля:</span>
									</div>
								<?php endif; ?>
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
							</div>
							<div class="profile-offers_item-buy button-modal" 
							data-min="<?php echo $min; ?>"
							data-modal="buy-case">Инвестировать</div>
						</div>
			<?php endforeach; wp_reset_postdata(); ?>
		</div>
	<?php endif; 
	die;
}


