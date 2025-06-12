<?php
$image = get_field('contact_image');
$title = get_field('contact_title');
$text = get_field('contact_text');
$button = get_field('contact_button_text');
$instagram_link = get_field('instagram_link');
$telegram_link = get_field('telegram_link');
$facebook_link = get_field('facebook_link');
$whatsapp_link = get_field('whatsapp_link');
?>

<section id="contact" class="py-5" style="background-color: #f8f8e6;">
	<div class="container">
		<div class="row align-items-center">
			<!-- Картинка слева -->
			<?php if ($image): ?>
				<div class="col-md-6 mt-4 text-center mb-4 mb-md-0">
					<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="img-fluid rounded shadow-sm"
						style="max-height: 400px;">
				</div>
			<?php endif; ?>

			<!-- Контент справа -->
			<div class="col-md-6 text-center text-md-start">
				<?php if ($title): ?>
					<h4 class="mb-4 fs-1"><?php echo esc_html($title); ?></h4>
				<?php endif; ?>

				<?php if ($text): ?>
					<p class="mb-4 fs-6"><?php echo esc_html($text); ?></p>
				<?php endif; ?>

				<div class="d-flex flex-column align-items-center">
					<?php if ($button): ?>
						<a style="padding: 1em 1.5em;" href="<?php echo esc_url($whatsapp_link); ?>" target="_blank" class="my_button btn mb-4">
							<?php echo esc_html($button); ?>
						</a>
					<?php endif; ?>

					<div class="mb-3">
						<span class="text-secondary fw-semibold">ИЛИ</span>
					</div>

					<div class="d-flex justify-content-center justify-content-md-start gap-3 mt-1">
						<?php if ($instagram_link): ?>
							<a class="hover_icon" href="<?php echo esc_url($instagram_link); ?>" target="_blank">
								<img src="<?php echo get_template_directory_uri() ?>/assets/icons/instagram-brands.svg" alt="Instagram" width="32" height="32">
							</a>
						<?php endif; ?>

						<?php if ($telegram_link): ?>
							<a class="hover_icon" href="<?php echo esc_url($telegram_link); ?>" target="_blank">
								<img src="<?php echo get_template_directory_uri() ?>/assets/icons/telegram-brands.svg" alt="Telegram" width="32" height="32">
							</a>
						<?php endif; ?>

						<?php if ($facebook_link): ?>
							<a class="hover_icon" href="<?php echo esc_url($facebook_link); ?>" target="_blank">
								<img src="<?php echo get_template_directory_uri() ?>/assets/icons/facebook-brands.svg" alt="Facebook" width="32" height="32">
							</a>
						<?php endif; ?>
					</div>
				</div>

			</div>
		</div>
	</div>
</section>