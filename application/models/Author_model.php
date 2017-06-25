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

  public static function get_from_author($AuthorID) {
    $CI =& get_instance();
    $CI->db->where('AuthorID', $AuthorID);
    $result = $CI->db->get('bookauthors')->result();
    if(count($result) > 0) {
      return new Author_model($result[0]->$AuthorID);
    } else {
      return false;
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


//   var $table = "bookauthors";
//
//   function __construct() {
//     parent::__construct();
//   }
//
//   function Inserir($data) {
//     if(!isset($data))
//       return false;
//     return $this->db->insert($this->table, $data);
//   }
//
//   function GetById($id) {
//     if(is_null($id))
//       return false;
//     $this->db->where('AuthorID', $id);
//     $query = $this->db->get($this->table);
//     if ($query->num_rows() > 0) {
//       return $query->row_array();
//     } else {
//       return null;
//     }
//   }
//
//   function GetAll($sort = 'AuthorID', $order = 'asc') {
//     $this->db->order_by($sort, $order);
//     $query = $this->db->get($this->table);
//     if ($query->num_rows() > 0) {
//       return $query->result_array();
//     } else {
//       return null;
//     }
//   }
//   /**
//   * Atualiza um registro na tabela
//   *
//   * @param integer $int ID do registro a ser atualizado
//   *
//   * @param array $data Dados a serem inseridos
//   *
//   * @return boolean
//   */
//   function Atualizar($id, $data) {
//     if(is_null($id) || !isset($data))
//       return false;
//     $this->db->where('AuthorID', $id);
//     return $this->db->update($this->table, $data);
//   }
//   /**
//   * Remove um registro na tabela
//   *
//   * @param integer $int ID do registro a ser removido
//   *
//   *
//   * @return boolean
//   */
//   function Excluir($id) {
//     if(is_null($id))
//       return false;
//     $this->db->where('AuthorID', $id);
//     return $this->db->delete($this->table);
//   }
// }
