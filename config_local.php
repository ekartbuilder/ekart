<?php
// HTTP
define('EKARTBUILDER_HOST', 'http://www.ekartbuilder.com/');
define('HTTP_SERVER', 'http://localhost/ekart/');

// HTTPS
define('HTTPS_SERVER', 'http://localhost/ekart/');

// DIR
define('DIR_APPLICATION', 'D:/wamp/www/ekart/catalog/');
define('DIR_SYSTEM', 'D:/wamp/www/ekart/system/');
define('DIR_LANGUAGE', 'D:/wamp/www/ekart/catalog/language/');
define('DIR_TEMPLATE', 'D:/wamp/www/ekart/catalog/view/theme/');
define('DIR_CONFIG', 'D:/wamp/www/ekart/system/config/');
define('DIR_IMAGE', 'D:/wamp/www/ekart/image/');
define('DIR_CACHE', 'D:/wamp/www/ekart/system/cache/');
define('DIR_DOWNLOAD', 'D:/wamp/www/ekart/system/download/');
define('DIR_UPLOAD', 'D:/wamp/www/ekart/system/upload/');
define('DIR_MODIFICATION', 'D:/wamp/www/ekart/system/modification/');
define('DIR_LOGS', 'D:/wamp/www/ekart/system/logs/');

// CACHE
define('CACHE_DRIVER', 'file');
define('CACHE_HOSTNAME', '127.0.0.l');
define('CACHE_PORT', '6379');
define('CACHE_EXPIRE', '3600');
define('CACHE_PREFIX', 'testing');

define('PAGECACHE_DEF_LANG', 'en');
define('PAGECACHE_DEF_CUR', 'inr');
define('PAGECACHE_DEF_DEVICE', 'W');

// STORE CREATE
define('STORE_CREATE_HOST', 'http://localhost/ekart/trial/');

// TEMPLATE
define('TWIG_PHP', true);
//define('TWIG_CACHE', DIR_CACHE . 'twig');

// DB
define('DB_DRIVER', 'mysqli');
define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'atul');
define('DB_PASSWORD', 'atul');
//define('DB_DATABASE', 'ekart');
define('DB_PORT', '3306');
define('DB_PREFIX', '');

// EKARTBUILDER DB
define('EKARTBUILDER_DB_HOSTNAME', 'localhost');
define('EKARTBUILDER_DB_USERNAME', 'atul');
define('EKARTBUILDER_DB_PASSWORD', 'atul');
define('EKARTBUILDER_DATABASE', 'ekart_master');
define('EKARTBUILDER_DB_PORT', '3306');
define('EKARTBUILDER_DB_PREFIX', 'ekart_');
