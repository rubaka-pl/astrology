<section id="services" class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-4 fs-1 text-uppercase animate__animated animate__fadeInUp">
            Детальное описание услуг
        </h2>

        <div class="swiper mySwiper_1 animate__animated animate__fadeIn" data-animate="animate__fadeIn">
            <div class="swiper-wrapper">
                <?php
                $services_query = new WP_Query(array(
                    'post_type' => 'service',
                    'posts_per_page' => -1,
                    'orderby' => 'menu_order',
                    'order' => 'ASC'
                ));

                if ($services_query->have_posts()) :
                    while ($services_query->have_posts()) : $services_query->the_post();
                        $service_id = get_the_ID();
                        $title = get_the_title();
                        $description = get_the_excerpt();
                        $image_url = get_the_post_thumbnail_url($service_id, 'medium');
                        $price = get_post_meta($service_id, 'service_price', true);
                        $permalink = get_the_permalink();
                ?>
                        <div class="swiper-slide">
                            <a href="<?php echo esc_url($permalink); ?>" class="service-card card shadow-sm h-100 text-decoration-none text-dark">
                                <div class="card shadow-sm h-100">
                                    <div class="position-relative">
                                        <?php if ($image_url) : ?>
                                            <img src="<?php echo esc_url($image_url); ?>"
                                                class="card-img-top"
                                                alt="<?php echo esc_attr($title); ?>"
                                                loading="lazy"
                                                style="height: 150px; object-fit: cover;">
                                        <?php endif; ?>


                                    </div>

                                    <div class="card-body text-center">
                                        <h5 class="card-title text-uppercase fw-bold fs-5">
                                            <?php echo esc_html($title); ?>
                                        </h5>
                                        <?php if ($description) : ?>
                                            <p class="card-text text-muted fs-6">
                                                <?php echo esc_html($description); ?>
                                            </p>
                                            <?php if ($price) : ?>
                                                <div style="width: 200px; margin: 0 auto;" class="mt-4 mb-4 bg-light text-dark px-2 py-1 fs-5">
                                                    <?php echo esc_html($price); ?>
                                                </div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </a>

                        </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<div class="col-12 text-center py-4"><p>Услуги не найдены</p></div>';
                endif;
                ?>
            </div>

            <!-- Навигация -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination mt-3"></div>
        </div>
    </div>
</section>