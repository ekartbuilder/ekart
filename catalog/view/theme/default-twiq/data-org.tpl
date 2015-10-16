<?php echo $header; ?>
<?php echo $module_description;?>
<?php echo $order_info['payment_address_1'] ?>" />
<?php $class = 'col-sm-6'; ?>
<?php echo ($custom_field['required'] ? ' required' : ''); ?>
<?php echo (isset($address_custom_field[$custom_field['custom_field_id']]) ? $address_custom_field[$custom_field['custom_field_id']] : $custom_field['value']); ?>
<?php echo (isset($address_custom_field[$custom_field['custom_field_id']]) ? $address_custom_field[$custom_field['custom_field_id']] : ''); ?>
<?php if ($success) { ?>
<?php if ($column_left && $column_right) { ?>
<?php } elseif ($column_left || $column_right) { ?>
<?php } else { ?>
<?php } ?>
<?php if ($error_address_1) { ?>
<?php if ($country['country_id'] == $country_id) { ?>	
<?php if ($custom_field['location'] == 'address') { ?>
<?php if (isset($error_custom_field[$custom_field['custom_field_id']])) { ?>
<?php if (isset($address_custom_field[$custom_field['custom_field_id']]) && $custom_field_value['custom_field_value_id'] == $address_custom_field[$custom_field['custom_field_id']]) { ?>
<?php foreach ($breadcrumbs as $breadcrumb) { ?>
<?php foreach ($custom_field['custom_field_value'] as $custom_field_value) { ?>