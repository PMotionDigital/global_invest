<?php if (have_rows('primery')) : ?>
    <div class="examples-items wp-block-examples">
        <?php while (have_rows('primery')) : the_row(); ?>
            <div class="examples-item">
                <div class="examples-item_content">
                    <div class="examples-item__icon">
                        <img src="<?php the_sub_field('logo'); ?>" alt="Examples Icon">
                    </div>
                    <div class="examples-item__name"><?php the_sub_field('nazvanie'); ?></div>
                    <div class="examples-item__title">
                        <h4><?php the_sub_field('zagolovok'); ?></h4>
                    </div>
                    <div class="examples-item__paragraph">
                        <p><?php the_sub_field('tekst'); ?>
                        </p>
                    </div>
                </div>
                <div class="examples-item__price"><span>капитализация компании составляет:</span><span><?php the_sub_field('kapitalizacziya'); ?></span>
                </div>
            </div>
        <?php endwhile; ?>
    </div>

<?php endif; ?>