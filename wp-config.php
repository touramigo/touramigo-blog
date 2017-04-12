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
//define('DB_NAME', 'domenjes_amigo');
define('DB_NAME', 'blogtouramigocom');

/** Имя пользователя MySQL */
//define('DB_USER', 'domenjes_amigo');
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
//define('DB_PASSWORD', 's3k5r897');
define('DB_PASSWORD', 'Miami@123');

/** Имя сервера MySQL */
//define('DB_HOST', 'domenjes.mysql.ukraine.com.ua');
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'F+f#0-=3.E|02`UZ)ee=ql/0cJW~E:/q9vr.1:]!RxYZpw8~Rh4q[[}z|s$]7k2}');
define('SECURE_AUTH_KEY',  'V)^ scXg6VpPqD?pq`.4ixCQ_,mlo^[DL[if|!s>Yh5pfd[kkhxjFU@Yit.6yDVI');
define('LOGGED_IN_KEY',    'hG(1XR+&ecrp$Z*xJv!~e[H<pqcX|4]Rhza&+47#2`(v/$k7Ar6ggwhMEC=:oWoB');
define('NONCE_KEY',        '8Ya@Rks,%>sTv&G94Rh5H3H78iFSYi*LI<oWuZlsfa|3k0|ISNwU<wqd4b79xOAi');
define('AUTH_SALT',        '1UR|MTRte=OlsP+DxMfKC6Qi(=V(3rbtBW~8myO`>^MwK4fm-|z~2qE[j8}Y,gqa');
define('SECURE_AUTH_SALT', '}G6-V1I,L]q%T;KB{/]Z%gEKB/pv$Gx(=Wf?G8Ne+k>V4@iBajI0E=t3 2g?`S==');
define('LOGGED_IN_SALT',   '(JDU2/#X66/.,m~2<}-TqXUY Q%7wC:~+{1Ss[RVW}<&zbr58`o)X{kkqE?(fmh!');
define('NONCE_SALT',       'WeG[vDJ]IV.0aMb0M+IVtZ=zMa , 3]eN)qx~y-~!h:mR(u~qH{P&k(@(SiCGLjq');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_22';

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
