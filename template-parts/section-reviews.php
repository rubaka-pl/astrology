<?php global $redux_demo;

// Получаем URL логотипа из Redux (как запасной вариант для изображения отзыва)
$footer_logo_url = isset($redux_demo['logo']['url']) ? $redux_demo['logo']['url'] : '';

// Получаем исходные данные из Redux
$raw_reviewer_names = isset($redux_demo['reviews_list']['reviewer_name']) ? $redux_demo['reviews_list']['reviewer_name'] : array();
$raw_review_texts = isset($redux_demo['reviews_list']['review_text']) ? $redux_demo['reviews_list']['review_text'] : array();
$raw_reviewer_images = isset($redux_demo['reviews_list']['reviewer_image']) ? $redux_demo['reviews_list']['reviewer_image'] : array();

// Объединяем параллельные массивы в единый массив отзывов
$reviews_processed = array();
$max_items = max(count($raw_reviewer_names), count($raw_review_texts), count($raw_reviewer_images));

for ($i = 0; $i < $max_items; $i++) {
	// Проверяем существование ключа перед доступом, чтобы избежать 'Undefined array key'
	$current_name = isset($raw_reviewer_names[$i]) ? $raw_reviewer_names[$i] : '';
	$current_text = isset($raw_review_texts[$i]) ? $raw_review_texts[$i] : '';
	$current_image_data = isset($raw_reviewer_images[$i]) ? $raw_reviewer_images[$i] : array();

	// Формируем элемент отзыва
	if (!empty($current_name) || !empty($current_text) || !empty($current_image_data)) {
		$reviews_processed[] = array(
			'reviewer_name' => $current_name,
			'review_text'   => $current_text,
			'reviewer_image' => $current_image_data,
		);
	}
}

// Теперь $reviews_processed содержит данные в ожидаемом формате
$reviews = $reviews_processed;

// Получаем URL для дефолтного аватара
$default_reviewer_image_url = get_template_directory_uri() . '/assets/img/default-avatar.png'; // Убедитесь, что этот файл существует
?>
<section id="reviews" class="bg-custom py-5">
	<div class="container">
		<div class="swiper mySwiper_2 text-center animate-on-scroll" style="overflow: hidden;" data-animate="animate__fadeInUp" data-delay="0s">
			<div class="swiper-wrapper">

				<?php
				if (!empty($reviews)) :
					// Используем foreach, так как он более надежен после предобработки данных
					foreach ($reviews as $review_item) :
						$reviewer_name = isset($review_item['reviewer_name']) ? esc_html($review_item['reviewer_name']) : 'Неизвестный отзывщик';
						$review_text = isset($review_item['review_text']) ? wp_kses_post($review_item['review_text']) : 'Текст отзыва не указан.';

						$reviewer_image_data = isset($review_item['reviewer_image']) ? $review_item['reviewer_image'] : array();
						$reviewer_image_url = '';

						if (!empty($reviewer_image_data) && is_array($reviewer_image_data) && !empty($reviewer_image_data['url'])) {
							$reviewer_image_url = esc_url($reviewer_image_data['url']);
						} elseif (!empty($footer_logo_url)) {
							$reviewer_image_url = esc_url($footer_logo_url);
						} else {
							$reviewer_image_url = esc_url($default_reviewer_image_url);
						}
				?>
						<div class="swiper-slide">
							<?php if (!empty($reviewer_image_url)) : ?>
								<img src="<?php echo $reviewer_image_url; ?>" alt="<?php echo $reviewer_name; ?>"
									class="reviewer-avatar img-fluid mb-3 mt-4" style="width: 120px; height: 120px; object-fit: cover; border-radius: 50%;">
							<?php endif; ?>
							<blockquote class="fs-6 fw-semibold mb-4 px-md-5">
								<?php echo $review_text; ?>
							</blockquote>
							<p class="fw-semibold mb-5 fst-italic fs-5"><?php echo $reviewer_name; ?></p>
						</div>
				<?php
					endforeach;
				else :
					echo '<div class="swiper-slide text-center"><p>' . esc_html__('Отзывы пока не добавлены.', 'your-text-domain') . '</p></div>';
				endif;
				?>

			</div>

			<div class="swiper-button-prev">
				<span>
					<svg xmlns="http://www.w3.org/2000/svg" style="transform: rotate(180deg);" width="30" height="30" viewBox="0 0 8 12">
						<path d="M8.000,5.998 L-0.002,11.997 L1.292,5.998 L-0.002,-0.001 L8.000,5.998 ZM1.265,9.924 L6.502,5.998 L1.265,2.071 L2.112,5.998 L1.265,9.924 ZM5.451,5.998 L2.496,8.213 L2.974,5.998 L2.496,3.783 L5.451,5.998 Z" fill="#ff7010"></path>
					</svg>
				</span>
			</div>

			<div class="swiper-button-next">
				<span>
					<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 8 12">
						<path d="M8.000,5.998 L-0.002,11.997 L1.292,5.998 L-0.002,-0.001 L8.000,5.998 ZM1.265,9.924 L6.502,5.998 L1.265,2.071 L2.112,5.998 L1.265,9.924 ZM5.451,5.998 L2.496,8.213 L2.974,5.998 L2.496,3.783 L5.451,5.998 Z" fill="#ff7010"></path>
					</svg>
				</span>
			</div>

			<div class="swiper-pagination mt-3"></div>
		</div>
	</div>
</section>