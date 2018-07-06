<?php
class video_model extends CI_Model {
    public $videoid;
    public $keyword;
    public $url;

    public function __construct($videoid=0) {
      $this->load->database();
      if ($videoid) {
        $this->db->where('videoid', $videoid);
        $this->keyword        = $result->keyword;
        $this->url   = $result->url;
      }
    }

    public function save () {
      if ( isset($this->videoid) ) {
        $data = $this->db->query("UPDATE video SET url='".$this->url."',
                                            keyword ='".$this->keyword."';
                                            WHERE videoid=".$this->videoid);
      }
      else {
          unset($this->videoid);
          $this->db->insert('video', $this);
      }
    }

    // public static function get_from_video($address) {
    //   $CI =& get_instance();
    //   $CI->db->where('address', $address);
    //   $result = $CI->db->get('imagevideo')->result();
    //   if(count($result) > 0) {
    //     return new video_model($result[0]->address);
    //   } else {
    //     return false;
    //   }
    // }

    public function delete ($videoid) {
      $this->db->delete('video', array('videoid' => $videoid));
    }

    public static function get_from_id($videoid) {
      $CI =& get_instance();
      $CI->db->where('videoid', $videoid);
      $result = $CI->db->get('video')->result();
      if(count($result) > 0) {
        return new video_model($result[0]->videoid);
      } else {
        return false;
      }
    }

    public static function get_all() {
      $CI =& get_instance();
      $results = $CI->db->get('video')->result();
      return $results;
    }
}
