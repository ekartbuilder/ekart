<?php 

$query['pavmegamenu'][]  = "DELETE FROM `".DB_PREFIX ."setting` WHERE `code`='pavmegamenu' and `key` = 'pavmegamenu_module'";

$query['pavmegamenu'][]  = "DELETE FROM `".DB_PREFIX ."setting` WHERE `code`='pavmegamenu_params' and `key` = 'params'";
$query['pavmegamenu'][] =  " 
INSERT INTO `".DB_PREFIX ."setting` (`setting_id`, `store_id`, `code`, `key`, `value`, `serialized`) VALUES

(0, 0, 'pavmegamenu_params', 'pavmegamenu_params', '[{\"id\":43,\"group\":0,\"cols\":1,\"submenu\":1,\"align\":\"aligned-left\",\"rows\":[{\"cols\":[{\"type\":\"menu\",\"colwidth\":12}]}]},{\"submenu\":1,\"subwidth\":800,\"id\":2,\"align\":\"aligned-fullwidth\",\"group\":0,\"cols\":3,\"rows\":[{\"cols\":[{\"widgets\":\"wid-58\",\"colwidth\":\"3\"},{\"widgets\":\"wid-55\",\"colwidth\":\"4\"},{\"widgets\":\"wid-57\",\"colwidth\":\"5\"}]}]},{\"id\":19,\"group\":0,\"cols\":1,\"submenu\":1,\"align\":\"aligned-left\",\"rows\":[{\"cols\":[{\"type\":\"menu\",\"colwidth\":12}]}]},{\"id\":23,\"group\":0,\"cols\":1,\"submenu\":1,\"align\":\"aligned-left\",\"rows\":[{\"cols\":[{\"type\":\"menu\",\"colwidth\":12}]}]},{\"id\":29,\"group\":0,\"cols\":1,\"submenu\":1,\"align\":\"aligned-left\",\"rows\":[{\"cols\":[{\"type\":\"menu\",\"colwidth\":12}]}]}]', 0);

";


$query['pavblog'][] ="
INSERT INTO `".DB_PREFIX ."layout_route` (`layout_route_id`, `layout_id`, `store_id`, `route`) VALUES
(113, 14, 0, 'pavblog/%');
";
$query['pavblog'][] ="
INSERT INTO `".DB_PREFIX ."layout` (`layout_id`, `name`) VALUES
(14, 'Pav Blog');
";
?>