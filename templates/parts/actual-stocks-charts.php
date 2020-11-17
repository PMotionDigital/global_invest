<section id="stocks" class="stocks dis-flex flex-wrap-wrap justify-content-center">
	<div class="col-lg-11 dis-flex justify-content-center">
		<div class="stocks-items col-lg-8 col-lm-12 col-xs-12">
            <?php if(have_rows('spisok_kompanij', 'option')): ?>
			<?php while(have_rows('spisok_kompanij', 'option')): the_row(); ?>    
			<?php 
				$field = get_sub_field('razmestit_s_grafikom');
				$colors = get_sub_field('razmestit_s_grafikom');
				if($colors && in_array('true', $colors)) { 
			?>    
			<div class="stocks-item" data-name="<?php the_sub_field('zagolovok_kompanii_publichnyj'); ?>">
				<div class="stocks-item__icon">
					<img src="<?php the_sub_field('logotip_kompanii'); ?>" alt="<?php the_sub_field('nazvanie_kompanii_v_narode'); ?>">
				</div>
				<div class="stocks-item__span"><?php the_sub_field('sektor'); ?></div>
				<div class="stocks-item__name">
					<h4><?php the_sub_field('nazvanie_kompanii_v_narode'); ?></h4>
					<p><?php the_sub_field('kratkoe_opisanie'); ?></p>
				</div>
				<div class="stocks-item__prices">
					<div class="stocks-item__price current"><span>текущая цена</span><span>1</span>
					</div>
					<div class="stocks-item__price day"><span>дневное изменение</span><span>1</span>
					</div>
				</div>
			</div>
			<?php } ?>
            <?php endwhile; ?>
            <?php endif; ?>
		</div>
	</div>
</section>