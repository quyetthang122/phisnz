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
define('DB_NAME', 'wp841');

/** MySQL database username */
define('DB_USER', 'wp841');

/** MySQL database password */
define('DB_PASSWORD', '3v]]sepS36');

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
define('AUTH_KEY',         'pjxoptg9xhjxmliy7c544bmgadjdtpai59k0i20yyprdgmyyjseuuq9rxxb446rj');
define('SECURE_AUTH_KEY',  'ee0yspdbvcc72seve5inid6gdrnmab405vnfdy9t6msnv90unupyp4p4s0az8wzq');
define('LOGGED_IN_KEY',    'lrtetqfsnveecqga0chwfqhr3zvbwo5w0igovdugqfeliovpn5n6qht0cz7ecpvt');
define('NONCE_KEY',        'xnto3oikzia7dm2ljfwmakfncclqvabesmpdjx9vvywnjttautykepqzzqqxafkw');
define('AUTH_SALT',        '4vqvkrqqdmkcm4cp4rhgq7ung6frax5irymkpzd8k5db4bjovvmw7fh9tgfozm3f');
define('SECURE_AUTH_SALT', 'dhy8igjzpuqcbpfy6kncejsmtk11oyihjif8iwmlxvbdt8cm4jkhiujwofcx4syd');
define('LOGGED_IN_SALT',   'njmbmgkwhzpbs4g5ck1tr46fgbopc0sblqwtsyyz6pctejjhulaw5fmaxeo6i0um');
define('NONCE_SALT',       '13dbobqspase0xbf2riaktynakegqdjjr9hgunzakyo0jdztlwmu5h6cpvkzhlgg');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpxg_';

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
