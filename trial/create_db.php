<?php
$json = array();
$json['start'] = microtime(true);

if(!empty($_GET['db_name'])) {
	$target_db = $_GET['db_name'];	
} else {
	$target_db = "ekart_test_".substr(md5(microtime(true)), 0, 5);	
}

if($window = 0) {
	$db_host = "localhost";
	$db_user = "atul";
	$db_pass = "atul";
	$db_name = "ekart";
	
	$bin_path = "D:/wamp/bin/mysql/mysql5.6.17/bin/";
	$temp_file = "D:/wamp/www/ekart/tmp/base.sql";	
} else {
	$db_host = "localhost";
	$db_user = "ekart_db";
	$db_pass = "Ak4j62K3EK73sM44";
	$db_name = "ekart";
	
	$bin_path = "";
	$temp_file = "base.sql";
}

$json['start-dump'] = microtime(true);
if(!file_exists($temp_file)) {
	$dump_cmd = $bin_path."mysqldump -u $db_user -p$db_pass ekart > $temp_file";
	echo `$dump_cmd`;
}

$json['start-copy'] = microtime(true);
if(!empty($target_db)) {
	$cmd = $bin_path.'mysql -u '.$db_user.' -p'.$db_pass.' -e "create database ' . $target_db . '"';
	echo `$cmd`;
	$cmd = $bin_path."mysql -u $db_user -p$db_pass $target_db < $temp_file";
	echo `$cmd`;
}
$json['end'] = microtime(true);
$json['db_name'] = $target_db;
$json['success'] = '1';
ob_clean();
header('Content-Type: application/json');
echo json_encode($json);
exit;
/*
$cmd = $bin_path.'mysql -u atul -patul -e "drop database `' . $target_db . '`"';
echo `$cmd`;

echo "<pre>";
print_r($all_times);
echo "<br />";
echo "Dump Time :" . ($all_times['start-copy'] - $all_times['start-dump']);
echo "<br />";
echo "Copy Time :" . ($all_times['end'] - $all_times['start-copy']);
echo "<br />";
echo "Total Time :" . ($all_times['end'] - $all_times['start']);
*/
?>