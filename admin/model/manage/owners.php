<?php
class ModelManageOwners extends Model {
	
	var $config_safe_delete = 0;
	
	public function addOwners($data) {
      	$this->db->query("INSERT INTO `" . DB_PREFIX . "site_owners` SET " .
      			
				" firstname = '" . $this->db->escape($data['firstname']) .
				"', lastname = '" . $this->db->escape($data['lastname']) .
				"', email = '" . $this->db->escape($data['email']) .
				"', password = '" . $this->db->escape($data['password']) .
				"', mobile = '" . $this->db->escape($data['mobile']) .
				"', status = '" . $this->db->escape($data['status']) .
				"', date_added = '" . date("Y-m-d H:i:s") .
				"', date_modified = '" . date("Y-m-d H:i:s") .      			 
				"'");

      	$owner_id = $this->db->getLastId();
      	
      	return $owner_id;
	}
	
	public function editOwners($owner_id, $data) {
		$this->db->query("UPDATE `" . DB_PREFIX . "site_owners` SET " .
				
				" firstname = '" . $this->db->escape($data['firstname']) .
				"', lastname = '" . $this->db->escape($data['lastname']) .
				"', email = '" . $this->db->escape($data['email']) .
				"', password = '" . $this->db->escape($data['password']) .
				"', mobile = '" . $this->db->escape($data['mobile']) .
				"', status = '" . $this->db->escape($data['status']) .
				"', date_modified = '" . date("Y-m-d H:i:s") .				 
				"' WHERE `owner_id` = '" . (int)$owner_id . "'");		
	}
	
	public function deleteOwners($owner_id) {
		if($this->config_safe_delete)
			$this->db->query("UPDATE `" . DB_PREFIX . "site_owners` SET  WHERE `owner_id` = '" . (int)$owner_id . "'");
		else
      		$this->db->query("DELETE FROM `" . DB_PREFIX . "site_owners` WHERE `owner_id` = '" . (int)$owner_id . "'");
	}
	
	public function getOwners($owner_id) {
		
      	$query = $this->db->query("SELECT DISTINCT * FROM `" . DB_PREFIX . "site_owners` WHERE `owner_id` = '" . (int)$owner_id . "'");
		
		return $query->row;
	}
	
	public function getOwnerss($data = array()) {
		if($this->config_safe_delete)
			$sql = "SELECT `owner_id`, `owner_id`,`firstname`,`lastname`,`email`,`mobile`,`date_added`,`status` FROM `" . DB_PREFIX . "site_owners` WHERE 1=1  ";
		else
			$sql = "SELECT `owner_id`, `owner_id`,`firstname`,`lastname`,`email`,`mobile`,`date_added`,`status` FROM `" . DB_PREFIX . "site_owners` WHERE 1=1 ";
		
		
		if (isset($data['filter_firstname']) && !is_null($data['filter_firstname'])) {
			$sql .= " AND firstname LIKE '%" . $this->db->escape($data['filter_firstname']) . "%'";
		}


		if (isset($data['filter_lastname']) && !is_null($data['filter_lastname'])) {
			$sql .= " AND lastname LIKE '%" . $this->db->escape($data['filter_lastname']) . "%'";
		}


		if (isset($data['filter_email']) && !is_null($data['filter_email'])) {
			$sql .= " AND email LIKE '%" . $this->db->escape($data['filter_email']) . "%'";
		}


		if (isset($data['filter_mobile']) && !is_null($data['filter_mobile'])) {
			$sql .= " AND mobile LIKE '%" . $this->db->escape($data['filter_mobile']) . "%'";
		}


		if (isset($data['filter_date_added']) && !is_null($data['filter_date_added'])) {
			$sql .= " AND date_added LIKE '%" . $this->db->escape($data['filter_date_added']) . "%'";
		}


		if (isset($data['filter_status']) && !is_null($data['filter_status'])) {
			$sql .= " AND status = '" . $data['filter_status'] . "'";
		}


		
		$sort_data = array(
			
			'owner_id',
			'firstname',
			'lastname',
			'email',
			'mobile',
			'date_added',
			'status',
		);	
			
		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];	
		} else {
			$sql .= " ORDER BY `owner_id`";	
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
	
	public function getTotalOwnerss() {
		if($this->config_safe_delete)
			$sql = "SELECT COUNT(*) AS total FROM `" . DB_PREFIX . "site_owners` WHERE 1=1  ";
		else
			$sql = "SELECT COUNT(*) AS total FROM `" . DB_PREFIX . "site_owners` WHERE 1=1 ";
		
		
		if (isset($data['filter_firstname']) && !is_null($data['filter_firstname'])) {
			$sql .= " AND firstname LIKE '%" . $this->db->escape($data['filter_firstname']) . "%'";
		}


		if (isset($data['filter_lastname']) && !is_null($data['filter_lastname'])) {
			$sql .= " AND lastname LIKE '%" . $this->db->escape($data['filter_lastname']) . "%'";
		}


		if (isset($data['filter_email']) && !is_null($data['filter_email'])) {
			$sql .= " AND email LIKE '%" . $this->db->escape($data['filter_email']) . "%'";
		}


		if (isset($data['filter_mobile']) && !is_null($data['filter_mobile'])) {
			$sql .= " AND mobile LIKE '%" . $this->db->escape($data['filter_mobile']) . "%'";
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