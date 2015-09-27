<?php
class ModelManageSites extends Model {
	public function addSites($data) {
		$this->event->trigger('pre.admin.add.sites', $data);

      	$this->db->query("INSERT INTO `" . DB_PREFIX . "site_master` SET " .
      			
				" owner_id = '" . $this->db->escape($data['owner_id']) .
				"', plan_id = '" . $this->db->escape($data['plan_id']) .
				"', sub_domain = '" . $this->db->escape($data['sub_domain']) .
				"', domain = '" . $this->db->escape($data['domain']) .
				"', site_type = '" . $this->db->escape($data['site_type']) .
				"', live_date = '" . $this->db->escape($data['live_date']) .
				"', active_status = '" . $this->db->escape($data['active_status']) .
				"', status = '" . $this->db->escape($data['status']) .
				"', date_added = '" . date("Y-m-d H:i:s") .
				"', date_modified = '" . date("Y-m-d H:i:s") .      			 
				"'");

      	$site_id = $this->db->getLastId();

		$this->event->trigger('post.admin.add.sites',$site_id);
      	
      	return $site_id;
	}
	
	public function editSites($site_id, $data) {
		
		 $this->event->trigger('pre.admin.edit.sites', $data);
		 
		 $this->db->query("UPDATE `" . DB_PREFIX . "site_master` SET " .
				
				" owner_id = '" . $this->db->escape($data['owner_id']) .
				"', plan_id = '" . $this->db->escape($data['plan_id']) .
				"', sub_domain = '" . $this->db->escape($data['sub_domain']) .
				"', domain = '" . $this->db->escape($data['domain']) .
				"', site_type = '" . $this->db->escape($data['site_type']) .
				"', live_date = '" . $this->db->escape($data['live_date']) .
				"', active_status = '" . $this->db->escape($data['active_status']) .
				"', status = '" . $this->db->escape($data['status']) .
				"', date_modified = '" . date("Y-m-d H:i:s") .				 
				"' WHERE `site_id` = '" . (int)$site_id . "'");		
				
	     $this->event->trigger('post.admin.edit.sites', $site_id);
	}
	
	public function deleteSites($site_id) {
		
		$this->event->trigger('pre.admin.delete.sites', $site_id);
      	$this->db->query("DELETE FROM `" . DB_PREFIX . "site_master` WHERE `site_id` = '" . (int)$site_id . "'");
		
		$this->event->trigger('post.admin.delete.sites', $site_id);
	}
	
	public function getSites($site_id) {
		
      	$query = $this->db->query("SELECT DISTINCT * FROM `" . DB_PREFIX . "site_master` WHERE `site_id` = '" . (int)$site_id . "'");
		
		return $query->row;
	}
	
	public function getSitess($data = array()) {
		$sql = "SELECT `site_id`, `owner_id`,`plan_id`,`sub_domain`,`domain`,`site_type`,`live_date`,`active_status`,`date_added`,`status` FROM `" . DB_PREFIX . "site_master` WHERE 1=1 ";
		
		
		if (isset($data['filter_owner_id']) && !is_null($data['filter_owner_id'])) {
			$sql .= " AND owner_id LIKE '%" . $this->db->escape($data['filter_owner_id']) . "%'";
		}


		if (isset($data['filter_plan_id']) && !is_null($data['filter_plan_id'])) {
			$sql .= " AND plan_id = '" . $data['filter_plan_id'] . "'";
		}


		if (isset($data['filter_sub_domain']) && !is_null($data['filter_sub_domain'])) {
			$sql .= " AND sub_domain LIKE '%" . $this->db->escape($data['filter_sub_domain']) . "%'";
		}


		if (isset($data['filter_site_type']) && !is_null($data['filter_site_type'])) {
			$sql .= " AND site_type = '" . $data['filter_site_type'] . "'";
		}


		if (isset($data['filter_live_date']) && !is_null($data['filter_live_date'])) {
			$sql .= " AND live_date LIKE '%" . $this->db->escape($data['filter_live_date']) . "%'";
		}


		if (isset($data['filter_active_status']) && !is_null($data['filter_active_status'])) {
			$sql .= " AND active_status = '" . $data['filter_active_status'] . "'";
		}


		if (isset($data['filter_date_added']) && !is_null($data['filter_date_added'])) {
			$sql .= " AND date_added LIKE '%" . $this->db->escape($data['filter_date_added']) . "%'";
		}


		if (isset($data['filter_status']) && !is_null($data['filter_status'])) {
			$sql .= " AND status = '" . $data['filter_status'] . "'";
		}


		
		$sort_data = array(
			
			'owner_id',
			'plan_id',
			'sub_domain',
			'domain',
			'site_type',
			'live_date',
			'active_status',
			'date_added',
			'status',
		);	
			
		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];	
		} else {
			$sql .= " ORDER BY `site_id`";	
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
	
	public function getTotalSitess($data = array()) {
		$sql = "SELECT COUNT(*) AS total FROM `" . DB_PREFIX . "site_master` WHERE 1=1 ";
		
		
		if (isset($data['filter_owner_id']) && !is_null($data['filter_owner_id'])) {
			$sql .= " AND owner_id LIKE '%" . $this->db->escape($data['filter_owner_id']) . "%'";
		}


		if (isset($data['filter_plan_id']) && !is_null($data['filter_plan_id'])) {
			$sql .= " AND plan_id = '" . $data['filter_plan_id'] . "'";
		}


		if (isset($data['filter_sub_domain']) && !is_null($data['filter_sub_domain'])) {
			$sql .= " AND sub_domain LIKE '%" . $this->db->escape($data['filter_sub_domain']) . "%'";
		}


		if (isset($data['filter_site_type']) && !is_null($data['filter_site_type'])) {
			$sql .= " AND site_type = '" . $data['filter_site_type'] . "'";
		}


		if (isset($data['filter_live_date']) && !is_null($data['filter_live_date'])) {
			$sql .= " AND live_date LIKE '%" . $this->db->escape($data['filter_live_date']) . "%'";
		}


		if (isset($data['filter_active_status']) && !is_null($data['filter_active_status'])) {
			$sql .= " AND active_status = '" . $data['filter_active_status'] . "'";
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
	
	
	public function getPlans($data = array()) {
		$plans = array();

//		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "plan_table`");
//		
//		if($query->num_rows) {
//			foreach($query->rows as $each_row) {
//				if (isset($data['display']) && !is_null($data['display'])) {
//					$plans[$each_row['id']] = $each_row['title'];
//				} else {
//					$plans[] = array(
//						'plan_id' => $each_row['id'],
//						'name' => $each_row['title'],
//					);	
//				}								
//			}
//		}

		$plans[] = array(
			'plan_id' => '1',
			'name' => 'Option 1',
		);

		$plans[] = array(
			'plan_id' => '2',
			'name' => 'Option 2',
		);

		$plans[] = array(
			'plan_id' => '3',
			'name' => 'Option 3',
		);

		if (isset($data['display']) && !is_null($data['display'])) {
			$new_plans = array();
			foreach($plans as $key => $value) {
				$new_plans[$value['plan_id']] = $value['name'];
			}
			$plans = $new_plans;
		};


		return $plans;
	}

	public function getSiteTypes($data = array()) {
		$site_types = array();

//		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "site_type_table`");
//		
//		if($query->num_rows) {
//			foreach($query->rows as $each_row) {
//				if (isset($data['display']) && !is_null($data['display'])) {
//					$site_types[$each_row['id']] = $each_row['title'];
//				} else {
//					$site_types[] = array(
//						'site_type_id' => $each_row['id'],
//						'name' => $each_row['title'],
//					);	
//				}								
//			}
//		}

		$site_types[] = array(
			'site_type_id' => 'W',
			'name' => 'W',
		);

		$site_types[] = array(
			'site_type_id' => 'E',
			'name' => 'E',
		);

		$site_types[] = array(
			'site_type_id' => 'R',
			'name' => 'R',
		);

		if (isset($data['display']) && !is_null($data['display'])) {
			$new_site_types = array();
			foreach($site_types as $key => $value) {
				$new_site_types[$value['site_type_id']] = $value['name'];
			}
			$site_types = $new_site_types;
		};


		return $site_types;
	}

	public function getActiveStatuss($data = array()) {
		$active_statuss = array();

//		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "active_status_table`");
//		
//		if($query->num_rows) {
//			foreach($query->rows as $each_row) {
//				if (isset($data['display']) && !is_null($data['display'])) {
//					$active_statuss[$each_row['id']] = $each_row['title'];
//				} else {
//					$active_statuss[] = array(
//						'active_status_id' => $each_row['id'],
//						'name' => $each_row['title'],
//					);	
//				}								
//			}
//		}

		$active_statuss[] = array(
			'active_status_id' => 'Y',
			'name' => 'Y',
		);

		$active_statuss[] = array(
			'active_status_id' => 'M',
			'name' => 'M',
		);

		$active_statuss[] = array(
			'active_status_id' => 'N',
			'name' => 'N',
		);

		if (isset($data['display']) && !is_null($data['display'])) {
			$new_active_statuss = array();
			foreach($active_statuss as $key => $value) {
				$new_active_statuss[$value['active_status_id']] = $value['name'];
			}
			$active_statuss = $new_active_statuss;
		};


		return $active_statuss;
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