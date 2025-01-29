<?php
/**
 * Plugin Name: Gravity Extend: Shortcode to list entries
 * Plugin URI: https://paulocarvajal.com/
 * Description: Extends the functionality of Gravity Forms. Use ´[gravity_forms_entries form_id="1"]´ to list entries of a form.
 * Version: 1.0.0
 * Author: Paulo Carvajal
 * Author URI: https://paulocarvajal.com
 * License: GPL2
 */
function list_gravity_forms_entries($atts) {
    $atts = shortcode_atts(array(
        'form_id' => 1, // ID del formulario
    ), $atts);

    $form_id = $atts['form_id'];


    // Define el estilo de la tabla
     $output = '<style>
        .gravity-forms-entries {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 18px;
            text-align: left;
        }
        .gravity-forms-entries th, .gravity-forms-entries td {
            padding: 12px;
            border: 1px solid #ddd;
        }
        .gravity-forms-entries th {
            background-color: #f2f2f2;
            color: #333;
        }
        .gravity-forms-entries tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .gravity-forms-entries tr:hover {
            background-color: #f1f1f1;
        }
    </style>';

    // Obtener las entradas del formulario
    $search_criteria = array(
        'status'        => 'active',
        'field_filters' => array()
    );
    $sorting = array();
    $paging = array('offset' => 0, 'page_size' => 50);
    $total_count = 0;
    $entries = GFAPI::get_entries($form_id, $search_criteria, $sorting, $paging, $total_count);

    if (!empty($entries)) {
        $output .= '<h3>Entradas del formulario #' . $form_id . '</h3>';
        $output .= '<table class="gravity-forms-entries">';
        $output .= '<tr><th>ID</th><th>Planeta</th><th>Persona</th></tr>';
        foreach ($entries as $entry) {
            $output .= '<tr>';
            $output .= '<td>' . $entry['id'] . '</td>';
            $output .= '<td>' . $entry[1] . '</td>';
            $output .= '<td>' . $entry[2] . '</td>';
            $output .= '</tr>';
        }
        $output .= '</table>';
    } else {
        $output = 'No hay entradas disponibles.';
    }

    return $output;
}
add_shortcode('gravity_forms_entries', 'list_gravity_forms_entries');
