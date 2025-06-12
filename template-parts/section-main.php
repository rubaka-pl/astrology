<section style="background-image: url('<?php echo get_template_directory_uri() ?>/assets/img/1-min.png'); margin-top: 4rem;"
    class="main-p bg-light bg position-relative animate-on-scroll" data-animate="animate__fadeIn"
    data-delay="0s">
    <div class="bg-dark position-absolute top-0 start-0 w-100 h-100" style="opacity: 0.4; z-index: 1;"></div>


    <div class="container position-relative mt-5" style="z-index: 2;">
        <div class="row align-items-center flex-column-reverse flex-md-row">

            <!-- Фото -->
            <div class="col-md-6 text-center mb-4 mb-md-0 animate-on-scroll" data-animate="animate__fadeIn"
                data-delay="1s">
                <img src="<?php echo get_template_directory_uri() ?>/assets/img/Astrology.jpg" alt="Светлана Канцедал фото" class="img-fluid rounded"
                    style="max-height: 550px;">
            </div>


            <!-- Текст -->
            <div class="text-white col-md-6 pt-3 pt-md-5 text-md-start text-center">
                <p class="text-uppercase fs-5 mb-1">
                    <?php the_field('main_title_top'); ?>
                </p>

                <h2 class="fw-bold mb-3 fs-1">
                    <?php the_field('main_name'); ?>
                </h2>

                <div class="mb-2 fs-6 lh-base">
                    <p class="mb-2 ls-wide">
                        <?php the_field('main_paragraph_1'); ?>
                    </p>
                    <p class="mb-2 ls-wide">
                        <?php the_field('main_paragraph_2'); ?>
                    </p>
                </div>

                <!-- Цифры -->
                <div class="row mt-4 text-center fs-4">
                    <div class="col-4">
                        <h5 class="fw-bold mb-2 counter fs-1" data-target="<?php the_field('experience_years'); ?>">
                            <?php the_field('experience_years'); ?>
                        </h5>
                        <p class="fs-6 mb-5 mb-lg-0">
                            <?php the_field('experience_years_text'); ?>
                        </p>
                    </div>
                    <div class="col-4">
                        <h5 class="fw-bold fs-1 mb-2 counter" data-target="<?php the_field('clients_count'); ?>">
                            <?php the_field('clients_count'); ?>
                        </h5>
                        <p class="fs-6 mb-5 mb-lg-0">
                            <?php the_field('clients_counts_text');
                            ?>
                        </p>
                    </div>
                    <div class="col-4">
                        <h5 class="fw-bold fs-1 mb-2 counter" data-target="<?php the_field('hours_count'); ?>">
                            <?php echo number_format((int) get_field('hours_count'), 0, '', '&nbsp;'); ?>
                        </h5>
                        <p class="fs-6 mb-5 mb-lg-0">
                            <?php the_field('hours_count_text'); ?>
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<div class="custom-shape-divider-top-1749217772 animate-on-scroll" data-animate="animate__fadeInRight"
    data-delay="1s">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
        preserveAspectRatio="none">
        <path
            d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z"
            opacity=".25" class="shape-fill"></path>
        <path
            d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z"
            opacity=".5" class="shape-fill"></path>
        <path
            d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z"
            class="shape-fill"></path>
    </svg>
</div>