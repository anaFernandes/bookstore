<?php
class Discipline_model extends CI_Model {
    public $id;
    public $name;
    public $description;
    public $sigla;

    public function __construct($id=0) {
      $this->load->database();
      if ($id) {
        $this->db->where('idDiscipline', $id);
        $result = $this->db->get('disciplines')->result()[0];
        $this->id                   = $result->idDiscipline;
        $this->name                 = $result->name;
        $this->description          = $result->description;
        $this->sigla                = $result->sigla;
      }
    }

    public function save () {
      if ( isset($this->id) ) {
        $data = $this->db->query("UPDATE disciplines SET name='".$this->name."',
                                             description='".$this->description."',
                                             sigla='".$this->sigla."'
                                            WHERE idDiscipline=".$this->id);
      }
      else {
          unset($this->id);
          $this->db->insert('disciplines', $this);
          $this->id = Discipline_model::get_from_discipline($this->sigla);
      }
    }

    public static function get_from_discipline($sigla) {
      $CI =& get_instance();
      $CI->db->where('sigla', $sigla);
      $result = $CI->db->get('disciplines')->result();
      if(count($result) > 0) {
        return new Discipline_model($result[0]->idDiscipline);
      } else {
        return false;
      }
    }

    public function delete () {
      $this->db->delete('disciplines', array('idDiscipline' => $this->id));
    }

    public static function get_from_id($id) {
      $CI =& get_instance();
      $CI->db->where('idDiscipline', $id);
      $result = $CI->db->get('disciplines')->result();
      if(count($result) > 0) {
        return new Discipline_model($result[0]->idDiscipline);
      } else {
        return false;
      }
    }

    public static function get_all() {
      $CI =& get_instance();
      $results = $CI->db->get('disciplines')->result();
      return $results;
    }
}
