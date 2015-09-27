<?php
class ModelManageThemes extends Model {
	
	var $config_safe_delete = 0;
	
	public function addThemes($data) {
      	$this->db->query("INSERT INTO `" . DB_PREFIX . "theme_master` SET " .
      			
				" name = '" . $this->db->escape($data['name']) .
				"', short_info = '" . $this->db->escape($data['short_info']) .
				"', description = '" . $this->db->escape($data['description']) .
				"', category = '" . $this->db->escape($data['category']) .
				"', image = '" . $this->db->escape($data['image']) .
				"', demo_link = '" . $this->db->escape($data['demo_link']) .
				"', status = '" . $this->db->escape($data['status']) .
				"', date_added = '" . date("Y-m-d H:i:s") .
				"', date_modified = '" . date("Y-m-d H:i:s") .      			 
				"'");

      	$theme_id = $this->db->getLastId();
      	
      	return $theme_id;
	}
	
	public function editThemes($theme_id, $data) {
		$this->db->query("UPDATE `" . DB_PREFIX . "theme_master` SET " .
				
				" name = '" . $this->db->escape($data['name']) .
				"', short_info = '" . $this->db->escape($data['short_info']) .
				"', description = '" . $this->db->escape($data['description']) .
				"', category = '" . $this->db->escape($data['category']) .
				"', image = '" . $this->db->escape($data['image']) .
				"', demo_link = '" . $this->db->escape($data['demo_link']) .
				"', status = '" . $this->db->escape($data['status']) .
				"', date_modified = '" . date("Y-m-d H:i:s") .				 
				"' WHERE `theme_id` = '" . (int)$theme_id . "'");		
	}
	
	public function deleteThemes($theme_id) {
		if($this->config_safe_delete)
			$this->db->query("UPDATE `" . DB_PREFIX . "theme_master` SET  WHERE `theme_id` = '" . (int)$theme_id . "'");
		else
      		$this->db->query("DELETE FROM `" . DB_PREFIX . "theme_master` WHERE `theme_id` = '" . (int)$theme_id . "'");
	}
	
	public function getThemes($theme_id) {
		
      	$query = $this->db->query("SELECT DISTINCT * FROM `" . DB_PREFIX . "theme_master` WHERE `theme_id` = '" . (int)$theme_id . "'");
		
		return $query->row;
	}
	
	public function getThemess($data = array()) {
		if($this->config_safe_delete)
			$sql = "SELECT `theme_id`, `theme_id`,`name`,`category`,`image`,`date_added`,`status` FROM `" . DB_PREFIX . "theme_master` WHERE 1=1  ";
		else
			$sql = "SELECT `theme_id`, `theme_id`,`name`,`category`,`image`,`date_added`,`status` FROM `" . DB_PREFIX . "theme_master` WHERE 1=1 ";
		
		
		if (isset($data['filter_name']) && !is_null($data['filter_name'])) {
			$sql .= " AND name LIKE '%" . $this->db->escape($data['filter_name']) . "%'";
		}


		if (isset($data['filter_category']) && !is_null($data['filter_category'])) {
			$sql .= " AND category = '" . $data['filter_category'] . "'";
		}


		if (isset($data['filter_image']) && !is_null($data['filter_image'])) {
			$sql .= " AND image LIKE '%" . $this->db->escape($data['filter_image']) . "%'";
		}


		if (isset($data['filter_date_added']) && !is_null($data['filter_date_added'])) {
			$sql .= " AND date_added LIKE '%" . $this->db->escape($data['filter_date_added']) . "%'";
		}


		if (isset($data['filter_status']) && !is_null($data['filter_status'])) {
			$sql .= " AND status = '" . $data['filter_status'] . "'";
		}


		
		$sort_data = array(
			
			'theme_id',
			'name',
			'category',
			'image',
			'date_added',
			'status',
		);	
			
		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];	
		} else {
			$sql .= " ORDER BY `theme_id`";	
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
	
	public function getTotalThemess() {
		if($this->config_safe_delete)
			$sql = "SELECT COUNT(*) AS total FROM `" . DB_PREFIX . "theme_master` WHERE 1=1  ";
		else
			$sql = "SELECT COUNT(*) AS total FROM `" . DB_PREFIX . "theme_master` WHERE 1=1 ";
		
		
		if (isset($data['filter_name']) && !is_null($data['filter_name'])) {
			$sql .= " AND name LIKE '%" . $this->db->escape($data['filter_name']) . "%'";
		}


		if (isset($data['filter_category']) && !is_null($data['filter_category'])) {
			$sql .= " AND category = '" . $data['filter_category'] . "'";
		}


		if (isset($data['filter_image']) && !is_null($data['filter_image'])) {
			$sql .= " AND image LIKE '%" . $this->db->escape($data['filter_image']) . "%'";
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
	
	
	public function getCategorys($data = array()) {
		$categorys = array();

//		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "category_table`");
//		
//		if($query->num_rows) {
//			foreach($query->rows as $each_row) {
//				if (isset($data['display']) && !is_null($data['display'])) {
//					$categorys[$each_row['id']] = $each_row['title'];
//				} else {
//					$categorys[] = array(
//						'category_id' => $each_row['id'],
//						'name' => $each_row['title'],
//					);	
//				}								
//			}
//		}

		$categorys[] = array(
			'category_id' => '1',
			'name' => 'Option 1',
		);

		$categorys[] = array(
			'category_id' => '2',
			'name' => 'Option 2',
		);

		$categorys[] = array(
			'category_id' => '3',
			'name' => 'Option 3',
		);

		if (isset($data['display']) && !is_null($data['display'])) {
			$new_categorys = array();
			foreach($categorys as $key => $value) {
				$new_categorys[$value['category_id']] = $value['name'];
			}
			$categorys = $new_categorys;
		};


		return $categorys;
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
			'status_id' => 'Y',
			'name' => 'Y',
		);

		$statuss[] = array(
			'status_id' => 'N',
			'name' => 'N',
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