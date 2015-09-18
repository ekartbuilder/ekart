<?php 

$query['pavmegamenu'][]  = "DELETE FROM `".DB_PREFIX ."setting` WHERE `code`='pavmegamenu' and `key` = 'pavmegamenu_module'";

$query['pavmegamenu'][]  = "DELETE FROM `".DB_PREFIX ."setting` WHERE `code`='pavmegamenu_params' and `key` = 'params'";
$query['pavmegamenu'][] =  " 
INSERT INTO `".DB_PREFIX ."setting` (`setting_id`, `store_id`, `code`, `key`, `value`, `serialized`) VALUES

(0, 0, 'pavmegamenu_params', 'pavmegamenu_params', '[{\"submenu\":1,\"subwidth\":1170,\"id\":89,\"align\":\"aligned-fullwidth\",\"group\":0,\"cols\":1,\"rows\":[{\"cols\":[{\"widgets\":\"wid-9\",\"colwidth\":4},{\"widgets\":\"wid-8\",\"colwidth\":3},{\"widgets\":\"wid-7\",\"colwidth\":3},{\"widgets\":\"wid-11\",\"colwidth\":2}]}]},{\"id\":86,\"group\":0,\"cols\":1,\"submenu\":1,\"align\":\"aligned-left\",\"rows\":[{\"cols\":[{\"type\":\"menu\",\"colwidth\":12}]}]},{\"id\":99,\"group\":0,\"cols\":1,\"submenu\":1,\"align\":\"aligned-left\",\"rows\":[{\"cols\":[{\"type\":\"menu\",\"colwidth\":12}]}]}]', 0);
";

$query['pavverticalmenu'][]  = "DELETE FROM `".DB_PREFIX ."setting` WHERE `code`='pavverticalmenu_params' and `key` = 'params'";
$query['pavverticalmenu'][] =  " 
INSERT INTO `".DB_PREFIX ."setting` (`setting_id`, `store_id`, `code`, `key`, `value`, `serialized`) VALUES

(0, 0, 'pavverticalmenu_params', 'params', '[{\"id\":42,\"group\":0,\"cols\":1,\"subwidth\":400,\"submenu\":1,\"rows\":[{\"cols\":[{\"widgets\":\"wid-7\",\"colwidth\":12}]}]},{\"submenu\":1,\"subwidth\":300,\"id\":45,\"group\":0,\"cols\":1,\"rows\":[{\"cols\":[{\"widgets\":\"wid-9|wid-10|wid-11\",\"colwidth\":12}]}]}]', 0);

";

$query['pavblog'][] ="
INSERT INTO `".DB_PREFIX ."layout_route` (`layout_route_id`, `layout_id`, `store_id`, `route`) VALUES
(85, 14, 0, 'pavblog/%');
";
$query['pavblog'][] ="
INSERT INTO `".DB_PREFIX ."layout` (`layout_id`, `name`) VALUES
(14, 'Pav Blog');
";
?>

