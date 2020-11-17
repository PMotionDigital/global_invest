<?php
    $mainWrapper = 'col-lg-8 col-md-10 col-lm-11 col-xs-11';
?>
<div class="col-lg-11 dis-flex justify-content-center">
    <div class="<?php echo $mainWrapper; ?>">
    <div class="tabs dis-flex">
        <div class="tabs-nav col-lg-4">
            <?php if(have_rows('punkty_menyu', 'option')): ?>
            <?php $counter = 1; ?>
            <?php while(have_rows('punkty_menyu', 'option')): the_row(); ?> 
            <?php 
                $featured_post = get_sub_field('soderzhimoe_menyu'); 
                $permalink = get_permalink( $featured_post->ID );
                $title = get_the_title( $featured_post->ID );
            ?>     
            <div class="tabs-nav__item <?php if($counter == 1) {echo 'is-active'; } ?>" data-tab-name="tab-<?php echo $counter; ?>">
                <a href="<?php echo $permalink; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a>
            </div>
            <?php $counter++; ?>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <div class="tabs__content col-lg-8">
            <?php if(have_rows('punkty_menyu', 'option')): ?>
            <?php $counter = 1; ?>
            <?php while(have_rows('punkty_menyu', 'option')): the_row(); ?>      
            <?php 
                $featured_post2 = get_sub_field('soderzhimoe_menyu'); 
                $permalink = get_permalink( $featured_post2->ID );
                $title = get_the_title( $featured_post2->ID );
                $imageBg = get_field('dlya_glavnogo_menyu_fonovaya_kartinka', $featured_post2->ID); 
                $tabText = get_field('kontentnaya_chast', $featured_post2->ID);
            ?>    
            <div class="tab tab-<?php echo $counter; ?>  <?php if($counter == 1) {echo 'is-active'; } ?>">
                <div class="tab-content-bg">
                    <img src="<?php echo $imageBg; ?>">
                </div>
                <div class="tab-content-text">
                    <div class="desc">
                    <?php echo $tabText; ?>
                    </div>
                    <!-- <a href="<?php echo $permalink; ?>" title="<?php echo $title; ?>" class="button_new">Подробнее</a> -->
                </div>
            </div>
            <?php $counter++; ?>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
    </div>
</div>