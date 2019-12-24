<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'wp' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'oYA;<]yq[J(6HY?Y.T=,LZN8V^|/hWE3fB}7/`A#Sn;2,dzajK0C~L8@WLd1`uuv' );
define( 'SECURE_AUTH_KEY',  '.2Znl%pSg[@Xb0MNJ7&gEH#}n_F66VpD?HP[I&<0QJa q@(~+~0HCArB9v=ezK#9' );
define( 'LOGGED_IN_KEY',    'z)buH2QeE,J1xs#FC=3-3Aj^hDIEmSh2e2D#ai=0W@1,s/w2HH}6_qY>Y|wpAcIZ' );
define( 'NONCE_KEY',        'D~|5MJixr:EYja3_VXdEyVOu2|6]/r$2]kzZ!~-~sTK)a%/Kd>5`}4.nOT5rhOqf' );
define( 'AUTH_SALT',        'Ewy;@r*4O)p)%RqBkE>,kzn}9R)Y%kl)ku%_:VpI%B!zLr[tA0e>Eg-YqFTU#MHv' );
define( 'SECURE_AUTH_SALT', 'AtgA.OI&)^-,4gGANoPbdj03.@2AB]QLIq.BGi+?kBcy2mig& <~Cm=d >D$M~zZ' );
define( 'LOGGED_IN_SALT',   'd{8IUg}Vns+.nTy%iJiGvM*U#eo;7Qq}!tfh_Av<h}dgZJ86U%vgcA|.c 8]X[~c' );
define( 'NONCE_SALT',       '8 `]o{]:~Y`n{O4JrGc]*Kuf*S{Hz$`^oG!Q]:UWLx3:QmrF46#Ja_W-_`E62zY6' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );
