<section class="py-5 bg-white animate-on-scroll" data-animate="animate__fadeInLeft" data-delay="0">
	<div class="container px-4 px-md-5">
		<div class="mt-4 mb-4 row align-items-center g-5">
			<div class="col-lg-6 mx-auto">
				<h2 class="fs-1 fw-bold mb-4">
					<?php the_field('main_about_section_title'); ?>
				</h2>

				<p class="fs-5 lh-lg text-secondary mb-3 lh-base">
					<?php the_field('main_about_description_1'); ?>
				</p>

				<p class="fs-5 lh-lg text-secondary mb-3 lh-base">
					<?php the_field('main_about_description_2'); ?>
				</p>

				<p class="fs-5 lh-lg text-secondary mb-3 lh-base">
					<?php the_field('main_about_description_3'); ?>
				</p>

				<?php
				$button_link = get_field('main_about_button_link');
				$button_text = get_field('main_about_button_text');
				?>

				<?php if ($button_link && $button_text) : ?>
					<div class="booking">
						<div class="text-center mt-4 mb-4">
							<a href="<?php echo esc_url($button_link['url']); ?>"
								class="my_button btn px-4 py-2"
								target="<?php echo esc_attr($button_link['target']); ?>"
								rel="noopener noreferrer">
								<?php echo esc_html($button_text); ?>
							</a>
						</div>
					</div>
				<?php endif; ?>
			</div>

			<div class="custom-hide col-lg-6">
				<div class="row">
					<div class="col-6">
						<?php
						// Получаем объект изображения из ACF
						$image_1 = get_field('main_img_about_1');
						if ($image_1) : // Проверяем, что объект изображения существует
							// Извлекаем URL и alt текст из объекта
							$image_1_url = $image_1['url'];
							$image_1_alt = $image_1['alt'];
						?>
							<img src="<?php echo esc_url($image_1_url); ?>"
								class="custom-img img-fluid w-100 animate-on-scroll"
								data-animate="animate__fadeInRight" data-delay="1s" style="width: 355px;"
								alt="<?php echo esc_attr($image_1_alt); // Используем alt текст из объекта 
										?>">
						<?php endif; ?>
					</div>
					<div class="col-6 img-offset">
						<?php
						// Получаем объект изображения из ACF
						$image_2 = get_field('main_img_about_2');
						if ($image_2) : // Проверяем, что объект изображения существует
							// Извлекаем URL и alt текст из объекта
							$image_2_url = $image_2['url'];
							$image_2_alt = $image_2['alt'];
						?>
							<img src="<?php echo esc_url($image_2_url); ?>"
								class="custom-img img-fluid w-100 animate-on-scroll"
								data-animate="animate__fadeInRight" data-delay="2s"
								alt="<?php echo esc_attr($image_2_alt); // Используем alt текст из объекта 
										?>">
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<img src="<?php echo get_template_directory_uri() ?>/assets/img/layered-wave.svg" alt="separator" style="background-color: bisque;border-radius:0px;width: 100%; height: auto;">