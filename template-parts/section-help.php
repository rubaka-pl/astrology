<?php
global $redux_demo;

// Получаем данные в текущем формате
$data = $redux_demo['help_cards'] ?? $redux_demo;

// echo '<pre>';
// print_r($data);
// echo '</pre>';


// Заголовки
$heading = $redux_demo['help_heading'] ?? 'Когда стоит обратиться';
$subheading = $redux_demo['help_subheading'] ?? 'Я рядом, чтобы помочь разобраться и найти опору';



// Определяем формат данных и преобразуем в единый вид
if (isset($data['title']) && is_array($data['title'])) {
    // Формат с параллельными массивами
    $cards = [];
    $max_items = max(count($data['title'] ?? []), count($data['points'] ?? []));
    for ($i = 0; $i < $max_items; $i++) {
        $cards[] = [
            'title' => $data['title'][$i] ?? '',
            'points' => $data['points'][$i] ?? ''
        ];
    }
} elseif (isset($data['redux_repeater_data']) && is_array($data['redux_repeater_data'])) {
    // Формат repeater
    $cards = $data['redux_repeater_data'];
} else {
    $cards = [];
}

if (!empty($cards)): ?>
    <section class="py-5 bg-light" id="help-areas">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold fs-1 mb-4"><?php echo esc_html($heading); ?></h2>
                <p class="text-muted fs-5"><?php echo esc_html($subheading); ?></p>
            </div>

            <div class="row g-4">
                <?php foreach ($cards as $card):
                    $title = esc_html($card['title'] ?? '');
                    $points = !empty($card['points']) ? explode("\n", $card['points']) : [];
                ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="p-4 bg-white h-100 shadow-sm rounded-4 card-hover transition">
                            <h5 class="fw-semibold mb-3"><?php echo $title; ?></h5>
                            <?php if (!empty($points)): ?>
                                <ul class="list-unstyled text-muted small mb-0">
                                    <?php foreach ($points as $point):
                                        $point = trim($point);
                                        if (!empty($point)): ?>
                                            <li>– <?php echo esc_html($point); ?></li>
                                    <?php endif;
                                    endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>