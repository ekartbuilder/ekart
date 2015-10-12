<?php
class ControllerCommonSeoUrl extends Controller {
	public function index() {
			
		// Add rewrite to url class
		$this->url->addRewrite($this);

		// Decode URL
		if (isset($this->request->get['_route_'])) {
			$parts = explode('/', $this->request->get['_route_']);

			// remove any empty arrays from trailing
			if (utf8_strlen(end($parts)) == 0) {
				array_pop($parts);
			}
			
			foreach ($parts as $part) {
				$query = $this->db->query("SELECT * FROM ekart_master.url_alias WHERE keyword = '" . $this->db->escape($part) . "'");

				if ($query->num_rows) {
					$url = explode('=', $query->row['query']);
					
					if ($url[0] == 'route') {
						if(isset($parts[1])) {
							$this->request->get['route'] = $url[1].'/'.$parts[1];
						} else {
							$this->request->get['route'] = $url[1];
						}
					}
				}
			}
			
			if (isset($this->request->get['route']) && isset($this->session->data['token'])) {
				return new Action($this->request->get['route']);
			} else if(isset($this->session->data['token'])) {
				$this->request->get['route'] = 'error/not_found';
				return new Action($this->request->get['route']);
			} else {
				return new Action('common/login');	
			}
		}
	}

	public function rewrite($link) {
		$url_info = parse_url(str_replace('&amp;', '&', $link));

		$url = '';

		$data = array();

		parse_str($url_info['query'], $data);

		foreach ($data as $key => $value) {
			if (isset($data['route'])) {
						
				if ($key == 'route') {
					
					$parts = explode('/', $value);
					if(count($parts) > 2) {
						$action = array_pop($parts);
						$value = implode('/', $parts);
					}
					
					$query = $this->db->query("SELECT * FROM ekart_master.url_alias WHERE `query` = '" . $this->db->escape($key . '=' . $value) . "'");

					if ($query->num_rows && $query->row['keyword']) {
						$url .= '/' . $query->row['keyword'];
						
						if(!empty($action)) {
							$url .= '/' . $action;
						}
						
						unset($data[$key]);
					}
				}
			}
		}
		
		// Remove the token
		unset($data['token']);

		if ($url) {
			unset($data['route']);

			$query = '';

			if ($data) {
				foreach ($data as $key => $value) {
					$query .= '&' . rawurlencode((string)$key) . '=' . rawurlencode((string)$value);
				}

				if ($query) {
					$query = '?' . str_replace('&', '&amp;', trim($query, '&'));
				}
			}

			return $url_info['scheme'] . '://' . $url_info['host'] . (isset($url_info['port']) ? ':' . $url_info['port'] : '') . str_replace('/index.php', '', $url_info['path']) . $url . $query;
		} else {
			return $link;
		}
	}
}
