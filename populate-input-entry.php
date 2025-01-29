<?php
/**
 * Plugin Name: Gravity Extend: Populate Fields with Previous Entries
 * Plugin URI: https://paulocarvajal.com/
 * Description: Extends the functionality of Gravity Forms.
 * Version: 1.0.0
 * Author: Paulo Carvajal
 * Author URI: https://paulocarvajal.com
 * License: GPL2
 */


add_filter('gform_field_value_planet', 'populate_planet');
add_filter('gform_field_value_person', 'populate_person');

define('PREVIOUS_ENTRY_ID', 6);

/**
 * Populate planet field with previous entry value
 * @param mixed $value
 * @return mixed|string|null
 */
function populate_planet($value){
    // Replace this with your dynamic logic
    $dynamic_value = 'Your dynamic value here';

    // Specify the entry ID to get data from
    $previous_entry_id = PREVIOUS_ENTRY_ID;

    // Get the previous entry
    $previous_entry = GFAPI::get_entry($previous_entry_id);

    if (!is_wp_error($previous_entry)) {
        $dynamic_value = rgar($previous_entry, 1);
    }

    return $dynamic_value;
}

/**
 * Populate person field with previous entry value
 * @param mixed $value
 * @return mixed|string|null
 */
function populate_person($value){
    // Replace this with your dynamic logic
    $dynamic_value = '';

    // Specify the entry ID to get data from
    $previous_entry_id = PREVIOUS_ENTRY_ID;

    // Get the previous entry
    $previous_entry = GFAPI::get_entry($previous_entry_id);

    if (!is_wp_error($previous_entry)) {
        $dynamic_value = rgar($previous_entry, 2);
    }

    return $dynamic_value;
}
