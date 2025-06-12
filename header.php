<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astro-Psychology
 */
global $redux_demo;

?>
<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title(); ?></title>
	<!-- Meta Description-->
	<meta name="description" content="Светлана Канцедал — опытный астролог и психолог. Более 20 лет практики. Онлайн по всему миру.">
	<link rel="canonical" href="<?php echo esc_url(home_url(add_query_arg(null, null))); ?>">
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.ico" type="image/x-icon">
	<meta property="og:title" content="Светлана Канцедал – астролог и психолог">
	<meta property="og:description" content="Опыт более 20 лет. Онлайн-консультации по астрологии, психологии, расстановкам и Таро.">
	<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/img/share.jpg">
	<meta property="og:url" content="<?php echo esc_url(home_url()); ?>">
	<meta property="og:type" content="website">
	<!-- Twitter Card -->
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:title" content="Светлана Канцедал – астролог и психолог">
	<meta name="twitter:description" content="20+ лет опыта. Помощь в кризисах, поиске пути, отношениях. Консультации онлайн.">
	<meta name="twitter:image" content="<?php echo get_template_directory_uri(); ?>/assets/img/share.jpg">

	<!-- WordPress -->
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>


	<header class="fixed-top site-header py-3 navbar navbar-expand-lg navbar-light">
		<div class="container">
			<!-- Логотип -->
			<a href="<?php echo get_home_url() ?>">
				<?php if (!empty($redux_demo['logo']['url'])): ?>
					<img src="<?php echo esc_url($redux_demo['logo']['url']); ?>" alt="Логотип" class="img-fluid" style="
    width: 160px;
    position: relative;
">
				<?php endif; ?>
			</a>


			<!-- Кнопка бургера -->
			<button type="button" class="hamburger hamburger--collapse js-hamburger" data-bs-target="#mainNavbar"
				data-bs-toggle="collapse" aria-label="Toggle navigation" aria-expanded="false">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</button>

			<!-- Меню -->
			<nav class="collapse navbar-collapse" id="mainNavbar">
				<ul class="fs-6 navbar-nav ms-auto gap-2 text-uppercase">
					<!-- <li class="nav-item">
						<a href="" target="_blank" class="nav-link text-dark">Правила и условия</a>
					</li> -->
					<li class="nav-item">
						<a href="<?php echo site_url('/#faq'); ?>" class="nav-link text-dark">вопросы</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo site_url('/#reviews'); ?>" class="nav-link text-dark">отзывы</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo esc_url(home_url('/#contact')); ?>" class="nav-link text-dark">контакты</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo site_url('/about-me'); ?>" class="nav-link text-dark">Обо мне</a>
					</li>


					<!-- Пример dropdown'а, если нужно -->

					<!-- <li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle text-dark d-flex align-items-center gap-1" href="#"
							id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Дополнительно
							<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black"
								viewBox="0 0 16 16">
								<path fill-rule="evenodd" d="M1.5 5.5l6 6 6-6H1.5z" />
							</svg>
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="#extra1">Мои сертификаты</a></li>
							<li><a class="dropdown-item" href="#extra2">Обо мне</a></li>
							<li><a class="dropdown-item" href="#extra3">Обо мне</a></li>
						</ul>
					</li> -->

					<div class="button-margin text-center">
						<button class="calendly-main--btn my_button my_button--header">
							ЗАПИСАТЬСЯ
						</button>
					</div>
				</ul>
			</nav>
		</div>

	</header>

	<main>