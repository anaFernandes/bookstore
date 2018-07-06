<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class person_model extends CI_Model {
  public $personid;
  public $name;
  public $kind;

  public function __construct($personid=0) {
    $this->load->database();
    if ($personid) {
      $this->db->where('personid', $personid);
      $result = $this->db->get('people')->result()[0];
      $this->personid  = $result->personid;
      $this->name     = $result->name;
      $this->kind = $result->kind;
    }
  }

  public function save () {
    if ( isset($this->personid) ) {
      $data = $this->db->query("UPDATE people SET name='".$this->name."',
                                          kind='".$this->$kind."',
                                          WHERE personid=".$this->personid);
    }
    else {
        unset($this->personid);
        $this->db->insert('people', $this);
        $this->personid = person_model::get_from_model($this->personid);
    }
  }

  public function delete () {
    $this->db->delete('people', array('personid' => $this->personid));
  }

  public static function get_from_id($personid) {
    $CI =& get_instance();
    $CI->db->where('personid', $personid);
    $result = $CI->db->get('people')->result();
    if(count($result) > 0) {
      return new person_model($result[0]->personid);
    } else {
      return false;
    }
  }

  public static function get_all() {
    $CI =& get_instance();
    $results = $CI->db->get('people')->result();
    return $results;
  }
}
