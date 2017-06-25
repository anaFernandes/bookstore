<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class CategoryBook_model extends CI_Model {
  public $ISBN;
  public $CategoryID;

  public function __construct($ISBN=0) {
    $this->load->database();
    if ($ISBN) {
      $this->db->where('ISBN', $ISBN);
      $result = $this->db->get('bookcategoriesbooks')->result()[0];
      $this->CategoryID = $result->CategoryID;
      $this->ISBN  = $result->ISBN;
    }
  }

  public function saveUpdate () {
    $this->db->query("UPDATE bookcategoriesbooks SET CategoryID='".$this->CategoryID."'
                                          WHERE ISBN=".$this->ISBN);
  }

  public function saveInsert(){
    $this->db->insert('bookcategoriesbooks', $this);
  }

  public static function get_from_category($CategoryID) {
    $CI =& get_instance();
    $CI->db->where('CategoryID', $CategoryID);
    $result = $CI->db->get('bookcategoriesbooks')->result();
    if(count($result) > 0) {
      return $result;
    } else {
      return false;
    }
  }

  public static function delete_from_category ($CategoryID) {
    $CI = & get_instance();
    $CI->db->where('CategoryID', $CategoryID);
    $CI->db->delete('bookcategoriesbooks');
  }

  public static function delete ($ISBN) {
    $CI = & get_instance();
    $CI->db->where('ISBN', $ISBN);
    $CI->db->delete('bookcategoriesbooks');
  }

  public static function get_from_isbn($ISBN) {
    $CI =& get_instance();
    $CI->db->where('ISBN', $ISBN);
    $result = $CI->db->get('bookcategoriesbooks')->result();
    if(count($result) > 0) {
      return new CategoryBook_model($result[0]->ISBN);
    } else {
      return false;
    }
  }

  public static function get_all() {
    $CI =& get_instance();
    $results = $CI->db->get('bookcategoriesbooks')->result();
    return $results;
  }
}
