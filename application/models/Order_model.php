<?php
class Order_model extends CI_Model {
    public $id;
    public $custID;
    public $orderdate;

    public function __construct($id=0) {
      $this->load->database();
      if ($id) {
        $this->db->where('orderID', $id);
        $result = $this->db->get('bookorders')->result()[0];
        $this->id = $result->orderID;
        $this->custID = $result->custID;
        $this->orderdate = $result->orderdate;
      }
    }

    orderID (int, primary key, autonumber)	orderID (primary key, int)
    custID (int(6))	ISBN (primary key, varchar(11)
    orderdate (int(11))

    public function save () {
      if ( isset($this->id) ) {
        $data = $this->db->query("UPDATE bookorders SET custID='".$this->custID."',
                                             orderdate='".$this->orderdate."',
                                            WHERE orderID=".$this->id);
      }
      else {
          unset($this->id);
          $this->db->insert('bookorders', $this);
          $this->id = Order_model::get_from_custID($this->custID);
      }
    }

    public static function get_from_custID($custID) {
      $CI =& get_instance();
      $CI->db->where('custID', $custID);
      $result = $CI->db->get('bookorders')->result();
      if(count($result) > 0) {
        return new Order_model($result[0]->orderID);
      } else {
        return false;
      }
    }

    public function delete () {
      $this->db->delete('bookorders', array('orderID' => $this->id));
    }

    public static function get_from_id($id) {
      $CI =& get_instance();
      $CI->db->where('orderID', $id);
      $result = $CI->db->get('bookorders')->result();
      if(count($result) > 0) {
        return new Order_model($result[0]->orderID);
      } else {
        return false;
      }
    }

    public static function get_all() {
      $CI =& get_instance();
      $results = $CI->db->get('bookorders')->result();
      return $results;
    }
}
