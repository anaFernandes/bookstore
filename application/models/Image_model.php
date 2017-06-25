<?php
class Image_model extends CI_Model {
    public $id;
    public $isbn;
    public $img;

    public function __construct($id=0) {
      $this->load->database();
      if ($id) {
        $this->db->where('idimg', $id);
        $result = $this->db->get('images')->result()[0];
        $this->id                   = $result->idimg;
        $this->ISBN                   = $result->ISBN;
        $this->img                 = $result->img;
      }
    }

    public function save () {
      if ( isset($this->id) ) {
        $data = $this->db->query("UPDATE images SET img='".$this->img."',
                                            ISBN='".$this->ISBN."',
                                            WHERE idimg=".$this->id);
      }
      else {
          unset($this->id);
          $this->db->insert('images', $this);
          $this->id = image_model::get_from_image($this->bigimg);
      }
    }

    public static function get_from_image($bigimg) {
      $CI =& get_instance();
      $CI->db->where('bigimg', $bigimg);
      $result = $CI->db->get('images')->result();
      if(count($result) > 0) {
        return new image_model($result[0]->idimg);
      } else {
        return false;
      }
    }

    public function delete () {
      $this->db->delete('images', array('idimg' => $this->id));
    }

    public static function get_from_id($id) {
      $CI =& get_instance();
      $CI->db->where('idimg', $id);
      $result = $CI->db->get('images')->result();
      if(count($result) > 0) {
        return new image_model($result[0]->idimg);
      } else {
        return false;
      }
    }

    public static function get_all() {
      $CI =& get_instance();
      $results = $CI->db->get('images')->result();
      return $results;
    }

  public function upload($img)
  {
      $config['upload_path']          = './uploads/';
      $config['allowed_types']        = 'gif|jpg|png';
      $config['max_size']             = 100;
      $config['max_width']            = 1024;
      $config['max_height']           = 768;
      $this->load->library('upload', $config);


      $this->load->library('upload', $config);

      if ( ! $this->upload->do_upload($img))
      {
              $error = array('error' => $this->upload->display_errors());

              $this->load->view('upload_form', $error);
      }
      else
      {
              $data = array('upload_data' => $this->upload->data());

              $this->load->view('upload_success', $data);
      }
  }
}
