<?php
class ModelDesignTemplate extends Model {
	public function addTemplate($data) {
		$this->event->trigger('pre.admin.add.template', $data);

      	$this->db->query("INSERT INTO `" . DB_PREFIX . "templates` SET " .
      			
				" theme = '" . $this->db->escape($data['theme']) .
				"', path = '" . $this->db->escape($data['path']) .
				"', html = '" . $this->db->escape($data['html']) .
				"', status = '" . $this->db->escape($data['status']) .
				"', date_added = '" . date("Y-m-d H:i:s") .
				"', date_modified = '" . date("Y-m-d H:i:s") .      			 
				"'");

      	$template_id = $this->db->getLastId();

		$this->event->trigger('post.admin.add.template',$template_id);
      	
      	return $template_id;
	}
	
	public function editTemplate($template_id, $data) {
		
		 $this->event->trigger('pre.admin.edit.template', $data);
		 
		 $this->db->query("UPDATE `" . DB_PREFIX . "templates` SET " .
				
				" theme = '" . $this->db->escape($data['theme']) .
				"', path = '" . $this->db->escape($data['path']) .
				"', html = '" . $this->db->escape($data['html']) .
				"', status = '" . $this->db->escape($data['status']) .
				"', date_modified = '" . date("Y-m-d H:i:s") .				 
				"' WHERE `template_id` = '" . (int)$template_id . "'");		
				
	     $this->event->trigger('post.admin.edit.template', $template_id);
	}
	
	public function deleteTemplate($template_id) {
		
		$this->event->trigger('pre.admin.delete.template', $template_id);
      	$this->db->query("DELETE FROM `" . DB_PREFIX . "templates` WHERE `template_id` = '" . (int)$template_id . "'");
		
		$this->event->trigger('post.admin.delete.template', $template_id);
	}
	
	public function getTemplate($template_id) {
		
      	$query = $this->db->query("SELECT DISTINCT * FROM `" . DB_PREFIX . "templates` WHERE `template_id` = '" . (int)$template_id . "'");
		
		return $query->row;
	}
	
	public function getTemplates($data = array()) {
		$sql = "SELECT `template_id`, `template_id`,`theme`,`path`,`date_modified`,`status` FROM `" . DB_PREFIX . "templates` WHERE 1=1 ";
		
		
		if (isset($data['filter_theme']) && !is_null($data['filter_theme'])) {
			$sql .= " AND theme LIKE '%" . $this->db->escape($data['filter_theme']) . "%'";
		}


		if (isset($data['filter_path']) && !is_null($data['filter_path'])) {
			$sql .= " AND path = '" . $data['filter_path'] . "'";
		}


		
		$sort_data = array(
			
			'template_id',
			'theme',
			'path',
			'date_modified',
			'status',
		);	
			
		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];	
		} else {
			$sql .= " ORDER BY `template_id`";	
		}
			
		if (isset($data['order']) && ($data['order'] == 'DESC')) {
			$sql .= " DESC";
		} else {
			$sql .= " ASC";
		}
		
		if (isset($data['start']) || isset($data['limit'])) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}			

			if ($data['limit'] < 1) {
				$data['limit'] = 20;
			}	
			
			$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
		}		
		
		$query = $this->db->query($sql);
		
		return $query->rows;
	}
	
	public function getTotalTemplates($data = array()) {
		$sql = "SELECT COUNT(*) AS total FROM `" . DB_PREFIX . "templates` WHERE 1=1 ";
		
		
		if (isset($data['filter_theme']) && !is_null($data['filter_theme'])) {
			$sql .= " AND theme LIKE '%" . $this->db->escape($data['filter_theme']) . "%'";
		}


		if (isset($data['filter_path']) && !is_null($data['filter_path'])) {
			$sql .= " AND path = '" . $data['filter_path'] . "'";
		}


		
      	$query = $this->db->query($sql);
      	
		return $query->row['total'];
	}
	
	
	public function getFilePaths($data = array()) {
		$paths = array();

//		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "path_table`");
//		
//		if($query->num_rows) {
//			foreach($query->rows as $each_row) {
//				if (isset($data['display']) && !is_null($data['display'])) {
//					$paths[$each_row['id']] = $each_row['title'];
//				} else {
//					$paths[] = array(
//						'path_id' => $each_row['id'],
//						'name' => $each_row['title'],
//					);	
//				}								
//			}
//		}

		// Skipped Tpls
		$ignore = array(
			'common/dashboard',
			'common/startup'
		);
		
		$theme = $this->config->get('config_template');
		$files = glob(DIR_CATALOG . 'view/theme/' . $theme . '/template/*/*.tpl');

		foreach ($files as $file) {
			
			$file = str_replace(DIR_CATALOG . 'view/theme/', '', $file);
			
			if (!in_array($file, $ignore)) {
				$paths[] = array(
					'path_id' => $file,
					'name' => $file,
				);
			}
		}

		if (isset($data['display']) && !is_null($data['display'])) {
			$new_paths = array();
			foreach($paths as $key => $value) {
				$new_paths[$value['path_id']] = $value['name'];
			}
			$paths = $new_paths;
		};


		return $paths;
	}

	public function getStatuss($data = array()) {
		$statuss = array();

//		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "status_table`");
//		
//		if($query->num_rows) {
//			foreach($query->rows as $each_row) {
//				if (isset($data['display']) && !is_null($data['display'])) {
//					$statuss[$each_row['id']] = $each_row['title'];
//				} else {
//					$statuss[] = array(
//						'status_id' => $each_row['id'],
//						'name' => $each_row['title'],
//					);	
//				}								
//			}
//		}

		$statuss[] = array(
			'status_id' => '0',
			'name' => 'OFF',
		);

		$statuss[] = array(
			'status_id' => '1',
			'name' => 'ON',
		);

		if (isset($data['display']) && !is_null($data['display'])) {
			$new_statuss = array();
			foreach($statuss as $key => $value) {
				$new_statuss[$value['status_id']] = $value['name'];
			}
			$statuss = $new_statuss;
		};


		return $statuss;
	}
			
}
?>