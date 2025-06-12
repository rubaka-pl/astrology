<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astro-Psychology
 */
global $redux_demo;

// Получаем данные из Redux Framework
$footer_logo_url = isset($redux_demo['logo']['url']) ? $redux_demo['logo']['url'] : '';
$footer_email = isset($redux_demo['email']) ? $redux_demo['email'] : 'hello@psychodemia.com'; // Используем значение по умолчанию из вашего кода
$footer_phone = isset($redux_demo['phone']) ? $redux_demo['phone'] : '+48 123 456 789'; // Используем значение по умолчанию из вашего скриншота
$footer_note = isset($redux_demo['note']) ? $redux_demo['note'] : 'Работаю онлайн — независимо от страны проживания'; // Используем значение по умолчанию из вашего скриншота

$instagram_link = get_field('instagram_link');
$telegram_link = get_field('telegram_link');
$facebook_link = get_field('facebook_link');
$whatsapp_link = get_field('whatsapp_link');
$youtube_link = get_field('youtube_link');
$calendly_link = get_field('calendly_link');


?>

<footer class="bg-dark text-white py-5">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 col-md-4 mb-4 text-center text-md-start">
				<div class="mb-3">
					<a href="<?php echo esc_url(get_home_url()); ?>" class="d-inline-block">
						<?php if (!empty($footer_logo_url)): ?>
							<img src="<?php echo esc_url($footer_logo_url); ?>" alt="Логотип" class="img-fluid"
								style="width: 160px;position: relative; ">
						<?php else: ?>
							<span class="h4 text-white"><?php bloginfo('name'); ?></span>
						<?php endif; ?>
					</a>
				</div>

				<p class="mb-3">
					<a href="mailto:<?php echo esc_attr($footer_email); ?>" class="text-white text-decoration-none footer-link-hover">
						<?php echo esc_html($footer_email); ?>
					</a>
				</p>

				<div class="d-flex justify-content-center justify-content-md-start gap-3 mt-3">
					<?php if ($telegram_link): ?>
						<a class="hover_icon" href="<?php echo esc_url($telegram_link); ?>" target="_blank">
							<img style="filter: invert(1);" src="<?php echo get_template_directory_uri() ?>/assets/icons/telegram-brands.svg" alt="Telegram" width="32" height="32">
						</a>
					<?php endif; ?>

					<?php if ($youtube_link): ?>
						<a class="hover_icon" href="<?php echo esc_url($youtube_link); ?>" target="_blank">
							<img style="filter: invert(1);" src="<?php echo get_template_directory_uri() ?>/assets/icons/youtube-brands.svg" alt="YouTube" width="32" height="32">
						</a>
					<?php endif; ?>

					<?php if ($facebook_link): ?>
						<a class="hover_icon" href="<?php echo esc_url($facebook_link); ?>" target="_blank">
							<img style="filter: invert(1);" src="<?php echo get_template_directory_uri() ?>/assets/icons/facebook-brands.svg" alt="Facebook" width="32" height="32">
						</a>
					<?php endif; ?>
					<?php if ($instagram_link): ?>
						<a class="hover_icon" href="<?php echo esc_url($instagram_link); ?>" target="_blank">
							<img style="filter: invert(1);" src="<?php echo get_template_directory_uri() ?>/assets/icons/instagram-brands.svg" alt="Instagram" width="32" height="32">
						</a>
					<?php endif; ?>
				</div>
			</div>

			<div class="col-12 col-md-4 mb-4 text-center text-md-start">
				<h5 class="text-uppercase fw-bold mb-3 mt-4 mt-md-0">Навигация</h5>
				<ul class="list-unstyled">
					<li class="mb-2"><a href="<?php echo esc_url(home_url()); ?>" class="text-white text-decoration-none footer-link-hover">Главная</a></li>
					<li class="mb-2"><a href="<?php echo esc_url(site_url('/about-me')); ?>" class="text-white text-decoration-none footer-link-hover">Обо мне</a></li>
					<li class="mb-2"><a href="<?php echo esc_url(site_url('/#consultations')); ?>" class="text-white text-decoration-none footer-link-hover">Услуги</a></li>
					<li class="mb-2"><a href="<?php echo esc_url(site_url('/privacy-policy')); ?>" class="text-white text-decoration-none footer-link-hover">Политика конфиденциальности</a></li>
				</ul>
			</div>

			<div class="col-12 col-md-4 mb-4 text-center text-md-start">
				<h5 class="text-uppercase fw-bold mb-3 mt-4 mt-md-0">Контакты</h5>
				<ul class="list-unstyled small">
					<?php if (!empty($footer_phone)) : ?>
						<li class="mb-2">
							<a href="tel:<?php echo esc_attr(str_replace(' ', '', $footer_phone)); ?>" class="text-white text-decoration-none footer-link-hover">
								<?php echo esc_html($footer_phone); ?>
							</a>
						</li>
					<?php endif; ?>
					<?php if (!empty($footer_email)) : ?>
						<li class="mb-2">
							<a href="mailto:<?php echo esc_attr($footer_email); ?>" class="text-white text-decoration-none footer-link-hover">
								<?php echo esc_html($footer_email); ?>
							</a>
						</li>
					<?php endif; ?>
					<?php if (!empty($footer_note)) : ?>
						<li class="mb-2 text-white">
							<?php echo esc_html($footer_note); ?>
						</li>
					<?php endif; ?>
				</ul>
			</div>

		</div>
		<div class="row mt-4 pt-4 border-top border-secondary">
			<div class="col-12 text-center text-muted small">
				© <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Все права защищены.
			</div>
		</div>

	</div>
</footer>

<script src="https://assets.calendly.com/assets/external/widget.js" type="text/javascript" async=""></script>
<script>
	document.addEventListener("click", function(e) {
		const calendlyBtn = e.target.closest(".calendly-main--btn");
		if (calendlyBtn) {
			e.preventDefault();
			Calendly.initPopupWidget({
				url: '<?php echo esc_js($calendly_link); ?>'
			});
		}

		const calendlyBtnWebinar = e.target.closest("#calendly-webinar--btn");
		if (calendlyBtnWebinar) {
			e.preventDefault();
			Calendly.initPopupWidget({
				url: '<?php echo esc_js($calendly_link); ?>'
			});
		}
	});
	// Кнопка "Наверх"
	const scrollToTopBtn = document.getElementById("scrollToTopBtn");

	// Показываем/скрываем кнопку при прокрутке
	window.addEventListener("scroll", () => {
		if (window.scrollY > 300) { // Показываем кнопку, если прокручено более 300px
			scrollToTopBtn.style.display = "block";
		} else {
			scrollToTopBtn.style.display = "none";
		}
	});

	// Плавная прокрутка наверх при клике
	scrollToTopBtn.addEventListener("click", () => {
		window.scrollTo({
			top: 0,
			behavior: "smooth"
		});
	});
</script>

<button id="scrollToTopBtn" title="Наверх" class="btn  rounded-circle position-fixed bottom-0 end-0 m-4 shadow-lg" style="display: none; z-index: 1000; width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/arrow-up.svg" alt="Наверх" style="width:24px; height:24px; filter: invert(1);">
</button>

</main> <?php wp_footer(); ?>
</body>

</html>