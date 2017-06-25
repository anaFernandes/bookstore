<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function index() {
		$data['custumers'] = $this->load_custumers();
		$header = $this->define_header();
		$this->load->view($header);

		if($this->define_access())
			$this->load->view('custumer/custumer_list',$data);
		else
			$this->load->view('layout/no-access');

		$this->load->view('layout/footer');
	}

	public function register() {
		$header = $this->define_header();
		$this->load->view($header);
		if($this->define_access())
			$this->load->view('custumer/custumer_register');
		else
			$this->load->view('layout/no-access');
		$this->load->view('layout/footer');
	}


	public function edit($id) {
		$custumer = custumer_model::get_from_id($id);
		$data['custumer'] = $custumer;
		$header = $this->define_header();
		$this->load->view($header);
		if($this->define_access())
			$this->load->view('custumer/custumer_edit', $data);
		else
			$this->load->view('layout/no-access');
		$this->load->view('layout/footer');
	}

	private function define_access() {
		if($_SESSION['role'] == 2 )
			return true;
		return false;
	}

	private function define_header() {
		$header_url = '';
		if($_SESSION['role'] == 2) {
			$header_url = 'layout/header-adm';
		} else if($_SESSION['role'] == 1) {
			$header_url = 'layout/header-tea';
		} else {
			$header_url = 'layout/header-std';
		}
		return $header_url;
	}

	public function update($id) {
		$custumer = new custumer_model($id);
		$custumer->fname = $_POST['fname'];
		$custumer->lname = $_POST['lname'];
		$custumer->email  = $_POST['email'];
    $custumer->street = $_POST['street'];
		$custumer->city = $_POST['city'];
		$custumer->state  = $_POST['state'];
    $custumer->zip = $_POST['zip'];
		$custumer->save();


	public function del($id){
		$custumer = new custumer_model($id);
	  	$custumer->delete();

		redirect(base_url('custumer'));
	}


	private function load_custumers() {
		return custumer_model::get_all();
	}

	public function save() {
		$custumer = new custumer_model();
		$custumer->fname = $_POST['fname'];
		$custumer->lname = $_POST['lname'];
		$custumer->email = $_POST['email'];
    $custumer->street = $_POST['street'];
		$custumer->city = $_POST['city'];
		$custumer->state  = $_POST['state'];
    $custumer->zip = $_POST['zip'];

		$custumer->save();
		redirect(base_url('custumer'));
	}
}
