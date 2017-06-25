<?php
    public $id;
    public $fname;
    public $email;
    public $street;

    public function __construct($id=0) {
      $this->load->database();
      if ($id) {
        $this->db->where('custID', $id);
        $result = $this->db->get('bookcustomers')->result()[0];
        $this->id                   = $result->custID;
        $this->fname                 = $result->fname;
        $this->lname          = $result->lname;
        $this->email          = $result->email;
        $this->street                = $result->street;
        $this->id                   = $result->custID;
        $this->city                 = $result->city;
        $this->zip                = $result->zip;
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
                                            WHERE custID=".$this->id);
      }
      else {
          unset($this->id);
          $this->db->insert('bookcustomers', $this);
          $this->id = Discipline_model::get_from_discipline($this->street);
      }
    }

    public static function get_from_name($fname, $lname) {
      $CI =& get_instance();
      $CI->db->where('street', $street);
      $result = $CI->db->get('bookcustomers')->result();
      if(count($result) > 0) {
        return new Discipline_model($result[0]->custID);
      } else {
        return false;
      }
    }

    public function delete () {
      $this->db->delete('bookcustomers', array('custID' => $this->id));
    }

    public static function get_from_id($id) {
      $CI =& get_instance();
      $CI->db->where('custID', $id);
      $result = $CI->db->get('bookcustomers')->result();
      if(count($result) > 0) {
        return new Discipline_model($result[0]->custID);
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
