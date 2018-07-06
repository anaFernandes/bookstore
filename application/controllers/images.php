<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class images extends CI_Controller {

  public function index(){
    // $data['images'] = $this->load_images();
    // $data['user_type'] = $this->verify_role();
    // $this->load->view('image/image_list');
    $this->build_static_info();
    // $this->load->view('image/image_list', $data);
    $this->build_static_footer();
  }

  public function load_images(){
    return image_model::get_all();
  }

  public function build_static_info() {
    // $header_data['active'] = 'images';
    // if($this->verify_role() == 1) {
        // $header_url = 'layout/admin-header';
        // $this->load->view($header_url, $header_data);
    // } else {
        $header_url = 'layout/header';
        $this->load->view($header_url);
        // $this->load->view($header_url, $header_data);
    // }
  }

  public function build_static_footer() {
    $this->load->view('layout/footer');
  }
}
