<?php
class ModelManagePlans extends Model {
	
	var $config_safe_delete = 0;
	
	public function addPlans($data) {
      	$this->db->query("INSERT INTO `" . DB_PREFIX . "plan_master` SET " .
      			
				" name = '" . $this->db->escape($data['name']) .
				"', status = '" . $this->db->escape($data['status']) .
				"', date_added = '" . date("Y-m-d H:i:s") .
				"', date_modified = '" . date("Y-m-d H:i:s") .      			 
				"'");

      	$plan_id = $this->db->getLastId();
      	
      	return $plan_id;
	}
	
	public function editPlans($plan_id, $data) {
		$this->db->query("UPDATE `" . DB_PREFIX . "plan_master` SET " .
				
				" name = '" . $this->db->escape($data['name']) .
				"', status = '" . $this->db->escape($data['status']) .
				"', date_modified = '" . date("Y-m-d H:i:s") .				 
				"' WHERE `plan_id` = '" . (int)$plan_id . "'");		
	}
	
	public function deletePlans($plan_id) {
		if($this->config_safe_delete)
			$this->db->query("UPDATE `" . DB_PREFIX . "plan_master` SET  WHERE `plan_id` = '" . (int)$plan_id . "'");
		else
      		$this->db->query("DELETE FROM `" . DB_PREFIX . "plan_master` WHERE `plan_id` = '" . (int)$plan_id . "'");
	}
	
	public function getPlans($plan_id) {
		
      	$query = $this->db->query("SELECT DISTINCT * FROM `" . DB_PREFIX . "plan_master` WHERE `plan_id` = '" . (int)$plan_id . "'");
		
		return $query->row;
	}
	
	public function getPlanss($data = array()) {
		if($this->config_safe_delete)
			$sql = "SELECT `plan_id`, `plan_id`,`name`,`date_added`,`status` FROM `" . DB_PREFIX . "plan_master` WHERE 1=1  ";
		else
			$sql = "SELECT `plan_id`, `plan_id`,`name`,`date_added`,`status` FROM `" . DB_PREFIX . "plan_master` WHERE 1=1 ";
		
		
		if (isset($data['filter_name']) && !is_null($data['filter_name'])) {
			$sql .= " AND name LIKE '%" . $this->db->escape($data['filter_name']) . "%'";
		}


		if (isset($data['filter_date_added']) && !is_null($data['filter_date_added'])) {
			$sql .= " AND date_added LIKE '%" . $this->db->escape($data['filter_date_added']) . "%'";
		}


		if (isset($data['filter_status']) && !is_null($data['filter_status'])) {
			$sql .= " AND status = '" . $data['filter_status'] . "'";
		}


		
		$sort_data = array(
			
			'plan_id',
			'name',
			'date_added',
			'status',
		);	
			
		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];	
		} else {
			$sql .= " ORDER BY `plan_id`";	
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
	
	public function getTotalPlanss() {
		if($this->config_safe_delete)
			$sql = "SELECT COUNT(*) AS total FROM `" . DB_PREFIX . "plan_master` WHERE 1=1  ";
		else
			$sql = "SELECT COUNT(*) AS total FROM `" . DB_PREFIX . "plan_master` WHERE 1=1 ";
		
		
		if (isset($data['filter_name']) && !is_null($data['filter_name'])) {
			$sql .= " AND name LIKE '%" . $this->db->escape($data['filter_name']) . "%'";
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