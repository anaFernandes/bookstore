<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Author extends CI_Controller {
	public function index() {
		$this->build_static_info();
		$data['authors'] = $this->load_authors();
		$data['user_type'] = $this->verify_role();
		$data['h1'] = "Autores";

		if($data['user_type'] != 1) {
				$this->load->view('acesso-negado',$data);
		} else {
				$this->load->view('author/author_list',$data);
		}
		$this->build_static_footer();
	}

	public function register() {
			$this->build_static_info();
			$permission = $this->verify_role();
			if($permission != 1) {
				$this->load->view('acesso-negado');
			} else {
				$this->load->view('author/author_register');
			}
	}

	public function verify_role() {
		return 1;
	}

	public function build_static_info() {
		$header_data['categories'] = category_model::get_all();
		$header_data['active'] = 'authors';
		if($this->verify_role() == 1) {
				$header_url = 'layout/admin-header';
				$this->load->view($header_url, $header_data);
		} else {
				$header_url = 'layout/header';
				$this->load->view($header_url, $header_data);
		}
	}

	public function build_static_footer() {
		$this->load->view('layout/footer');
	}


	public function edit($AuthorID) {
		$author = Author_model::get_from_id($AuthorID);
		$this->build_static_info();
		$permission = $this->verify_role();
		if($permission != 1) {
			$this->load->view('acesso-negado');
		} else {
			$data['author'] = $author;
			$this->load->view('author/author_edit', $data);
		}

	}

		public function update($AuthorID) {
			$author = new Author_model($AuthorID);
			$author->nameF = $_POST['nameF'];
			$author->nameL = $_POST['nameL'];
			$author->save();

			redirect(base_url('author'));
		}

		public function del($AuthorID){
			$author = new Author_model($AuthorID);
			AuthorBook_model::delete_from_author($AuthorID);
			$author->delete();
			redirect(base_url('author'));
		}


	// private function load_authors() {
		public function Load_authors(){
			return Author_model::get_all();
		}

		public function save() {
			$author = new Author_model();
			$author->nameL = $_POST['nameL'];
			$author->nameF = $_POST['nameF'];
			$author->save();
			redirect(base_url('author'));
		}
	}

// 	public function Index()
// 	{
// 		$this->load->model('author_model');
// 		$this->load->model('contatos_model');
// 		// Recupera os author através do model
// 		$authors = $this->author_model->GetAll('AuthorID');
// 		// Passa os author para o array que será enviado à home
// 		$dados['authors'] =$this->contatos_model->Formatar($authors);
// 		// Chama a home enviando um array de dados a serem exibidos
// 		$this->load->view('authors/index',$dados);
// 	}
//
// 	/**
//      * Processa o formulário para salvar os dados
//      */
// 	public function Salvar(){
// 		$this->load->model('author_model');
// 		$this->load->model('contatos_model');
// 		// Recupera os author através do model
// 		$authors = $this->author_model->GetAll('AuthorID');
// 		var_dump($authors);
// 		// Passa os author para o array que será enviado à home
// 		$dados['authors'] =$this->contatos_model->Formatar($authors);
// 		// Executa o processo de validação do formulário
// 		$validacao = self::Validar();
// 		// Verifica o status da validação do formulário
// 		// Se não houverem erros, então insere no banco e informa ao usuário
// 		// caso contrário informa ao usuários os erros de validação
// 		if($validacao){
// 			// Recupera os dados do formulário
// 			$author = $this->input->post();
// 			// Insere os dados no banco recuperando o status dessa operação
// 			$status = $this->author_model->Inserir($author);
// 			// Checa o status da operação gravando a mensagem na seção
// 			if(!$status){
// 				$this->session->set_flashdata('error', 'Não foi possível inserir o autor.');
// 			}else{
// 				$this->session->set_flashdata('success', 'autor inserido com sucesso.');
// 				// Redireciona o usuário para a home
// 				redirect();
// 			}
// 		}else{
// 			$this->session->set_flashdata('error', validation_errors('<p>','</p>'));
// 		}
// 		// Carrega a home
// 		$this->load->view('authors/index',$dados);
// 	}
// 	/**
//      * Carrega a view para edição dos dados
//      */
// 	public function Editar(){
// 		$this->load->model("author_model");
// 		// Recupera o ID do registro - através da URL - a ser editado
// 		$AuthorID = $this->uri->segment(2);
// 		// Se não foi passado um ID, então redireciona para a home
// 		if(is_null($AuthorID))
// 			redirect();
// 		// Recupera os dados do registro a ser editado
// 		$dados['author'] = $this->author_model->GetById($AuthorID);
// 		// Carrega a view passando os dados do registro
// 		$this->load->view('authors/update',$dados);
// 	}
// 	/**
//      * Processa o formulário para atualizar os dados
//      */
// 	public function Atualizar(){
// 		$this->load->model("author_model");
// 		// Realiza o processo de validação dos dados
// 		$validacao = self::Validar('update');
// 		// Verifica o status da validação do formulário
// 		// Se não houverem erros, então insere no banco e informa ao usuário
// 		// caso contrário informa ao usuários os erros de validação
// 		if($validacao){
// 			// Recupera os dados do formulário
// 			$author = $this->input->post();
// 			// Atualiza os dados no banco recuperando o status dessa operação
// 			$status = $this->author_model->Atualizar($author['AuthorID'],$author);
// 			// Checa o status da operação gravando a mensagem na seção
// 			if(!$status){
// 				$dados['author'] = $this->author_model->GetById($author['AuthorID']);
// 				$this->session->set_flashdata('error', 'Não foi possível atualizar o author.');
// 			}else{
// 				$this->session->set_flashdata('success', 'author atualizado com sucesso.');
// 				// Redireciona o usuário para a home
// 				redirect();
// 			}
// 		}else{
// 			$this->session->set_flashdata('error', validation_errors());
// 		}
// 		// Carrega a view para edição
// 		$this->load->view('authors/update',$dados);
// 	}
// 	/**
//      * Realiza o processo de exclusão dos dados
//      */
// 	public function Excluir(){
// 		$this->load->model("author_model");
// 		// Recupera o ID do registro - através da URL - a ser editado
// 		$AuthorID = $this->uri->segment(2);
// 		// Se não foi passado um ID, então redireciona para a home
// 		if(is_null($AuthorID))
// 			redirect();
// 		// Remove o registro do banco de dados recuperando o status dessa operação
// 		$status = $this->author_model->Excluir($AuthorID);
// 		// Checa o status da operação gravando a mensagem na seção
// 		if($status){
// 			$this->session->set_flashdata('success', '<p>author excluído com sucesso.</p>');
// 		}else{
// 			$this->session->set_flashdata('error', '<p>Não foi possível excluir o author.</p>');
// 		}
// 		// Redirecionao o usuário para a home
// 		redirect();
// 	}
// 	/**
// 	* Valida os dados do formulário
// 	*
// 	* @param string $operacao Operação realizada no formulário: insert ou update
// 	*
// 	* @return boolean
// 	*/
// 	private function Validar($operacao = 'insert'){
// 		// Com base no parâmetro passado
// 		// determina as regras de validação
// 		switch($operacao){
// 			case 'insert':
// 				$rules['nameF'] = array('trim', 'required', 'min_length[3]');
// 				$rules['nameL'] = array('trim', 'required', 'min_length[3]');
// 				// $rules['email'] = array('trim', 'required', 'valid_email', 'is_unique[author.email]');
// 				break;
// 			case 'update':
// 				$rules['nameF'] = array('trim', 'required', 'min_length[3]');
// 				$rules['nameL'] = array('trim', 'required', 'min_length[3]');
// 				// $rules['email'] = array('trim', 'required', 'valid_email');
// 				break;
// 			default:
// 				$rules['nameF'] = array('trim', 'required', 'min_length[3]');
// 				$rules['nameL'] = array('trim', 'required', 'min_length[3]');
// 				// $rules['email'] = array('trim', 'required', 'valid_email', 'is_unique[author.email]');
// 				break;
// 		}
// 		$this->form_validation->set_rules('nameF', 'Nome', $rules['nameF']);
// 		$this->form_validation->set_rules('nameL', 'Sobrenome', $rules['nameL']);
// 		// Executa a validação e retorna o status
// 		return $this->form_validation->run();
// 	}
// }
