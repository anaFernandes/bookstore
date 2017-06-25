<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class books extends CI_Controller {

	public function index()
	{
		$this->load->model('book_model');
		// Recupera os book através do model
		$books = $this->book_model->GetAll('ISBN');
		// Passa os book para o array que será enviado à home
		$dados['books'] =$this->book_model->Formatar($books);
		// Chama a home enviando um array de dados a serem exibidos
		$this->load->view('books/index',$dados);
	}

	/**
     * Processa o formulário para salvar os dados
     */
	public function cadastrar(){
		$this->load->model('book_model');
		$this->load->model('category_model');
		$this->load->model('author_model');

		$dados['categories'] = $this->category_model->GetAll('CategoryName');
		$dados['authors'] = $this->author_model->GetAll('NameF');

		$this->load->view('books/cadastrar', $dados);
	}

	public function Salvar(){

		$this->load->model('book_model');
		// Recupera os book através do model
		$books = $this->book_model->GetAll('ISBN');
		// Passa os book para o array que será enviado à home
		$dados['books'] =$this->book_model->Formatar($books);
		// Executa o processo de validação do formulário
		$validacao = self::Validar();
		// Verifica o status da validação do formulário
		// Se não houverem erros, então insere no banco e informa ao usuário
		// caso contrário informa ao usuários os erros de validação
		if($validacao){
			// Recupera os dados do formulário
			$book = $this->input->post();
			$array_book[

			]
			$categoryID = $this->input->post('CategoryID');
			// Insere os dados no banco recuperando o status dessa operação
			$status = $this->book_model->Inserir($book);
			//$statusCat = $this->book_model->Inserir($category, $book);
			// Checa o status da operação gravando a mensagem na seção
			if(!$status && !$statusCat){
				$this->session->set_flashdata('error', 'Não foi possível inserir o livro.');
			}else{
				$this->session->set_flashdata('success', 'Livro inserido com sucesso.');
				// Redireciona o usuário para a home
				redirect();
			}
		}else{
			$this->session->set_flashdata('error', validation_errors('<p>','</p>'));
		}
		// Carrega a home
		$this->load->view('books/cadastrar',$dados);
	}
	/**
     * Carrega a view para edição dos dados
     */
	public function Editar(){
		$this->load->model("book_model");
		// Recupera o ID do registro - através da URL - a ser editado
		$ISBN = $this->uri->segment(2);
		// Se não foi passado um ID, então redireciona para a home
		if(is_null($ISBN))
			redirect();
		// Recupera os dados do registro a ser editado
		$dados['book'] = $this->book_model->GetById($ISBN);
		// Carrega a view passando os dados do registro
		$this->load->view('books/update',$dados);
	}
	/**
     * Processa o formulário para atualizar os dados
     */
	public function Atualizar(){
		$this->load->model("book_model");
		// Realiza o processo de validação dos dados
		$validacao = self::Validar('update');
		// Verifica o status da validação do formulário
		// Se não houverem erros, então insere no banco e informa ao usuário
		// caso contrário informa ao usuários os erros de validação
		if($validacao){
			// Recupera os dados do formulário
			$book = $this->input->post();
			// Atualiza os dados no banco recuperando o status dessa operação
			$status = $this->book_model->Atualizar($book['ISBN'],$book);
			// Checa o status da operação gravando a mensagem na seção
			if(!$status){
				$dados['book'] = $this->book_model->GetById($book['ISBN']);
				$this->session->set_flashdata('error', 'Não foi possível atualizar o Livro.');
			}else{
				$this->session->set_flashdata('success', 'Livro atualizado com sucesso.');
				// Redireciona o usuário para a home
				redirect();
			}
		}else{
			$this->session->set_flashdata('error', validation_errors());
		}
		// Carrega a view para edição
		$this->load->view('books/update',$dados);
	}
	/**
     * Realiza o processo de exclusão dos dados
     */
	public function Excluir(){
		$this->load->model("book_model");
		// Recupera o ID do registro - através da URL - a ser editado
		$ISBN = $this->uri->segment(2);
		// Se não foi passado um ID, então redireciona para a home
		if(is_null($ISBN))
			redirect();
		// Remove o registro do banco de dados recuperando o status dessa operação
		$status = $this->book_model->Excluir($ISBN);
		// Checa o status da operação gravando a mensagem na seção
		if($status){
			$this->session->set_flashdata('success', '<p>Livro excluído com sucesso.</p>');
		}else{
			$this->session->set_flashdata('error', '<p>Não foi possível excluir o Livro.</p>');
		}
		// Redirecionao o usuário para a home
		redirect();
	}
	
	private function Validar($operacao = 'insert'){
		// Com base no parâmetro passado
		// determina as regras de validação
		switch($operacao){
			case 'insert':
				$rules['ISBN'] = array('required');
				// $rules['title'] = array('trim', 'required', 'min_length[3]');
        // $rules['description'] = array('trim', 'required', 'min_length[3]');
        // $rules['price'] = array('trim', 'required', 'min_length[3]');
        // $rules['publisher'] = array('trim', 'required', 'min_length[3]');
        // $rules['pubdate'] = array('trim', 'required', 'min_length[3]');
        // $rules['edition'] = array('trim', 'required', 'min_length[3]');
        // $rules['pages'] = array('trim', 'required', 'min_length[3]');
				// $rules['email'] = array('trim', 'required', 'valid_email', 'is_unique[book.email]');
				break;
			case 'update':
				$rules['ISBN'] = array('trim', 'required', 'min_length[3]');
				// $rules['title'] = array('trim', 'required', 'min_length[3]');
        // $rules['description'] = array('trim', 'required', 'min_length[3]');
        // $rules['price'] = array('trim', 'required', 'min_length[3]');
        // $rules['publisher'] = array('trim', 'required', 'min_length[3]');
        // $rules['pubdate'] = array('trim', 'required', 'min_length[3]');
        // $rules['edition'] = array('trim', 'required', 'min_length[3]');
        // $rules['pages'] = array('trim', 'required', 'min_length[3]');
				// $rules['email'] = array('trim', 'required', 'valid_email');
				break;
			default:
				$rules['ISBN'] = array('trim', 'required', 'min_length[3]');
				// $rules['title'] = array('trim', 'required', 'min_length[3]');
        // $rules['description'] = array('trim', 'required', 'min_length[3]');
        // $rules['price'] = array('trim', 'required', 'min_length[3]');
        // $rules['publisher'] = array('trim', 'required', 'min_length[3]');
        // $rules['pubdate'] = array('trim', 'required', 'min_length[3]');
        // $rules['edition'] = array('trim', 'required', 'min_length[3]');
        // $rules['pages'] = array('trim', 'required', 'min_length[3]');
				// $rules['email'] = array('trim', 'required', 'valid_email', 'is_unique[book.email]');
				break;
		}
		$this->form_validation->set_rules('ISBN', 'ISBN', $rules['ISBN']);
		// $this->form_validation->set_rules('title', 'TÍtulo', $rules['title']);
    // $this->form_validation->set_rules('description', 'Descrição', $rules['description']);
    // $this->form_validation->set_rules('price', 'Preço', $rules['price']);
    // $this->form_validation->set_rules('publisher', 'Editora', $rules['publisher']);
    // $this->form_validation->set_rules('pubdate', 'Data de publicação', $rules['pubdate']);
    // $this->form_validation->set_rules('edition', 'Edição', $rules['edition']);
    // $this->form_validation->set_rules('pages', 'Número de páginas', $rules['pages']);
		// Executa a validação e retorna o status
		return $this->form_validation->run();
	}
}
