<?php
namespace Cache;
class Mem {
	private $expire;
	private $cache;

	public function __construct($expire = 3600) {
		$this->expire = CACHE_EXPIRE;
		
		$this->cache = new \Redis();
		$this->cache->pconnect(CACHE_HOSTNAME, CACHE_PORT);
		//$this->cache->setOption(Redis::OPT_PREFIX, CACHE_PREFIX.'::');
		$this->cache->setOption(Redis::OPT_SERIALIZER, Redis::SERIALIZER_PHP); 
	}

	public function get($key) {
		return $this->cache->get(CACHE_PREFIX .'::'. $key);
	}
	
	public function getGlobal($key) {
		return $this->cache->get($key);
	}

	public function set($key,$value,$expire) {
		if(!empty($expire))
			return $this->cache->setex(CACHE_PREFIX .'::'. $key, $expire, $value);
		else
			return $this->cache->setex(CACHE_PREFIX .'::'. $key, $this->expire, $value);
	}
	
	public function setGlobal($key,$value,$expire) {
		if(!empty($expire))
			return $this->cache->setex($key, $expire, $value);
		else
			return $this->cache->setex($key, $this->expire, $value);
	}

	public function delete($key) {
		$this->cache->delete(CACHE_PREFIX .'::'. $key);
	}
	
	public function deleteGlobal($key) {
		$this->cache->delete($key);
	}
	
	public function getAllKeys() {
		return $this->cache->keys(CACHE_PREFIX .'::*');
	}
}