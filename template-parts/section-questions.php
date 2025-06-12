<?php
global $redux_demo;

// Получаем данные в текущем формате
$faq_data = $redux_demo['faq_questions'] ?? $redux_demo;

// Проверяем наличие вопросов в любом из возможных форматов
$has_questions = (!empty($faq_data['question']) && is_array($faq_data['question'])) ||
    (!empty($faq_data['redux_repeater_data']) && is_array($faq_data['redux_repeater_data']));

if ($has_questions) :
?>
    <section id="faq" class="py-5 animate-on-scroll" data-animate="animate__fadeInLeft" data-delay="1s">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fs-1 text-uppercase mb-4">Часто задаваемые вопросы</h2>
                <p class="text-muted mb-4 fs-5">Здесь вы найдете ответы на наиболее распространенные вопросы о наших астрологических услугах.</p>
            </div>

            <div class="accordion accordion-flush" id="faqAccordion">
                <?php
                // Обрабатываем оба возможных формата данных
                if (!empty($faq_data['question']) && is_array($faq_data['question'])) {
                    // Формат с параллельными массивами
                    $max_items = max(
                        count($faq_data['question'] ?? []),
                        count($faq_data['answer'] ?? [])
                    );

                    for ($i = 0; $i < $max_items; $i++) {
                        $question = $faq_data['question'][$i] ?? 'Вопрос не указан';
                        $answer = $faq_data['answer'][$i] ?? '';
                        $headingId = 'faqHeading' . $i;
                        $collapseId = 'faqCollapse' . $i;
                ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="<?php echo $headingId; ?>">
                                <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#<?php echo $collapseId; ?>"
                                    aria-expanded="false"
                                    aria-controls="<?php echo $collapseId; ?>">
                                    <?php echo esc_html($question); ?>
                                </button>
                            </h2>
                            <div id="<?php echo $collapseId; ?>" class="accordion-collapse collapse" aria-labelledby="<?php echo $headingId; ?>" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    <?php echo wp_kses_post($answer); ?>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                } elseif (!empty($faq_data['redux_repeater_data']) && is_array($faq_data['redux_repeater_data'])) {
                    // Формат с repeater data
                    foreach ($faq_data['redux_repeater_data'] as $index => $item) {
                        $question = $item['question'] ?? 'Вопрос не указан';
                        $answer = $item['answer'] ?? '';
                        $headingId = 'faqHeading' . $index;
                        $collapseId = 'faqCollapse' . $index;
                    ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="<?php echo $headingId; ?>">
                                <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#<?php echo $collapseId; ?>"
                                    aria-expanded="false"
                                    aria-controls="<?php echo $collapseId; ?>">
                                    <?php echo esc_html($question); ?>
                                </button>
                            </h2>
                            <div id="<?php echo $collapseId; ?>" class="accordion-collapse collapse" aria-labelledby="<?php echo $headingId; ?>" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    <?php echo wp_kses_post(html_entity_decode($answer)); ?>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>
<?php endif; ?>