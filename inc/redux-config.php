<?php
// Название набора опций (можешь заменить на своё)
$opt_name = 'redux_demo';

// Регистрируем Redux-опции
Redux::setArgs($opt_name, array(
    'opt_name'             => $opt_name,
    'display_name'         => 'Настройки темы',
    'menu_title'           => 'Настройки темы ***',
    'page_slug'            => 'theme-options',
    'page_position'        => 2,
    'admin_bar'            => false,
    'menu_type'            => 'menu',
));

// Добавляем контакты
Redux::set_section($opt_name, array(
    'title'  => 'Контактные данные и логотип',
    'id'     => 'footer_section',
    'fields' => array(
        array(
            'id'       => 'phone',
            'type'     => 'text',
            'title'    => 'Телефон',
            'default'  => '+48 123 456 789'
        ),
        array(
            'id'       => 'email',
            'type'     => 'text',
            'title'    => 'Email',
            'default'  => 'mail@example.com'
        ),
        array(
            'id'       => 'note',
            'type'     => 'textarea',
            'title'    => 'Низ футера',
            'default'  => 'Работаю онлайн — независимо от страны проживания'
        ),
        array(
            'id'       => 'logo',
            'type'     => 'media',
            'title'    => 'Логотип',
            'url'      => false,
            'default'  => array(
                'url' => get_template_directory_uri() . '/assets/img/logo.png'
            )
        ),
    )
));

// Redux::set_section($opt_name, array(
//     'title'  => 'Услуги (слайдер)',
//     'id'     => 'services_slider',
//     'fields' => array(
//         array(
//             'id'       => 'services_cards',
//             'type'     => 'repeater',
//             'title'    => 'Карточки услуг',
//             'group_values' => true,
//             'sortable' => true,
//             'fields'   => array(
//                 array(
//                     'id'    => 'title',
//                     'type'  => 'text',
//                     'title' => 'Заголовок',
//                 ),
//                 array(
//                     'id'    => 'description',
//                     'type'  => 'textarea',
//                     'title' => 'Описание',
//                 ),
//                 array(
//                     'id'    => 'image',
//                     'type'  => 'media',
//                     'title' => 'Изображение',
//                 ),
//                 array(
//                     'id'    => 'price',
//                     'type'  => 'text',
//                     'title' => 'Цена (необязательно)',
//                 ),
//             ),
//         ),
//     ),
// ));
Redux::set_section($opt_name, array(
    'title'  => 'Часто задаваемые вопросы',
    'id'     => 'faq_section',
    'fields' => array(
        array(
            'id'             => 'faq_questions',
            'type'           => 'repeater',
            'title'          => 'Список вопросов',
            'group_values'   => true,
            'sortable'       => true,
            'fields'         => array(
                array(
                    'id'    => 'question',
                    'type'  => 'text',
                    'title' => 'Вопрос',
                ),
                array(
                    'id'    => 'answer',
                    'type'  => 'textarea',
                    'title' => 'Ответ',
                ),
            )
        )
    )
));
Redux::set_section($opt_name, array(
    'title'  => 'Когда стоит обратиться',
    'id'     => 'help_areas',
    'fields' => array(
        array(
            'id'    => 'help_heading',
            'type'  => 'text',
            'title' => 'Заголовок секции',
            'default' => 'Когда стоит обратиться',
        ),
        array(
            'id'    => 'help_subheading',
            'type'  => 'textarea',
            'title' => 'Описание под заголовком',
            'default' => 'Я рядом, чтобы помочь разобраться и найти опору',
        ),
        array(
            'id'           => 'help_cards',
            'type'         => 'repeater',
            'title'        => 'Карточки проблем',
            'group_values' => true,
            'sortable'     => true,
            'fields'       => array(
                array(
                    'id'    => 'title',
                    'type'  => 'text',
                    'title' => 'Заголовок блока',
                ),
                array(
                    'id'    => 'points',
                    'type'  => 'textarea',
                    'title' => 'Список пунктов (через перенос строки)',
                ),
            ),
        ),
    )
));



// --- Секция "Услуги" ---
Redux::set_section($opt_name, array(
    'title'            => esc_html__('Секция с карточками услуг', 'your-text-domain'),
    'id'               => 'main-services-section',
    'subsection'       => false,
    'fields'           => array(
        array(
            'id'       => 'main_services_section_title',
            'type'     => 'text',
            'title'    => esc_html__('Заголовок секции услуг', 'your-text-domain'),
            'default'  => 'Услуги',
        ),
        array(
            'id'       => 'main_services_section_subtitle',
            'type'     => 'text',
            'title'    => esc_html__('Подзаголовок секции услуг', 'your-text-domain'),
            'default'  => 'Выберите формат, который вам подходит',
        ),
        array( //  CALENDLY URL
            'id'       => 'main_calendly_booking_url',
            'type'     => 'text',
            'title'    => esc_html__('Общий Calendly URL для кнопок "Записаться"', 'your-text-domain'),
            'placeholder' => 'https://calendly.com/your-main-event',
            'desc'     => esc_html__('Введите URL для записи на консультацию. Эта ссылка будет использоваться для всех кнопок "Записаться" в секции услуг.', 'your-text-domain'),
        ),
        array(
            'id'       => 'main_service_price_cards',
            'type'     => 'repeater',
            'title'    => esc_html__('Карточки услуг (Ценники)', 'your-text-domain'),
            'desc'     => esc_html__('Добавьте или отредактируйте карточки услуг.', 'your-text-domain'),
            'fields'   => array(
                array(
                    'id'          => 'card_title',
                    'type'        => 'text',
                    'title'       => esc_html__('Заголовок услуги', 'your-text-domain'),
                    'placeholder' => esc_html__('Базовая консультация', 'your-text-domain'),
                ),
                array(
                    'id'          => 'card_description',
                    'type'        => 'textarea',
                    'title'       => esc_html__('Краткое описание', 'your-text-domain'),
                    'placeholder' => esc_html__('Астрологический разбор одной темы', 'your-text-domain'),
                ),
                array(
                    'id'          => 'card_price',
                    'type'        => 'text', // Используем 'text' для цены, чтобы можно было ввести "100" или "от 100"
                    'title'       => esc_html__('Цена услуги', 'your-text-domain'),
                    'placeholder' => '100',
                    'desc'        => esc_html__('Введите число и символ валюты.', 'your-text-domain'),
                ),
                array(
                    'id'       => 'card_features',
                    'type'     => 'textarea',
                    'title'    => esc_html__('Пункты списка для карточки', 'your-text-domain'),
                    'fields'   => array(
                        array(
                            'id'          => 'feature_item',
                            'type'        => 'textarea',
                            'title'       => esc_html__('Пункт', 'your-text-domain'),
                            'desc'     => esc_html__('Введите каждый пункт списка с новой строки.', 'your-text-domain'),
                            'placeholder' => esc_html__('– Предназначение, финансы', 'your-text-domain'),
                        ),
                    ),
                    'group_values' => true,

                ),
            ),
            'group_values' => true, // Группировать значения для repeater
        ),
        array(
            'id'       => 'main_service_accordions',
            'type'     => 'repeater',
            'title'    => esc_html__('Аккордеоны услуг', 'your-text-domain'),
            'desc'     => esc_html__('Добавьте или отредактируйте блоки аккордеонов.', 'your-text-domain'),
            'fields'   => array(
                array(
                    'id'          => 'accordion_title',
                    'type'        => 'text',
                    'title'       => esc_html__('Заголовок аккордеона', 'your-text-domain'),
                    'placeholder' => esc_html__('Карьера и финансы', 'your-text-domain'),
                ),
                array(
                    'id'          => 'accordion_content',
                    'type'        => 'editor', // WYSIWYG editor
                    'title'       => esc_html__('Содержимое аккордеона', 'your-text-domain'),
                    'args'        => array(
                        'wpautop'       => true,
                        'textarea_rows' => 5
                    ),
                ),
            ),
            'group_values' => true, // Группировать значения для repeater
        ),
    )
));


Redux::setSection($opt_name, array(
    'title' => esc_html__('Секция Отзывов', 'your-text-domain'),
    'id'    => 'reviews_section',
    'icon'  => 'el el-star-empty', // Иконка для раздела в админке
    'fields' => array(
        array(
            'id'    => 'reviews_list',
            'type'  => 'repeater',
            'title' => esc_html__('Список Отзывов', 'your-text-domain'),
            'desc'  => esc_html__('Добавьте, отредактируйте или измените порядок отзывов клиентов.', 'your-text-domain'),
            'group_values' => true, // Группировать значения по элементам, а не по полям
            'sortable' => true, // Разрешить перетаскивание для изменения порядка
            'fields' => array(
                array(
                    'id'    => 'reviewer_name',
                    'type'  => 'text',
                    'title' => esc_html__('Имя Отзывщика', 'your-text-domain'),
                    'default' => esc_html__('Имя клиента', 'your-text-domain'),
                ),
                array(
                    'id'    => 'review_text',
                    'type'  => 'textarea', // Используем textarea для текста отзыва
                    'title' => esc_html__('Текст Отзыва', 'your-text-domain'),
                    'default' => esc_html__('“Здесь будет текст отзыва от клиента. Используйте кавычки.”', 'your-text-domain'),
                    'args'  => array(
                        'rows' => 5, // Высота текстового поля
                    ),
                ),
                array(
                    'id'    => 'reviewer_image',
                    'type'  => 'media',
                    'title' => esc_html__('Изображение Отзывщика (Аватар)', 'your-text-domain'),
                    'url'   => true, // Показывает URL изображения
                    // Дефолтное изображение, если не загружено. Убедитесь, что файл существует.
                    'default' => array(
                        'url' => get_template_directory_uri() . '/assets/img/default-avatar.png',
                    ),
                    'desc'  => esc_html__('Загрузите фото отзывщика. Если пусто, будет использоваться логотип сайта или дефолтная заглушка.', 'your-text-domain'),
                ),
            ),
        ),
    ),
));


Redux::setSection($opt_name, array(
    'title'  => 'Сертификаты на странице ОБО МНЕ',
    'id'     => 'about_me_section',

    'fields' => array(
        array(
            'id'       => 'certificates_about_me',
            'type'     => 'repeater',
            'title'    => 'Сертификаты',
            'group_values' => true, // Группировать значения по элементам, а не по полям
            'fields'   => array(
                array(
                    'id'    => 'certificate_image',
                    'type'  => 'media',
                    'title' => 'Изображение сертификата',
                ),
                array(
                    'id'    => 'certificate_title',
                    'type'  => 'text',
                    'title' => 'Название сертификата',
                ),
            )
        ),

    )
));
