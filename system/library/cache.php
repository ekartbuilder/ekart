<?php
class Cache {
	private $cache;
	public $timer;

	public function __construct($driver, $expire = 3600) {
		$class = 'Cache\\' . $driver;
		
		if (class_exists($class)) {
			$this->cache = new $class($expire);
			$this->loadSite();
			$this->loadPage();
		} else {
			exit('Error: Could not load cache driver ' . $driver . ' cache!');
		}
	}
	
	public function loadSite() {
		global $site_info;
		
		if(count($site_info))
			return true;
		
		$domain = (empty($_SERVER['HTTP_HOST']) || !is_string($_SERVER['HTTP_HOST'])) ? 'unknown' : $_SERVER['HTTP_HOST'];
		$domain = strtolower($domain);
		
		$subdomain = explode(".", $domain);
		$subdomain = $subdomain['0'];
		$subdomain = strtolower($subdomain);
			
		$site_key = 'SITE_INFO::'.$domain;
		
		if($site_info = $this->getGlobal($site_key)) {
				
			// Defining Database Constant
			define('DB_DATABASE', EKARTBUILDER_DB_PREFIX.strtolower($site_info['sub_domain']));
			
			return $site_info;
		} else {
			
			$ekartbuilder_host = parse_url(EKARTBUILDER_HOST, PHP_URL_HOST);	
			$ekartbuilder_host = explode(".", $ekartbuilder_host);
			$ekartbuilder_host = $ekartbuilder_host['1'];
			$ekartbuilder_host = strtolower($ekartbuilder_host);
			
			$db = new \mysqli(EKARTBUILDER_DB_HOSTNAME, EKARTBUILDER_DB_USERNAME, EKARTBUILDER_DB_PASSWORD, EKARTBUILDER_DATABASE, EKARTBUILDER_DB_PORT);
			if ($db->connect_error) {
				header('Location: '.EKARTBUILDER_HOST.'error/display?code=DB_NOT_FOUND');
				exit();
			}
			
			if(strstr($domain, $ekartbuilder_host)) {
				$sql = "SELECT * FROM site_master WHERE sub_domain = '" . $subdomain . "'";
			} else {
				$sql = "SELECT * FROM site_master WHERE domain = '" . $domain . "'";	
			}

			//echo $sql;

			$query = $db->query($sql);

			if (!$db->errno) {
				if ($query instanceof \mysqli_result) {
	
					$result = $query->fetch_assoc();
					
					$query->close();
					
					if(count($result)) {
							
						// Defining Database Constant
						define('DB_DATABASE', EKARTBUILDER_DB_PREFIX.strtolower($result['sub_domain']));
						
						$this->setGlobal($site_key, $result);
						return $result;	
					} else {
						header('Location: '.EKARTBUILDER_HOST.'error/display?code=SITE_NOT_FOUND');
						exit();
					}
				} else {
					return false;
				}
			} else {
				trigger_error('Error: ' . $db->error  . '<br />Error No: ' . $db->errno . '<br />' . $sql);
				exit();
			}
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

	public function getGlobal($key) {
		return $this->cache->getGlobal($key);
	}

	public function get($key) {
		return $this->cache->get($key);
	}
	
	public function setGlobal($key, $value, $expire = 3600) {
		return $this->cache->setGlobal($key, $value, $expire);
	}

	public function set($key, $value, $expire = 3600) {
		return $this->cache->set($key, $value, $expire);
	}
	
	public function deleteGlobal($key) {
		return $this->cache->deleteGlobal($key);
	}

	public function delete($key) {
		return $this->cache->delete($key);
	}
}
