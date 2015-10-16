{{ header }}
<?php echo $module_description;?>
<?php echo $order_info['payment_address_1'] ?>" />
{% set class = 'col-sm-6' %}
{{ (custom_field['required']) ? ' required' : '' }}
{{ (address_custom_field[custom_field['custom_field_id']]) ? address_custom_field[custom_field['custom_field_id']] : custom_field['value'] }}
{{ (address_custom_field[custom_field['custom_field_id']]) ? address_custom_field[custom_field['custom_field_id']] : '' }}
{% if success %}
{% if column_left and column_right %}
{% elseif column_left or column_right %}
{% else %}
{% endif %}
{% if error_address_1 %}
{% if country['country_id'] == country_id %}	
{% if custom_field['location'] == 'address' %}
{% if error_custom_field[custom_field['custom_field_id']] %}
{% if address_custom_field[custom_field['custom_field_id']] and (custom_field_value['custom_field_value_id'] == address_custom_field[custom_field['custom_field_id']]) %}
{% for breadcrumb in breadcrumbs %}
{% for custom_field_value in custom_field['custom_field_value'] %}