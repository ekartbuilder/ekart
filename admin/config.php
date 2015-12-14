<?php
// HTTP
define('HTTP_SERVER', 'http://www.ekartbuilder.com/admin/');
define('HTTP_CATALOG', 'http://www.ekartbuilder.com/');

// HTTPS
define('HTTPS_SERVER', 'http://www.ekartbuilder.com/admin/');
define('HTTPS_CATALOG', 'http://www.ekartbuilder.com/');

// DIR
define('DIR_APPLICATION', '/var/www/html/ekartbuilder/admin/');
define('DIR_SYSTEM', '/var/www/html/ekartbuilder/system/');
define('DIR_LANGUAGE', '/var/www/html/ekartbuilder/admin/language/');
define('DIR_TEMPLATE', '/var/www/html/ekartbuilder/admin/view/template/');
define('DIR_CONFIG', '/var/www/html/ekartbuilder/system/config/');
define('DIR_IMAGE', '/var/www/html/ekartbuilder/image/');
define('DIR_CACHE', '/var/www/html/ekartbuilder/system/cache/');
define('DIR_DOWNLOAD', '/var/www/html/ekartbuilder/system/download/');
define('DIR_UPLOAD', '/var/www/html/ekartbuilder/system/upload/');
define('DIR_LOGS', '/var/www/html/ekartbuilder/system/logs/');
define('DIR_MODIFICATION', '/var/www/html/ekartbuilder/system/modification/');
define('DIR_CATALOG', '/var/www/html/ekartbuilder/catalog/');

// CACHE
define('CACHE_DRIVER', 'file');
//define('CACHE_DRIVER', 'red');
define('CACHE_HOSTNAME', 'localhost');
define('CACHE_PORT', '6379');
define('CACHE_EXPIRE', '3600');
define('CACHE_PREFIX', 'testing');

// TEMPLATE
define('TWIG_PHP', true);
//define('TWIG_CACHE', DIR_CACHE . 'twig');

// DB
define('DB_DRIVER', 'mysqli');
define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'ekart_db');
define('DB_PASSWORD', 'Ak4j62K3EK73sM44');
//define('DB_DATABASE', 'ekart');
define('DB_PORT', '3306');
define('DB_PREFIX', '');

// EKARTBUILDER DB
define('EKARTBUILDER_DB_HOSTNAME', 'localhost');
define('EKARTBUILDER_DB_USERNAME', 'ekart_db');
define('EKARTBUILDER_DB_PASSWORD', 'Ak4j62K3EK73sM44');
define('EKARTBUILDER_DATABASE', 'ekart_master');
define('EKARTBUILDER_DB_PORT', '3306');
define('EKARTBUILDER_DB_PREFIX', 'ekart_');