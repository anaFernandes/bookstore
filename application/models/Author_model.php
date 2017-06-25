<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Author_model extends CI_Model {
  public $AuthorID;
  public $nameF;
  public $nameL;

  public function __construct($AuthorID=0) {
    $this->load->database();
    if ($AuthorID) {
      $this->db->where('AuthorID', $AuthorID);
      $result = $this->db->get('bookauthors')->result()[0];
      $this->AuthorID  = $result->AuthorID;
      $this->nameF     = $result->nameF;
      $this->nameL     = $result->nameL;
    }
  }

  public function save () {
    if ( isset($this->AuthorID) ) {
      $data = $this->db->query("UPDATE bookauthors SET nameF='".$this->nameF."',
                                           nameL='".$this->nameL."'
                                          WHERE AuthorID=".$this->AuthorID);
    }
    else {
        unset($this->AuthorID);
        $this->db->insert('bookauthors', $this);
        $this->AuthorID = Author_model::get_from_author($this->AuthorID);
    }
  }

  public function delete () {
    $this->db->delete('bookauthors', array('AuthorID' => $this->AuthorID));
  }
  
  public static function get_from_id($AuthorID) {
    $CI =& get_instance();
    $CI->db->where('AuthorID', $AuthorID);
    $result = $CI->db->get('bookauthors')->result();
    if(count($result) > 0) {
      return new Author_model($result[0]->AuthorID);
    } else {
      return false;
    }
  }

  public static function get_all() {
    $CI =& get_instance();
    $results = $CI->db->get('bookauthors')->result();
    return $results;
  }
}
