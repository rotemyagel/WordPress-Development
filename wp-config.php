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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'elementor' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         ';r#`(b?s5s*shpr[]Xc./w4?eBMs}w~hHt[SvrS3QIi?dplp(ktnki{xMIM?Wq[+' );
define( 'SECURE_AUTH_KEY',  '6nELC&:w4)^8qbU#_2RmOKF]s%:R}&M@m_CN_Ui5N=D=!cDDLy}B4:4/:INw?fcr' );
define( 'LOGGED_IN_KEY',    'pP 7J(A`;chyyP-ai](7/[^(P%uN0|n+)e3X~wh815X^t#!KdUkluV5p9k3cIA%^' );
define( 'NONCE_KEY',        ')xA,K1?4}(w2;CPEpg:il]qJ1~UN2.,b}Q{t7PMs%sLw=bP[7LZRu9*;[;4#LOQ?' );
define( 'AUTH_SALT',        'NKUe4bqmeVb;z|D] )9(VsA,>E0h?YPE.1Hd:$~,])~PrG0BdJ@yN%~W/cbPD~4d' );
define( 'SECURE_AUTH_SALT', '=i)zU-^VTO>hzJKYb:HS?cG)Om/U.4f@ZF,3X2SL1(R8JsfK0/|8/AR!wCOacHLj' );
define( 'LOGGED_IN_SALT',   '6tQ>.Tf#iXth6oRg[c,kv*.n&NIGW8]:YuKnhB }<}NWylH{hXa`{+R{#<]~k7Ps' );
define( 'NONCE_SALT',       'o@fx[jsy{6?NJZX,,#EW9a>&O3X[J(%+CWG77~Le236^]a`O)#_SQC HL|U{cD^_' );

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
