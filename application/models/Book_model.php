<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class book_model extends CI_Model {

  var $table = "bookdescriptions";

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
    $this->db->where('ISBN', $id);
    $query = $this->db->get($this->table);
    if ($query->num_rows() > 0) {
      return $query->row_array();
    } else {
      return null;
    }
  }

  function GetAll($sort = 'ISBN', $order = 'asc') {
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
    $this->db->where('ISBN', $id);
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
    $this->db->where('ISBN', $id);
    return $this->db->delete($this->table);
  }

  function Formatar($bookdescriptions){
    if($bookdescriptions){
      for($i = 0; $i < count($bookdescriptions); $i++){
        $bookdescriptions[$i]['editar_url'] = base_url('editar')."/".$bookdescriptions[$i]['ISBN'];
        $bookdescriptions[$i]['excluir_url'] = base_url('excluir')."/".$bookdescriptions[$i]['ISBN'];
      }
      return $bookdescriptions;
    } else {
      return false;
    }
  }
  function InserirCategories_x_Book($categoriesID, $book) {
    if(!isset($data))
      return false;
    foreach ($categoriesID as $categoryID) {
      $this->db->insert('bookcategoriesbooks', $categoryID, $book['ISBN']);
    }
  }
}
