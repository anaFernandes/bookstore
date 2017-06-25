<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class AuthorBook_model extends CI_Model {
  public $ISBN;
  public $AuthorID;

  public function __construct($ISBN=0) {
    $this->load->database();
    if ($ISBN) {
      $this->db->where('ISBN', $ISBN);
      $result = $this->db->get('bookauthorsbooks')->result()[0];
      $this->ISBN  = $result->ISBN;
      $this->AuthorID  = $result->AuthorID;
    }
  }

  public function saveUpdate () {
      $this->db->query("UPDATE bookauthorsbooks SET AuthorID='".$this->AuthorID."'
                                          WHERE ISBN=".$this->ISBN);
    }

  public function saveInsert(){
    //INsert into
          $this->db->insert('bookauthorsbooks', $this);
          $this->ISBN = AuthorBook_model::get_from_author($this->ISBN);
}

public static function get_from_author($AuthorID) {
  $CI =& get_instance();
  $CI->db->where('AuthorID', $AuthorID);
  $result = $CI->db->get('bookauthorsbooks')->result();
  if(count($result) > 0) {
    return new Author_model($result[0]->$AuthorID);
  } else {
    return false;
  }
}

  public static function delete ($ISBN) {
    $CI = & get_instance();
    $CI->db->where('ISBN', $ISBN);
    $CI->db->delete('bookauthorsbooks');
  }

  public static function delete_from_author ($AuthorID) {
    $CI = & get_instance();
    $CI->db->where('AuthorID', $AuthorID);
    $CI->db->delete('bookauthorsbooks');
  }

  public static function get_from_isbn($ISBN) {
    $CI =& get_instance();
    $CI->db->where('ISBN', $ISBN);
    $result = $CI->db->get('bookauthorsbooks')->result();
    if(count($result) > 0) {
      return new AuthorBook_model($result[0]->ISBN);
    } else {
      return false;
    }
  }

  public static function get_all() {
    $CI =& get_instance();
    $results = $CI->db->get('bookauthorsbooks')->result();
    return $results;
  }
}
