<?php
class ControllerManageOwners extends Controller {
	private $error = array();
     
  	public function index() {
		$this->load->language('manage/owners');
    	
		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('manage/owners');
		
		$this->getList();
  	}
  
  	public function add() {
    	$this->load->language('manage/owners');

    	$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('manage/owners');
		
    	if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_manage_owners->addOwners($this->request->post);
			
			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';
			
			
			if (isset($this->request->get['filter_firstname'])) {
				$url .= '&filter_firstname=' . $this->request->get['filter_firstname'];
			}


			if (isset($this->request->get['filter_lastname'])) {
				$url .= '&filter_lastname=' . $this->request->get['filter_lastname'];
			}


			if (isset($this->request->get['filter_email'])) {
				$url .= '&filter_email=' . $this->request->get['filter_email'];
			}


			if (isset($this->request->get['filter_mobile'])) {
				$url .= '&filter_mobile=' . $this->request->get['filter_mobile'];
			}


			if (isset($this->request->get['filter_date_added'])) {
				$url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
			}


			if (isset($this->request->get['filter_status'])) {
				$url .= '&filter_status=' . $this->request->get['filter_status'];
			}


			
			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}
			
			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}
						
			$this->response->redirect($this->url->link('manage/owners', 'token=' . $this->session->data['token'] . $url, 'SSL'));
    	}
    
    	$this->getForm();
  	}

  	public function edit() {
    	$this->load->language('manage/owners');

    	$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('manage/owners');
				
    	if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_manage_owners->editOwners($this->request->get['owner_id'], $this->request->post);
      		
			$this->session->data['success'] = $this->language->get('text_success');
	  
			$url = '';
			
			
			if (isset($this->request->get['filter_firstname'])) {
				$url .= '&filter_firstname=' . $this->request->get['filter_firstname'];
			}


			if (isset($this->request->get['filter_lastname'])) {
				$url .= '&filter_lastname=' . $this->request->get['filter_lastname'];
			}


			if (isset($this->request->get['filter_email'])) {
				$url .= '&filter_email=' . $this->request->get['filter_email'];
			}


			if (isset($this->request->get['filter_mobile'])) {
				$url .= '&filter_mobile=' . $this->request->get['filter_mobile'];
			}


			if (isset($this->request->get['filter_date_added'])) {
				$url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
			}


			if (isset($this->request->get['filter_status'])) {
				$url .= '&filter_status=' . $this->request->get['filter_status'];
			}


			
			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}
			
			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}
						
			$this->response->redirect($this->url->link('manage/owners', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}
    
    	$this->getForm();
  	}

  	public function delete() {
    	$this->load->language('manage/owners');

    	$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('manage/owners');
		
    	if (isset($this->request->post['selected']) && $this->validateDelete()) { 
			foreach ($this->request->post['selected'] as $owner_id) {
				$this->model_manage_owners->deleteOwners($owner_id);
			}
      		
			$this->session->data['success'] = $this->language->get('text_success');
	  
			$url = '';
			
			
			if (isset($this->request->get['filter_firstname'])) {
				$url .= '&filter_firstname=' . $this->request->get['filter_firstname'];
			}


			if (isset($this->request->get['filter_lastname'])) {
				$url .= '&filter_lastname=' . $this->request->get['filter_lastname'];
			}


			if (isset($this->request->get['filter_email'])) {
				$url .= '&filter_email=' . $this->request->get['filter_email'];
			}


			if (isset($this->request->get['filter_mobile'])) {
				$url .= '&filter_mobile=' . $this->request->get['filter_mobile'];
			}


			if (isset($this->request->get['filter_date_added'])) {
				$url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
			}


			if (isset($this->request->get['filter_status'])) {
				$url .= '&filter_status=' . $this->request->get['filter_status'];
			}


			
			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}
			
			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}
						
			$this->response->redirect($this->url->link('manage/owners', 'token=' . $this->session->data['token'] . $url, 'SSL'));
    	}
	
    	$this->getList();
  	}

  	protected function getList() {
  		
  		
		if (isset($this->request->get['filter_firstname'])) {
			$filter_firstname = $this->request->get['filter_firstname'];
		} else {
			$filter_firstname = null;
		}


		if (isset($this->request->get['filter_lastname'])) {
			$filter_lastname = $this->request->get['filter_lastname'];
		} else {
			$filter_lastname = null;
		}


		if (isset($this->request->get['filter_email'])) {
			$filter_email = $this->request->get['filter_email'];
		} else {
			$filter_email = null;
		}


		if (isset($this->request->get['filter_mobile'])) {
			$filter_mobile = $this->request->get['filter_mobile'];
		} else {
			$filter_mobile = null;
		}


		if (isset($this->request->get['filter_date_added'])) {
			$filter_date_added = $this->request->get['filter_date_added'];
		} else {
			$filter_date_added = null;
		}


		if (isset($this->request->get['filter_status'])) {
			$filter_status = $this->request->get['filter_status'];
		} else {
			$filter_status = null;
		}


		
		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'name';
		}
		
		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			$order = 'ASC';
		}
		
		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}
				
		$url = '';
			
		
			if (isset($this->request->get['filter_firstname'])) {
				$url .= '&filter_firstname=' . $this->request->get['filter_firstname'];
			}


			if (isset($this->request->get['filter_lastname'])) {
				$url .= '&filter_lastname=' . $this->request->get['filter_lastname'];
			}


			if (isset($this->request->get['filter_email'])) {
				$url .= '&filter_email=' . $this->request->get['filter_email'];
			}


			if (isset($this->request->get['filter_mobile'])) {
				$url .= '&filter_mobile=' . $this->request->get['filter_mobile'];
			}


			if (isset($this->request->get['filter_date_added'])) {
				$url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
			}


			if (isset($this->request->get['filter_status'])) {
				$url .= '&filter_status=' . $this->request->get['filter_status'];
			}


		
		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}
			
		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}
		
  		$data['breadcrumbs'] = array();

   		$data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => false
   		);

   		$data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('manage/owners', 'token=' . $this->session->data['token'] . $url, 'SSL'),
      		'separator' => ' :: '
   		);
		
		
		$data['entry_owner_id'] = $this->language->get('entry_owner_id');
		$data['entry_firstname'] = $this->language->get('entry_firstname');
		$data['entry_lastname'] = $this->language->get('entry_lastname');
		$data['entry_email'] = $this->language->get('entry_email');
		$data['entry_mobile'] = $this->language->get('entry_mobile');
		$data['entry_date_added'] = $this->language->get('entry_date_added');
		$data['entry_status'] = $this->language->get('entry_status');
		$data['button_edit'] = $this->language->get('button_edit');	
		$data['button_add'] = $this->language->get('button_add');			
		$data['text_list'] = $this->language->get('text_list');					
		$data['add'] = $this->url->link('manage/owners/add', 'token=' . $this->session->data['token'] . $url, 'SSL');
		$data['delete'] = $this->url->link('manage/owners/delete', 'token=' . $this->session->data['token'] . $url, 'SSL');
		
		$data['ownerss'] = array();

		$filter_data = array(
			
			'filter_firstname' => $filter_firstname,
			'filter_lastname' => $filter_lastname,
			'filter_email' => $filter_email,
			'filter_mobile' => $filter_mobile,
			'filter_date_added' => $filter_date_added,
			'filter_status' => $filter_status,			
			'sort'  => $sort,
			'order' => $order,
			'start' => ($page - 1) * $this->config->get('config_admin_limit'),
			'limit' => $this->config->get('config_admin_limit')
		);
		
		
		$display_data = array('display' => '1');
		$display_statuss = $this->model_manage_owners->getStatuss($display_data);
		
		$owners_total = $this->model_manage_owners->getTotalOwnerss($filter_data);
	
		$results = $this->model_manage_owners->getOwnerss($filter_data);
 
    	foreach ($results as $result) {
						
			$data['ownerss'][] = array(
				
				'owner_id' => $result['owner_id'],
				'owner_id' => $result['owner_id'],
				'firstname' => $result['firstname'],
				'lastname' => $result['lastname'],
				'email' => $result['email'],
				'mobile' => $result['mobile'],
				'date_added' => date($this->language->get('date_format_short'), strtotime($result['date_added'])),
				'status' => $display_statuss[$result['status']],
				'selected'   => isset($this->request->post['selected']) && in_array($result['owner_id'], $this->request->post['selected']),
				'edit'     => $this->url->link('manage/owners/edit', 'token=' . $this->session->data['token'] . '&owner_id=' . $result['owner_id'] . $url, 'SSL')
				
			);
		}
									
		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_no_results'] = $this->language->get('text_no_results');

		
		$data['text_status'] = $this->language->get('text_status');
		$data['column_owner_id'] = $this->language->get('column_owner_id');
		$data['column_firstname'] = $this->language->get('column_firstname');
		$data['column_lastname'] = $this->language->get('column_lastname');
		$data['column_email'] = $this->language->get('column_email');
		$data['column_mobile'] = $this->language->get('column_mobile');
		$data['column_date_added'] = $this->language->get('column_date_added');
		$data['column_status'] = $this->language->get('column_status');
		$data['column_action'] = $this->language->get('column_action');		
		
		$data['button_insert'] = $this->language->get('button_insert');
		$data['button_delete'] = $this->language->get('button_delete');		
		
		$data['button_filter'] = $this->language->get('button_filter');		
		
		$data['token'] = $this->session->data['token'];
 
 		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}
		
		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];
		
			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}

		$url = '';
		
		
			if (isset($this->request->get['filter_firstname'])) {
				$url .= '&filter_firstname=' . $this->request->get['filter_firstname'];
			}


			if (isset($this->request->get['filter_lastname'])) {
				$url .= '&filter_lastname=' . $this->request->get['filter_lastname'];
			}


			if (isset($this->request->get['filter_email'])) {
				$url .= '&filter_email=' . $this->request->get['filter_email'];
			}


			if (isset($this->request->get['filter_mobile'])) {
				$url .= '&filter_mobile=' . $this->request->get['filter_mobile'];
			}


			if (isset($this->request->get['filter_date_added'])) {
				$url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
			}


			if (isset($this->request->get['filter_status'])) {
				$url .= '&filter_status=' . $this->request->get['filter_status'];
			}


		
		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}
		
		
		$data['sort_owner_id'] = $this->url->link('manage/owners', 'token=' . $this->session->data['token'] . '&sort=owner_id' . $url, 'SSL');
		$data['sort_firstname'] = $this->url->link('manage/owners', 'token=' . $this->session->data['token'] . '&sort=firstname' . $url, 'SSL');
		$data['sort_lastname'] = $this->url->link('manage/owners', 'token=' . $this->session->data['token'] . '&sort=lastname' . $url, 'SSL');
		$data['sort_email'] = $this->url->link('manage/owners', 'token=' . $this->session->data['token'] . '&sort=email' . $url, 'SSL');
		$data['sort_mobile'] = $this->url->link('manage/owners', 'token=' . $this->session->data['token'] . '&sort=mobile' . $url, 'SSL');
		$data['sort_date_added'] = $this->url->link('manage/owners', 'token=' . $this->session->data['token'] . '&sort=date_added' . $url, 'SSL');
		$data['sort_status'] = $this->url->link('manage/owners', 'token=' . $this->session->data['token'] . '&sort=status' . $url, 'SSL');
				
		$url = '';
		
		
			if (isset($this->request->get['filter_firstname'])) {
				$url .= '&filter_firstname=' . $this->request->get['filter_firstname'];
			}


			if (isset($this->request->get['filter_lastname'])) {
				$url .= '&filter_lastname=' . $this->request->get['filter_lastname'];
			}


			if (isset($this->request->get['filter_email'])) {
				$url .= '&filter_email=' . $this->request->get['filter_email'];
			}


			if (isset($this->request->get['filter_mobile'])) {
				$url .= '&filter_mobile=' . $this->request->get['filter_mobile'];
			}


			if (isset($this->request->get['filter_date_added'])) {
				$url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
			}


			if (isset($this->request->get['filter_status'])) {
				$url .= '&filter_status=' . $this->request->get['filter_status'];
			}


		
		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}
												
		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		$pagination = new Pagination();
		$pagination->total = $owners_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_admin_limit');
		$pagination->text = $this->language->get('text_pagination');
		$pagination->url = $this->url->link('manage/owners', 'token=' . $this->session->data['token'] . $url . '&page={page}', 'SSL');
			
		$data['pagination'] = $pagination->render();
		
		$data['results'] = sprintf($this->language->get('text_pagination'), ($owners_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($owners_total - $this->config->get('config_limit_admin'))) ? $owners_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $owners_total, ceil($owners_total / $this->config->get('config_limit_admin')));
		
		
		$data['filter_firstname'] = $filter_firstname;
		$data['filter_lastname'] = $filter_lastname;
		$data['filter_email'] = $filter_email;
		$data['filter_mobile'] = $filter_mobile;
		$data['filter_date_added'] = $filter_date_added;
		$data['filter_status'] = $filter_status;
		
		$data['sort'] = $sort;
		$data['order'] = $order;
		
		
		$data['statuss'] = $this->model_manage_owners->getStatuss();
		
		
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('manage/owners_list.tpl', $data));

  	}

  	protected function getForm() {
    	$data['heading_title'] = $this->language->get('heading_title');

    	$data['text_enabled'] = $this->language->get('text_enabled');
    	$data['text_disabled'] = $this->language->get('text_disabled');
    	$data['text_yes'] = $this->language->get('text_yes');
    	$data['text_no'] = $this->language->get('text_no');
    	$data['text_percent'] = $this->language->get('text_percent');
    	$data['text_amount'] = $this->language->get('text_amount');
		$data['text_form'] = $this->language->get('text_form');
		
		
		
		$data['entry_firstname'] = $this->language->get('entry_firstname');
		$data['entry_lastname'] = $this->language->get('entry_lastname');
		$data['entry_email'] = $this->language->get('entry_email');
		$data['entry_password'] = $this->language->get('entry_password');
		$data['entry_mobile'] = $this->language->get('entry_mobile');
		$data['entry_status'] = $this->language->get('entry_status');

    	$data['button_save'] = $this->language->get('button_save');
    	$data['button_cancel'] = $this->language->get('button_cancel');

		$data['tab_general'] = $this->language->get('tab_general');
		$data['tab_owners_history'] = $this->language->get('tab_owners_history');

		$data['token'] = $this->session->data['token'];
	
		if (isset($this->request->get['owner_id'])) {
			$data['owner_id'] = $this->request->get['owner_id'];
		} else {
			$data['owner_id'] = 0;
		}
				
 		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}
	 	
	 	
		if (isset($this->error['firstname'])) {
			$data['error_firstname'] = $this->error['firstname'];
		} else {
			$data['error_firstname'] = '';
		}


		if (isset($this->error['lastname'])) {
			$data['error_lastname'] = $this->error['lastname'];
		} else {
			$data['error_lastname'] = '';
		}


		if (isset($this->error['email'])) {
			$data['error_email'] = $this->error['email'];
		} else {
			$data['error_email'] = '';
		}


		if (isset($this->error['password'])) {
			$data['error_password'] = $this->error['password'];
		} else {
			$data['error_password'] = '';
		}


		if (isset($this->error['mobile'])) {
			$data['error_mobile'] = $this->error['mobile'];
		} else {
			$data['error_mobile'] = '';
		}


		if (isset($this->error['status'])) {
			$data['error_status'] = $this->error['status'];
		} else {
			$data['error_status'] = '';
		}

	

		$url = '';
			
		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

  		$data['breadcrumbs'] = array();

   		$data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => false
   		);

   		$data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('manage/owners', 'token=' . $this->session->data['token'] . $url, 'SSL'),
      		'separator' => ' :: '
   		);
									
		if (!isset($this->request->get['owner_id'])) {
			$data['action'] = $this->url->link('manage/owners/add', 'token=' . $this->session->data['token'] . $url, 'SSL');
		} else {
			$data['action'] = $this->url->link('manage/owners/edit', 'token=' . $this->session->data['token'] . '&owner_id=' . $this->request->get['owner_id'] . $url, 'SSL');
		}
		
		$data['cancel'] = $this->url->link('manage/owners', 'token=' . $this->session->data['token'] . $url, 'SSL');
  		
		if (isset($this->request->get['owner_id']) && (!$this->request->server['REQUEST_METHOD'] != 'POST')) {
      		$owners_info = $this->model_manage_owners->getOwners($this->request->get['owner_id']);
    	}
		
		
		if (isset($this->request->post['firstname'])) {
			$data['firstname'] = $this->request->post['firstname'];
		} elseif (isset($owners_info)) {
			$data['firstname'] = $owners_info['firstname'];
		} else {
			$data['firstname'] = '';
		}

		if (isset($this->request->post['lastname'])) {
			$data['lastname'] = $this->request->post['lastname'];
		} elseif (isset($owners_info)) {
			$data['lastname'] = $owners_info['lastname'];
		} else {
			$data['lastname'] = '';
		}

		if (isset($this->request->post['email'])) {
			$data['email'] = $this->request->post['email'];
		} elseif (isset($owners_info)) {
			$data['email'] = $owners_info['email'];
		} else {
			$data['email'] = '';
		}

		if (isset($this->request->post['password'])) {
			$data['password'] = $this->request->post['password'];
		} elseif (isset($owners_info)) {
			$data['password'] = $owners_info['password'];
		} else {
			$data['password'] = '';
		}

		if (isset($this->request->post['mobile'])) {
			$data['mobile'] = $this->request->post['mobile'];
		} elseif (isset($owners_info)) {
			$data['mobile'] = $owners_info['mobile'];
		} else {
			$data['mobile'] = '';
		}

		if (isset($this->request->post['status'])) {
			$data['status'] = $this->request->post['status'];
		} elseif (isset($owners_info)) {
			$data['status'] = $owners_info['status'];
		} else {
			$data['status'] = '';
		}

		$data['statuss'] = $this->model_manage_owners->getStatuss();


        $data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('manage/owners_form.tpl', $data));		
  	}
	
  	protected function validateForm() {
    	if (!$this->user->hasPermission('modify', 'manage/owners')) {
      		$this->error['warning'] = $this->language->get('error_permission');
    	}
      	
      	
		if ((strlen(utf8_decode($this->request->post['firstname'])) <= 0)) {
			$this->error['firstname'] = $this->language->get('error_firstname');
		}

		if ((strlen(utf8_decode($this->request->post['lastname'])) <= 0)) {
			$this->error['lastname'] = $this->language->get('error_lastname');
		}

		if ((strlen(utf8_decode($this->request->post['email'])) <= 0)) {
			$this->error['email'] = $this->language->get('error_email');
		}

		if ((strlen(utf8_decode($this->request->post['password'])) <= 0)) {
			$this->error['password'] = $this->language->get('error_password');
		}

		if ((strlen(utf8_decode($this->request->post['mobile'])) <= 0)) {
			$this->error['mobile'] = $this->language->get('error_mobile');
		}

		
    	return !$this->error;
  	}

  	protected function validateDelete() {
    	if (!$this->user->hasPermission('modify', 'manage/owners')) {
      		$this->error['warning'] = $this->language->get('error_permission');  
    	}
	  	
		return !$this->error;
  	}


public function autocomplete() {
 $json = array();

$this->load->model('catalog/manufacturer');	

$filter_data = array(

		'start'        => 0,
		'limit'        => 5
		);


$results = $this->model_catalog_manufacturer->getManufacturers($filter_data);
foreach ($results as $result) {
$json[] = array(
	'manufacturer_id' => $result['manufacturer_id'],
	'name'            => strip_tags(html_entity_decode($result['name'], ENT_QUOTES, 'UTF-8'))
);
}
$sort_order = array();
foreach ($json as $key => $value) {
 $sort_order[$key] = $value['name'];
}
array_multisort($sort_order, SORT_ASC, $json);
$this->response->addHeader('Content-Type: application/json');
$this->response->setOutput(json_encode($json));
 }
	
}
?>