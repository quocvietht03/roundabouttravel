<?php
/**
 * Defined
 */
define( 'PJ_DIR', get_stylesheet_directory() . '/package-main/' );
define( 'PJ_URI', get_stylesheet_directory_uri() . '/package-main/' );
define( 'PJ_VERSION', '1.0.3' );
define( 'PJ_DEV_MODE', true ); // enable to compiler scssphp

/**
 * Includes
 */
require( PJ_DIR . 'vendor/autoload.php' );
require( PJ_DIR . 'deals.php' );
require( PJ_DIR . 'hooker.php' );
require( PJ_DIR . 'helper.php' );
require( PJ_DIR . 'static.php' );
require( PJ_DIR . 'widgets/widgets.php' );
