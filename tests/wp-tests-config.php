<?php

/* Path to the WordPress codebase you'd like to test. Add a backslash in the end. */
// define( 'ABSPATH', dirname( __FILE__ ) . '/wordpress/' );

// Note: this was changed for my particular installation
define( 'ABSPATH', '../../../../' );

// Test with multisite enabled: (previously -m)
// define( 'WP_TESTS_MULTISITE', true );

// Force known bugs: (previously -f)
// define( 'WP_TESTS_FORCE_KNOWN_BUGS', true );

// Test with WordPress debug mode on (previously -d)
// define( 'WP_DEBUG', true );

// ** MySQL settings ** //

// This configuration file will be used by the copy of WordPress being tested.
// wordpress/wp-config.php will be ignored.

// WARNING WARNING WARNING!
// wp-test will DROP ALL TABLES in the database named below.
// DO NOT use a production database or one that is shared with something else.

define('DB_NAME', 'blank_wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define( 'WP_TESTS_DOMAIN', 'localhost' );
define( 'WP_TESTS_EMAIL', 'admin@example.org' );
define( 'WP_TESTS_TITLE', 'Test Blog' );

define( 'WP_PHP_BINARY', 'php' );

define ( 'WPLANG', '' );
$table_prefix  = 'wp_';   // Only numbers, letters, and underscores please!