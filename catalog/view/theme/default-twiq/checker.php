<?php
$data_org = "data-org.tpl";
$filename = "data.tpl";

// Restore data file
copy($data_org, $filename);

$all_finds = array(
	'@<\?php \$([a-z_-]+) \= \'([^\']+)\'; \?>@i',
	'@<\?php echo \(\$([^?$]+) \? ([^:$]+) : ([^)$]+)\); \?>@i',
	'@<\?php echo \(isset\(\$([^?$]+)\[\$([^)]+)\) \? \$([^?$]+)\[\$([^:]+) : \'\'\); \?>@i',
	'@<\?php echo \(isset\(\$([^?$]+)\[\$([^)]+)\) \? \$([^?$]+)\[\$([^:]+) : \$([^;]+)\); \?>@i',	
	'@<\?php echo \$([^;]+); \?>@i',
	'@<\?php if \(\$([^\$]+)\) \{ \?>@i',
	'@<\?php if \(\$([^\$]+) == \$([^\$]+)\) \{ \?>@i',
	'@<\?php if \(\$([a-z_-]+) \&\& \$([a-z_-]+)\) \{ \?>@i',
	'@<\?php \} elseif \(\$([a-z_-]+) \|\| \$([a-z_-]+)\) \{ \?>@i',
	'@<\?php \} else \{ \?>@i',
	'@<\?php \} \?>@i',
	'@<\?php if \(isset\(\$([^$]+)\[\$([^$\)]+)\)\) \{ \?>@i',
	'@<\?php if \(isset\(\$([^$]+)\[\$([^$\)]+)\) \&\& \$([^$]+) \=\= \$([^$]+)\[\$([^$]+)\) \{ \?>@i',
	'@<\?php foreach \(\$([^$]+) as \$([^$]+)\) \{ \?>@i',	
);

$all_replaces = array(
	'{% set \1 = \'\2\' %}',
	'{{ (\1) ? \2 : \3 }}',
	'{{ (\1[\2) ? \3[\4 : \'\' }}',
	'{{ (\1[\2) ? \3[\4 : \5 }}',	
	'{{ \1 }}',
	'{% if \1 %}',
	'{% if \1 == \2 %}',
	'{% if \1 and \2 %}',
	'{% elseif \1 or \2 %}',
	'{% else %}',
	'{% endif %}',
	'{% if \1[\2 %}',
	'{% if \1[\2 and (\3 == \4[\5) %}',
	'{% for \2 in \1 %}',	
);

/*

<?php if (isset($address_custom_field[$custom_field['custom_field_id']]) && $custom_field_value['custom_field_value_id'] == $address_custom_field[$custom_field['custom_field_id']]) { ?>
<?php if \1[\2 and (\3 == \4[\5) { ?>
*/
	
// build an expression
$data = file_get_contents($filename);
preg_match_all('@<\?php echo \$([^;]+) \?>@i', $data, $output);
print_r($output);
$data = preg_replace($all_finds, $all_replaces, $data);
file_put_contents($filename, $data);

$all_files = glob("template/*/*.tpl");
$all_matches = array();


$except_rules_file = "except-rules.txt";
$all_except_rules = array();

// Check for skip expressions
if(file_exists($except_rules_file)) {
	$data = @file_get_contents($except_rules_file);
	if(is_string($data) && !empty($data)) {
		$all_except_rules = preg_split('~[\r\n]+~', $data);
	}
}

//print_r($all_except_rules);

// check and count in all tpls
if(1)
foreach ($all_files as $each_file) {
	$data = file_get_contents($each_file);	
	/*preg_match_all('@<\?php echo \$([^.\}-=\?)]+)\?>@i', $data, $output);//*/
	/*preg_match_all('@<\?php if \(([^\{]+)\) \{ \?>@i', $data, $output);//*/
	/*preg_match_all('@<\?php foreach \(\$([^\)]+)\) \{ \?>@i', $data, $output);//*/	
	preg_match_all('@<\?php(.+)\?>@i', $data, $output);//*/	
	
	$filter_output = array_diff($output[0], $all_except_rules);
	$all_matches = array_merge($all_matches, $filter_output);
	
	if(count($all_matches) > 0 && 0) {
	//if(count($all_matches) > 0) {
		break;
	}
}

echo $each_file;
echo "\n";
echo count($all_matches);
echo "\n";
print_r($all_matches);
?>