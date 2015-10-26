<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wp');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '|~C.F`uy8D[:<$scN|6>UpMdi5MAu.[.GA0a9u}?dm1QsKIc64C;vhEVfwTC64m+');
define('SECURE_AUTH_KEY',  ']vmYLuAYfQwq2t[Nh_ZqF96NcaG<^kLe{rl.W>64Dv{P}w6c-`#zi.a^jnKQf/9u');
define('LOGGED_IN_KEY',    '(Gy;YCm[S+ 2Sp?.K)vXJ5TVP)2;-}il&Evo1I~ bxfRT$vbqY!uENRI)AblgF4o');
define('NONCE_KEY',        ']aevJ)28fO0tM=FvMbj~v-_7/2^SB{~=ID`V~#):vK^M%<{.oQQrqJjHfd5fJi8,');
define('AUTH_SALT',        'C-F-i9&Mx2:6(_hW|AyIE@4EPTqvT$qy|p1x9#7L4YA:3^K$)d!Ef}8Y*]O70n;0');
define('SECURE_AUTH_SALT', 'TD1[+{haoH =%M7.YQV#7&&CJ|D+e pg;X)F0<}4T+ =i!1^@;v-sxD|5@}G=j;V');
define('LOGGED_IN_SALT',   '*/7SqS5%vTw||Q(+v^-_>#:O_#SuM#S%rnJ@h0K`nzF+Cwr,R2!ez;=-B#29!b^b');
define('NONCE_SALT',       '(}G(fi}$=1X60 ?E._%op%-5v|>gO*3smS$#D+.)N|q84dl&6sb(i0M(bzvhvTo4');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
