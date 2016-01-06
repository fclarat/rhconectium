<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'rhconect_wprh');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'qwerty');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define ('WPLANG', 'es_ES');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'unnpbwpks7rxllwahainfxcbskwzcwiatzylqcwxqs9w17yaoplewgkwilv69wde');
define('SECURE_AUTH_KEY',  '720tnzzt4pqie4i3urxbfhjstvl9hrg6pblhb6jsdz6qhnlqwlveifr43fxidpgp');
define('LOGGED_IN_KEY',    'dm4suknzazvplflv2s0mv7bxbo8huoyarhlibhcs5rxg4ugnfpwzxbn3yqmdxigh');
define('NONCE_KEY',        'egwrk7t8sq1yn6bthifuteqxmeu41lbp0m9bsriglexy4ueprtmbgf2y44jjyz3g');
define('AUTH_SALT',        'obd4qjwhw5pu7c4ihbplut07aefxypyqauuu2vgsotgldrpxjuyihex698fylghk');
define('SECURE_AUTH_SALT', 'glxfaf7qettst0lcfgdhbttgw0dodjxzmlw12gbn0b6ct1mimq1y3l61l36jywet');
define('LOGGED_IN_SALT',   '2ohdn2x8n3sjxkjxbxi7ijnxwnn592oqjmugjp39okrff6stnbe9zlyptscjlwel');
define('NONCE_SALT',       '1gkxaf6hjtbibgkbvjkikvxhyfyfhbasnezjqlkjozyqqdbiq5oeueek3pwbxyj6');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'f8c_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
