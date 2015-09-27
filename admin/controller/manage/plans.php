<?php
class ControllerManagePlans extends Controller {
	private $error = array();
     
  	public function index() {
		$this->load->language('manage/plans');
    	
		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('manage/plans');
		
		$this->getList();
  	}
  
  	public function add() {
    	$this->load->language('manage/plans');

    	$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('manage/plans');
		
    	if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_manage_plans->addPlans($this->request->post);
			
			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';
			
			
			if (isset($this->request->get['filter_name'])) {
				$url .= '&filter_name=' . $this->request->get['filter_name'];
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
						
			$this->response->redirect($this->url->link('manage/plans', 'token=' . $this->session->data['token'] . $url, 'SSL'));
    	}
    
    	$this->getForm();
  	}

  	public function edit() {
    	$this->load->language('manage/plans');

    	$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('manage/plans');
				
    	if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_manage_plans->editPlans($this->request->get['plan_id'], $this->request->post);
      		
			$this->session->data['success'] = $this->language->get('text_success');
	  
			$url = '';
			
			
			if (isset($this->request->get['filter_name'])) {
				$url .= '&filter_name=' . $this->request->get['filter_name'];
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
						
			$this->response->redirect($this->url->link('manage/plans', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}
    
    	$this->getForm();
  	}

  	public function delete() {
    	$this->load->language('manage/plans');

    	$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('manage/plans');
		
    	if (isset($this->request->post['selected']) && $this->validateDelete()) { 
			foreach ($this->request->post['selected'] as $plan_id) {
				$this->model_manage_plans->deletePlans($plan_id);
			}
      		
			$this->session->data['success'] = $this->language->get('text_success');
	  
			$url = '';
			
			
			if (isset($this->request->get['filter_name'])) {
				$url .= '&filter_name=' . $this->request->get['filter_name'];
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
						
			$this->response->redirect($this->url->link('manage/plans', 'token=' . $this->session->data['token'] . $url, 'SSL'));
    	}
	
    	$this->getList();
  	}

  	protected function getList() {
  		
  		
		if (isset($this->request->get['filter_name'])) {
			$filter_name = $this->request->get['filter_name'];
		} else {
			$filter_name = null;
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
			
		
			if (isset($this->request->get['filter_name'])) {
				$url .= '&filter_name=' . $this->request->get['filter_name'];
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
			'href'      => $this->url->link('manage/plans', 'token=' . $this->session->data['token'] . $url, 'SSL'),
      		'separator' => ' :: '
   		);
		
		
		$data['entry_name'] = $this->language->get('entry_name');
		$data['entry_status'] = $this->language->get('entry_status');
		$data['button_edit'] = $this->language->get('button_edit');	
		$data['button_add'] = $this->language->get('button_add');			
		$data['text_list'] = $this->language->get('text_list');					
		$data['add'] = $this->url->link('manage/plans/add', 'token=' . $this->session->data['token'] . $url, 'SSL');
		$data['delete'] = $this->url->link('manage/plans/delete', 'token=' . $this->session->data['token'] . $url, 'SSL');
		
		$data['planss'] = array();

		$filter_data = array(
			
			'filter_name' => $filter_name,
			'filter_date_added' => $filter_date_added,
			'filter_status' => $filter_status,			
			'sort'  => $sort,
			'order' => $order,
			'start' => ($page - 1) * $this->config->get('config_admin_limit'),
			'limit' => $this->config->get('config_admin_limit')
		);
		
		
		$display_data = array('display' => '1');
		$display_statuss = $this->model_manage_plans->getStatuss($display_data);
		
		$plans_total = $this->model_manage_plans->getTotalPlanss($filter_data);
	
		$results = $this->model_manage_plans->getPlanss($filter_data);
 
    	foreach ($results as $result) {
						
			$data['planss'][] = array(
				
				'plan_id' => $result['plan_id'],
				'plan_id' => $result['plan_id'],
				'name' => $result['name'],
				'date_added' => date($this->language->get('date_format_short'), strtotime($result['date_added'])),
				'status' => $display_statuss[$result['status']],
				'selected'   => isset($this->request->post['selected']) && in_array($result['plan_id'], $this->request->post['selected']),
				'edit'     => $this->url->link('manage/plans/edit', 'token=' . $this->session->data['token'] . '&plan_id=' . $result['plan_id'] . $url, 'SSL')
				
			);
		}
									
		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_no_results'] = $this->language->get('text_no_results');

		
		$data['text_status'] = $this->language->get('text_status');
		$data['column_plan_id'] = $this->language->get('column_plan_id');
		$data['column_name'] = $this->language->get('column_name');
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
		
		
			if (isset($this->request->get['filter_name'])) {
				$url .= '&filter_name=' . $this->request->get['filter_name'];
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
		
		
		$data['sort_plan_id'] = $this->url->link('manage/plans', 'token=' . $this->session->data['token'] . '&sort=plan_id' . $url, 'SSL');
		$data['sort_name'] = $this->url->link('manage/plans', 'token=' . $this->session->data['token'] . '&sort=name' . $url, 'SSL');
		$data['sort_date_added'] = $this->url->link('manage/plans', 'token=' . $this->session->data['token'] . '&sort=date_added' . $url, 'SSL');
		$data['sort_status'] = $this->url->link('manage/plans', 'token=' . $this->session->data['token'] . '&sort=status' . $url, 'SSL');
				
		$url = '';
		
		
			if (isset($this->request->get['filter_name'])) {
				$url .= '&filter_name=' . $this->request->get['filter_name'];
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
		$pagination->total = $plans_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_admin_limit');
		$pagination->text = $this->language->get('text_pagination');
		$pagination->url = $this->url->link('manage/plans', 'token=' . $this->session->data['token'] . $url . '&page={page}', 'SSL');
			
		$data['pagination'] = $pagination->render();
		
		$data['results'] = sprintf($this->language->get('text_pagination'), ($plans_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($plans_total - $this->config->get('config_limit_admin'))) ? $plans_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $plans_total, ceil($plans_total / $this->config->get('config_limit_admin')));
		
		
		$data['filter_name'] = $filter_name;
		$data['filter_date_added'] = $filter_date_added;
		$data['filter_status'] = $filter_status;
		
		$data['sort'] = $sort;
		$data['order'] = $order;
		
		
		$data['statuss'] = $this->model_manage_plans->getStatuss();
		
		
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('manage/plans_list.tpl', $data));

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
		
		
		
		$data['entry_name'] = $this->language->get('entry_name');
		$data['entry_status'] = $this->language->get('entry_status');

    	$data['button_save'] = $this->language->get('button_save');
    	$data['button_cancel'] = $this->language->get('button_cancel');

		$data['tab_general'] = $this->language->get('tab_general');
		$data['tab_plans_history'] = $this->language->get('tab_plans_history');

		$data['token'] = $this->session->data['token'];
	
		if (isset($this->request->get['plan_id'])) {
			$data['plan_id'] = $this->request->get['plan_id'];
		} else {
			$data['plan_id'] = 0;
		}
				
 		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}
	 	
	 	
		if (isset($this->error['name'])) {
			$data['error_name'] = $this->error['name'];
		} else {
			$data['error_name'] = '';
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
			'href'      => $this->url->link('manage/plans', 'token=' . $this->session->data['token'] . $url, 'SSL'),
      		'separator' => ' :: '
   		);
									
		if (!isset($this->request->get['plan_id'])) {
			$data['action'] = $this->url->link('manage/plans/add', 'token=' . $this->session->data['token'] . $url, 'SSL');
		} else {
			$data['action'] = $this->url->link('manage/plans/edit', 'token=' . $this->session->data['token'] . '&plan_id=' . $this->request->get['plan_id'] . $url, 'SSL');
		}
		
		$data['cancel'] = $this->url->link('manage/plans', 'token=' . $this->session->data['token'] . $url, 'SSL');
  		
		if (isset($this->request->get['plan_id']) && (!$this->request->server['REQUEST_METHOD'] != 'POST')) {
      		$plans_info = $this->model_manage_plans->getPlans($this->request->get['plan_id']);
    	}
		
		
		if (isset($this->request->post['name'])) {
			$data['name'] = $this->request->post['name'];
		} elseif (isset($plans_info)) {
			$data['name'] = $plans_info['name'];
		} else {
			$data['name'] = '';
		}

		if (isset($this->request->post['status'])) {
			$data['status'] = $this->request->post['status'];
		} elseif (isset($plans_info)) {
			$data['status'] = $plans_info['status'];
		} else {
			$data['status'] = '';
		}

		$data['statuss'] = $this->model_manage_plans->getStatuss();


        $data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('manage/plans_form.tpl', $data));		
  	}
	
  	protected function validateForm() {
    	if (!$this->user->hasPermission('modify', 'manage/plans')) {
      		$this->error['warning'] = $this->language->get('error_permission');
    	}
      	
      	
		if ((strlen(utf8_decode($this->request->post['name'])) <= 0)) {
			$this->error['name'] = $this->language->get('error_name');
		}

		if ((strlen(utf8_decode($this->request->post['status'])) <= 0)) {
			$this->error['status'] = $this->language->get('error_status');
		}

		
    	return !$this->error;
  	}

  	protected function validateDelete() {
    	if (!$this->user->hasPermission('modify', 'manage/plans')) {
      		$this->error['warning'] = $this->language->get('error_permission');  
    	}
	  	
		return !$this->error;
  	}		
}
?>