<?php /* Template Name: Документы */ ?>
<?php get_header(); ?>
<section class="licenses">
  <div class="content">
    <div class="title">
      <h1><?php the_title(); ?></h1>
    </div>
  </div>
  <div class="licenses-slider">
    <div class="licenses-slides">
      <div class="licenses-slide">
        <div class="licenses-slide__photo">
          <img src="<?php echo get_template_directory_uri()?>/static/img/assets/licenses/lic.jpg" alt="License">
        </div>
        <div class="licenses-slide__text">
          <span>Название документа</span>
          <p>Мы вынуждены отталкиваться от того, что начало повседневной работы по формированию позиции.</p>
        </div>
      </div>
    </div>
  </div>
</section>
<?php  get_template_part('partials/content','time'); ?>
<?php get_footer(); ?>