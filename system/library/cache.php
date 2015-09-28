<?php
class Cache {
	private $cache;
	public $timer;

	public function __construct($driver, $expire = 3600) {
		$class = 'Cache\\' . $driver;

		if (class_exists($class)) {
			$this->cache = new $class($expire);
			$this->loadPage();
		} else {
			exit('Error: Could not load cache driver ' . $driver . ' cache!');
		}
	}
	
	public function loadPage() {
		if (!defined('DIR_CATALOG')) {
				
			$this->timer['start'] = microtime(true);
			
			if(!empty($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'GET' && (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == 'off')) {

				if(!empty($_COOKIE['pagecache'])) {
					
					// Get domain name for multisite
					$domain = (empty($_SERVER['HTTP_HOST']) || !is_string($_SERVER['HTTP_HOST'])) ? 'unknown' : $_SERVER['HTTP_HOST'];
					$domain = preg_replace('/^www\./i', '', $domain);
					
					// Get the device
					$device = (empty($_COOKIE['device']) || !is_string($_COOKIE['device'])) ? PAGECACHE_DEF_DEVICE : $_COOKIE['device'];
					
					// Multi lingual support
					$language = (empty($_COOKIE['language']) || !is_string($_COOKIE['language'])) ? PAGECACHE_DEF_LANG : $_COOKIE['language'];
					
					// Multi currency support
					$currency = (empty($_COOKIE['currency']) || !is_string($_COOKIE['currency'])) ? PAGECACHE_DEF_CUR : $_COOKIE['currency'];
			
					$query_str = $_SERVER['REQUEST_URI'];	
					$query_str = explode('?', $query_str);
					$keyword = $query_str[0];
					$query_str = $query_str[1];
					
					$hash_key = sha1($device.'/'.$language.'/'.$currency.'/'.$query_str);
					
					$filename = $domain.'::'.$keyword;
					$filename = $filename.'::'.$hash_key;
					
					define('PAGECACHE_KEYWORD', $keyword);
					define('PAGECACHE_HASH', $hash_key);
					define('PAGECACHE_FILENAME', $filename);
					
					//Return the Cache
					if($data = $this->cache->get($filename)) {
						$this->timer['stop'] = microtime(true); 
						$time_spend = $this->timer['stop'] - $this->timer['start'];
						$data .= "\n<!-- WITH CACHE: $time_spend -->";
						die($data);	
					}
				}
			}
		}
	}

	public function get($key) {
		return $this->cache->get($key);
	}

	public function set($key, $value, $expire = 3600) {
		return $this->cache->set($key, $value, $expire);
	}

	public function delete($key) {
		return $this->cache->delete($key);
	}
}
