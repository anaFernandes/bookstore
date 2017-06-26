<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Category_model extends CI_Model {

  public $CategoryID;
  public $CategoryName;

  public function __construct($CategoryID=0) {
    $this->load->database();
    if ($CategoryID) {
      $this->db->where('CategoryID', $CategoryID);
      $result = $this->db->get('bookcategories')->result()[0];
      $this->CategoryID  = $result->CategoryID;
      $this->CategoryName = $result->CategoryName;
    }
  }

  public function save () {
    if ( isset($this->CategoryID) ) {
      $data = $this->db->query("UPDATE bookcategories SET CategoryName='".$this->CategoryName."'
                                          WHERE CategoryID=".$this->CategoryID);
    }
    else {
        unset($this->CategoryID);
        $this->db->insert('bookcategories', $this);
        $this->CategoryID = Category_model::get_from_Category($this->CategoryID);
    }
  }

  public static function get_from_Category($CategoryID) {
    $CI =& get_instance();
    $CI->db->where('CategoryID', $CategoryID);
    $result = $CI->db->get('bookcategories')->result();
    if(count($result) > 0) {
      return new Category_model($result[0]->$CategoryID);
    } else {
      return false;
    }
  }

  public function delete () {
    $this->db->delete('bookcategories', array('CategoryID' => $this->CategoryID));
  }


  public static function get_from_id($CategoryID) {
    $CI =& get_instance();
    $CI->db->where('CategoryID', $CategoryID);
    $result = $CI->db->get('bookcategories')->result();
    if(count($result) > 0) {
      return new Category_model($result[0]->CategoryID);
    } else {
      return false;
    }
  }

  public static function get_all() {
    $CI =& get_instance();
    $results = $CI->db->get('bookcategories')->result();
    return $results;
  }
}
