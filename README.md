# Gravity Extend Plugin

## Description
The Gravity Extend Plugin allows you to modify the content of Gravity Forms fields.

## Features
- Modify Gravity Forms fields by adding custom text before and after the field content.
- Populate select fields with data from the Star Wars API.
- Populate input fields with data from previous form submissions.

## Select Field Population
To populate a select field with data from the Star Wars API:

1. Open the `populate-select.php` file located in the `includes` directory.
2. Set the `$target_field_id` variable to the ID of the select field you want to populate.
3. Use the `swapi.dev` API to fetch data and populate the select field options.


## Installation
1. Upload the `gravity-extend` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.

## Usage
1. Open the `modify-field.php` file located in the `includes` directory.
2. Modify the `$target_field_id` variable to the ID of the field you want to target.
3. Customize the `$before_text` and `$after_text` variables to add your desired text before and after the field content.

## Frequently Asked Questions

### How do I find the field ID?
1. Open the form editor.
2. Click on the field you want to target.
3. Click on the field settings icon.
4. The field ID will be displayed in the settings panel.

## Changelog
### 1.0.0
- Initial release
