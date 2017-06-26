<?php
class Image_model extends CI_Model {
    public $id;
    public $ISBN;
    public $urlimg;

    public function __construct($id=0) {
      $this->load->database();
      if ($id) {
        $this->db->where('idimg', $id);
        $this->ISBN                   = $result->ISBN;
        $this->urlimg                 = $result->urlimg;
      }
    }

    public function save () {
      if ( isset($this->id) ) {
        $data = $this->db->query("UPDATE bookimage SET urlimg='".$this->urlimg."',
                                            ISBN='".$this->ISBN."',
                                            WHERE idimg=".$this->id);
      }
      else {
          unset($this->id);
          $this->db->insert('bookimage', $this);
      }
    }

    // public static function get_from_image($urlimg) {
    //   $CI =& get_instance();
    //   $CI->db->where('urlimg', $urlimg);
    //   $result = $CI->db->get('bookimage')->result();
    //   if(count($result) > 0) {
    //     return new image_model($result[0]->urlimg);
    //   } else {
    //     return false;
    //   }
    // }

    public function delete ($urlimg) {
      $this->db->delete('bookimage', array('urlimg' => $urlimg));
    }

    public static function deleteISBN($ISBN) {
      $CI = & get_instance();
      $CI->db->where('ISBN', $ISBN);
      $CI->db->delete('bookimage');
    }

    public static function get_from_id($id) {
      $CI =& get_instance();
      $CI->db->where('idimg', $id);
      $result = $CI->db->get('bookimage')->result();
      if(count($result) > 0) {
        return new image_model($result[0]->idimg);
      } else {
        return false;
      }
    }

    public static function get_all() {
      $CI =& get_instance();
      $results = $CI->db->get('bookimage')->result();
      return $results;
    }
}
