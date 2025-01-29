<?php
/**
 * Plugin Name: Gravity Extend: Send data to remote endpoint
 * Plugin URI: https://paulocarvajal.com/
 * Description: Extends the functionality of Gravity Forms. Use ´[gravity_forms_entries form_id="1"]´ to list entries of a form.
 * Version: 1.0.0
 * Author: Paulo Carvajal
 * Author URI: https://paulocarvajal.com
 * License: GPL2
 */
add_action('gform_after_submission_3', function($entry, $form) {
    $data = [
        'nombre' => rgar($entry, '1'),
        'email' => rgar($entry, '2'),
        'clave' => rgar($entry, '3'),
    ];

    $url = 'http://localhost:3000/form';

    wp_remote_post($url, [
        'body' => json_encode($data),
        'headers' => ['Content-Type' => 'application/json']
    ]);
}, 10, 2);
