<?php

/**
 * Astro-Psychology functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astro-Psychology
 */

if (! defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function astro_psychology_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Astro-Psychology, use a find and replace
		* to change 'astro-psychology' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('astro-psychology', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'astro-psychology'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'astro_psychology_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'astro_psychology_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function astro_psychology_content_width()
{
	$GLOBALS['content_width'] = apply_filters('astro_psychology_content_width', 640);
}
add_action('after_setup_theme', 'astro_psychology_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function astro_psychology_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'astro-psychology'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'astro-psychology'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'astro_psychology_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function astro_psychology_enqueue_assets()
{
	// Внешние стили
	wp_enqueue_style('calendly', 'https://assets.calendly.com/assets/external/widget.css');
	wp_enqueue_style('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
	wp_enqueue_style('animate', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css');
	wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css');
	wp_enqueue_style('magnific-css', 'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css');

	// Локальные стили
	wp_enqueue_style('resest', get_template_directory_uri() . '/assets/css/resest.css', [], filemtime(get_template_directory() . '/assets/css/resest.css'));
	wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/styles.css', [], filemtime(get_template_directory() . '/assets/css/styles.css'));

	// Скрипты
	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', ['jquery'], null, true);
	wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', ['jquery'], null, true);
	wp_enqueue_script('magnific-js', 'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js', ['jquery'], null, true);
	wp_enqueue_script('certificates-popup', get_template_directory_uri() . '/assets/js/certificates-popup.js', ['jquery', 'magnific-js'], null, true);
	wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', ['jquery'], filemtime(get_template_directory() . '/assets/js/main.js'), true);


	wp_enqueue_script(
		'cf7-db-saver',
		get_template_directory_uri() . '/assets/js/cf7-db-saver.js',
		array('jquery', 'contact-form-7'),
		filemtime(get_template_directory() . '/assets/js/cf7-db-saver.js'),
		true
	);

	// ОПЦИОНАЛЬНО: Если в JS нужна переменная admin-ajax.php, можно передать через wp_localize_script
	wp_localize_script(
		'cf7-db-saver', // Handle скрипта, к которому привязываем данные
		'my_ajax_object', // Имя JS-объекта, который будет создан (например, my_ajax_object.ajax_url)
		array('ajax_url' => admin_url('admin-ajax.php')) // Передаваемые данные
	);
}



add_action('wp_enqueue_scripts', 'astro_psychology_enqueue_assets');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

if (class_exists('Redux')) {
	require_once get_template_directory() . '/inc/redux-config.php';
}
/**
 * Изменяет название пункта меню "Страницы" в админке WordPress.
 *
 * @param object $labels Объект с метками типа записи 'page'.
 * @return object Измененный объект с метками.
 */
function custom_change_page_menu_label($labels)
{
	// Изменяем название пункта меню "Страницы"
	$labels->menu_name = 'Страницы ***'; // Текст, который будет отображаться в главном меню
	$labels->name_admin_bar = 'Страницы ***'; // Текст, который будет отображаться в админ-баре (верхняя панель)
	return $labels;
}
add_filter('post_type_labels_page', 'custom_change_page_menu_label');


//service START
function create_service_post_type()
{
	register_post_type(
		'service',
		array(
			'labels' => array(
				'name' => __('Услуги ***'),
				'singular_name' => __('Услуга')
			),
			'public' => true,
			'menu_position' => 3,
			'has_archive' => true,
			'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
			'menu_icon' => 'dashicons-admin-generic',
			'rewrite' => array('slug' => 'services'),
		)
	);
}
add_action('init', 'create_service_post_type');
// Добавляем метабокс для полного описания
function add_full_service_description_meta_box()
{
	add_meta_box(
		'full_service_description_meta_box', // ID метабокса
		'Полное описание услуги', // Заголовок метабокса
		'render_full_service_description_meta_box', // Функция для отображения содержимого
		'service', // Тип записи
		'normal', // Позиция (normal, advanced, side)
		'high' // Приоритет
	);
}
add_action('add_meta_boxes', 'add_full_service_description_meta_box');

// Функция для отображения поля полного описания
function render_full_service_description_meta_box($post)
{
	// Получаем текущее значение мета-поля
	$full_description = get_post_meta($post->ID, 'full_service_description', true);

	echo '<p><strong>Подсказка:</strong> Вы можете добавить заголовок с крупным шрифтом, используя HTML:
        <code>&lt;h2 class="fs-1"&gt;Ваш заголовок&lt;/h2&gt;</code>.
        Такой заголовок будет отображаться крупнее.</p>';

	wp_editor(
		$full_description,
		'full_service_description',
		array(
			'textarea_name' => 'full_service_description',
			'textarea_rows' => 10,
			'teeny'         => false,
			'media_buttons' => true,
		)
	);
}

// Функция для сохранения полного описания
function save_full_service_description_meta($post_id)
{
	// Проверяем, что это наш запрос
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}
	if (!current_user_can('edit_post', $post_id)) {
		return;
	}

	// Проверяем наличие поля и сохраняем его
	if (array_key_exists('full_service_description', $_POST)) {
		update_post_meta(
			$post_id,
			'full_service_description',
			wp_kses_post($_POST['full_service_description']) // wp_kses_post для очистки HTML-контента
		);
	}
}
add_action('save_post', 'save_full_service_description_meta');

// --- END: Добавление метабокса для полного описания услуги ---
// Добавляем метабокс для цены
function add_service_price_meta_box()
{
	add_meta_box(
		'service_price_meta_box',
		'Цена услуги (необязательно)',
		'render_service_price_meta_box',
		'service',
		'side',
		'default'
	);
}
add_action('add_meta_boxes', 'add_service_price_meta_box');

// Отображение метабокса
function render_service_price_meta_box($post)
{
	$price = get_post_meta($post->ID, 'service_price', true);
?>
	<label for="service_price">Цена (например, от 1000 руб.):</label>
	<input type="text" id="service_price" name="service_price" value="<?php echo esc_attr($price); ?>" style="width:100%;">
<?php
}

// Сохранение значения
function save_service_price_meta($post_id)
{
	if (array_key_exists('service_price', $_POST)) {
		update_post_meta(
			$post_id,
			'service_price',
			sanitize_text_field($_POST['service_price'])
		);
	}
}
add_action('save_post', 'save_service_price_meta');
//service END
// Включаем сортировку перетаскиванием
function enable_service_sort()
{
	add_post_type_support('service', 'page-attributes');
}
add_action('admin_init', 'enable_service_sort');

// Добавляем колонку цены в админку
function add_service_price_column($columns)
{
	$columns['price'] = 'Цена';
	return $columns;
}
add_filter('manage_service_posts_columns', 'add_service_price_column');

// Заполняем колонку цены
function fill_service_price_column($column, $post_id)
{
	if ($column === 'price') {
		echo get_post_meta($post_id, 'service_price', true);
	}
}
add_action('manage_service_posts_custom_column', 'fill_service_price_column', 10, 2);



// Добавляем пункт меню в админку
add_action('admin_menu', function () {
	add_menu_page(
		'Users BD ***',
		'База данных пользователей (добавление вручную) ***',
		'manage_options',
		'users_bd_form',
		'render_users_bd_form'
	);
});

// Рендерим форму и выводим список
// Рендерим форму, выводим список и обрабатываем удаление
function render_users_bd_form()
{
	global $wpdb;

	// Обработка удаления
	if (isset($_GET['delete_id']) && isset($_GET['_wpnonce'])) {
		$delete_id = intval($_GET['delete_id']);
		if (wp_verify_nonce($_GET['_wpnonce'], 'delete_user_' . $delete_id)) {
			$wpdb->delete('users_bd', ['id' => $delete_id]);
			echo '<div class="notice notice-success"><p>Запись удалена.</p></div>';
		} else {
			echo '<div class="notice notice-error"><p>Ошибка безопасности при удалении.</p></div>';
		}
	}

	// Обработка сохранения новой записи
	if (isset($_POST['users_bd_submit'])) {
		handle_users_bd_form();
	}

	$results = $wpdb->get_results("SELECT * FROM users_bd ORDER BY id DESC");

?>
	<div class="wrap">
		<h1>Добавить пользователя</h1>
		<form method="post">
			<table class="form-table">
				<tr>
					<th>ФИО:</th>
					<td><input type="text" name="full_name" required></td>
				</tr>
				<tr>
					<th>Город:</th>
					<td><input type="text" name="city" required></td>
				</tr>
				<tr>
					<th>Дата рождения:</th>
					<td>
						<input type="date" name="birth_date" required>
						<input type="time" name="birth_time" required>
					</td>
				</tr>
				<tr>
					<th>Заметка:</th>
					<td><textarea name="note"></textarea></td>
				</tr>
				<tr>
					<th>Телефон:</th>
					<td><input type="text" name="phone"></td>
				</tr>
				<tr>
					<th>Email:</th>
					<td><input type="email" name="email"></td>
				</tr>
			</table>
			<p><input type="submit" class="button button-primary" value="Сохранить"></p>
			<input type="hidden" name="users_bd_submit" value="1">
		</form>

		<h2>Список пользователей</h2>
		<table class="widefat fixed striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>ФИО</th>
					<th>Город</th>
					<th>Дата рождения</th>
					<th>Заметка</th>
					<th>Телефон</th>
					<th>Email</th>
					<th>Создано</th>
					<th>Действия</th>
				</tr>
			</thead>
			<tbody>
				<?php if ($results): ?>
					<?php foreach ($results as $row): ?>
						<tr>
							<td><?php echo $row->id; ?></td>
							<td><?php echo esc_html($row->full_name); ?></td>
							<td><?php echo esc_html($row->city); ?></td>
							<td><?php echo esc_html($row->birth_date); ?></td>
							<td><?php echo esc_html($row->note); ?></td>
							<td><?php echo esc_html($row->phone); ?></td>
							<td><?php echo esc_html($row->email); ?></td>
							<td><?php echo esc_html($row->created_at); ?></td>
							<td>
								<?php
								$nonce = wp_create_nonce('delete_user_' . $row->id);
								$delete_link = admin_url('admin.php?page=users_bd_form&delete_id=' . $row->id . '&_wpnonce=' . $nonce);
								?>
								<a href="<?php echo $delete_link; ?>" onclick="return confirm('Удалить запись?');" class="button button-small">Удалить</a>
							</td>
						</tr>
					<?php endforeach; ?>
				<?php else: ?>
					<tr>
						<td colspan="9">Записей нет.</td>
					</tr>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
<?php
}


// Обработка формы
function handle_users_bd_form()
{
	global $wpdb;

	$full_name = sanitize_text_field($_POST['full_name']);
	$city = sanitize_text_field($_POST['city']);
	$birth_date = sanitize_text_field($_POST['birth_date']);
	$birth_time = sanitize_text_field($_POST['birth_time']);
	$note = sanitize_textarea_field($_POST['note']);
	$phone = sanitize_text_field($_POST['phone']);
	$email = sanitize_email($_POST['email']);

	$datetime = $birth_date . ' ' . $birth_time . ':00';

	$wpdb->insert('users_bd', [
		'full_name' => $full_name,
		'city' => $city,
		'birth_date' => $datetime,
		'note' => $note,
		'phone' => $phone,
		'email' => $email
	]);

	echo '<div class="notice notice-success"><p>Данные успешно сохранены!</p></div>';
}
