<?php
add_filter('gform_field_value_planet', 'populate_planet');
add_filter('gform_field_value_person', 'populate_person');

/**
 * Populate planet field with previous entry value
 * @param mixed $value
 * @return mixed|string|null
 */
function populate_planet($value){
    // Replace this with your dynamic logic
    $dynamic_value = 'Your dynamic value here';

    // Specify the entry ID to get data from
    $previous_entry_id = 1;

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
    $previous_entry_id = 1;

    // Get the previous entry
    $previous_entry = GFAPI::get_entry($previous_entry_id);

    if (!is_wp_error($previous_entry)) {
        $dynamic_value = rgar($previous_entry, 2);
    }

    return $dynamic_value;
}
