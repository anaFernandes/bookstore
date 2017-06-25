<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	public function index() {
		$data['orders'] = $this->load_orders();
		$header = $this->define_header();
		$this->load->view($header);

		if($this->define_access())
			$this->load->view('order/order_list',$data);
		else
			$this->load->view('layout/no-access');

		$this->load->view('layout/footer');
	}

	public function register() {
		$header = $this->define_header();
		$this->load->view($header);
		if($this->define_access())
			$this->load->view('order/order_register');
		else
			$this->load->view('layout/no-access');
		$this->load->view('layout/footer');
	}


	public function edit($id) {
		$order = Order_model::get_from_id($id);
		$data['order'] = $order;
		$header = $this->define_header();
		$this->load->view($header);
		if($this->define_access())
			$this->load->view('order/order_edit', $data);
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
		$order = new Order_model($id);
		$order->name                 = $_POST['name'];
		$order->description             = $_POST['description'];
		$order->sigla                = $_POST['sigla'];
		$order->save();

		redirect(base_url('order'));
	}

	public function del($id){
		$order = new Order_model($id);
	  	$order->delete();

		redirect(base_url('order'));
	}


	private function load_orders() {
		return Order_model::get_all();
	}

	public function save() {
		$order = new Order_model();
		$order->name = $_POST['name'];
		$order->description = $_POST['description'];
		$order->sigla = $_POST['sigla'];
		$order->save();
		redirect(base_url('order'));
	}
}
