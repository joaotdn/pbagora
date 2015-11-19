<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */
 
// Include local configuration
if (file_exists(dirname(__FILE__) . '/local-config.php')) {
	include(dirname(__FILE__) . '/local-config.php');
}

// Global DB config
if (!defined('DB_NAME')) {
	define('DB_NAME', 'plandc1');
}
if (!defined('DB_USER')) {
	define('DB_USER', 'plandc1');
}
if (!defined('DB_PASSWORD')) {
	define('DB_PASSWORD', 'pba20727');
}
if (!defined('DB_HOST')) {
	define('DB_HOST', 'mysql01.plandc.hospedagemdesites.ws');
}

/** Database Charset to use in creating database tables. */
if (!defined('DB_CHARSET')) {
	define('DB_CHARSET', 'utf8');
}

/** The Database Collate type. Don't change this if in doubt. */
if (!defined('DB_COLLATE')) {
	define('DB_COLLATE', '');
}

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '0wnq0E(p~9$EYE!zl1evU-%$e9OM1G n(p?h!ue97wPw~1MOW&9XRW:DMp([6&0-');
define('SECURE_AUTH_KEY',  '<MXNM4UB]N5&10$% ExsU y=1-O X?lMGD.f5$ZQmo0Gq<5nE&K|dv -GKTvo5Y-');
define('LOGGED_IN_KEY',    '_0wo9UJbdRe<?H+&@Rwe~UhMb$2yLc7PUlz t4KryUWa5:~a-|+I5`vL*umY|22H');
define('NONCE_KEY',        'wdr`ln{reKp?V}Q5Fb${9ji-:%M8eV-CU0aY+quTn+%|E#]q/z{^O?48YM6a%RV_');
define('AUTH_SALT',        ' s%UM9uT-b>(^:jjCF%D.9I3l_m/.HZXW!k<&/h:fRQ5C/>0s-Jo[+3jOC5fkcUv');
define('SECURE_AUTH_SALT', 'FwNny?;gi=fVG&M*% $+iN $Go/xZJ9-fVGtv^9$DK7Q$uN~%OP|{{ePrwAvs+_`');
define('LOGGED_IN_SALT',   'I0HT z6;18+Ubrji0~r>-PiT{J(-,5}(mkV^,RumoYnQRhPng4TXMbYr4OcBKn`4');
define('NONCE_SALT',       's}er+K-V9@prkJC3<VzP:}syHQMGeO0J&{|HD$Oc+HOKz{4qxbD/M~@.MWTs}.~6');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');



/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
if (!defined('WP_DEBUG')) {
	define('WP_DEBUG', false);
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
