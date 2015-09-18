<?php 

$query['pavmegamenu'][]  = "DELETE FROM `".DB_PREFIX ."setting` WHERE `code`='pavmegamenu' and `key` = 'pavmegamenu_module'";

$query['pavmegamenu'][]  = "DELETE FROM `".DB_PREFIX ."setting` WHERE `code`='pavmegamenu_params' and `key` = 'params'";
$query['pavmegamenu'][] =  " 
INSERT INTO `".DB_PREFIX ."setting` (`setting_id`, `store_id`, `code`, `key`, `value`, `serialized`) VALUES
(0, 0, 'pavmegamenu_params', 'pavmegamenu_params', '[{\"id\":2,\"group\":0,\"cols\":3,\"subwidth\":480,\"submenu\":1,\"align\":\"aligned-left\",\"rows\":[{\"cols\":[{\"widgets\":\"wid-57\",\"colwidth\":4},{\"widgets\":\"wid-62\",\"colwidth\":8}]}]},{\"submenu\":1,\"subwidth\":680,\"id\":5,\"align\":\"aligned-left\",\"group\":0,\"cols\":1,\"rows\":[{\"cols\":[{\"widgets\":\"wid-63\",\"colwidth\":4},{\"widgets\":\"wid-66\",\"colwidth\":4},{\"widgets\":\"wid-67\",\"colwidth\":4}]},{\"cols\":[{\"widgets\":\"wid-64\",\"colwidth\":12}]}]},{\"submenu\":1,\"id\":19,\"align\":\"aligned-left\",\"group\":0,\"cols\":1,\"rows\":[{\"cols\":[{\"type\":\"menu\",\"colwidth\":12}]}]}]', 0);
";

$query['pavblog'][] ="
INSERT INTO `".DB_PREFIX ."layout_route` (`layout_route_id`, `layout_id`, `store_id`, `route`) VALUES
(175, 14, 0, 'pavblog/%');
";

$query['pavblog'][] ="
INSERT INTO `".DB_PREFIX ."layout` (`layout_id`, `name`) VALUES
(14, 'Pav Blog');
";
?>

