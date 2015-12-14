<a href="deploy.php?action=status">Status</a> | <a href="deploy.php?action=pull">Pull</a>
<?php 
if(!empty($_GET['action'])) {
	echo "<pre>";
	switch ($_GET['action']) {
		case 'status':
			$cmd = "git status";			
			break;
		case 'pull':
			$cmd = "git pull --rebase";			
			break;
		default:
			
			break;
	}
	echo `$cmd`;
}
?>