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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
//define('WP_CACHE', true); //Added by WP-Cache Manager
//define( 'WPCACHEHOME', '/home/sachs/sites/sachsmedia.com/public_html/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'sachsmediagrp');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '$IKN=55IP=->vr:b_+-!ADf514Se|.py5**%>?iGfQ:XmY;8muo4t^a7~jKm~eYX');
define('SECURE_AUTH_KEY',  '0!=!O8lNXZj~ZlE<aqX!!s}]0^<dquAe~G)y(((-F~!d@^p|ZsLw),c,g&Yb W-:');
define('LOGGED_IN_KEY',    '?^n4@)P2=xWdL0Y@A8OE,^*tj#X(5w%i4H@E3$ROmq[]ug>++f /=cT%2O^/OzBH');
define('NONCE_KEY',        'cG$EB%?b;X:}{-}),#=S6X55G6FFxq5y7qkvALRuR:zwso`cS D7Dl+s@~3o>2<>');
define('AUTH_SALT',        'eWp_GAhNPL>f{5~k:?a-c[vA -@/5NBA0{2SiOt|[9KGag170X~cOPorGY=auGp[');
define('SECURE_AUTH_SALT', '^JwqP-# x+dd6ynQ0M{03akHE?l4R=|9oG;]-nrIlfpLlwL-Pnap?nqE.mh44v+>');
define('LOGGED_IN_SALT',   '/Cv-1o]g:O+sjL=k ~C|$hXSxKWk-X+>O$-(DZ$U|.ZG=94Pam$JV*^G<)F.UxVd');
define('NONCE_SALT',       'K02C-6&H:-+TMXqTd/^a^BZ-;h+ZGcDZ5z5#.-wXtgi|4_Mh5+*B~-0BmU.<m?fS');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
