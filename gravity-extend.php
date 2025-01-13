<?php
/**
 * Plugin Name: Gravity Extend
 * Plugin URI: https://paulocarvajal.com/
 * Description: Extends the functionality of Gravity Forms.
 * Version: 1.0.0
 * Author: Paulo Carvajal
 * Author URI: https://paulocarvajal.com
 * License: GPL2
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

// Include files:
// require plugin_dir_path( __FILE__ ) . 'includes/populate-select-api.php';
require plugin_dir_path( __FILE__ ) . 'includes/populate-input-entry.php';
require plugin_dir_path( __FILE__ ) . 'includes/modify-field.php';
