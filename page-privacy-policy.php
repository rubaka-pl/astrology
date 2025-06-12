<?php

/**
 * Template Name: Политика конфиденциальности
 */
get_header();
?>

<section class="py-5 bg-light">
    <div class="container">
        <h1 class="mb-4  fw-bold"><?php the_title(); ?></h1>
        <div class="policy-content fs-6 text-secondary mt-5">
            <?php the_content(); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>