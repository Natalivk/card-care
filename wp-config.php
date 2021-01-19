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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

define('SMTP_LOGIN', 'carecard@annkv.com');
define('SMTP_PASSWORD', 'anna13nata');
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */

define( 'DB_NAME', 'annkvcom_wp291' );

/** MySQL database username */
define( 'DB_USER', 'annkvcom_wp291' );

/** MySQL database password */
define( 'DB_PASSWORD', '7(4Lp)5Sts' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'nxkkorrkboen2cpkf7lmau7iqfwktcrwyo4nyi1tqahozyglyqjyz1r2nd71x4xr' );
define( 'SECURE_AUTH_KEY',  '2qz0kx6qgl0lwjpricxtkpjgl17wcivhpnsqaix0hc5nfnxpvc1e9aiadmqcrj9m' );
define( 'LOGGED_IN_KEY',    'zkzwrvsbdzkycrb5dpajcxqctr5fivs9oayruy9pyfajtubrzdwfnwa7aqsqxwvh' );
define( 'NONCE_KEY',        'ccowusjvaeonvkbyaqotgvicqdsqckob7zqz2wgze7nwhuqlnt2ersaieltvriqg' );
define( 'AUTH_SALT',        'qa0xmmjvibub0emuymwlanagg3b2fbqetqwpbccuqqvorsrqsaknprfmfd3wvjyp' );
define( 'SECURE_AUTH_SALT', '2yh8t3evful1miuyhcei7t4vnhp1k0koodd9ucmuvnzkduh8cvmsrth1uitzirm3' );
define( 'LOGGED_IN_SALT',   'y8nf6gln8dupsltpyhqhwppmt5iwumteexp96bythpxk7fzpvjlsj2k88ci7xpvh' );
define( 'NONCE_SALT',       'jahuy3f33qkbarkmxldu8mxzwnx5fqtelkmdllcndt1yhg1gqxibflmcgr5agawm' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );     // включение дебаг режима

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
