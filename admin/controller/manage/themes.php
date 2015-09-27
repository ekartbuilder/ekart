<?php
class ControllerManageThemes extends Controller {
	private $error = array();
     
  	public function index() {
		$this->load->language('manage/themes');
    	
		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('manage/themes');
		
		$this->getList();
  	}
  
  	public function add() {
    	$this->load->language('manage/themes');

    	$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('manage/themes');
		
    	if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_manage_themes->addThemes($this->request->post);
			
			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';
			
			
			if (isset($this->request->get['filter_name'])) {
				$url .= '&filter_name=' . $this->request->get['filter_name'];
			}


			if (isset($this->request->get['filter_category'])) {
				$url .= '&filter_category=' . $this->request->get['filter_category'];
			}


			if (isset($this->request->get['filter_image'])) {
				$url .= '&filter_image=' . $this->request->get['filter_image'];
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
						
			$this->response->redirect($this->url->link('manage/themes', 'token=' . $this->session->data['token'] . $url, 'SSL'));
    	}
    
    	$this->getForm();
  	}

  	public function edit() {
    	$this->load->language('manage/themes');

    	$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('manage/themes');
				
    	if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_manage_themes->editThemes($this->request->get['theme_id'], $this->request->post);
      		
			$this->session->data['success'] = $this->language->get('text_success');
	  
			$url = '';
			
			
			if (isset($this->request->get['filter_name'])) {
				$url .= '&filter_name=' . $this->request->get['filter_name'];
			}


			if (isset($this->request->get['filter_category'])) {
				$url .= '&filter_category=' . $this->request->get['filter_category'];
			}


			if (isset($this->request->get['filter_image'])) {
				$url .= '&filter_image=' . $this->request->get['filter_image'];
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
						
			$this->response->redirect($this->url->link('manage/themes', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}
    
    	$this->getForm();
  	}

  	public function delete() {
    	$this->load->language('manage/themes');

    	$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('manage/themes');
		
    	if (isset($this->request->post['selected']) && $this->validateDelete()) { 
			foreach ($this->request->post['selected'] as $theme_id) {
				$this->model_manage_themes->deleteThemes($theme_id);
			}
      		
			$this->session->data['success'] = $this->language->get('text_success');
	  
			$url = '';
			
			
			if (isset($this->request->get['filter_name'])) {
				$url .= '&filter_name=' . $this->request->get['filter_name'];
			}


			if (isset($this->request->get['filter_category'])) {
				$url .= '&filter_category=' . $this->request->get['filter_category'];
			}


			if (isset($this->request->get['filter_image'])) {
				$url .= '&filter_image=' . $this->request->get['filter_image'];
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
						
			$this->response->redirect($this->url->link('manage/themes', 'token=' . $this->session->data['token'] . $url, 'SSL'));
    	}
	
    	$this->getList();
  	}

  	protected function getList() {
  		
  		
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


		if (isset($this->request->get['filter_image'])) {
			$filter_image = $this->request->get['filter_image'];
		} else {
			$filter_image = null;
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


			if (isset($this->request->get['filter_category'])) {
				$url .= '&filter_category=' . $this->request->get['filter_category'];
			}


			if (isset($this->request->get['filter_image'])) {
				$url .= '&filter_image=' . $this->request->get['filter_image'];
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
			'href'      => $this->url->link('manage/themes', 'token=' . $this->session->data['token'] . $url, 'SSL'),
      		'separator' => ' :: '
   		);
		
		
		$data['entry_name'] = $this->language->get('entry_name');
		$data['entry_short_info'] = $this->language->get('entry_short_info');
		$data['entry_description'] = $this->language->get('entry_description');
		$data['entry_category'] = $this->language->get('entry_category');
		$data['entry_image'] = $this->language->get('entry_image');
		$data['entry_demo_link'] = $this->language->get('entry_demo_link');
		$data['entry_status'] = $this->language->get('entry_status');
		$data['button_edit'] = $this->language->get('button_edit');	
		$data['button_add'] = $this->language->get('button_add');			
		$data['text_list'] = $this->language->get('text_list');					
		$data['add'] = $this->url->link('manage/themes/add', 'token=' . $this->session->data['token'] . $url, 'SSL');
		$data['delete'] = $this->url->link('manage/themes/delete', 'token=' . $this->session->data['token'] . $url, 'SSL');
		
		$data['themess'] = array();

		$filter_data = array(
			
			'filter_name' => $filter_name,
			'filter_category' => $filter_category,
			'filter_image' => $filter_image,
			'filter_date_added' => $filter_date_added,
			'filter_status' => $filter_status,			
			'sort'  => $sort,
			'order' => $order,
			'start' => ($page - 1) * $this->config->get('config_admin_limit'),
			'limit' => $this->config->get('config_admin_limit')
		);
		
		
		$display_data = array('display' => '1');
		$display_categorys = $this->model_manage_themes->getCategorys($display_data);
		$display_statuss = $this->model_manage_themes->getStatuss($display_data);
		
		$themes_total = $this->model_manage_themes->getTotalThemess($filter_data);
	
		$results = $this->model_manage_themes->getThemess($filter_data);
 
    	foreach ($results as $result) {
						
			$data['themess'][] = array(
				
				'theme_id' => $result['theme_id'],
				'theme_id' => $result['theme_id'],
				'name' => $result['name'],
				'category' => $display_categorys[$result['category']],
				'image' => $result['image'],
				'date_added' => date($this->language->get('date_format_short'), strtotime($result['date_added'])),
				'status' => $display_statuss[$result['status']],
				'selected'   => isset($this->request->post['selected']) && in_array($result['theme_id'], $this->request->post['selected']),
				'edit'     => $this->url->link('manage/themes/edit', 'token=' . $this->session->data['token'] . '&theme_id=' . $result['theme_id'] . $url, 'SSL')
				
			);
		}
									
		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_no_results'] = $this->language->get('text_no_results');

		
		$data['text_category'] = $this->language->get('text_category');
		$data['text_status'] = $this->language->get('text_status');
		$data['column_theme_id'] = $this->language->get('column_theme_id');
		$data['column_name'] = $this->language->get('column_name');
		$data['column_category'] = $this->language->get('column_category');
		$data['column_image'] = $this->language->get('column_image');
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


			if (isset($this->request->get['filter_category'])) {
				$url .= '&filter_category=' . $this->request->get['filter_category'];
			}


			if (isset($this->request->get['filter_image'])) {
				$url .= '&filter_image=' . $this->request->get['filter_image'];
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
		
		
		$data['sort_theme_id'] = $this->url->link('manage/themes', 'token=' . $this->session->data['token'] . '&sort=theme_id' . $url, 'SSL');
		$data['sort_name'] = $this->url->link('manage/themes', 'token=' . $this->session->data['token'] . '&sort=name' . $url, 'SSL');
		$data['sort_category'] = $this->url->link('manage/themes', 'token=' . $this->session->data['token'] . '&sort=category' . $url, 'SSL');
		$data['sort_image'] = $this->url->link('manage/themes', 'token=' . $this->session->data['token'] . '&sort=image' . $url, 'SSL');
		$data['sort_date_added'] = $this->url->link('manage/themes', 'token=' . $this->session->data['token'] . '&sort=date_added' . $url, 'SSL');
		$data['sort_status'] = $this->url->link('manage/themes', 'token=' . $this->session->data['token'] . '&sort=status' . $url, 'SSL');
				
		$url = '';
		
		
			if (isset($this->request->get['filter_name'])) {
				$url .= '&filter_name=' . $this->request->get['filter_name'];
			}


			if (isset($this->request->get['filter_category'])) {
				$url .= '&filter_category=' . $this->request->get['filter_category'];
			}


			if (isset($this->request->get['filter_image'])) {
				$url .= '&filter_image=' . $this->request->get['filter_image'];
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
		$pagination->total = $themes_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_admin_limit');
		$pagination->text = $this->language->get('text_pagination');
		$pagination->url = $this->url->link('manage/themes', 'token=' . $this->session->data['token'] . $url . '&page={page}', 'SSL');
			
		$data['pagination'] = $pagination->render();
		
		$data['results'] = sprintf($this->language->get('text_pagination'), ($themes_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($themes_total - $this->config->get('config_limit_admin'))) ? $themes_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $themes_total, ceil($themes_total / $this->config->get('config_limit_admin')));
		
		
		$data['filter_name'] = $filter_name;
		$data['filter_category'] = $filter_category;
		$data['filter_image'] = $filter_image;
		$data['filter_date_added'] = $filter_date_added;
		$data['filter_status'] = $filter_status;
		
		$data['sort'] = $sort;
		$data['order'] = $order;
		
		
		$data['categorys'] = $this->model_manage_themes->getCategorys();
		$data['statuss'] = $this->model_manage_themes->getStatuss();
		
		
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('manage/themes_list.tpl', $data));

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
		$data['entry_demo_link'] = $this->language->get('entry_demo_link');
		$data['entry_status'] = $this->language->get('entry_status');

    	$data['button_save'] = $this->language->get('button_save');
    	$data['button_cancel'] = $this->language->get('button_cancel');

		$data['tab_general'] = $this->language->get('tab_general');
		$data['tab_themes_history'] = $this->language->get('tab_themes_history');

		$data['token'] = $this->session->data['token'];
	
		if (isset($this->request->get['theme_id'])) {
			$data['theme_id'] = $this->request->get['theme_id'];
		} else {
			$data['theme_id'] = 0;
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


		if (isset($this->error['demo_link'])) {
			$data['error_demo_link'] = $this->error['demo_link'];
		} else {
			$data['error_demo_link'] = '';
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
			'href'      => $this->url->link('manage/themes', 'token=' . $this->session->data['token'] . $url, 'SSL'),
      		'separator' => ' :: '
   		);
									
		if (!isset($this->request->get['theme_id'])) {
			$data['action'] = $this->url->link('manage/themes/add', 'token=' . $this->session->data['token'] . $url, 'SSL');
		} else {
			$data['action'] = $this->url->link('manage/themes/edit', 'token=' . $this->session->data['token'] . '&theme_id=' . $this->request->get['theme_id'] . $url, 'SSL');
		}
		
		$data['cancel'] = $this->url->link('manage/themes', 'token=' . $this->session->data['token'] . $url, 'SSL');
  		
		if (isset($this->request->get['theme_id']) && (!$this->request->server['REQUEST_METHOD'] != 'POST')) {
      		$themes_info = $this->model_manage_themes->getThemes($this->request->get['theme_id']);
    	}
		
		
		if (isset($this->request->post['name'])) {
			$data['name'] = $this->request->post['name'];
		} elseif (isset($themes_info)) {
			$data['name'] = $themes_info['name'];
		} else {
			$data['name'] = '';
		}

		if (isset($this->request->post['short_info'])) {
			$data['short_info'] = $this->request->post['short_info'];
		} elseif (isset($themes_info)) {
			$data['short_info'] = $themes_info['short_info'];
		} else {
			$data['short_info'] = '';
		}

		if (isset($this->request->post['description'])) {
			$data['description'] = $this->request->post['description'];
		} elseif (isset($themes_info)) {
			$data['description'] = $themes_info['description'];
		} else {
			$data['description'] = '';
		}

		if (isset($this->request->post['category'])) {
			$data['category'] = $this->request->post['category'];
		} elseif (isset($themes_info)) {
			$data['category'] = $themes_info['category'];
		} else {
			$data['category'] = '';
		}

		if (isset($this->request->post['image'])) {
			$data['image'] = $this->request->post['image'];
		} elseif (isset($themes_info)) {
			$data['image'] = $themes_info['image'];
		} else {
			$data['image'] = '';
		}

		if (isset($this->request->post['demo_link'])) {
			$data['demo_link'] = $this->request->post['demo_link'];
		} elseif (isset($themes_info)) {
			$data['demo_link'] = $themes_info['demo_link'];
		} else {
			$data['demo_link'] = '';
		}

		if (isset($this->request->post['status'])) {
			$data['status'] = $this->request->post['status'];
		} elseif (isset($themes_info)) {
			$data['status'] = $themes_info['status'];
		} else {
			$data['status'] = '';
		}

		$data['categorys'] = $this->model_manage_themes->getCategorys();

		$data['statuss'] = $this->model_manage_themes->getStatuss();


        $data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('manage/themes_form.tpl', $data));		
  	}
	
  	protected function validateForm() {
    	if (!$this->user->hasPermission('modify', 'manage/themes')) {
      		$this->error['warning'] = $this->language->get('error_permission');
    	}
      	
      	
		if ((strlen(utf8_decode($this->request->post['name'])) <= 0)) {
			$this->error['name'] = $this->language->get('error_name');
		}

		
    	return !$this->error;
  	}

  	protected function validateDelete() {
    	if (!$this->user->hasPermission('modify', 'manage/themes')) {
      		$this->error['warning'] = $this->language->get('error_permission');  
    	}
	  	
		return !$this->error;
  	}		
}
?>