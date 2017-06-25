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
    var_dump($data);
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

//   var $table = "bookcategories";
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
//     $this->db->where('CategoryID', $id);
//     $query = $this->db->get($this->table);
//     if ($query->num_rows() > 0) {
//       return $query->row_array();
//     } else {
//       return null;
//     }
//   }
//
//   function GetAll($sort = 'CategoryID', $order = 'asc') {
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
//     $this->db->where('CategoryID', $id);
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
//     $this->db->where('CategoryID', $id);
//     return $this->db->delete($this->table);
//   }
//
//   function Formatar($bookcategories){
// 		if($bookcategories){
// 			for($i = 0; $i < count($bookcategories); $i++){
// 				$bookcategories[$i]['editar_url'] = base_url('editar')."/".$bookcategories[$i]['CategoryID'];
// 				$bookcategories[$i]['excluir_url'] = base_url('excluir')."/".$bookcategories[$i]['CategoryID'];
// 			}
// 			return $bookcategories;
// 		} else {
// 			return false;
// 		}
// 	}
//
// }
