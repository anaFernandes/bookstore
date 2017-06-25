<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Discipline extends CI_Controller {

	public function index() {
		$data['disciplines'] = $this->load_disciplines();
		$header = $this->define_header();
		$this->load->view($header);

		if($this->define_access())
			$this->load->view('discipline/discipline_list',$data);
		else
			$this->load->view('layout/no-access');

		$this->load->view('layout/footer');
	}

	public function register() {
		$header = $this->define_header();
		$this->load->view($header);
		if($this->define_access())
			$this->load->view('discipline/discipline_register');
		else
			$this->load->view('layout/no-access');
		$this->load->view('layout/footer');
	}


	public function edit($id) {
		$discipline = Discipline_model::get_from_id($id);
		$data['discipline'] = $discipline;
		$header = $this->define_header();
		$this->load->view($header);
		if($this->define_access())
			$this->load->view('discipline/discipline_edit', $data);
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
		$discipline = new Discipline_model($id);
		$discipline->name                 = $_POST['name'];
		$discipline->description             = $_POST['description'];
		$discipline->sigla                = $_POST['sigla'];
		$discipline->save();

		redirect(base_url('discipline'));
	}

	public function del($id){
		$discipline = new Discipline_model($id);
	  	$discipline->delete();

		redirect(base_url('discipline'));
	}


	private function load_disciplines() {
		return Discipline_model::get_all();
	}

	public function save() {
		$discipline = new Discipline_model();
		$discipline->name = $_POST['name'];
		$discipline->description = $_POST['description'];
		$discipline->sigla = $_POST['sigla'];
		$discipline->save();
		redirect(base_url('discipline'));
	}
}
