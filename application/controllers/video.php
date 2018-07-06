<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class video extends CI_Controller {

		public function index(){
			$data['videos'] = $this->load_video();
			$data['user_type'] = $this->verify_role();
			$data['page'] = "notexist";
			$this->build_static_info($data);
			$this->load->view('video/video_list', $data);
			$this->build_static_footer();
		}

    public function load_video(){
			return video_model::get_all();
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
