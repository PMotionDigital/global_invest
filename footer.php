<?php $mainWrapper = 'col-lg-8 col-md-10 col-lm-11 col-xs-11'; ?>
<?php if(!is_page_template('templates/profile.php')) { ?>
<footer id="contacts" class="footer dis-flex flex-direction-col align-items-center">
	<div class="col-lg-11 dis-flex flex-direction-col align-items-center">
		<div class="<?php echo $mainWrapper; ?>">
			<div class="footer-top">
				<div class="footer-left"> 
					<span>Контакты</span>
					<a href="tel:<?php the_field('telefon_kompanii_1', 'option'); ?>"><?php the_field('telefon_kompanii_1', 'option'); ?></a>
					<a href="tel:<?php the_field('telefon_kompanii_2', 'option'); ?>"><?php the_field('telefon_kompanii_2', 'option'); ?></a>
					<a href="mailto:<?php the_field('pochta_kompanii', 'option'); ?>"><?php the_field('pochta_kompanii', 'option'); ?></a>
				</div>
				<div class="footer-nav">
					<nav class="footer-menu">
					<?php wp_nav_menu([
						'theme_location'  => 'footer',
						'menu_class'      => 'menu',
					]); ?>
					</nav>
				</div>
				<div class="footer-socials">
					<nav class="socials">
						<?php the_field('soczialnye_seti_kompanii', 'option'); ?>
					</nav>
				</div>
			</div>
			<div class="footer-btm">
				<div class="coph"><span> Все права защищены 2020 г.<br><p>Любое использование материалов сайта без разрешения запрещено.</p></span>
				</div>
				<div class="policy"> <a href="https://globalsecureinvest.com/politika-konfidenczialnosti/">Политика конфиденциальности</a>
				</div>
			</div>
		</div>
		<div class="footer-bot <?php echo $mainWrapper; ?>">
			<?php the_field('adres_kompanii', 'option'); ?>
		</div>
	</div>
	<div class="footer-policy dis-flex justify-content-center">
	<div class="col-lg-11 dis-flex flex-direction-col align-items-center">
		<div class="<?php echo $mainWrapper ?> dis-grid grid-col-lg-1 grid-col-xs-1">
			<?php the_field('kopirajt_vnizu_sajta', 'option'); ?>
		</div>
	</div>
	</div>
</footer>
<?php } ?>
<div id="note_form">
	<div class="note_form-text"></div>
	<div class="note_form-content">
		<div class="col-lg-5 col-xs-12">
			Долго ждать?<br>Наберите прямо сейчас:
			<a href="tel:<?php the_field('telefon_kompanii_1', 'option'); ?>"><?php the_field('telefon_kompanii_1', 'option'); ?></a>
		</div>
		<div class="col-lg-6 col-xs-12">
			Или добавляйтесь<br>в соц.сети:
			<div class="footer-socials">
				<nav class="socials">
					<?php the_field('soczialnye_seti_kompanii', 'option'); ?>
				</nav>
			</div>
		</div>
	</div>
</div>
</main>
<div id="cookie-message" class="black-block">
	"Global Secure Invest" использует файлы &nbsp; <a href="https://globalsecureinvest.com/politika-konfidenczialnosti/" target="_blank">cookie</a> &nbsp; с целью персонализации сервисов и повышения удобства пользования веб-сайтом. &nbsp; <span class="button">принять</span>
</div>
<div style="color:#000">

</div>

<?php 
get_template_part('templates/parts/modals/modal-login');
if(is_user_logged_in()){
	get_template_part('templates/parts/modals/modal-upload');
	get_template_part('templates/parts/modals/modal-buy-case');
	get_template_part('templates/parts/modals/modal-realize');
}
wp_footer(); ?>

<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(68302702, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/68302702" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</body>

</html>