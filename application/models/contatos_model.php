<?php
class Contatos_model extends author_model {
    function __construct() {
        parent::__construct();
        $this->table = 'bookauthors';
    }
    /**
    * Formata os contatos para exibição dos dados na home
    *
    * @param array $authors Lista dos contatos a serem formatados
    *
    * @return array
    */
    function Formatar($bookauthors){
      if($bookauthors){
        for($i = 0; $i < count($bookauthors); $i++){
          $bookauthors[$i]['editar_url'] = base_url('editar')."/".$bookauthors[$i]['AuthorID'];
          $bookauthors[$i]['excluir_url'] = base_url('excluir')."/".$bookauthors[$i]['AuthorID'];
        }
        return $bookauthors;
      } else {
        return false;
      }
    }
}
