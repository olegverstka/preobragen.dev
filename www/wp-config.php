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
define('DB_NAME', 'pb');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'o-Li>Wn70ShH9x.1)=1`y8q%x*|7uNKMlqNmbOGp8Z8MCZe:_xj:X?{4<Uic^%lB');
define('SECURE_AUTH_KEY',  'o>WF%Zo}V< 4lElkt?Wo.)lLpTWtW`ACw^D ]{C$Y_D_cMq* 9GijxChQNf?Jxb-');
define('LOGGED_IN_KEY',    '#ZlAF#}>7h!DKu=_H%A`B? ZgRgJ-b3:a3g!./fsxR~bHw[xSQBZ+WQ17Z[dH@6]');
define('NONCE_KEY',        '^|?,e5eg0[_e<11-+Hy$~fgR3MN$}JJ%Uq@|f_nA4}o%+P` *nj2n~J27oxAvo9r');
define('AUTH_SALT',        'ElsSGfzST?uydigs4r!.y!<I8&JS@*>(dry63*api.oiJEE>@UBAAN2B.!6O}`[W');
define('SECURE_AUTH_SALT', 'Z>K9j;by|QjBice#9iF{aFz EI^-|{0*oj/XZr~WhA5Rw1O +u]BJRGQob#eY]_}');
define('LOGGED_IN_SALT',   '@o)j>$SPXsKsMc4:sQ>zK}e7Hj}^yRP)6[gcn#3E]ZS%^1_GG8b$2NL-j/bj]];l');
define('NONCE_SALT',       'Pr%)]klb^EfK5mQ`l;&)EzKYN;FPF}Ghin<sM/BKo,E!=~|?n3i6cDe-t.,$QX2d');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'pb_';

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
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
