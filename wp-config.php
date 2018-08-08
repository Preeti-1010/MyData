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
define('DB_NAME', 'training');

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
define('AUTH_KEY',         'igw+`QC936*/Tie1-hXU0iX]=r#i~bWuXv6O8Ld -`!uu.k*4QY|kF4 V ?xd,qu');
define('SECURE_AUTH_KEY',  '+g7S/x:XR hOKW@KidKFIH%v+#-$xWXF_)[:NmC6U}dQipyC$7DWh=5e22P`w3<;');
define('LOGGED_IN_KEY',    'jA?/ZSRnXNkk+>j&GD+*SUgGe)EOlgEm&wfki@ZVin6YwrIyN+uGAh={_2%ND~]p');
define('NONCE_KEY',        '!qH5N;71xE&Qv^6!5Unk1b>e*G?]=rcWTb?+:zWs0$`# 4Pcy<:j&/qE/l=`UF1I');
define('AUTH_SALT',        '>Dov~X>c1zbe8d65Xv72:,wCm;*02mms5N)Kqe+2pG93G~-j?gEnIRl$CzCCCgaU');
define('SECURE_AUTH_SALT', '[/4R&ytU)Idz;AEgSoua~H{&}0A&VFHu(>uswR717Neo>eG@_}NM4!7uuEj{<;o>');
define('LOGGED_IN_SALT',   '667a`p:Tu6E9 ;jQ,Xmu >Zm }1-h*<f#+8+LQ 7EjMaYt>(-5WqwiGRB(GJBER1');
define('NONCE_SALT',       'og<S1B$S~_W26(V=_JBrB/4|7<ZUMVONM5jz_^6!06lTI|m|)+c1qBN=jjUJ/5lh');

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
