<?php
$db_host = "localhost";
$db_user = "atul";
$db_pass = "atul";
$db_name = "ekart";
$db_prefix = "ekart_";
$temp_file = $bin_path = "";

$subdomain = trim($_POST['subdomain']); 
if(!empty($subdomain)) {
		
	$target_db = $db_prefix.$subdomain;
	
	if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
		$bin_path = "D:/wamp/bin/mysql/mysql5.5.8/bin/";
		$temp_file = "D:/wamp/base.sql";
	}
	
	if(!file_exists($temp_file)) {
		$dump_cmd = $bin_path."mysqldump -u atul -patul ekart > $temp_file";
		echo `$dump_cmd`;
	}
	
	if(!empty($target_db)) {
		$cmd = $bin_path.'mysql -u atul -patul -e "create database `' . $target_db . '`"';
		echo `$cmd`;
		$cmd = $bin_path."mysql -u atul -patul $target_db < $temp_file";
		echo `$cmd`;
	}
}

?>
<form action="#" method="post">
	<input type="text" name="subdomain" />
	<input type="submit" value="Go!!!" />
</form>