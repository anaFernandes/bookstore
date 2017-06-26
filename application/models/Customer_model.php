<?php
class Customer_model extends CI_Model {
    public $custID;
    public $fname;
    public $lname;
    public $email;
    public $street;
    public $state;
    public $city;
    public $zip;

    public function __construct($id=0) {
      $this->load->database();
      if ($id) {
        $this->db->where('custID', $id);
        $result = $this->db->get('bookcustomers')->result()[0];
        $this->custID                   = $result->custID;
        $this->fname                    = $result->fname;
        $this->lname                    = $result->lname;
        $this->email                    = $result->email;
        $this->street                   = $result->street;
        $this->state                    = $result->state;
        $this->city                     = $result->city;
        $this->zip                      = $result->zip;
      }
    }

    public function save () {
      if ( isset($this->id) ) {
        $data = $this->db->query("UPDATE bookcustomers SET fname='".$this->fname."',
                                             lfname='".$this->lfname."',
                                             email='".$this->email."',
                                             street='".$this->street."'
                                             city='".$this->city."',
                                             state='".$this->state."'
                                             zip='".$this->zip."'
                                             WHERE custID=".$this->custID);
      }
      else {
          unset($this->custID);
          $this->db->insert('bookcustomers', $this);
          $this->custID = Customer_model::get_from_email($this->email);
      }
    }

    public static function get_from_email($email) {
      $CI =& get_instance();
      $CI->db->where('email', $email);
      $result = $CI->db->get('bookcustomers')->result();
      if(count($result) > 0) {
        return new Customer_model($result[0]->custID);
      } else {
        return false;
      }
    }

    public function delete () {
      $this->db->delete('bookcustomers', array('custID' => $this->custID));
    }

    public static function get_from_id($custID) {
      $CI =& get_instance();
      $CI->db->where('custID', $custID);
      $result = $CI->db->get('bookcustomers')->result();
      if(count($result) > 0) {
        return new Customer_model($result[0]->custID);
      } else {
        return false;
      }
    }

    public static function get_all() {
      $CI =& get_instance();
      $results = $CI->db->get('bookcustomers')->result();
      return $results;
    }
}
