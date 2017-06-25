<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class book_model extends CI_Model {
      public $ISBN;
      public $title;
      public $description;
      public $price;
      public $publisher;
      public $pubdate;
      public $edition;
      public $pages;

      public function __construct($ISBN=0) {
        $this->load->database();
        if ($ISBN) {
          $this->db->where('ISBN', $ISBN);
          $result = $this->db->get('bookdescriptions')->result()[0];
          $this->ISBN                   = $result->ISBN;
          $this->title                 = $result->title;
          $this->description          = $result->description;
          $this->price                = $result->price;
          $this->publisher            = $result->publisher;
          $this->pubdate      = $result->pubdate;
          $this->edition      = $result->edition;
          $this->pages         = $result->pages;
        }
      }

      public function saveUpdate () {
          $data = $this->db->query("UPDATE bookdescriptions SET title='".$this->title."',
                                               description='".$this->description."',
                                               price='".$this->price."',
                                               publisher='".$this->publisher."',
                                               edition='".$this->edition."',
                                              pubdate='".$this->pubdate."',
                                               pages='".$this->pages."'
                                               WHERE ISBN=".$this->ISBN);
                                            }
      public function saveInsert () {
            $this->db->insert('bookdescriptions', $this);
            // $this->ISBN = Book_model::get_from_book($this->price);
        }

      public static function get_from_book($ISBN) {
        $CI =& get_instance();
        $CI->db->where('ISBN', $ISBN);
        $result = $CI->db->get('bookdescriptions')->result();
        if(count($result) > 0) {
          return new Book_model($result[0]->ISBN);
        } else {
          return false;
        }
      }

      public function delete () {
        $this->db->delete('bookdescriptions', array('ISBN' => $this->ISBN));
      }

      public static function get_from_id($ISBN) {
        $CI =& get_instance();
        $CI->db->where('ISBN', $ISBN);
        $result = $CI->db->get('bookdescriptions')->result();
        if(count($result) > 0) {
          return new Book_model($result[0]->ISBN);
        } else {
          return false;
        }
      }

      public static function get_all() {
        $CI =& get_instance();
        $results = $CI->db->get('bookdescriptions')->result();
        return $results;
      }

      public static function Insertbookcategoriesbooks($ISBN, $CategoryID){

      }
  }


//   var $table = "bookdescriptionss";
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
//   function GetById($ISBN) {
//     if(is_null($ISBN))
//       return false;
//     $this->db->where('ISBN', $ISBN);
//     $query = $this->db->get($this->table);
//     if ($query->num_rows() > 0) {
//       return $query->row_array();
//     } else {
//       return null;
//     }
//   }
//
//   function GetAll($sort = 'ISBN', $order = 'asc') {
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
//   function Atualizar($ISBN, $data) {
//     if(is_null($ISBN) || !isset($data))
//       return false;
//     $this->db->where('ISBN', $ISBN);
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
//   function Excluir($ISBN) {
//     if(is_null($ISBN))
//       return false;
//     $this->db->where('ISBN', $ISBN);
//     return $this->db->delete($this->table);
//   }
//
//   function Formatar($bookdescriptionss){
//     if($bookdescriptionss){
//       for($i = 0; $i < count($bookdescriptionss); $i++){
//         $bookdescriptionss[$i]['editar_url'] = base_url('editar')."/".$bookdescriptionss[$i]['ISBN'];
//         $bookdescriptionss[$i]['excluir_url'] = base_url('excluir')."/".$bookdescriptionss[$i]['ISBN'];
//       }
//       return $bookdescriptionss;
//     } else {
//       return false;
//     }
//   }
//   function InserirCategories_x_Book($categoriesID, $book) {
//     if(!isset($data))
//       return false;
//     foreach ($categoriesID as $categoryID) {
//       $this->db->insert('bookcategoriesbooks', $categoryID, $book['ISBN']);
//     }
//   }
// }
