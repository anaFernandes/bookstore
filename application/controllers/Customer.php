<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function index() {
		$data['customers'] = $this->load_customers();
		$header = $this->define_header();
		$this->load->view($header);
		if($this->define_access())
			$this->load->view('customer/customer_list',$data);
		else
			$this->load->view('layout/no-access');

		$this->load->view('layout/footer');
	}

	public function register() {
		$header = $this->define_header();
		$this->load->view($header);
		if($this->define_access())
			$this->load->view('customer/customer_register');
		else
			$this->load->view('layout/no-access');
		$this->load->view('layout/footer');
	}


	public function edit($id) {
		$customer = customer_model::get_from_id($id);
		$data['customer'] = $customer;
		$header = $this->define_header();
		$this->load->view($header);
		if($this->define_access())
			$this->load->view('customer/customer_edit', $data);
		else
			$this->load->view('layout/no-access');
		$this->load->view('layout/footer');
	}

	public function verify_role() {
		if(isset($_SESSION['user']))
			return 1;
		else
			return 0;
	}

	public function build_static_info() {
		$header_data['categories'] = category_model::get_all();
		$header_data['active'] = 'books';
		if($this->verify_role() == 1) {
				$header_url = 'layout/admin-header';
				$this->load->view($header_url, $header_data);
		} else {
				$header_url = 'layout/header';
				$this->load->view($header_url, $header_data);
		}
	}

	public function build_static_footer() {
		$this->load->view('layout/footer');
	}

	public function update($id) {

		$customer = new customer_model($id);
		$customer->fname = $_POST['fname'];
		$customer->lname = $_POST['lname'];
		$customer->email  = $_POST['email'];
    $customer->street = $_POST['street'];
		$customer->city = $_POST['city'];
		$customer->state  = $_POST['state'];
    $customer->zip = $_POST['zip'];

		$customer->save();
	}


	public function del($id){
		$customer = new customer_model($id);
  	$customer->delete();

		redirect(base_url('customer'));
	}


	private function load_customers() {
		return customer_model::get_all();
	}

	public static function save() {
		$customer = new customer_model();
		$customer->fname = $_POST['fname'];
		$customer->lname = $_POST['lname'];
		$customer->email = $_POST['email'];
    $customer->street = $_POST['street'];
		$customer->city = $_POST['city'];
		$customer->state  = $_POST['state'];
    $customer->zip = $_POST['zip'];
		$customer->save();
		$this->build_static_info();
		$this->load->view('obrigada');
		$this->build_static_footer();
		delete_cookie('shopping_cart');
	}
}
