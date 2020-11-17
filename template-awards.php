<?php /* Template Name: Награды */ ?>
<?php get_header(); ?>
<section class="awards">
  <div class="content">
    <div class="news-top">
      <div class="news-title">
        <h2>Получили признание <br>общественности</h2>
      </div>
      <div class="news-categories">
        <ul class="global-tags">
          <li><a href="#">Упоминания в сми</a>
          </li>
          <li class="active"><a href="#">награды</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="awards-wrapper">
    <div class="content">
      <div class="awards-items">
        <div class="awards-item">
          <img src="<?php echo get_template_directory_uri()?>/static/img/assets/awards/a1.png" alt="Awards">
        </div>
        <div class="awards-item">
          <img src="<?php echo get_template_directory_uri()?>/static/img/assets/awards/a1.png" alt="Awards">
        </div>
        <div class="awards-item">
          <img src="<?php echo get_template_directory_uri()?>/static/img/assets/awards/a1.png" alt="Awards">
        </div>
        <div class="awards-item">
          <img src="<?php echo get_template_directory_uri()?>/static/img/assets/awards/a1.png" alt="Awards">
        </div>
        <div class="awards-item">
          <img src="<?php echo get_template_directory_uri()?>/static/img/assets/awards/a1.png" alt="Awards">
        </div>
        <div class="awards-item">
          <img src="<?php echo get_template_directory_uri()?>/static/img/assets/awards/a1.png" alt="Awards">
        </div>
      </div>
      <div class="awards-more faq-link"><a href="#">смотреть еще</a>
        <img src="<?php echo get_template_directory_uri()?>/static/img/assets/faq/arr.svg" alt="">
      </div>
    </div>
  </div>
</section>
<?php  get_template_part('partials/content','time'); ?>
<?php get_footer(); ?>