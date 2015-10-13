<?php
class ControllerManageApps extends Controller {
	private $error = array();
     
  	public function index() {
		$this->load->language('manage/apps');
    	
		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('manage/apps');
		
		$this->getList();
  	}
  
  	public function add() {
    	$this->load->language('manage/apps');

    	$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('manage/apps');
		
    	if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_manage_apps->addApps($this->request->post);
			
			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';
			
			
			if (isset($this->request->get['filter_app_id'])) {
				$url .= '&filter_app_id=' . $this->request->get['filter_app_id'];
			}


			if (isset($this->request->get['filter_name'])) {
				$url .= '&filter_name=' . $this->request->get['filter_name'];
			}


			if (isset($this->request->get['filter_category'])) {
				$url .= '&filter_category=' . $this->request->get['filter_category'];
			}


			if (isset($this->request->get['filter_type'])) {
				$url .= '&filter_type=' . $this->request->get['filter_type'];
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
						
			$this->response->redirect($this->url->link('manage/apps', 'token=' . $this->session->data['token'] . $url, 'SSL'));
    	}
    
    	$this->getForm();
  	}

  	public function edit() {
    	$this->load->language('manage/apps');

    	$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('manage/apps');
				
    	if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_manage_apps->editApps($this->request->get['app_id'], $this->request->post);
      		
			$this->session->data['success'] = $this->language->get('text_success');
	  
			$url = '';
			
			
			if (isset($this->request->get['filter_app_id'])) {
				$url .= '&filter_app_id=' . $this->request->get['filter_app_id'];
			}


			if (isset($this->request->get['filter_name'])) {
				$url .= '&filter_name=' . $this->request->get['filter_name'];
			}


			if (isset($this->request->get['filter_category'])) {
				$url .= '&filter_category=' . $this->request->get['filter_category'];
			}


			if (isset($this->request->get['filter_type'])) {
				$url .= '&filter_type=' . $this->request->get['filter_type'];
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
						
			$this->response->redirect($this->url->link('manage/apps', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}
    
    	$this->getForm();
  	}

  	public function delete() {
    	$this->load->language('manage/apps');

    	$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('manage/apps');
		
    	if (isset($this->request->post['selected']) && $this->validateDelete()) { 
			foreach ($this->request->post['selected'] as $app_id) {
				$this->model_manage_apps->deleteApps($app_id);
			}
      		
			$this->session->data['success'] = $this->language->get('text_success');
	  
			$url = '';
			
			
			if (isset($this->request->get['filter_app_id'])) {
				$url .= '&filter_app_id=' . $this->request->get['filter_app_id'];
			}


			if (isset($this->request->get['filter_name'])) {
				$url .= '&filter_name=' . $this->request->get['filter_name'];
			}


			if (isset($this->request->get['filter_category'])) {
				$url .= '&filter_category=' . $this->request->get['filter_category'];
			}


			if (isset($this->request->get['filter_type'])) {
				$url .= '&filter_type=' . $this->request->get['filter_type'];
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
						
			$this->response->redirect($this->url->link('manage/apps', 'token=' . $this->session->data['token'] . $url, 'SSL'));
    	}
	
    	$this->getList();
  	}

  	protected function getList() {
  		
  		
		if (isset($this->request->get['filter_app_id'])) {
			$filter_app_id = $this->request->get['filter_app_id'];
		} else {
			$filter_app_id = null;
		}


		if (isset($this->request->get['filter_name'])) {
			$filter_name = $this->request->get['filter_name'];
		} else {
			$filter_name = null;
		}


		if (isset($this->request->get['filter_category'])) {
			$filter_category = $this->request->get['filter_category'];
		} else {
			$filter_category = null;
		}


		if (isset($this->request->get['filter_type'])) {
			$filter_type = $this->request->get['filter_type'];
		} else {
			$filter_type = null;
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
			
		
			if (isset($this->request->get['filter_app_id'])) {
				$url .= '&filter_app_id=' . $this->request->get['filter_app_id'];
			}


			if (isset($this->request->get['filter_name'])) {
				$url .= '&filter_name=' . $this->request->get['filter_name'];
			}


			if (isset($this->request->get['filter_category'])) {
				$url .= '&filter_category=' . $this->request->get['filter_category'];
			}


			if (isset($this->request->get['filter_type'])) {
				$url .= '&filter_type=' . $this->request->get['filter_type'];
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
			'href'      => $this->url->link('manage/apps', 'token=' . $this->session->data['token'] . $url, 'SSL'),
      		'separator' => ' :: '
   		);
		
		
		$data['entry_app_id'] = $this->language->get('entry_app_id');
		$data['entry_name'] = $this->language->get('entry_name');
		$data['entry_category'] = $this->language->get('entry_category');
		$data['entry_image'] = $this->language->get('entry_image');
		$data['entry_type'] = $this->language->get('entry_type');
		$data['entry_date_added'] = $this->language->get('entry_date_added');
		$data['entry_status'] = $this->language->get('entry_status');
		$data['button_edit'] = $this->language->get('button_edit');	
		$data['button_add'] = $this->language->get('button_add');			
		$data['text_list'] = $this->language->get('text_list');					
		$data['add'] = $this->url->link('manage/apps/add', 'token=' . $this->session->data['token'] . $url, 'SSL');
		$data['delete'] = $this->url->link('manage/apps/delete', 'token=' . $this->session->data['token'] . $url, 'SSL');
		
		$data['appss'] = array();

		$filter_data = array(
			
			'filter_app_id' => $filter_app_id,
			'filter_name' => $filter_name,
			'filter_category' => $filter_category,
			'filter_type' => $filter_type,
			'filter_date_added' => $filter_date_added,
			'filter_status' => $filter_status,			
			'sort'  => $sort,
			'order' => $order,
			'start'           => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit'           => $this->config->get('config_limit_admin')
		);
		
		
		$display_data = array('display' => '1');
		$display_categorys = $this->model_manage_apps->getCategorys($display_data);
		$display_types = $this->model_manage_apps->getTypes($display_data);
		$display_statuss = $this->model_manage_apps->getStatuss($display_data);
		
		$apps_total = $this->model_manage_apps->getTotalAppss($filter_data);
	
		$results = $this->model_manage_apps->getAppss($filter_data);
 
    	foreach ($results as $result) {
						
			$data['appss'][] = array(
				
				'app_id' => $result['app_id'],
				'app_id' => $result['app_id'],
				'name' => $result['name'],
				'category' => $display_categorys[$result['category']],
				'image' => $result['image'],
				'type' => $display_types[$result['type']],
				'date_added' => date($this->language->get('date_format_short'), strtotime($result['date_added'])),
				'status' => $display_statuss[$result['status']],
				'selected'   => isset($this->request->post['selected']) && in_array($result['app_id'], $this->request->post['selected']),
				'edit'     => $this->url->link('manage/apps/edit', 'token=' . $this->session->data['token'] . '&app_id=' . $result['app_id'] . $url, 'SSL')
				
			);
		}
									
		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_no_results'] = $this->language->get('text_no_results');

		
		$data['text_category'] = $this->language->get('text_category');
		$data['text_type'] = $this->language->get('text_type');
		$data['text_status'] = $this->language->get('text_status');
		$data['column_app_id'] = $this->language->get('column_app_id');
		$data['column_name'] = $this->language->get('column_name');
		$data['column_category'] = $this->language->get('column_category');
		$data['column_image'] = $this->language->get('column_image');
		$data['column_type'] = $this->language->get('column_type');
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
		
		
			if (isset($this->request->get['filter_app_id'])) {
				$url .= '&filter_app_id=' . $this->request->get['filter_app_id'];
			}


			if (isset($this->request->get['filter_name'])) {
				$url .= '&filter_name=' . $this->request->get['filter_name'];
			}


			if (isset($this->request->get['filter_category'])) {
				$url .= '&filter_category=' . $this->request->get['filter_category'];
			}


			if (isset($this->request->get['filter_type'])) {
				$url .= '&filter_type=' . $this->request->get['filter_type'];
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
		
		
		$data['sort_app_id'] = $this->url->link('manage/apps', 'token=' . $this->session->data['token'] . '&sort=app_id' . $url, 'SSL');
		$data['sort_name'] = $this->url->link('manage/apps', 'token=' . $this->session->data['token'] . '&sort=name' . $url, 'SSL');
		$data['sort_category'] = $this->url->link('manage/apps', 'token=' . $this->session->data['token'] . '&sort=category' . $url, 'SSL');
		$data['sort_image'] = 'javascript:void(0)';
		$data['sort_type'] = $this->url->link('manage/apps', 'token=' . $this->session->data['token'] . '&sort=type' . $url, 'SSL');
		$data['sort_date_added'] = $this->url->link('manage/apps', 'token=' . $this->session->data['token'] . '&sort=date_added' . $url, 'SSL');
		$data['sort_status'] = $this->url->link('manage/apps', 'token=' . $this->session->data['token'] . '&sort=status' . $url, 'SSL');
				
		$url = '';
		
		
			if (isset($this->request->get['filter_app_id'])) {
				$url .= '&filter_app_id=' . $this->request->get['filter_app_id'];
			}


			if (isset($this->request->get['filter_name'])) {
				$url .= '&filter_name=' . $this->request->get['filter_name'];
			}


			if (isset($this->request->get['filter_category'])) {
				$url .= '&filter_category=' . $this->request->get['filter_category'];
			}


			if (isset($this->request->get['filter_type'])) {
				$url .= '&filter_type=' . $this->request->get['filter_type'];
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
		$pagination->total = $apps_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->text = $this->language->get('text_pagination');
		$pagination->url = $this->url->link('manage/apps', 'token=' . $this->session->data['token'] . $url . '&page={page}', 'SSL');
			
		$data['pagination'] = $pagination->render();
		
		$data['results'] = sprintf($this->language->get('text_pagination'), ($apps_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($apps_total - $this->config->get('config_limit_admin'))) ? $apps_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $apps_total, ceil($apps_total / $this->config->get('config_limit_admin')));
		
		
		$data['filter_app_id'] = $filter_app_id;
		$data['filter_name'] = $filter_name;
		$data['filter_category'] = $filter_category;
		$data['filter_type'] = $filter_type;
		$data['filter_date_added'] = $filter_date_added;
		$data['filter_status'] = $filter_status;
		
		$data['sort'] = $sort;
		$data['order'] = $order;
		
		
		$data['categorys'] = $this->model_manage_apps->getCategorys();
		$data['types'] = $this->model_manage_apps->getTypes();
		$data['statuss'] = $this->model_manage_apps->getStatuss();
		
		
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('manage/apps_list.tpl', $data));

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
		$data['entry_short_info'] = $this->language->get('entry_short_info');
		$data['entry_description'] = $this->language->get('entry_description');
		$data['entry_category'] = $this->language->get('entry_category');
		$data['entry_image'] = $this->language->get('entry_image');
		$data['entry_route'] = $this->language->get('entry_route');
		$data['entry_link'] = $this->language->get('entry_link');
		$data['entry_type'] = $this->language->get('entry_type');
		$data['entry_status'] = $this->language->get('entry_status');

    	$data['button_save'] = $this->language->get('button_save');
    	$data['button_cancel'] = $this->language->get('button_cancel');

		$data['tab_general'] = $this->language->get('tab_general');
		$data['tab_apps_history'] = $this->language->get('tab_apps_history');

		$data['token'] = $this->session->data['token'];
	
		if (isset($this->request->get['app_id'])) {
			$data['app_id'] = $this->request->get['app_id'];
		} else {
			$data['app_id'] = 0;
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


		if (isset($this->error['short_info'])) {
			$data['error_short_info'] = $this->error['short_info'];
		} else {
			$data['error_short_info'] = '';
		}


		if (isset($this->error['description'])) {
			$data['error_description'] = $this->error['description'];
		} else {
			$data['error_description'] = '';
		}


		if (isset($this->error['category'])) {
			$data['error_category'] = $this->error['category'];
		} else {
			$data['error_category'] = '';
		}


		if (isset($this->error['image'])) {
			$data['error_image'] = $this->error['image'];
		} else {
			$data['error_image'] = '';
		}


		if (isset($this->error['route'])) {
			$data['error_route'] = $this->error['route'];
		} else {
			$data['error_route'] = '';
		}


		if (isset($this->error['link'])) {
			$data['error_link'] = $this->error['link'];
		} else {
			$data['error_link'] = '';
		}


		if (isset($this->error['type'])) {
			$data['error_type'] = $this->error['type'];
		} else {
			$data['error_type'] = '';
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
			'href'      => $this->url->link('manage/apps', 'token=' . $this->session->data['token'] . $url, 'SSL'),
      		'separator' => ' :: '
   		);
									
		if (!isset($this->request->get['app_id'])) {
			$data['action'] = $this->url->link('manage/apps/add', 'token=' . $this->session->data['token'] . $url, 'SSL');
		} else {
			$data['action'] = $this->url->link('manage/apps/edit', 'token=' . $this->session->data['token'] . '&app_id=' . $this->request->get['app_id'] . $url, 'SSL');
		}
		
		$data['cancel'] = $this->url->link('manage/apps', 'token=' . $this->session->data['token'] . $url, 'SSL');
  		
		if (isset($this->request->get['app_id']) && (!$this->request->server['REQUEST_METHOD'] != 'POST')) {
      		$apps_info = $this->model_manage_apps->getApps($this->request->get['app_id']);
    	}
		
		
		if (isset($this->request->post['name'])) {
			$data['name'] = $this->request->post['name'];
		} elseif (isset($apps_info)) {
			$data['name'] = $apps_info['name'];
		} else {
			$data['name'] = '';
		}

		if (isset($this->request->post['short_info'])) {
			$data['short_info'] = $this->request->post['short_info'];
		} elseif (isset($apps_info)) {
			$data['short_info'] = $apps_info['short_info'];
		} else {
			$data['short_info'] = '';
		}

		if (isset($this->request->post['description'])) {
			$data['description'] = $this->request->post['description'];
		} elseif (isset($apps_info)) {
			$data['description'] = $apps_info['description'];
		} else {
			$data['description'] = '';
		}

		if (isset($this->request->post['category'])) {
			$data['category'] = $this->request->post['category'];
		} elseif (isset($apps_info)) {
			$data['category'] = $apps_info['category'];
		} else {
			$data['category'] = '';
		}

$this->load->model('tool/image');	
		if (isset($this->request->post['image']) && is_file(DIR_IMAGE . $this->request->post['image'])) {
			$data['thumb']= $this->model_tool_image->resize($this->request->post['image'], 100, 100);
		} elseif (!empty($apps_info) && is_file(DIR_IMAGE . $apps_info['image'])) {
			$data['thumb'] = $this->model_tool_image->resize($apps_info['image'], 100, 100);
		} else {
			$data['thumb'] = $this->model_tool_image->resize('no_image.png', 100, 100);
	}

		if (isset($this->request->post['image'])) {
			$data['image']= $this->request->post['image'];
		} elseif (!empty($apps_info)) {
			$data['image'] = $apps_info['image'];
		} else {
			$data['image'] = '';
		}

		if (isset($this->request->post['auto_route'])) {
			$data['auto_route']= $this->request->post['auto_route'];
		} elseif (isset($apps_info)) {
			$data['auto_route'] = $apps_info['auto_route'];
		} else {
			$data['auto_route'] = '';
		}

		if (isset($this->request->post['link'])) {
			$data['link'] = $this->request->post['link'];
		} elseif (isset($apps_info)) {
			$data['link'] = $apps_info['link'];
		} else {
			$data['link'] = '';
		}

		if (isset($this->request->post['type'])) {
			$data['type'] = $this->request->post['type'];
		} elseif (isset($apps_info)) {
			$data['type'] = $apps_info['type'];
		} else {
			$data['type'] = '';
		}

		if (isset($this->request->post['status'])) {
			$data['status'] = $this->request->post['status'];
		} elseif (isset($apps_info)) {
			$data['status'] = $apps_info['status'];
		} else {
			$data['status'] = '';
		}

		$data['categorys'] = $this->model_manage_apps->getCategorys();

		$data['types'] = $this->model_manage_apps->getTypes();

		$data['statuss'] = $this->model_manage_apps->getStatuss();


        $data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('manage/apps_form.tpl', $data));		
  	}
	
  	protected function validateForm() {
    	if (!$this->user->hasPermission('modify', 'manage/apps')) {
      		$this->error['warning'] = $this->language->get('error_permission');
    	}
      	
      	
		if ((strlen(utf8_decode($this->request->post['name'])) <= 0)) {
			$this->error['name'] = $this->language->get('error_name');
		}

		if ((strlen(utf8_decode($this->request->post['route'])) <= 0)) {
			$this->error['route'] = $this->language->get('error_route');
		}

		
		if ($this->error && !isset($this->error['warning'])) {
			$this->error['warning'] = $this->language->get('error_warning');
		}
		
    	return !$this->error;
  	}

  	protected function validateDelete() {
    	if (!$this->user->hasPermission('modify', 'manage/apps')) {
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