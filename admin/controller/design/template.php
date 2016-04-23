<?php
class ControllerDesignTemplate extends Controller {
	private $error = array();
     
  	public function index() {
		$this->load->language('design/template');
    	
		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('design/template');
		
		$this->getList();
  	}
  
  	public function add() {
    	$this->load->language('design/template');

    	$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('design/template');
		
    	if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->request->get['template_id'] = $this->model_design_template->addTemplate($this->request->post);
			
			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';
			
			
			if (isset($this->request->get['filter_theme'])) {
				$url .= '&filter_theme=' . $this->request->get['filter_theme'];
			}


			if (isset($this->request->get['filter_path'])) {
				$url .= '&filter_path=' . $this->request->get['filter_path'];
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
			
			if (isset($this->request->get['template_id'])) {
				$url .= '&template_id=' . $this->request->get['template_id'];
			}
						
			$this->response->redirect($this->url->link('design/template/edit', 'token=' . $this->session->data['token'] . $url, 'SSL'));
    	}
    
    	$this->getForm();
  	}

  	public function edit() {
    	$this->load->language('design/template');

    	$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('design/template');
				
    	if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_design_template->editTemplate($this->request->get['template_id'], $this->request->post);
      		
			$this->session->data['success'] = $this->language->get('text_success');
	  
			$url = '';
			
			
			if (isset($this->request->get['filter_theme'])) {
				$url .= '&filter_theme=' . $this->request->get['filter_theme'];
			}


			if (isset($this->request->get['filter_path'])) {
				$url .= '&filter_path=' . $this->request->get['filter_path'];
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
			
			if (isset($this->request->get['template_id'])) {
				$url .= '&template_id=' . $this->request->get['template_id'];
			}

			$this->response->redirect($this->url->link('design/template/edit', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}
    
    	$this->getForm();
  	}

  	public function delete() {
    	$this->load->language('design/template');

    	$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('design/template');
		
    	if (isset($this->request->post['selected']) && $this->validateDelete()) { 
			foreach ($this->request->post['selected'] as $template_id) {
				$this->model_design_template->deleteTemplate($template_id);
			}
      		
			$this->session->data['success'] = $this->language->get('text_success');
	  
			$url = '';
			
			
			if (isset($this->request->get['filter_theme'])) {
				$url .= '&filter_theme=' . $this->request->get['filter_theme'];
			}


			if (isset($this->request->get['filter_path'])) {
				$url .= '&filter_path=' . $this->request->get['filter_path'];
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
						
			$this->response->redirect($this->url->link('design/template', 'token=' . $this->session->data['token'] . $url, 'SSL'));
    	}
	
    	$this->getList();
  	}

  	protected function getList() {
  		
  		
		if (isset($this->request->get['filter_theme'])) {
			$filter_theme = $this->request->get['filter_theme'];
		} else {
			$filter_theme = null;
		}


		if (isset($this->request->get['filter_path'])) {
			$filter_path = $this->request->get['filter_path'];
		} else {
			$filter_path = null;
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
			
		
			if (isset($this->request->get['filter_theme'])) {
				$url .= '&filter_theme=' . $this->request->get['filter_theme'];
			}


			if (isset($this->request->get['filter_path'])) {
				$url .= '&filter_path=' . $this->request->get['filter_path'];
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
			'href'      => $this->url->link('design/template', 'token=' . $this->session->data['token'] . $url, 'SSL'),
      		'separator' => ' :: '
   		);
		
		
		$data['entry_template_id'] = $this->language->get('entry_template_id');
		$data['entry_theme'] = $this->language->get('entry_theme');
		$data['entry_path'] = $this->language->get('entry_path');
		$data['entry_date_modified'] = $this->language->get('entry_date_modified');
		$data['entry_status'] = $this->language->get('entry_status');
		$data['button_edit'] = $this->language->get('button_edit');	
		$data['button_add'] = $this->language->get('button_add');			
		$data['text_list'] = $this->language->get('text_list');					
		$data['add'] = $this->url->link('design/template/add', 'token=' . $this->session->data['token'] . $url, 'SSL');
		$data['delete'] = $this->url->link('design/template/delete', 'token=' . $this->session->data['token'] . $url, 'SSL');
		
		$data['templates'] = array();

		$filter_data = array(
			
			'filter_theme' => $filter_theme,
			'filter_path' => $filter_path,			
			'sort'  => $sort,
			'order' => $order,
			'start'           => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit'           => $this->config->get('config_limit_admin')
		);
		
		
		$display_data = array('display' => '1');
		$display_paths = $this->model_design_template->getFilePaths($display_data);
		$display_statuss = $this->model_design_template->getStatuss($display_data);
		
		$template_total = $this->model_design_template->getTotalTemplates($filter_data);
	
		$results = $this->model_design_template->getTemplates($filter_data);
 
    	foreach ($results as $result) {
						
			$data['templates'][] = array(
				
				'template_id' => $result['template_id'],
				'template_id' => $result['template_id'],
				'theme' => $result['theme'],
				'path' => $display_paths[$result['path']],
				'date_modified' => date($this->language->get('date_format_short'), strtotime($result['date_modified'])),
				'status' => $result['status'],
				'selected'   => isset($this->request->post['selected']) && in_array($result['template_id'], $this->request->post['selected']),
				'edit'     => $this->url->link('design/template/edit', 'token=' . $this->session->data['token'] . '&template_id=' . $result['template_id'] . $url, 'SSL')
				
			);
		}
									
		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_no_results'] = $this->language->get('text_no_results');

		
		$data['text_path'] = $this->language->get('text_path');
		$data['text_status'] = $this->language->get('text_status');
		$data['column_template_id'] = $this->language->get('column_template_id');
		$data['column_theme'] = $this->language->get('column_theme');
		$data['column_path'] = $this->language->get('column_path');
		$data['column_date_modified'] = $this->language->get('column_date_modified');
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
		
		
			if (isset($this->request->get['filter_theme'])) {
				$url .= '&filter_theme=' . $this->request->get['filter_theme'];
			}


			if (isset($this->request->get['filter_path'])) {
				$url .= '&filter_path=' . $this->request->get['filter_path'];
			}


		
		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}
		
		
		$data['sort_template_id'] = $this->url->link('design/template', 'token=' . $this->session->data['token'] . '&sort=template_id' . $url, 'SSL');
		$data['sort_theme'] = $this->url->link('design/template', 'token=' . $this->session->data['token'] . '&sort=theme' . $url, 'SSL');
		$data['sort_path'] = $this->url->link('design/template', 'token=' . $this->session->data['token'] . '&sort=path' . $url, 'SSL');
		$data['sort_date_modified'] = $this->url->link('design/template', 'token=' . $this->session->data['token'] . '&sort=date_modified' . $url, 'SSL');
		$data['sort_status'] = $this->url->link('design/template', 'token=' . $this->session->data['token'] . '&sort=status' . $url, 'SSL');
				
		$url = '';
		
		
			if (isset($this->request->get['filter_theme'])) {
				$url .= '&filter_theme=' . $this->request->get['filter_theme'];
			}


			if (isset($this->request->get['filter_path'])) {
				$url .= '&filter_path=' . $this->request->get['filter_path'];
			}


		
		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}
												
		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		$pagination = new Pagination();
		$pagination->total = $template_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->text = $this->language->get('text_pagination');
		$pagination->url = $this->url->link('design/template', 'token=' . $this->session->data['token'] . $url . '&page={page}', 'SSL');
			
		$data['pagination'] = $pagination->render();
		
		$data['results'] = sprintf($this->language->get('text_pagination'), ($template_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($template_total - $this->config->get('config_limit_admin'))) ? $template_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $template_total, ceil($template_total / $this->config->get('config_limit_admin')));
		
		
		$data['filter_theme'] = $filter_theme;
		$data['filter_path'] = $filter_path;
		
		$data['sort'] = $sort;
		$data['order'] = $order;
		
		
		$data['paths'] = $this->model_design_template->getFilePaths();
		$data['statuss'] = $this->model_design_template->getStatuss();
		
		
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('design/template_list.tpl', $data));

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
		
		
		
		$data['entry_theme'] = $this->language->get('entry_theme');
		$data['entry_path_source'] = $this->language->get('entry_path');
		$data['entry_path'] = $this->language->get('entry_path');
		$data['entry_html'] = $this->language->get('entry_html');
		$data['entry_html_source'] = $this->language->get('entry_html_source');
		$data['entry_status'] = $this->language->get('entry_status');

    	$data['button_save'] = $this->language->get('button_save');
    	$data['button_cancel'] = $this->language->get('button_cancel');

		$data['tab_general'] = $this->language->get('tab_general');
		$data['tab_template_history'] = $this->language->get('tab_template_history');

		$data['token'] = $this->session->data['token'];
	
		if (isset($this->request->get['template_id'])) {
			$data['template_id'] = $this->request->get['template_id'];
		} else {
			$data['template_id'] = 0;
		}
				
 		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}
	 	
	 	
		if (isset($this->error['theme'])) {
			$data['error_theme'] = $this->error['theme'];
		} else {
			$data['error_theme'] = '';
		}


		if (isset($this->error['path'])) {
			$data['error_path'] = $this->error['path'];
		} else {
			$data['error_path'] = '';
		}


		if (isset($this->error['html'])) {
			$data['error_html'] = $this->error['html'];
		} else {
			$data['error_html'] = '';
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
			'href'      => $this->url->link('design/template', 'token=' . $this->session->data['token'] . $url, 'SSL'),
      		'separator' => ' :: '
   		);
									
		if (!isset($this->request->get['template_id'])) {
			$data['action'] = $this->url->link('design/template/add', 'token=' . $this->session->data['token'] . $url, 'SSL');
		} else {
			$data['action'] = $this->url->link('design/template/edit', 'token=' . $this->session->data['token'] . '&template_id=' . $this->request->get['template_id'] . $url, 'SSL');
		}
		
		$data['cancel'] = $this->url->link('design/template', 'token=' . $this->session->data['token'] . $url, 'SSL');
  		
		if (isset($this->request->get['template_id']) && (!$this->request->server['REQUEST_METHOD'] != 'POST')) {
      		$template_info = $this->model_design_template->getTemplate($this->request->get['template_id']);
    	}
		
		
		if (isset($this->request->post['theme'])) {
			$data['theme'] = $this->request->post['theme'];
		} elseif (isset($template_info)) {
			$data['theme'] = $template_info['theme'];
		} else {
			$data['theme'] = $this->config->get('config_template');
		}

		if (isset($this->request->post['path'])) {
			$data['path'] = $this->request->post['path'];
		} elseif (isset($template_info)) {
			$data['path'] = $template_info['path'];
		} else {
			$data['path'] = '';
		}

		if (isset($this->request->post['path_source'])) {
			$data['path_source'] = $this->request->post['path_source'];
		} elseif (isset($template_info)) {
			$data['path_source'] = $template_info['path'];
		} else {
			$data['path_source'] = '';
		}

		if (isset($this->request->post['html'])) {
			$data['html'] = $this->request->post['html'];
		} elseif (isset($template_info)) {
			
			$this->request->post['path'] = $template_info['path'];
			$load_template = $this->load_template(true);
			
			$data['html'] = $load_template['html'];
		} else {
			$data['html'] = '';
		}
		
		if (isset($this->request->post['html_source'])) {
			$data['html_source'] = $this->request->post['html_source'];
		} elseif (isset($template_info)) {
			$data['html_source'] = $load_template['html_source'];
		} else {
			$data['html_source'] = '';
		}

		if (isset($this->request->post['status'])) {
			$data['status'] = $this->request->post['status'];
		} elseif (isset($template_info)) {
			$data['status'] = $template_info['status'];
		} else {
			$data['status'] = '';
		}

		$data['paths'] = $this->model_design_template->getFilePaths();

		$data['statuss'] = $this->model_design_template->getStatuss();


        $data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('design/template_form.tpl', $data));		
  	}
	
  	protected function validateForm() {
    	if (!$this->user->hasPermission('modify', 'design/template')) {
      		$this->error['warning'] = $this->language->get('error_permission');
    	}
      	
      	
		if ((strlen(utf8_decode($this->request->post['theme'])) <= 0)) {
			$this->error['theme'] = $this->language->get('error_theme');
		}

		if ((strlen(utf8_decode($this->request->post['path'])) <= 0)) {
			$this->error['path'] = $this->language->get('error_path');
		}

		if ((strlen(utf8_decode($this->request->post['html'])) <= 0)) {
			$this->error['html'] = $this->language->get('error_html');
		}

		
		if ($this->error && !isset($this->error['warning'])) {
			$this->error['warning'] = $this->language->get('error_warning');
		}
		
    	return !$this->error;
  	}

  	protected function validateDelete() {
    	if (!$this->user->hasPermission('modify', 'design/template')) {
      		$this->error['warning'] = $this->language->get('error_permission');  
    	}
	  	
		return !$this->error;
  	}
	
	public function save_template() {
			
		$json = array();
		
		$this->load->model('design/template');
		
		$template_info = $this->model_design_template->getTemplateByPath($this->request->post['path']);
		
		if(!empty($template_info['template_id'])) {
				
			$this->request->post['template_id'] = $template_info['template_id'];
			$this->model_design_template->editTemplate($this->request->post['template_id'], $this->request->post);
						
		} else {
			$this->request->get['template_id'] = $this->model_design_template->addTemplate($this->request->post);	
		}
		
		$json['success'] = "1";
		
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
	
	public function status() {
		$json = array();
		
		$this->load->model('design/template');
		
		$this->model_design_template->updateStatus($this->request->post['template_id'], $this->request->post);
		
		$json['success'] = "1";
		
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
	
	public function load_template($return_mode = false) {
			
		$json = array();
		
		if(empty($this->request->post['path'])) {
			$json['error'] = "Oops! File not found.";
		}
		
		$this->load->model('design/template');
		
		$template_info = $this->model_design_template->getTemplateByPath($this->request->post['path']);
		
		$filename = DIR_CATALOG . 'view/theme/' . $this->request->post['path'];
		
		if (empty($json['error']) && file_exists($filename)) {
			$file_data = file_get_contents($filename);
			$json['html_source'] = $file_data;
				
	      	if(!empty($template_info['html'])) {
				$file_data = html_entity_decode($template_info['html'], ENT_QUOTES, 'UTF-8');
	    	}
				
			$json['html'] = $file_data;
		} else {
			$json['html'] = "<h1>Oops! File not found.</h1>";
			$json['html_source'] = "<h1>Oops! File not found.</h1>";
		}
		
		if($return_mode) {
			return $json;
		}
		
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
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