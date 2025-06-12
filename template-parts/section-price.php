<?php
// Убедитесь, что глобальная переменная Redux доступна
global $redux_demo;

// Получаем общие заголовки секции
$services_section_title = isset($redux_demo['main_services_section_title']) ? $redux_demo['main_services_section_title'] : 'Услуги';
$services_section_subtitle = isset($redux_demo['main_services_section_subtitle']) ? $redux_demo['main_services_section_subtitle'] : 'Выберите формат, который вам подходит';



// --- НАЧАЛО ДЕБАГА ---
// Перемещаем сюда, чтобы увидеть состояние после всех инициализаций
// echo '<pre>';
// print_r($redux_demo);
// echo '</pre>';
// --- КОНЕЦ ДЕБАГА ---

// Удалил дублирование строк для $services_section_title и $services_section_subtitle
?>

<section style="margin-top:-3px" id="consultations" class="py-4 bg-light bg-light-gradient">
	<div class="container">
		<div class="text-center mb-5">
			<h2 class="fw-bold fs-1 mb-4 text-uppercase">
				<?php echo esc_html($services_section_title); ?>
			</h2>
			<p class="text-muted fs-5">
				<?php echo esc_html($services_section_subtitle); ?>
			</p>
		</div>

		<div class="row g-4 justify-content-center">
			<?php
			// Получаем данные повторяющегося поля для карточек услуг
			$card_titles = isset($redux_demo['main_service_price_cards']['card_title']) ? $redux_demo['main_service_price_cards']['card_title'] : array();
			$card_descriptions = isset($redux_demo['main_service_price_cards']['card_description']) ? $redux_demo['main_service_price_cards']['card_description'] : array();
			$card_prices = isset($redux_demo['main_service_price_cards']['card_price']) ? $redux_demo['main_service_price_cards']['card_price'] : array();

			// !! Теперь all_card_features_raw - это массив строк из textarea
			$all_card_features_raw = isset($redux_demo['main_service_price_cards']['card_features']) ? $redux_demo['main_service_price_cards']['card_features'] : array();

			// Определяем количество карточек по самому длинному массиву (например, по заголовкам)
			$num_cards = count($card_titles);

			if ($num_cards > 0) :
				$delay_counter_card = 1;
				for ($i = 0; $i < $num_cards; $i++) :
					$current_card_title = isset($card_titles[$i]) ? $card_titles[$i] : '';
					$current_card_description = isset($card_descriptions[$i]) ? $card_descriptions[$i] : '';
					$current_card_price = isset($card_prices[$i]) ? $card_prices[$i] : '';

					// Получаем СЫРУЮ строку для текущей карточки по ее индексу
					// Удалил предыдущие неправильные попытки получения $current_card_features_text
					$current_card_features_text = isset($all_card_features_raw[$i]) ? $all_card_features_raw[$i] : '';

					// Разбиваем эту строку на отдельные пункты по переносу строки
					$card_features_list = explode("\n", $current_card_features_text);
			?>
					<div class="col-sm-6 col-md-4 animate-on-scroll" data-animate="animate__fadeInLeft" data-delay="<?php echo esc_attr($delay_counter_card); ?>s">
						<div class="card h-100 text-center p-3 shadow-sm mb-4 d-flex flex-column">
							<div class="flex-grow-1 d-flex flex-column">
								<h5 class="mb-3 fw-bold text-uppercase mt-4 fs-5">
									<?php echo esc_html($current_card_title); ?>
								</h5>
								<p class="text-muted fs-6">
									<?php echo esc_html($current_card_description); ?>
								</p>
								<h2 class="my-3 price_number" style="color: #41464b;">
									<?php echo esc_html($current_card_price); ?>
								</h2>
								<ul class="price_list list-unstyled text-muted d-flex flex-column gap-3 fs-5">
									<?php
									// Проверяем и выводим пункты списка
									if (!empty($card_features_list) && is_array($card_features_list)) :
										foreach ($card_features_list as $feature_item) :
											$feature_item = trim($feature_item); // Удаляем лишние пробелы/переносы
											if (!empty($feature_item)) : // Проверяем, что пункт не пустой
									?>
												<li>– <?php echo esc_html($feature_item); ?></li>
									<?php
											endif;
										endforeach;
									endif;
									?>
								</ul>
							</div>
							<div class="booking">
								<div class="text-center mt-4 mb-4">
									<a class="calendly-main--btn my_button btn px-4 py-2">ЗАПИСАТЬСЯ</a>
								</div>
							</div>
						</div>
					</div>
			<?php
					$delay_counter_card++;
				endfor;
			endif;
			?>
		</div>


		<div class="row g-4 justify-content-center mt-5">
			<?php
			$accordion_titles = isset($redux_demo['main_service_accordions']['accordion_title']) ? $redux_demo['main_service_accordions']['accordion_title'] : array();
			$accordion_contents = isset($redux_demo['main_service_accordions']['accordion_content']) ? $redux_demo['main_service_accordions']['accordion_content'] : array();

			$num_accordions = count($accordion_titles);

			if ($num_accordions > 0) :
				// Определяем максимальную задержку в секундах
				$max_delay_seconds = 3;
				// Рассчитываем шаг задержки для равномерного распределения в течение 3 секунд
				$delay_step = $num_accordions > 1 ? ($max_delay_seconds / ($num_accordions - 1)) : 0;

				$accordion_id_counter = 1;
				for ($j = 0; $j < $num_accordions; $j++) :
					$current_accordion_title = isset($accordion_titles[$j]) ? $accordion_titles[$j] : '';
					$current_accordion_content = isset($accordion_contents[$j]) ? $accordion_contents[$j] : '';

					// Рассчитываем текущую задержку
					$current_delay = $j * $delay_step;
			?>
					<div class="col-sm-6 col-md-4 animate-on-scroll" data-animate="animate__fadeInLeft" data-delay="<?php echo esc_attr(round($current_delay, 1)); ?>s">
						<div class="accordion" id="servicesAccordion-<?php echo esc_attr($accordion_id_counter); ?>">
							<div class="accordion-item">
								<h2 class="accordion-header" id="heading_<?php echo esc_attr($accordion_id_counter); ?>">
									<button class="accordion-button rounded fs-5 collapsed" type="button"
										data-bs-toggle="collapse" data-bs-target="#collapse_<?php echo esc_attr($accordion_id_counter); ?>" aria-expanded="false">
										<?php echo esc_html($current_accordion_title); ?>
									</button>
								</h2>
								<div id="collapse_<?php echo esc_attr($accordion_id_counter); ?>" class="accordion-collapse collapse" aria-labelledby="heading_<?php echo esc_attr($accordion_id_counter); ?>" data-bs-parent="#servicesAccordion-<?php echo esc_attr($accordion_id_counter); ?>">
									<div class="accordion-body" style="color: #636464">
										<?php echo wp_kses_post($current_accordion_content); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
			<?php
					$accordion_id_counter++;
				endfor;
			endif;
			?>
		</div>
	</div>
</section>