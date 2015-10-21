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
define('DB_NAME', 'bystander');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'Kw((B4+!@xyzU TG2bv<+bAkCS]G96@f>%?w{<V^4t7MvY91V|E5IJYu^rwse2@D');
define('SECURE_AUTH_KEY',  '^xdRL<`q4wc7#:As}o>!D)z2/)!4Ek``_z|* SQ.WK<3-^p$G/*J|e)u-%r#;r}d');
define('LOGGED_IN_KEY',    '>ABF9VZsJIc+8s<U %5-]|RI<7ItJ+wuYw#:+XZY?CU,F|`dTfL=id^6j(:dsb4)');
define('NONCE_KEY',        '%+-[M*?ThA,FGn8|<Zo(NZ(G[~FBgvdi|+?9u</ruL/.<R0OA/!+axb>G@o.cro<');
define('AUTH_SALT',        'I78a[eZJq aYqpEb<Fn-]9$tRPJ?1gDH<0q*|PrJe*/.X]b$h|iifFo7)zeRzh<B');
define('SECURE_AUTH_SALT', '=4]$o:pAEaX-+yUMG,)3}`b`*P1e,_P`|XXXvV3M+T:Tv=@Yf+y+6&67dhSRplP)');
define('LOGGED_IN_SALT',   'Q|5:Aas?vsI=V|%PyFaX?t++Ht]Dc=s8vr>j#!<$.S E8OYgS(H|j V::*v3,L_9');
define('NONCE_SALT',       '4BtiXQjmly*98|iHV5,>Ws#avas[,}Rhq4a}fo+kPL$D.T^Oi{JOg-T~`w^m~xSi');

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
