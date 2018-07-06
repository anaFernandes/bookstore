<?php
class Image_model extends CI_Model {
    public $imageid;
    public $model;
    public $photographer;
    public $keyword;
    public $section;


    public function __construct($imageid=0) {
      $this->load->database();
      if ($imageid) {
        $this->db->where('imageid', $imageid);
        $result = $this->db->get('image')->result()[0];
        $this->model                   = $result->model;
        $this->photographer            = $result->photographer;
        $this->keyword                 = $result->keyword;
        $this->section                 = $result->section;
      }
    }

    public function saveUpdate () {
              $data = $this->db->query('UPDATE image SET model="'.$this->model.'",
                                                  photographer="'.$this->photographer.'" ,
                                                  keyword="'.$this->keyword.'",
                                                  section="'.$this->section.'",
                                                  WHERE imageid="'.$this->imageid.'"');
        }

    public function saveInsert () {
          $this->db->insert('image', $this);
          // $this->ISBN = Book_model::get_from_book($this->price);
      }

    public static function search_all_columns($search_value) {
        $CI =& get_instance();
        $CI->db->like('photographer', $search_value);
        $CI->db->or_like('model', $search_value);
        $CI->db->or_like('keyword', $search_value);
        $results = $CI->db->get('image')->result();
        return $results;
      }

    public function delete ($section) {
      $this->db->delete('image', array('section' => $section));
    }

    // public static function deleteModel($model) {
    //   $CI = & get_instance();
    //   $CI->db->where('model', $model);
    //   $CI->db->delete('image');
    // }

    public static function get_from_id($imageid) {
      $CI =& get_instance();
      $CI->db->where('imageid', $imageid);
      $result = $CI->db->get('image')->result();
      if(count($result) > 0) {
        return new image_model($result[0]->imageid);
      } else {
        return false;
      }
    }

    public static function get_all() {
      $CI =& get_instance();
      $results = $CI->db->get('image')->result();
      return $results;
    }
}
