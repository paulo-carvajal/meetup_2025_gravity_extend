<?php
add_filter('gform_field_content', 'add_text_before_after_field', 10, 5);

function add_text_before_after_field($field_content, $field, $value, $lead_id, $form_id) {
    // Specify the field ID you want to target
    $target_field_id = 1; // Change this to your field ID

do_action('qm/debug', $field);
do_action('qm/debug', $value);
do_action('qm/debug', $lead_id);
do_action('qm/debug', $form_id);

    if ($field->id == $target_field_id) {
        $before_text = '<p>Text before the field</p>';
        $after_text = '<p>Text after the field</p>';
        
        $field_content = $before_text . $field_content . $after_text;
    }

    return $field_content;
}
?>