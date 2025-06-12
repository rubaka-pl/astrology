<?php
global $redux_demo;

$image = get_field('about_me_image');
$title = get_field('title_about_me');
$text = get_field('text_about_me');
$button = get_field('button_about_me');
$calendly_link = get_field('calendly_link');

// Получаем сертификаты
$certificates_data = $redux_demo['certificates_about_me'] ?? $redux_demo;

// Проверяем, в каком формате данные
$has_certificates = (!empty($certificates_data['certificate_title']) && is_array($certificates_data['certificate_title'])) ||
    (!empty($certificates_data['redux_repeater_data']) && is_array($certificates_data['redux_repeater_data']));
?>

<section class="py-5 mt-5" style="background-color: #fefae0;">
    <div class="container mt-5">

        <?php if ($image): ?>
            <div class="text-center mb-4 mt-4">
                <img src="<?php echo esc_url($image['url']); ?>"
                    alt="<?php echo esc_attr($image['alt']); ?>"
                    class="img-fluid rounded-circle shadow-sm"
                    style="max-height: 350px; object-fit: cover;">
            </div>
        <?php endif; ?>

        <div class="mx-auto" style="max-width: 720px;">
            <?php if ($title): ?>
                <h2 class="mb-4 text-center fs-1 fw-bold"><?php echo esc_html($title); ?></h2>
            <?php endif; ?>

            <?php if ($text): ?>
                <div class="fs-4 text-secondary lh-lg">
                    <?php echo wp_kses_post($text); ?>
                </div>
            <?php endif; ?>

            <div class="text-center">
                <?php if ($button): ?>
                    <a class="calendly-main--btn btn my_button px-4 py-2" rel="noopener noreferrer">
                        <?php echo esc_html($button); ?>
                    </a>
                <?php endif; ?>
            </div>

            <?php if ($has_certificates) : ?>
                <div class="mt-5">
                    <h3 class="mb-4 text-center fs-3 fw-bold">Сертификаты</h3>

                    <div class="row g-4 justify-content-center certificates-gallery">
                        <?php
                        if (!empty($certificates_data['certificate_title']) && is_array($certificates_data['certificate_title'])) {
                            // Формат group_values (параллельные массивы)
                            $total = count($certificates_data['certificate_title']);
                            for ($i = 0; $i < $total; $i++) {
                                $image_data = $certificates_data['certificate_image'][$i] ?? [];
                                $image_url = $image_data['url'] ?? '';
                                $title_text = $certificates_data['certificate_title'][$i] ?? '';
                        ?>
                                <div class="col-6 text-center">
                                    <?php if (!empty($image_url)): ?>
                                        <a href="<?php echo esc_url($image_url); ?>" class="certificate-item" title="<?php echo esc_attr($title_text); ?>">
                                            <img src="<?php echo esc_url($image_url); ?>"
                                                alt="<?php echo esc_attr($title_text); ?>"
                                                class="img-fluid rounded shadow mb-2"
                                                style="object-fit: cover; width: 100%; height: 300px;">
                                        </a>
                                    <?php endif; ?>
                                    <?php if (!empty($title_text)): ?>
                                        <div class="fw-bold fs-4 mt-2"><?php echo esc_html($title_text); ?></div>
                                    <?php endif; ?>
                                </div>
                            <?php
                            }
                        } elseif (!empty($certificates_data['redux_repeater_data']) && is_array($certificates_data['redux_repeater_data'])) {
                            // Формат redux_repeater_data
                            foreach ($certificates_data['redux_repeater_data'] as $index => $certificate) {
                                $image_url = $certificate['certificate_image']['url'] ?? '';
                                $title_text = $certificate['certificate_title'] ?? '';
                            ?>
                                <div class="col-6 text-center">
                                    <?php if (!empty($image_url)): ?>
                                        <a href="<?php echo esc_url($image_url); ?>" class="certificate-item" title="<?php echo esc_attr($title_text); ?>">
                                            <img src="<?php echo esc_url($image_url); ?>"
                                                alt="<?php echo esc_attr($title_text); ?>"
                                                class="img-fluid rounded shadow mb-2"
                                                style="object-fit: cover; width: 100%; height: 300px;">
                                        </a>
                                    <?php endif; ?>
                                    <?php if (!empty($title_text)): ?>
                                        <div class="fw-semibold mt-2"><?php echo esc_html($title_text); ?></div>
                                    <?php endif; ?>
                                </div>
                        <?php
                            }
                        }
                        ?>

                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>
</section>