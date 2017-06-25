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
          $data = $this->db->query('UPDATE bookdescriptions SET title="'.$this->title.'",
                                               description="'.$this->description.'" ,
                                               price="'.$this->price.'",
                                               publisher="'.$this->publisher.'",
                                               edition="'.$this->edition.'",
                                              pubdate="'.$this->pubdate.'",
                                               pages="'.$this->pages.'"
                                               WHERE ISBN="'.$this->ISBN.'"');
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

      public static function search_all_columns($search_value) {
        $CI =& get_instance();
        $CI->db->like('ISBN', $search_value);
        $CI->db->or_like('title', $search_value);
        $CI->db->or_like('description', $search_value);
        $CI->db->or_like('price', $search_value);
        $CI->db->or_like('publisher', $search_value);
        $CI->db->or_like('pubdate', $search_value);
        $CI->db->or_like('edition', $search_value);
        $CI->db->or_like('pages', $search_value);
        $results = $CI->db->get('bookdescriptions')->result();
        return $results;
      }


  }
