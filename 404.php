<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Astro-Psychology
 */

get_header();
?>

<main id="primary" class="site-main py-5 bg-light-gradient"> <!-- Добавляем отступы и фон -->
	<div class="container text-center py-5"> <!-- Центрируем контент и добавляем отступы -->
		<section class="error-404 not-found">
			<header class="page-header mb-5">
				<!-- Огромный заголовок 404 -->
				<h1 class="mt-5 page-title display-1 fw-bold text-danger mb-3 animate__animated animate__fadeInDown">
					404
				</h1>
				<!-- Основное сообщение с большим шрифтом -->
				<p class="display-5 fw-semibold text-dark mb-4 animate__animated animate__fadeInUp">
					<?php esc_html_e('Ой! Вы попали не туда...', 'astro-psychology'); ?>
				</p>
				<p class="lead text-muted mx-auto" style="max-width: 600px; font-size: 1.25rem;">
					<?php esc_html_e('Похоже, страница, которую вы ищете, не существует. Возможно, она была удалена, переименована или никогда не существовала.', 'astro-psychology'); ?>
				</p>
			</header><!-- .page-header -->

			<div class="page-content py-4">
				<p class="fs-5 mb-4">
					<?php esc_html_e('Что можно сделать дальше:', 'astro-psychology'); ?>
				</p>

				<div class="col-12 mt-5">
					<!-- Кнопка на главную -->
					<h3 class="h4 mb-3 text-dark"><?php esc_html_e('Вернитесь на главную страницу:', 'astro-psychology'); ?></h3>
					<a href="<?php echo esc_url(home_url('/')); ?>" class="my_button btn btn-lg mt-3 ">
						<?php esc_html_e('На главную', 'astro-psychology'); ?>
					</a>
				</div>
			</div>

			<!-- Блоки с последними записями, категориями и архивами можно убрать, если они не нужны для страницы 404 -->
			<!-- Если вы хотите их оставить, стилизуйте их с помощью Bootstrap-классов для лучшего внешнего вида -->
			<?php
			// Блок с последними записями
			// the_widget('WP_Widget_Recent_Posts', array('title' => esc_html__('Последние записи', 'astro-psychology')));
			?>

			<?php
			// Блок с популярными категориями
			/*
                <div class="widget widget_categories mt-5">
                    <h2 class="widget-title h4"><?php esc_html_e('Самые популярные категории', 'astro-psychology'); ?></h2>
                    <ul class="list-unstyled">
                        <?php
                        wp_list_categories(
                            array(
                                'orderby'    => 'count',
                                'order'      => 'DESC',
                                'show_count' => 1,
                                'title_li'   => '',
                                'number'     => 10,
                            )
                        );
                        ?>
                    </ul>
                </div>
                */
			?>

			<?php
			// Блок с архивами
			/*
                $astro_psychology_archive_content = '<p>' . sprintf(esc_html__('Try looking in the monthly archives. %1$s', 'astro-psychology'), convert_smilies(':)')) . '</p>';
                the_widget('WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$astro_psychology_archive_content");
                */
			?>

			<?php
			// Блок с облаком тегов
			// the_widget('WP_Widget_Tag_Cloud', array('title' => esc_html__('Облако тегов', 'astro-psychology')));
			?>

	</div><!-- .page-content -->
	</section><!-- .error-404 -->
	</div><!-- .container -->
</main><!-- #main -->

<?php
get_footer();
