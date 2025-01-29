<?php
/**
 * Plugin Name: Gravity Extend: Populate Select with external API
 * Plugin URI: https://paulocarvajal.com/
 * Description: Extends the functionality of Gravity Forms.
 * Version: 1.0.0
 * Author: Paulo Carvajal
 * Author URI: https://paulocarvajal.com
 * License: GPL2
 */

 /**
  * Load only if Gravity Forms is present
  * @param mixed $form
  * @return mixed
 */

 add_action('wp', 'check_form_presence');
function check_form_presence() {
    // Verifica si el formulario con ID 1 está en la página
    if (is_page() && has_shortcode(get_the_content(), 'gravityform') && strpos(get_the_content(), '[gravityform id=1') !== false) {
        add_filter('gform_pre_render_1', 'populate_star_wars_planets');
        add_filter('gform_pre_validation_1', 'populate_star_wars_planets');
        add_filter('gform_pre_submission_filter_1', 'populate_star_wars_planets');
        add_filter('gform_admin_pre_render_1', 'populate_star_wars_planets');

        add_filter('gform_pre_render_1', 'populate_star_wars_people');
        add_filter('gform_pre_validation_1', 'populate_star_wars_people');
        add_filter('gform_pre_submission_filter_1', 'populate_star_wars_people');
        add_filter('gform_admin_pre_render_1', 'populate_star_wars_people');
    }
}


/**
 * Summary of populate_star_wars_planets
 * @param mixed $form
 * @return mixed
 */
function populate_star_wars_planets($form){
    /**
     * @var int $form_id The form ID in the admin.
     */
    $form_id = 1;

    /**
     * @var int $field_id The field ID in the admin.
     */
    $field_planets_id = 2;

    $api_url = 'https://swapi.py4e.com/api/planets/';

    // Check if the form ID is the one we want to populate
    if($form['id'] != $form_id){
        return $form;
    }

    // Fetch data from the Star Wars API
    $response = wp_remote_get($api_url);
    if (is_wp_error($response)) {
        return $form;
    }

    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body, true);

    // Check if the API returned results
    if (isset($data['results'])) {
        $planets = $data['results'];
        $choices = array();

        foreach ($planets as $planet) {
            $choices[] = array('text' => $planet['name'], 'value' => $planet['name']);
        }

        // Replace '2' with your dropdown field ID
        foreach($form['fields'] as &$field){
            if($field['id'] == 1){
                $field['choices'] = $choices;
            }
        }
    }

    return $form;
}

/**
 * Summary of populate_star_wars_people
 * @param mixed $form
 * @return mixed
 */
function populate_star_wars_people($form){
    /**
     * @var int $form_id The form ID in the admin.
     */
    $form_id = 1;

    /**
     * @var int $field_id The field ID in the admin.
     */
    $field_people_id = 2;

    $api_url = 'https://swapi.py4e.com/api/people/';

    // Check if the form ID is the one we want to populate
    if($form['id'] != $form_id){
        return $form;
    }

    // Fetch data from the Star Wars API
    $response = wp_remote_get($api_url);
    if (is_wp_error($response)) {
        return $form;
    }

    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body, true);

    // Check if the API returned results
    if (isset($data['results'])) {
        $planets = $data['results'];
        $choices = array();

        foreach ($planets as $planet) {
            $choices[] = array('text' => $planet['name'], 'value' => $planet['name']);
        }

        // Replace '2' with your dropdown field ID
        foreach($form['fields'] as &$field){
            if($field['id'] == 2){
                $field['choices'] = $choices;
            }
        }
    }

    return $form;
}
