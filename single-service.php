<?php get_header(); // Включаем шапку сайта 
$calendly_link = get_field('calendly_link', 'option');

?>
<div style="margin-top: 5rem !important;" class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-12">

            <?php
            // Начинаем WordPress Loop
            if (have_posts()) :
                while (have_posts()) : the_post();
                    $service_id = get_the_ID();
                    $title = get_the_title();
                    $content = get_the_content();
                    $image_url = get_the_post_thumbnail_url($service_id, 'large'); // Изображение побольше
                    $price = get_post_meta($service_id, 'service_price', true); // Цена
                    $full_description_content = get_post_meta($service_id, 'full_service_description', true);


            ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <h1 class="text-center mb-4 mt-4 fs-1 text-uppercase animate__animated animate__fadeInUp">
                            <?php echo esc_html($title); ?>
                        </h1>

                        <?php if ($image_url) : ?>
                            <div class="text-center mb-4 animate__animated animate__fadeIn">
                                <img src="<?php echo esc_url($image_url); ?>" class="img-fluid rounded shadow-sm" alt="<?php echo esc_attr($title); ?>" style="max-height: 400px; object-fit: cover;">
                            </div>
                        <?php endif; ?>

                        <div class="card shadow-lg p-4 mb-5 animate__animated animate__fadeInUp">
                            <div class="card-body">
                                <div class="row align-items-center mb-3">
                                    <?php if ($price) : ?>
                                        <div class="col-md-auto text-center text-md-start mb-3 mb-md-0">
                                            <span style='color: black;
    background-color: beige;' class="badge b fs-4 px-4 py-4">Цена: <?php echo esc_html($price); ?></span>
                                        </div>
                                    <?php endif; ?>
                                    <div class="col text-center text-md-end">
                                        <a style="top: -5px; position:relative" class="calendly-main--btn btn my_button px-4 py-2" rel="noopener noreferrer">
                                            Записаться
                                        </a>
                                    </div>
                                </div>

                                <hr class="my-4">
                                <div class="service-content lead">
                                    <?php
                                    if (!empty($full_description_content)) {
                                        echo apply_filters('the_content', $full_description_content);
                                    } else {
                                        echo '<p>Подробное описание услуги отсутствует.</p>';
                                    }
                                    ?>
                                </div>



                            </div>
                        </div>
                    </article>

            <?php
                endwhile;
            else :
                // Если пост не найден
                echo '<p class="text-center fs-4">Извините, услуга не найдена.</p>';
            endif;
            ?>

            <div class="text-center mt-5 animate__animated animate__fadeIn">
                <a href="<?php echo home_url('/'); ?>" class=" btn btn-outline-secondary btn-lg">
                    ← Вернуться ко всем услугам
                </a>
            </div>

        </div>
    </div>
</div>

<?php get_footer();
?>

<div class="modal fade" id="orderServiceModal" tabindex="-1" aria-labelledby="orderServiceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderServiceModalLabel">Запись на услугу "<?php echo esc_html($title); ?>"</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Заполните форму ниже, чтобы записаться на услугу.</p>
                <form>
                    <div class="mb-3">
                        <label for="clientName" class="form-label">Ваше имя</label>
                        <input type="text" class="form-control" id="clientName" required>
                    </div>
                    <div class="mb-3">
                        <label for="clientPhone" class="form-label">Телефон</label>
                        <input type="tel" class="form-control" id="clientPhone" required>
                    </div>
                    <div class="mb-3">
                        <label for="clientEmail" class="form-label">Email (по желанию)</label>
                        <input type="email" class="form-control" id="clientEmail">
                    </div>
                    <button type="submit" class="btn btn-primary">Отправить заявку</button>
                </form>
            </div>
        </div>
    </div>
</div>