<?php
class ModelCreateSite extends Model {
		
	var $config_safe_delete = 0;
	
	public function createSite($data) {
      		
      	$owner_data['firstname'] = $data['firstname'];
      	$owner_data['lastname'] = $data['lastname'];
      	$owner_data['email'] = $data['email'];
      	$owner_data['password'] = $data['password'];
      	$owner_data['mobile'] = $data['mobile'];
      	$owner_data['status'] = $data['status'];

      	$owner_id = $this->addOwner($owner_data);
		
		$site_data['owner_id'] = $owner_id;
		$site_data['plan_id'] = $data['plan_id'];
		$site_data['sub_domain'] = $data['sub_domain'];
		$site_data['domain'] = $data['domain'];
		$site_data['site_type'] = $data['site_type'];
		$site_data['live_date'] = $data['live_date'];
		$site_data['active_status'] = $data['active_status'];
		$site_data['status'] = $data['status'];
		
      	$site_id = $this->addSite($site_data);
      	
      	return $site_id;
	}
	
	public function addOwner($data) {
      	$this->db->query("INSERT INTO ekart_master.site_owners SET " .
      			
				" firstname = '" . $this->db->escape($data['firstname']) .
				"', lastname = '" . $this->db->escape($data['lastname']) .
				"', email = '" . $this->db->escape($data['email']) .
				"', password = '" . $this->db->escape($data['password']) .
				"', mobile = '" . $this->db->escape($data['mobile']) .
				"', status = '" . $this->db->escape($data['status']) .
				"', date_added = '" . date("Y-m-d H:i:s") .
				"', date_modified = '" . date("Y-m-d H:i:s") .      			 
				"'");

      	$owner_id = $this->db->getLastId();
      	
      	return $owner_id;
	}
	
	public function addSite($data) {
      	$this->db->query("INSERT INTO ekart_master.site_master SET " .
      			
				" owner_id = '" . $this->db->escape($data['owner_id']) .
				"', plan_id = '" . $this->db->escape($data['plan_id']) .
				"', sub_domain = '" . $this->db->escape($data['sub_domain']) .
				"', domain = '" . $this->db->escape($data['domain']) .
				"', site_type = '" . $this->db->escape($data['site_type']) .
				"', live_date = '" . $this->db->escape($data['live_date']) .
				"', active_status = '" . $this->db->escape($data['active_status']) .
				"', status = '" . $this->db->escape($data['status']) .
				"', date_added = '" . date("Y-m-d H:i:s") .
				"', date_modified = '" . date("Y-m-d H:i:s") .      			 
				"'");

      	$site_id = $this->db->getLastId();
      	
      	return $site_id;
	}
	
	public function getOwnerByEmail($email) {
		$query = $this->db->query("SELECT owner_id FROM ekart_master.site_owners WHERE LOWER(email) = '" . $this->db->escape(utf8_strtolower($email)) . "' LIMIT 1");

		return isset($query->row['owner_id']) ? $query->row['owner_id'] : 0;
	}
	
	public function getTotalOwnersByEmail($email) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM ekart_master.site_owners WHERE LOWER(email) = '" . $this->db->escape(utf8_strtolower($email)) . "'");

		return $query->row['total'];
	}
	
	public function getTotalSitesByName($site) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM ekart_master.site_master WHERE LOWER(sub_domain) = '" . $this->db->escape(utf8_strtolower($site)) . "'");

		return $query->row['total'];
	}
	
	public function getTotalSitess() {
		if($this->config_safe_delete)
			$sql = "SELECT COUNT(*) AS total FROM `" . DB_PREFIX . "site_master` WHERE 1=1  ";
		else
			$sql = "SELECT COUNT(*) AS total FROM `" . DB_PREFIX . "site_master` WHERE 1=1 ";
		
		
		if (isset($data['filter_owner_id']) && !is_null($data['filter_owner_id'])) {
			$sql .= " AND owner_id LIKE '%" . $this->db->escape($data['filter_owner_id']) . "%'";
		}


		if (isset($data['filter_plan_id']) && !is_null($data['filter_plan_id'])) {
			$sql .= " AND plan_id = '" . $data['filter_plan_id'] . "'";
		}


		if (isset($data['filter_sub_domain']) && !is_null($data['filter_sub_domain'])) {
			$sql .= " AND sub_domain LIKE '%" . $this->db->escape($data['filter_sub_domain']) . "%'";
		}


		if (isset($data['filter_site_type']) && !is_null($data['filter_site_type'])) {
			$sql .= " AND site_type = '" . $data['filter_site_type'] . "'";
		}


		if (isset($data['filter_live_date']) && !is_null($data['filter_live_date'])) {
			$sql .= " AND live_date LIKE '%" . $this->db->escape($data['filter_live_date']) . "%'";
		}


		if (isset($data['filter_active_status']) && !is_null($data['filter_active_status'])) {
			$sql .= " AND active_status = '" . $data['filter_active_status'] . "'";
		}


		if (isset($data['filter_date_added']) && !is_null($data['filter_date_added'])) {
			$sql .= " AND date_added LIKE '%" . $this->db->escape($data['filter_date_added']) . "%'";
		}


		if (isset($data['filter_status']) && !is_null($data['filter_status'])) {
			$sql .= " AND status = '" . $data['filter_status'] . "'";
		}
		
      	$query = $this->db->query($sql);
      	
		return $query->row['total'];
	}
	
	
	
	
	
	
	
	
	
	public function addCustomer($data) {
		$this->event->trigger('pre.customer.add', $data);

		if (isset($data['customer_group_id']) && is_array($this->config->get('config_customer_group_display')) && in_array($data['customer_group_id'], $this->config->get('config_customer_group_display'))) {
			$customer_group_id = $data['customer_group_id'];
		} else {
			$customer_group_id = $this->config->get('config_customer_group_id');
		}

		$this->load->model('account/customer_group');

		$customer_group_info = $this->model_account_customer_group->getCustomerGroup($customer_group_id);

		$this->db->query("INSERT INTO " . DB_PREFIX . "customer SET customer_group_id = '" . (int)$customer_group_id . "', store_id = '" . (int)$this->config->get('config_store_id') . "', firstname = '" . $this->db->escape($data['firstname']) . "', lastname = '" . $this->db->escape($data['lastname']) . "', email = '" . $this->db->escape($data['email']) . "', telephone = '" . $this->db->escape($data['telephone']) . "', fax = '" . $this->db->escape($data['fax']) . "', custom_field = '" . $this->db->escape(isset($data['custom_field']['account']) ? serialize($data['custom_field']['account']) : '') . "', salt = '" . $this->db->escape($salt = substr(md5(uniqid(rand(), true)), 0, 9)) . "', password = '" . $this->db->escape(sha1($salt . sha1($salt . sha1($data['password'])))) . "', newsletter = '" . (isset($data['newsletter']) ? (int)$data['newsletter'] : 0) . "', ip = '" . $this->db->escape($this->request->server['REMOTE_ADDR']) . "', status = '1', approved = '" . (int)!$customer_group_info['approval'] . "', date_added = NOW()");

		$customer_id = $this->db->getLastId();

		$this->db->query("INSERT INTO " . DB_PREFIX . "address SET customer_id = '" . (int)$customer_id . "', firstname = '" . $this->db->escape($data['firstname']) . "', lastname = '" . $this->db->escape($data['lastname']) . "', company = '" . $this->db->escape($data['company']) . "', address_1 = '" . $this->db->escape($data['address_1']) . "', address_2 = '" . $this->db->escape($data['address_2']) . "', city = '" . $this->db->escape($data['city']) . "', postcode = '" . $this->db->escape($data['postcode']) . "', country_id = '" . (int)$data['country_id'] . "', zone_id = '" . (int)$data['zone_id'] . "', custom_field = '" . $this->db->escape(isset($data['custom_field']['address']) ? serialize($data['custom_field']['address']) : '') . "'");

		$address_id = $this->db->getLastId();

		$this->db->query("UPDATE " . DB_PREFIX . "customer SET address_id = '" . (int)$address_id . "' WHERE customer_id = '" . (int)$customer_id . "'");

		$this->load->language('mail/customer');

		$subject = sprintf($this->language->get('text_subject'), html_entity_decode($this->config->get('config_name'), ENT_QUOTES, 'UTF-8'));

		$message = sprintf($this->language->get('text_welcome'), html_entity_decode($this->config->get('config_name'), ENT_QUOTES, 'UTF-8')) . "\n\n";

		if (!$customer_group_info['approval']) {
			$message .= $this->language->get('text_login') . "\n";
		} else {
			$message .= $this->language->get('text_approval') . "\n";
		}

		$message .= $this->url->link('account/login', '', 'SSL') . "\n\n";
		$message .= $this->language->get('text_services') . "\n\n";
		$message .= $this->language->get('text_thanks') . "\n";
		$message .= html_entity_decode($this->config->get('config_name'), ENT_QUOTES, 'UTF-8');

		$mail = new Mail();
		$mail->protocol = $this->config->get('config_mail_protocol');
		$mail->parameter = $this->config->get('config_mail_parameter');
		$mail->smtp_hostname = $this->config->get('config_mail_smtp_hostname');
		$mail->smtp_username = $this->config->get('config_mail_smtp_username');
		$mail->smtp_password = html_entity_decode($this->config->get('config_mail_smtp_password'), ENT_QUOTES, 'UTF-8');
		$mail->smtp_port = $this->config->get('config_mail_smtp_port');
		$mail->smtp_timeout = $this->config->get('config_mail_smtp_timeout');
			
		$mail->setTo($data['email']);
		$mail->setFrom($this->config->get('config_email'));
		$mail->setSender(html_entity_decode($this->config->get('config_name'), ENT_QUOTES, 'UTF-8'));
		$mail->setSubject($subject);
		$mail->setText($message);
		$mail->send();

		// Send to main admin email if new account email is enabled
		if ($this->config->get('config_account_mail')) {
			$message  = $this->language->get('text_signup') . "\n\n";
			$message .= $this->language->get('text_website') . ' ' . html_entity_decode($this->config->get('config_name'), ENT_QUOTES, 'UTF-8') . "\n";
			$message .= $this->language->get('text_firstname') . ' ' . $data['firstname'] . "\n";
			$message .= $this->language->get('text_lastname') . ' ' . $data['lastname'] . "\n";
			$message .= $this->language->get('text_customer_group') . ' ' . $customer_group_info['name'] . "\n";
			$message .= $this->language->get('text_email') . ' '  .  $data['email'] . "\n";
			$message .= $this->language->get('text_telephone') . ' ' . $data['telephone'] . "\n";

			$mail = new Mail();
			$mail->protocol = $this->config->get('config_mail_protocol');
			$mail->parameter = $this->config->get('config_mail_parameter');
			$mail->smtp_hostname = $this->config->get('config_mail_smtp_hostname');
			$mail->smtp_username = $this->config->get('config_mail_smtp_username');
			$mail->smtp_password = html_entity_decode($this->config->get('config_mail_smtp_password'), ENT_QUOTES, 'UTF-8');
			$mail->smtp_port = $this->config->get('config_mail_smtp_port');
			$mail->smtp_timeout = $this->config->get('config_mail_smtp_timeout');
			
			$mail->setTo($this->config->get('config_email'));
			$mail->setFrom($this->config->get('config_email'));
			$mail->setSender(html_entity_decode($this->config->get('config_name'), ENT_QUOTES, 'UTF-8'));
			$mail->setSubject(html_entity_decode($this->language->get('text_new_customer'), ENT_QUOTES, 'UTF-8'));
			$mail->setText($message);
			$mail->send();

			// Send to additional alert emails if new account email is enabled
			$emails = explode(',', $this->config->get('config_mail_alert'));

			foreach ($emails as $email) {
				if (utf8_strlen($email) > 0 && preg_match('/^[^\@]+@.*.[a-z]{2,15}$/i', $email)) {
					$mail->setTo($email);
					$mail->send();
				}
			}
		}

		$this->event->trigger('post.customer.add', $customer_id);

		return $customer_id;
	}

	public function editCustomer($data) {
		$this->event->trigger('pre.customer.edit', $data);

		$customer_id = $this->customer->getId();

		$this->db->query("UPDATE " . DB_PREFIX . "customer SET firstname = '" . $this->db->escape($data['firstname']) . "', lastname = '" . $this->db->escape($data['lastname']) . "', email = '" . $this->db->escape($data['email']) . "', telephone = '" . $this->db->escape($data['telephone']) . "', fax = '" . $this->db->escape($data['fax']) . "', custom_field = '" . $this->db->escape(isset($data['custom_field']) ? serialize($data['custom_field']) : '') . "' WHERE customer_id = '" . (int)$customer_id . "'");

		$this->event->trigger('post.customer.edit', $customer_id);
	}

	public function editPassword($email, $password) {
		$this->event->trigger('pre.customer.edit.password');

		$this->db->query("UPDATE " . DB_PREFIX . "customer SET salt = '" . $this->db->escape($salt = substr(md5(uniqid(rand(), true)), 0, 9)) . "', password = '" . $this->db->escape(sha1($salt . sha1($salt . sha1($password)))) . "' WHERE LOWER(email) = '" . $this->db->escape(utf8_strtolower($email)) . "'");

		$this->event->trigger('post.customer.edit.password');
	}

	public function editNewsletter($newsletter) {
		$this->event->trigger('pre.customer.edit.newsletter');

		$this->db->query("UPDATE " . DB_PREFIX . "customer SET newsletter = '" . (int)$newsletter . "' WHERE customer_id = '" . (int)$this->customer->getId() . "'");

		$this->event->trigger('post.customer.edit.newsletter');
	}

	public function getCustomer($customer_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "customer WHERE customer_id = '" . (int)$customer_id . "'");

		return $query->row;
	}

	public function getCustomerByEmail($email) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "customer WHERE LOWER(email) = '" . $this->db->escape(utf8_strtolower($email)) . "'");

		return $query->row;
	}

	public function getCustomerByToken($token) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "customer WHERE token = '" . $this->db->escape($token) . "' AND token != ''");

		$this->db->query("UPDATE " . DB_PREFIX . "customer SET token = ''");

		return $query->row;
	}

	public function getTotalCustomersByEmail($email) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "customer WHERE LOWER(email) = '" . $this->db->escape(utf8_strtolower($email)) . "'");

		return $query->row['total'];
	}

	public function getIps($customer_id) {
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "customer_ip` WHERE customer_id = '" . (int)$customer_id . "'");

		return $query->rows;
	}

	public function isBanIp($ip) {
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "customer_ban_ip` WHERE ip = '" . $this->db->escape($ip) . "'");

		return $query->num_rows;
	}
	
	public function addLoginAttempt($email) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "customer_login WHERE email = '" . $this->db->escape(utf8_strtolower((string)$email)) . "' AND ip = '" . $this->db->escape($this->request->server['REMOTE_ADDR']) . "'");
		
		if (!$query->num_rows) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "customer_login SET email = '" . $this->db->escape(utf8_strtolower((string)$email)) . "', ip = '" . $this->db->escape($this->request->server['REMOTE_ADDR']) . "', total = 1, date_added = '" . $this->db->escape(date('Y-m-d H:i:s')) . "', date_modified = '" . $this->db->escape(date('Y-m-d H:i:s')) . "'");
		} else {
			$this->db->query("UPDATE " . DB_PREFIX . "customer_login SET total = (total + 1), date_modified = '" . $this->db->escape(date('Y-m-d H:i:s')) . "' WHERE customer_login_id = '" . (int)$query->row['customer_login_id'] . "'");
		}			
	}	
	
	public function getLoginAttempts($email) {
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "customer_login` WHERE email = '" . $this->db->escape(utf8_strtolower($email)) . "'");

		return $query->row;
	}
	
	public function deleteLoginAttempts($email) {
		$this->db->query("DELETE FROM `" . DB_PREFIX . "customer_login` WHERE email = '" . $this->db->escape(utf8_strtolower($email)) . "'");
	}	
}
