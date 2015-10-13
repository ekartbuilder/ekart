<?php
class ControllerCommonColumnLeft extends Controller {
	public function index() {
		if (isset($this->session->data['token'])) {
			$data['profile'] = $this->load->controller('common/profile');
			$data['menu'] = $this->load->controller('common/menu');
			$data['stats'] = $this->load->controller('common/stats');

			return $this->load->view('common/column_left.tpl', $data);
		}
	}
}