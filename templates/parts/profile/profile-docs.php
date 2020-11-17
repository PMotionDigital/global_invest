<?php 
$user = wp_get_current_user();  ?>
<div class="col-lg-8 col-xs-12 padding-l changable">
	<div class="col-lg-12 profile_content profile_white">
		<div class="docs-tabs">
			<div class="docs-tabs_header bb">
				<div class="section-title type-2 active" data-tab="docs">
					<h2>Документы</h2>
				</div>
				<div class="section-title type-2" data-tab="reports">
					<h2>Отчеты</h2>
				</div>
			</div>
			<div class="docs-tabs_content reports">
				<div class="active" data-tab-content="docs">
					<div class="docs">
						<div class="tab-title">
							<h3>Документы для заполнения</h3>
						</div>
						<ul class="docs-wrap">
							<li class="docs-wrap_item">
								<a href="#">
									<div class="image">
										<img src="<?php bloginfo('template_url'); ?>/dist/images/icons/doc.svg" alt="">
									</div>
									<div class="desc">Название документа.doc</div>
								</a>
							</li>
							<li class="docs-wrap_item">
								<a href="#">
									<div class="image">
										<img src="<?php bloginfo('template_url'); ?>/dist/images/icons/doc.svg" alt="">
									</div>
									<div class="desc">Название документа.doc</div>
								</a>
							</li>
							<li class="docs-wrap_item">
								<a href="#">
									<div class="image">
										<img src="<?php bloginfo('template_url'); ?>/dist/images/icons/doc.svg" alt="">
									</div>
									<div class="desc">Название документа.doc</div>
								</a>
							</li>
							
						</ul>
					</div>
					<?php if(have_rows('vashi_dokumenty', $user)): ?>
					<div class="docs" data-your-docs>
						<div class="tab-title">
							<h3>Ваши документы</h3>
						</div>
						<ul class="docs-wrap">
							<?php while(have_rows('vashi_dokumenty', $user)): the_row(); 

								$doc = get_sub_field('dokument'); 
								$link = wp_get_attachment_url($doc);
								$name =  basename($link); 
							?>
							<li class="docs-wrap_item">
								<a href="<?php echo $link; ?>" download title="<?php echo $name; ?>">
									<div class="image">
										<img src="<?php bloginfo('template_url'); ?>/dist/images/icons/doc-fill.svg" alt="">
									</div>
									<div class="desc"><?php echo $name; ?></div>
								</a>
							</li>
							<?php endwhile; ?>
						</ul>
					</div>
					<?php endif; ?>
					<button class="button-submit button-modal" data-modal="upload" type="button">Загрузить документы</button>
				</div>
				<?php if(have_rows('otchety', $user)): ?>
				<div class="" data-tab-content="reports">
					<div class="reports_header">
						<div class="tab-title">
							<h3>Отчеты за период:</h3>
						</div>
						<div class="reports_header-tabs">
							<?php 
							$count = 1;
							while(have_rows('otchety', $user)):the_row(); ?>
							<div class="reports_header-tabs-item <?php if($count == 1){ echo 'active'; }; ?>" data-period="<?php echo $count; ?>">
								<?php the_sub_field('nazvanie_perioda'); ?>
							</div>
							<?php $count++; endwhile; ?>
						</div>
					</div>
					<div class="reports_content">
						<div class="reports_list-header">
							<div class="section-title type-3"><span>Название документа</span></div>
							<div class="section-title type-3"><span>Дата</span></div>
						</div>
						<?php 
						$count = 1;
						while(have_rows('otchety', $user)):the_row(); ?>
						<div class="<?php if($count == 1){ echo 'active'; }; ?>" data-period-content="<?php echo $count; ?>">
							<?php if(have_rows('dokumenty')): ?>
							<ul class="reports_list">
								<?php while(have_rows('dokumenty')):the_row(); ?>
								<li class="reports_list-item bb">
									<?php 
									$doc = get_sub_field('fajl'); 
									$link = wp_get_attachment_url($doc);
									?>
									<a href="<?php echo $link; ?>" class="item-title"><?php the_sub_field('nazvanie_dokumenta'); ?></a>
									<span class="item-date"><?php the_sub_field('data'); ?></span>
								</li>
								<?php endwhile; ?>
							</ul>
							<?php endif; ?>
						</div>
						
						<?php $count++; endwhile; ?>
					</div>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>