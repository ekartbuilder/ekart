<?php
class ControllerManageSites extends Controller {
	private $error = array();
     
  	public function index() {
		$this->load->language('manage/sites');
    	
		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('manage/sites');
		
		$this->getList();
  	}
  
  	public function add() {
    	$this->load->language('manage/sites');

    	$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('manage/sites');
		
    	if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_manage_sites->addSites($this->request->post);
			
			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';
			
			
			if (isset($this->request->get['filter_owner_id'])) {
				$url .= '&filter_owner_id=' . $this->request->get['filter_owner_id'];
			}


			if (isset($this->request->get['filter_plan_id'])) {
				$url .= '&filter_plan_id=' . $this->request->get['filter_plan_id'];
			}


			if (isset($this->request->get['filter_sub_domain'])) {
				$url .= '&filter_sub_domain=' . $this->request->get['filter_sub_domain'];
			}


			if (isset($this->request->get['filter_site_type'])) {
				$url .= '&filter_site_type=' . $this->request->get['filter_site_type'];
			}


			if (isset($this->request->get['filter_live_date'])) {
				$url .= '&filter_live_date=' . $this->request->get['filter_live_date'];
			}


			if (isset($this->request->get['filter_active_status'])) {
				$url .= '&filter_active_status=' . $this->request->get['filter_active_status'];
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
						
			$this->response->redirect($this->url->link('manage/sites', 'token=' . $this->session->data['token'] . $url, 'SSL'));
    	}
    
    	$this->getForm();
  	}

  	public function edit() {
    	$this->load->language('manage/sites');

    	$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('manage/sites');
				
    	if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_manage_sites->editSites($this->request->get['site_id'], $this->request->post);
      		
			$this->session->data['success'] = $this->language->get('text_success');
	  
			$url = '';
			
			
			if (isset($this->request->get['filter_owner_id'])) {
				$url .= '&filter_owner_id=' . $this->request->get['filter_owner_id'];
			}


			if (isset($this->request->get['filter_plan_id'])) {
				$url .= '&filter_plan_id=' . $this->request->get['filter_plan_id'];
			}


			if (isset($this->request->get['filter_sub_domain'])) {
				$url .= '&filter_sub_domain=' . $this->request->get['filter_sub_domain'];
			}


			if (isset($this->request->get['filter_site_type'])) {
				$url .= '&filter_site_type=' . $this->request->get['filter_site_type'];
			}


			if (isset($this->request->get['filter_live_date'])) {
				$url .= '&filter_live_date=' . $this->request->get['filter_live_date'];
			}


			if (isset($this->request->get['filter_active_status'])) {
				$url .= '&filter_active_status=' . $this->request->get['filter_active_status'];
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
						
			$this->response->redirect($this->url->link('manage/sites', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}
    
    	$this->getForm();
  	}

  	public function delete() {
    	$this->load->language('manage/sites');

    	$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('manage/sites');
		
    	if (isset($this->request->post['selected']) && $this->validateDelete()) { 
			foreach ($this->request->post['selected'] as $site_id) {
				$this->model_manage_sites->deleteSites($site_id);
			}
      		
			$this->session->data['success'] = $this->language->get('text_success');
	  
			$url = '';
			
			
			if (isset($this->request->get['filter_owner_id'])) {
				$url .= '&filter_owner_id=' . $this->request->get['filter_owner_id'];
			}


			if (isset($this->request->get['filter_plan_id'])) {
				$url .= '&filter_plan_id=' . $this->request->get['filter_plan_id'];
			}


			if (isset($this->request->get['filter_sub_domain'])) {
				$url .= '&filter_sub_domain=' . $this->request->get['filter_sub_domain'];
			}


			if (isset($this->request->get['filter_site_type'])) {
				$url .= '&filter_site_type=' . $this->request->get['filter_site_type'];
			}


			if (isset($this->request->get['filter_live_date'])) {
				$url .= '&filter_live_date=' . $this->request->get['filter_live_date'];
			}


			if (isset($this->request->get['filter_active_status'])) {
				$url .= '&filter_active_status=' . $this->request->get['filter_active_status'];
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
						
			$this->response->redirect($this->url->link('manage/sites', 'token=' . $this->session->data['token'] . $url, 'SSL'));
    	}
	
    	$this->getList();
  	}

  	protected function getList() {
  		
  		
		if (isset($this->request->get['filter_owner_id'])) {
			$filter_owner_id = $this->request->get['filter_owner_id'];
		} else {
			$filter_owner_id = null;
		}


		if (isset($this->request->get['filter_plan_id'])) {
			$filter_plan_id = $this->request->get['filter_plan_id'];
		} else {
			$filter_plan_id = null;
		}


		if (isset($this->request->get['filter_sub_domain'])) {
			$filter_sub_domain = $this->request->get['filter_sub_domain'];
		} else {
			$filter_sub_domain = null;
		}


		if (isset($this->request->get['filter_site_type'])) {
			$filter_site_type = $this->request->get['filter_site_type'];
		} else {
			$filter_site_type = null;
		}


		if (isset($this->request->get['filter_live_date'])) {
			$filter_live_date = $this->request->get['filter_live_date'];
		} else {
			$filter_live_date = null;
		}


		if (isset($this->request->get['filter_active_status'])) {
			$filter_active_status = $this->request->get['filter_active_status'];
		} else {
			$filter_active_status = null;
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
			
		
			if (isset($this->request->get['filter_owner_id'])) {
				$url .= '&filter_owner_id=' . $this->request->get['filter_owner_id'];
			}


			if (isset($this->request->get['filter_plan_id'])) {
				$url .= '&filter_plan_id=' . $this->request->get['filter_plan_id'];
			}


			if (isset($this->request->get['filter_sub_domain'])) {
				$url .= '&filter_sub_domain=' . $this->request->get['filter_sub_domain'];
			}


			if (isset($this->request->get['filter_site_type'])) {
				$url .= '&filter_site_type=' . $this->request->get['filter_site_type'];
			}


			if (isset($this->request->get['filter_live_date'])) {
				$url .= '&filter_live_date=' . $this->request->get['filter_live_date'];
			}


			if (isset($this->request->get['filter_active_status'])) {
				$url .= '&filter_active_status=' . $this->request->get['filter_active_status'];
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
			'href'      => $this->url->link('manage/sites', 'token=' . $this->session->data['token'] . $url, 'SSL'),
      		'separator' => ' :: '
   		);
		
		
		$data['entry_owner_id'] = $this->language->get('entry_owner_id');
		$data['entry_plan_id'] = $this->language->get('entry_plan_id');
		$data['entry_sub_domain'] = $this->language->get('entry_sub_domain');
		$data['entry_domain'] = $this->language->get('entry_domain');
		$data['entry_site_type'] = $this->language->get('entry_site_type');
		$data['entry_live_date'] = $this->language->get('entry_live_date');
		$data['entry_active_status'] = $this->language->get('entry_active_status');
		$data['entry_date_added'] = $this->language->get('entry_date_added');
		$data['entry_status'] = $this->language->get('entry_status');
		$data['button_edit'] = $this->language->get('button_edit');	
		$data['button_add'] = $this->language->get('button_add');			
		$data['text_list'] = $this->language->get('text_list');					
		$data['add'] = $this->url->link('manage/sites/add', 'token=' . $this->session->data['token'] . $url, 'SSL');
		$data['delete'] = $this->url->link('manage/sites/delete', 'token=' . $this->session->data['token'] . $url, 'SSL');
		
		$data['sitess'] = array();

		$filter_data = array(
			
			'filter_owner_id' => $filter_owner_id,
			'filter_plan_id' => $filter_plan_id,
			'filter_sub_domain' => $filter_sub_domain,
			'filter_site_type' => $filter_site_type,
			'filter_live_date' => $filter_live_date,
			'filter_active_status' => $filter_active_status,
			'filter_date_added' => $filter_date_added,
			'filter_status' => $filter_status,			
			'sort'  => $sort,
			'order' => $order,
			'start' => ($page - 1) * $this->config->get('config_admin_limit'),
			'limit' => $this->config->get('config_admin_limit')
		);
		
		
		$display_data = array('display' => '1');
		$display_plans = $this->model_manage_sites->getPlans($display_data);
		$display_site_types = $this->model_manage_sites->getSiteTypes($display_data);
		$display_active_statuss = $this->model_manage_sites->getActiveStatuss($display_data);
		$display_statuss = $this->model_manage_sites->getStatuss($display_data);
		
		$sites_total = $this->model_manage_sites->getTotalSitess($filter_data);
	
		$results = $this->model_manage_sites->getSitess($filter_data);
 
    	foreach ($results as $result) {
						
			$data['sitess'][] = array(
				
				'site_id' => $result['site_id'],
				'owner_id' => $result['owner_id'],
				'plan_id' => $display_plans[$result['plan_id']],
				'sub_domain' => $result['sub_domain'],
				'domain' => $result['domain'],
				'site_type' => $display_site_types[$result['site_type']],
				'live_date' => date($this->language->get('datetime_format'), strtotime($result['live_date'])),
				'active_status' => $display_active_statuss[$result['active_status']],
				'date_added' => date($this->language->get('date_format_short'), strtotime($result['date_added'])),
				'status' => $display_statuss[$result['status']],
				'selected'   => isset($this->request->post['selected']) && in_array($result['site_id'], $this->request->post['selected']),
				'edit'     => $this->url->link('manage/sites/edit', 'token=' . $this->session->data['token'] . '&site_id=' . $result['site_id'] . $url, 'SSL')
				
			);
		}
									
		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_no_results'] = $this->language->get('text_no_results');

		
		$data['text_plan_id'] = $this->language->get('text_plan_id');
		$data['text_site_type'] = $this->language->get('text_site_type');
		$data['text_active_status'] = $this->language->get('text_active_status');
		$data['text_status'] = $this->language->get('text_status');
		$data['column_owner_id'] = $this->language->get('column_owner_id');
		$data['column_plan_id'] = $this->language->get('column_plan_id');
		$data['column_sub_domain'] = $this->language->get('column_sub_domain');
		$data['column_domain'] = $this->language->get('column_domain');
		$data['column_site_type'] = $this->language->get('column_site_type');
		$data['column_live_date'] = $this->language->get('column_live_date');
		$data['column_active_status'] = $this->language->get('column_active_status');
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
		
		
			if (isset($this->request->get['filter_owner_id'])) {
				$url .= '&filter_owner_id=' . $this->request->get['filter_owner_id'];
			}


			if (isset($this->request->get['filter_plan_id'])) {
				$url .= '&filter_plan_id=' . $this->request->get['filter_plan_id'];
			}


			if (isset($this->request->get['filter_sub_domain'])) {
				$url .= '&filter_sub_domain=' . $this->request->get['filter_sub_domain'];
			}


			if (isset($this->request->get['filter_site_type'])) {
				$url .= '&filter_site_type=' . $this->request->get['filter_site_type'];
			}


			if (isset($this->request->get['filter_live_date'])) {
				$url .= '&filter_live_date=' . $this->request->get['filter_live_date'];
			}


			if (isset($this->request->get['filter_active_status'])) {
				$url .= '&filter_active_status=' . $this->request->get['filter_active_status'];
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
		
		
		$data['sort_owner_id'] = $this->url->link('manage/sites', 'token=' . $this->session->data['token'] . '&sort=owner_id' . $url, 'SSL');
		$data['sort_plan_id'] = $this->url->link('manage/sites', 'token=' . $this->session->data['token'] . '&sort=plan_id' . $url, 'SSL');
		$data['sort_sub_domain'] = $this->url->link('manage/sites', 'token=' . $this->session->data['token'] . '&sort=sub_domain' . $url, 'SSL');
		$data['sort_domain'] = $this->url->link('manage/sites', 'token=' . $this->session->data['token'] . '&sort=domain' . $url, 'SSL');
		$data['sort_site_type'] = $this->url->link('manage/sites', 'token=' . $this->session->data['token'] . '&sort=site_type' . $url, 'SSL');
		$data['sort_live_date'] = $this->url->link('manage/sites', 'token=' . $this->session->data['token'] . '&sort=live_date' . $url, 'SSL');
		$data['sort_active_status'] = $this->url->link('manage/sites', 'token=' . $this->session->data['token'] . '&sort=active_status' . $url, 'SSL');
		$data['sort_date_added'] = $this->url->link('manage/sites', 'token=' . $this->session->data['token'] . '&sort=date_added' . $url, 'SSL');
		$data['sort_status'] = $this->url->link('manage/sites', 'token=' . $this->session->data['token'] . '&sort=status' . $url, 'SSL');
				
		$url = '';
		
		
			if (isset($this->request->get['filter_owner_id'])) {
				$url .= '&filter_owner_id=' . $this->request->get['filter_owner_id'];
			}


			if (isset($this->request->get['filter_plan_id'])) {
				$url .= '&filter_plan_id=' . $this->request->get['filter_plan_id'];
			}


			if (isset($this->request->get['filter_sub_domain'])) {
				$url .= '&filter_sub_domain=' . $this->request->get['filter_sub_domain'];
			}


			if (isset($this->request->get['filter_site_type'])) {
				$url .= '&filter_site_type=' . $this->request->get['filter_site_type'];
			}


			if (isset($this->request->get['filter_live_date'])) {
				$url .= '&filter_live_date=' . $this->request->get['filter_live_date'];
			}


			if (isset($this->request->get['filter_active_status'])) {
				$url .= '&filter_active_status=' . $this->request->get['filter_active_status'];
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
		$pagination->total = $sites_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_admin_limit');
		$pagination->text = $this->language->get('text_pagination');
		$pagination->url = $this->url->link('manage/sites', 'token=' . $this->session->data['token'] . $url . '&page={page}', 'SSL');
			
		$data['pagination'] = $pagination->render();
		
		$data['results'] = sprintf($this->language->get('text_pagination'), ($sites_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($sites_total - $this->config->get('config_limit_admin'))) ? $sites_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $sites_total, ceil($sites_total / $this->config->get('config_limit_admin')));
		
		
		$data['filter_owner_id'] = $filter_owner_id;
		$data['filter_plan_id'] = $filter_plan_id;
		$data['filter_sub_domain'] = $filter_sub_domain;
		$data['filter_site_type'] = $filter_site_type;
		$data['filter_live_date'] = $filter_live_date;
		$data['filter_active_status'] = $filter_active_status;
		$data['filter_date_added'] = $filter_date_added;
		$data['filter_status'] = $filter_status;
		
		$data['sort'] = $sort;
		$data['order'] = $order;
		
		
		$data['plans'] = $this->model_manage_sites->getPlans();
		$data['site_types'] = $this->model_manage_sites->getSiteTypes();
		$data['active_statuss'] = $this->model_manage_sites->getActiveStatuss();
		$data['statuss'] = $this->model_manage_sites->getStatuss();
		
		
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('manage/sites_list.tpl', $data));

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
		
		
		
		$data['entry_owner_id'] = $this->language->get('entry_owner_id');
		$data['entry_plan_id'] = $this->language->get('entry_plan_id');
		$data['entry_sub_domain'] = $this->language->get('entry_sub_domain');
		$data['entry_domain'] = $this->language->get('entry_domain');
		$data['entry_site_type'] = $this->language->get('entry_site_type');
		$data['entry_live_date'] = $this->language->get('entry_live_date');
		$data['entry_active_status'] = $this->language->get('entry_active_status');
		$data['entry_status'] = $this->language->get('entry_status');

    	$data['button_save'] = $this->language->get('button_save');
    	$data['button_cancel'] = $this->language->get('button_cancel');

		$data['tab_general'] = $this->language->get('tab_general');
		$data['tab_sites_history'] = $this->language->get('tab_sites_history');

		$data['token'] = $this->session->data['token'];
	
		if (isset($this->request->get['site_id'])) {
			$data['site_id'] = $this->request->get['site_id'];
		} else {
			$data['site_id'] = 0;
		}
				
 		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}
	 	
	 	
		if (isset($this->error['owner_id'])) {
			$data['error_owner_id'] = $this->error['owner_id'];
		} else {
			$data['error_owner_id'] = '';
		}


		if (isset($this->error['plan_id'])) {
			$data['error_plan_id'] = $this->error['plan_id'];
		} else {
			$data['error_plan_id'] = '';
		}


		if (isset($this->error['sub_domain'])) {
			$data['error_sub_domain'] = $this->error['sub_domain'];
		} else {
			$data['error_sub_domain'] = '';
		}


		if (isset($this->error['domain'])) {
			$data['error_domain'] = $this->error['domain'];
		} else {
			$data['error_domain'] = '';
		}


		if (isset($this->error['site_type'])) {
			$data['error_site_type'] = $this->error['site_type'];
		} else {
			$data['error_site_type'] = '';
		}


		if (isset($this->error['live_date'])) {
			$data['error_live_date'] = $this->error['live_date'];
		} else {
			$data['error_live_date'] = '';
		}


		if (isset($this->error['active_status'])) {
			$data['error_active_status'] = $this->error['active_status'];
		} else {
			$data['error_active_status'] = '';
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
			'href'      => $this->url->link('manage/sites', 'token=' . $this->session->data['token'] . $url, 'SSL'),
      		'separator' => ' :: '
   		);
									
		if (!isset($this->request->get['site_id'])) {
			$data['action'] = $this->url->link('manage/sites/add', 'token=' . $this->session->data['token'] . $url, 'SSL');
		} else {
			$data['action'] = $this->url->link('manage/sites/edit', 'token=' . $this->session->data['token'] . '&site_id=' . $this->request->get['site_id'] . $url, 'SSL');
		}
		
		$data['cancel'] = $this->url->link('manage/sites', 'token=' . $this->session->data['token'] . $url, 'SSL');
  		
		if (isset($this->request->get['site_id']) && (!$this->request->server['REQUEST_METHOD'] != 'POST')) {
      		$sites_info = $this->model_manage_sites->getSites($this->request->get['site_id']);
    	}
		
		
		if (isset($this->request->post['owner_id'])) {
			$data['owner_id'] = $this->request->post['owner_id'];
		} elseif (isset($sites_info)) {
			$data['owner_id'] = $sites_info['owner_id'];
		} else {
			$data['owner_id'] = '';
		}

		if (isset($this->request->post['plan_id'])) {
			$data['plan_id'] = $this->request->post['plan_id'];
		} elseif (isset($sites_info)) {
			$data['plan_id'] = $sites_info['plan_id'];
		} else {
			$data['plan_id'] = '';
		}

		if (isset($this->request->post['sub_domain'])) {
			$data['sub_domain'] = $this->request->post['sub_domain'];
		} elseif (isset($sites_info)) {
			$data['sub_domain'] = $sites_info['sub_domain'];
		} else {
			$data['sub_domain'] = '';
		}

		if (isset($this->request->post['domain'])) {
			$data['domain'] = $this->request->post['domain'];
		} elseif (isset($sites_info)) {
			$data['domain'] = $sites_info['domain'];
		} else {
			$data['domain'] = '';
		}

		if (isset($this->request->post['site_type'])) {
			$data['site_type'] = $this->request->post['site_type'];
		} elseif (isset($sites_info)) {
			$data['site_type'] = $sites_info['site_type'];
		} else {
			$data['site_type'] = '';
		}

		if (isset($this->request->post['live_date'])) {
			$data['live_date'] = $this->request->post['live_date'];
		} elseif (isset($sites_info)) {
			$data['live_date'] = $sites_info['live_date'];
		} else {
			$data['live_date'] = '';
		}

		if (isset($this->request->post['active_status'])) {
			$data['active_status'] = $this->request->post['active_status'];
		} elseif (isset($sites_info)) {
			$data['active_status'] = $sites_info['active_status'];
		} else {
			$data['active_status'] = '';
		}

		if (isset($this->request->post['status'])) {
			$data['status'] = $this->request->post['status'];
		} elseif (isset($sites_info)) {
			$data['status'] = $sites_info['status'];
		} else {
			$data['status'] = '';
		}

		$data['plan_ids'] = $this->model_manage_sites->getPlans();

		$data['site_types'] = $this->model_manage_sites->getSiteTypes();

		$data['active_statuss'] = $this->model_manage_sites->getActiveStatuss();

		$data['statuss'] = $this->model_manage_sites->getStatuss();


        $data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('manage/sites_form.tpl', $data));		
  	}
	
  	protected function validateForm() {
    	if (!$this->user->hasPermission('modify', 'manage/sites')) {
      		$this->error['warning'] = $this->language->get('error_permission');
    	}
      	
      	
		if ((strlen(utf8_decode($this->request->post['plan_id'])) <= 0)) {
			$this->error['plan_id'] = $this->language->get('error_plan_id');
		}

		if ((strlen(utf8_decode($this->request->post['sub_domain'])) <= 0)) {
			$this->error['sub_domain'] = $this->language->get('error_sub_domain');
		}

		
    	return !$this->error;
  	}

  	protected function validateDelete() {
    	if (!$this->user->hasPermission('modify', 'manage/sites')) {
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