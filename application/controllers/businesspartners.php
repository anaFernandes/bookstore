<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class businesspartners extends CI_Controller {
		public function index() {
			$data['page'] = "notexist";
			$data['user_type'] = $this->verify_role();
			$data['people'] = $this->all_people();
			$this->build_static_info($data);
			$this->load->view('businesspartners/businesspartners_list', $data);
			$this->build_static_footer();
}

		public function all_people(){
			return person_model::get_all();
		}

		public function verify_role() {
			if(isset($_SESSION['user']))
				return 1;
			else
				return 0;
		}

		public function build_static_info($data) {
			// $header_data['active'] = 'images';
			// if($this->verify_role() == 1) {
					// $header_url = 'layout/admin-header';
					// $this->load->view($header_url, $header_data);
			// } else {
					$header_url = 'layout/header';
					$this->load->view($header_url, $data);
					// $this->load->view($header_url, $header_data);
			// }
		}

		public function build_static_footer() {
			$this->load->view('layout/footer');
		}


}
