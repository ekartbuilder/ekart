<?php
class ControllerCreateSite extends Controller {
	private $error = array();

	public function index() {
		$this->load->model('create/site');

		// Login override for admin users
		if (!empty($this->request->get['token'])) {
			$this->event->trigger('pre.customer.login');

			$this->customer->logout();
			$this->cart->clear();

			unset($this->session->data['wishlist']);
			unset($this->session->data['payment_address']);
			unset($this->session->data['payment_method']);
			unset($this->session->data['payment_methods']);
			unset($this->session->data['shipping_address']);
			unset($this->session->data['shipping_method']);
			unset($this->session->data['shipping_methods']);
			unset($this->session->data['comment']);
			unset($this->session->data['order_id']);
			unset($this->session->data['coupon']);
			unset($this->session->data['reward']);
			unset($this->session->data['voucher']);
			unset($this->session->data['vouchers']);

			$customer_info = $this->model_account_customer->getCustomerByToken($this->request->get['token']);

			if ($customer_info && $this->customer->login($customer_info['email'], '', true)) {
				// Default Addresses
				$this->load->model('account/address');

				if ($this->config->get('config_tax_customer') == 'payment') {
					$this->session->data['payment_address'] = $this->model_account_address->getAddress($this->customer->getAddressId());
				}

				if ($this->config->get('config_tax_customer') == 'shipping') {
					$this->session->data['shipping_address'] = $this->model_account_address->getAddress($this->customer->getAddressId());
				}

				$this->event->trigger('post.customer.login');

				$this->response->redirect($this->url->link('account/account', '', 'SSL'));
			}
		}

		if ($this->customer->isLogged()) {
			$this->response->redirect($this->url->link('account/account', '', 'SSL'));
		}

		$this->load->language('create/site');

		$this->document->setTitle($this->language->get('heading_title'));

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			unset($this->session->data['guest']);

			// Default Shipping Address
			$this->load->model('account/address');

			if ($this->config->get('config_tax_customer') == 'payment') {
				$this->session->data['payment_address'] = $this->model_account_address->getAddress($this->customer->getAddressId());
			}

			if ($this->config->get('config_tax_customer') == 'shipping') {
				$this->session->data['shipping_address'] = $this->model_account_address->getAddress($this->customer->getAddressId());
			}

			// Add to activity log
			$this->load->model('account/activity');

			$activity_data = array(
				'customer_id' => $this->customer->getId(),
				'name'        => $this->customer->getFirstName() . ' ' . $this->customer->getLastName()
			);

			$this->model_account_activity->addActivity('login', $activity_data);

			// Added strpos check to pass McAfee PCI compliance test (http://forum.opencart.com/viewtopic.php?f=10&t=12043&p=151494#p151295)
			if (isset($this->request->post['redirect']) && (strpos($this->request->post['redirect'], $this->config->get('config_url')) !== false || strpos($this->request->post['redirect'], $this->config->get('config_ssl')) !== false)) {
				$this->response->redirect(str_replace('&amp;', '&', $this->request->post['redirect']));
			} else {
				$this->response->redirect($this->url->link('account/account', '', 'SSL'));
			}
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_account'),
			'href' => $this->url->link('account/account', '', 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_login'),
			'href' => $this->url->link('account/login', '', 'SSL')
		);

		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_register'] = $this->language->get('text_register');
		$data['text_register_help'] = $this->language->get('text_register_help');
		$data['text_loading'] = $this->language->get('text_loading');

		$data['entry_email'] = $this->language->get('entry_email');
		$data['entry_password'] = $this->language->get('entry_password');
		$data['entry_site'] = $this->language->get('entry_site');
		$data['entry_contact'] = $this->language->get('entry_contact');

		$data['button_continue'] = $this->language->get('button_continue');
		
		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		$data['action'] = $this->url->link('create/site', '', 'SSL');
		$data['register'] = $this->url->link('account/register', '', 'SSL');
		$data['forgotten'] = $this->url->link('account/forgotten', '', 'SSL');

		// Added strpos check to pass McAfee PCI compliance test (http://forum.opencart.com/viewtopic.php?f=10&t=12043&p=151494#p151295)
		if (isset($this->request->post['redirect']) && (strpos($this->request->post['redirect'], $this->config->get('config_url')) !== false || strpos($this->request->post['redirect'], $this->config->get('config_ssl')) !== false)) {
			$data['redirect'] = $this->request->post['redirect'];
		} elseif (isset($this->session->data['redirect'])) {
			$data['redirect'] = $this->session->data['redirect'];

			unset($this->session->data['redirect']);
		} else {
			$data['redirect'] = '';
		}

		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];

			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}

		if (isset($this->request->post['email'])) {
			$data['email'] = $this->request->post['email'];
		} else {
			$data['email'] = '';
		}

		if (isset($this->request->post['password'])) {
			$data['password'] = $this->request->post['password'];
		} else {
			$data['password'] = '';
		}
		
		if (isset($this->request->post['site'])) {
			$data['site'] = $this->request->post['site'];
		} else {
			$data['site'] = '';
		}
		
		if (isset($this->request->post['contact'])) {
			$data['contact'] = $this->request->post['contact'];
		} else {
			$data['contact'] = '';
		}

		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/create/site.tpl')) {
			$this->response->setOutput($this->load->view($this->config->get('config_template') . '/template/create/site.tpl', $data));
		} else {
			$this->response->setOutput($this->load->view('default/template/create/site.tpl', $data));
		}
	}

	public function save() {
		$this->load->language('create/site');
		$this->load->model('create/site');
			
		$json = array();

		if ((utf8_strlen($this->request->post['email']) > 96) || !preg_match('/^[^\@]+@.*.[a-z]{2,15}$/i', $this->request->post['email'])) {
			$json['error']['email'] = $this->language->get('error_email');
		}
		
		if ((utf8_strlen($this->request->post['password']) < 3) || (utf8_strlen($this->request->post['password']) > 32)) {
			$json['error']['password'] = $this->language->get('error_password');
		}
		
		if ((utf8_strlen($this->request->post['site']) < 3) || (utf8_strlen($this->request->post['site']) > 32)) {
			$json['error']['site'] = $this->language->get('error_site');
		}

		if (!isset($json['error']['site']) && $this->model_create_site->getTotalSitesByName($this->request->post['site'])) {
			$json['error']['site'] = $this->language->get('error_site_exists');
		}

		if ((utf8_strlen($this->request->post['contact']) < 3) || (utf8_strlen($this->request->post['contact']) > 10)) {
			$json['error']['contact'] = $this->language->get('error_contact');
		}

		if (!$json) {
			
			$owner_data = array();
			
			$owner_data['firstname'] = "";
	      	$owner_data['lastname'] = "";
	      	$owner_data['email'] = $this->db->escape($this->request->post['email']);
	      	$owner_data['password'] = $this->db->escape(base64_encode($this->request->post['password']));
	      	$owner_data['mobile'] = $this->db->escape($this->request->post['contact']);
	      	$owner_data['status'] = "Y";
			
			$owner_id = $this->model_create_site->getOwnerByEmail($owner_data['email']);
			if($owner_id == 0) {
				$owner_id = $this->model_create_site->addOwner($owner_data);
			}
			
			$site_data = array();
			$site_data['owner_id'] = $owner_id;
			$site_data['plan_id'] = $this->db->escape($this->request->post['plan']);
			$site_data['sub_domain'] = $this->db->escape($this->request->post['site']);
			$site_data['domain'] = "";
			$site_data['site_type'] = $this->db->escape($this->request->post['type']);
			$site_data['live_date'] = date("Y-m-d H:i:s");
			$site_data['active_status'] = "Y";
			$site_data['status'] = "Y";
			
	      	$site_id = $this->model_create_site->addSite($site_data);

			//Create DB
			$db_details = $this->createDB($site_data);
			
			if(count($db_details)) {
				
				// Copy Image Folder
				$this->copyImages($site_data['sub_domain']);
				
				// Login Into Site
				$token = urlencode(base64_encode($owner_id));
				$login_url = str_replace('&amp;', '&', $this->url->link('common/login', 'token=' . $token, 'SSL'));
				$login_url = str_replace('www.ekartbuilder.com', $site_data['sub_domain'].'.ekartbuilder.com', $login_url);
				$login_url = str_replace('index.php?route=common/login', 'admin/index.php?route=common/login', $login_url);
				$json['redirect'] = $login_url;
			} else {
				$json['error']['warning'] = $this->language->get('error_create_db');
			}
/*
			// Add to activity log
			$this->load->model('account/activity');

			$activity_data = array(
				'customer_id' => $this->customer->getId(),
				'name'        => $this->customer->getFirstName() . ' ' . $this->customer->getLastName()
			);

			$this->model_account_activity->addActivity('login', $activity_data);
*/
		} else {
			$json['error']['warning'] = $this->language->get('error_warning');
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	protected function createDB($site_data) {
		if(!empty($site_data['sub_domain'])) {
			$target_db = "ekart_" . $site_data['sub_domain'];
			$url = STORE_CREATE_HOST . "create_db.php?db_name=".$target_db;
			$json = file_get_contents($url); 
			return json_decode($json);	
		}
	}

	protected function copyImages($subdomain) {
		echo `cp -r image images/$subdomain`;
	}

	protected function validate() {
		$this->event->trigger('pre.customer.login');

		// Check how many login attempts have been made.
		$login_info = $this->model_account_customer->getLoginAttempts($this->request->post['email']);

		if ($login_info && ($login_info['total'] >= $this->config->get('config_login_attempts')) && strtotime('-1 hour') < strtotime($login_info['date_modified'])) {
			$this->error['warning'] = $this->language->get('error_attempts');
		}

		// Check if customer has been approved.
		$customer_info = $this->model_account_customer->getCustomerByEmail($this->request->post['email']);

		if ($customer_info && !$customer_info['approved']) {
			$this->error['warning'] = $this->language->get('error_approved');
		}

		if (!$this->error) {
			if (!$this->customer->login($this->request->post['email'], $this->request->post['password'])) {
				$this->error['warning'] = $this->language->get('error_login');

				$this->model_account_customer->addLoginAttempt($this->request->post['email']);
			} else {
				$this->model_account_customer->deleteLoginAttempts($this->request->post['email']);

				$this->event->trigger('post.customer.login');
			}
		}

		return !$this->error;
	}
}