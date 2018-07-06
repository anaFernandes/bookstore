<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
		public function index() {
      $databuild['page'] = "notexist";
			$this->build_static_info($databuild);
      $this->load->view('admin/login');
			$this->build_static_footer();
		}

    public function build_static_info($databuild) {
      // $header_data['active'] = 'images';
      // if($this->verify_role() == 1) {
          // $header_url = 'layout/admin-header';
          // $this->load->view($header_url, $header_data);
      // } else {
          $header_url = 'layout/header';
          $this->load->view($header_url, $databuild);
          // $this->load->view($header_url, $header_data);
      // }
    }

    public function build_static_footer() {
      $this->load->view('layout/footer');
    }

		public function logout() {
			session_destroy();
			redirect(base_url('portifolio'));
		}

		public function verify_role() {
			if(isset($_SESSION['user']))
				return 1;
			else
				return 0;
		}

		public function checkLogin()
      {
					$this->db->where('email', $_POST['email']);
					$this->db->where('pass', $_POST['pass']);
					$result = $this->db->get('users')->result();
					if(!empty($result)) {
						$user = $result;
						$this->session->set_userdata('user', $user);
						redirect(base_url());
					} else {
						$data['error'] = 'usuário não existe';
						$databuild['page'] = "notexist";
						$this->build_static_info($databuild);
						$this->load->view('admin/login', $data);
						$this->build_static_footer();
					}
      }
}
