<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class author_model extends CI_Model {

  var $table = "bookauthors";

  function __construct() {
    parent::__construct();
  }

  function Inserir($data) {
    if(!isset($data))
      return false;
    return $this->db->insert($this->table, $data);
  }

  function GetById($id) {
    if(is_null($id))
      return false;
    $this->db->where('AuthorID', $id);
    $query = $this->db->get($this->table);
    if ($query->num_rows() > 0) {
      return $query->row_array();
    } else {
      return null;
    }
  }
  
  function GetAll($sort = 'AuthorID', $order = 'asc') {
    $this->db->order_by($sort, $order);
    $query = $this->db->get($this->table);
    if ($query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return null;
    }
  }
  /**
  * Atualiza um registro na tabela
  *
  * @param integer $int ID do registro a ser atualizado
  *
  * @param array $data Dados a serem inseridos
  *
  * @return boolean
  */
  function Atualizar($id, $data) {
    if(is_null($id) || !isset($data))
      return false;
    $this->db->where('AuthorID', $id);
    return $this->db->update($this->table, $data);
  }
  /**
  * Remove um registro na tabela
  *
  * @param integer $int ID do registro a ser removido
  *
  *
  * @return boolean
  */
  function Excluir($id) {
    if(is_null($id))
      return false;
    $this->db->where('AuthorID', $id);
    return $this->db->delete($this->table);
  }
}
