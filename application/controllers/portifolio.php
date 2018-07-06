<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class portifolio extends CI_Controller {
		public function index() {
			$data['user_type'] = $this->verify_role();
			$data['page'] = "exist";
			$this->build_static_info($data);
			$this->build_static_footer();
		}

		public function image(){
			$data['images'] = $this->load_images();
			$data['user_type'] = $this->verify_role();
			$data['page'] = "notexist";
			$this->build_static_info($data);
			$this->load->view('image/image_list', $data);
			$this->build_static_footer();
		}

		public function load_images(){
			return image_model::get_all();
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

		public function show_image($imageid) {
			$data['images'] = image_model::get_from_id(imageid);
			$data['user_type'] = $this->verify_role();
			$this->build_static_info($data);
		 	$this->load->view('image/image_description', $data);
			$this->build_static_footer();
		}

		public function searchAll() {
			$data['user_type'] = $this->verify_role();
			$data['h1'] = "Busca feita : ".$_POST['SearchString'];
			$data['page'] = "notexist";
			$data['images'] = image_model::search_all_columns($_POST['SearchString']);
			$header_url = 'layout/header';
			$this->load->view($header_url, $data);
		 	$this->load->view('image/image_list', $data);
			$this->load->view('layout/footer');
		}

		public function verify_role() {
			if(isset($_SESSION['user']))
				return 1;
			else
				return 0;
		}

		public function edit($imageid) {
			$data['page'] = "noexist";
			$data['user_type'] = $this->verify_role();
			$this->build_static_info($data);
			$image = image_model::get_from_id($imageid);
			$data['image'] = $image;

			if($this->verify_role() == 1) {
					$this->load->view('image/image_edit', $data);
			} else {
					$this->load->view('acesso-negado');
			}
			$this->build_static_footer();
		}

		public function update($imageid) {
			$image = new image_model($imageid);
			$image->imageid = $_POST['imageid'];
			$image->model = $this->clean_str($_POST['model']);
			$image->photographer = $this->clean_str($_POST['photographer']);
			$image->section = $this->$_POST['section'];
			$image->keyword = $this->clean_str($_POST['keyword']);

			$image->saveUpdate();

			$img1 = $_FILES['Small_File'];

			self::InsertImg($image, $img1);
			$data['user_type'] = $this->verify_role();
			redirect(base_url('portifolio/image_list', $data));
		}

		public function del($imageid){
			$image = new image_model($imageid);
			$image->delete();
			redirect(base_url('portifolio/image_list'));
		}
}
