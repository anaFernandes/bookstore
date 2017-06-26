<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

		public function index() {
			$this->build_static_info();
			$data['categories'] = $this->load_categories();
			$data['user_type'] = $this->verify_role();
			$data['h1'] = "Categorias";

			if($data['user_type'] != 1) {
					$this->load->view('acesso-negado',$data);
			} else {
					$this->load->view('category/category_list',$data);
			}
			$this->build_static_footer();

		}

		public function verify_role() {
			if(isset($_SESSION['user']))
				return 1;
			else
				return 0;
		}

		public function build_static_info() {
			$header_data['authors'] = author_model::get_all();
			$header_data['active'] = 'categories';
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

		public function register() {
			$this->build_static_info();
			$permission = $this->verify_role();
			if($permission != 1) {
				$this->load->view('acesso-negado');
			} else {
				$this->load->view('category/category_register');
			}
		}


		public function edit($CategoryID) {
			$category = Category_model::get_from_id($CategoryID);
			$this->build_static_info();
			$permission = $this->verify_role();
			if($permission != 1) {
				$this->load->view('acesso-negado');
			} else {
				$data['category'] = $category;
					$this->load->view('category/category_edit', $data);
			}
		}

		public function update($CategoryID) {
				$category = new Category_model($CategoryID);
				$category->CategoryName = $_POST['CategoryName'];
				$category->save();
				redirect(base_url('category'));
		}

		public function del($CategoryID){
			$category = new Category_model($CategoryID);
			CategoryBook_model::delete_from_category($CategoryID);
			$category->delete();
			redirect(base_url('category'));
		}

		public function Load_categories(){
			return Category_model::get_all();
		}

		public function save() {
			$this->load->model('category_model');
			$category = new Category_model();
			$category->CategoryName = $_POST['CategoryName'];
			$category->save();
			redirect(base_url('category'));
		}
		}


// 	public function Index()
// 	{
// 		$this->load->model('Category_model');
// 		// Recupera os category através do model
// 		$categories = $this->Category_model->GetAll('CategoryID');
// 		// Passa os category para o array que será enviado à home
// 		$dados['categories'] = $this->Category_model->Formatar($categories);
// 		// Chama a home enviando um array de dados a serem exibidos
// 		$this->load->view('categories/index',$dados);
// 	}
//
// 	public function cadastrar(){
// 		$this->load->view('categories/cadastrar');
// 	}
//
// 	/**
//      * Processa o formulário para salvar os dados
//      */
// 	public function Salvar(){
// 		$this->load->model('Category_model');
// 		// Recupera os category através do model
// 		$categories = $this->Category_model->GetAll('CategoryID');
// 		// Passa os category para o array que será enviado à home
// 		$dados['categories'] =$this->Category_model->Formatar($categories);
// 		// Executa o processo de validação do formulário
// 		$validacao = self::Validar();
// 		// Verifica o status da validação do formulário
// 		// Se não houverem erros, então insere no banco e informa ao usuário
// 		// caso contrário informa ao usuários os erros de validação
// 		if($validacao){
// 			// Recupera os dados do formulário
// 			$category = $this->input->post();
// 			// Insere os dados no banco recuperando o status dessa operação
// 			$status = $this->Category_model->Inserir($category);
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
// 		$this->load->view('categories/index',$dados);
// 	}
// 	/**
//      * Carrega a view para edição dos dados
//      */
// 	public function Editar(){
// 		$this->load->model("Category_model");
// 		// Recupera o ID do registro - através da URL - a ser editado
// 		$CategoryID = $this->uri->segment(2);
// 		// Se não foi passado um ID, então redireciona para a home
// 		if(is_null($CategoryID))
// 			redirect();
// 		// Recupera os dados do registro a ser editado
// 		$dados['category'] = $this->Category_model->GetById($CategoryID);
// 		// Carrega a view passando os dados do registro
// 		$this->load->view('categories/update',$dados);
// 	}
// 	/**
//      * Processa o formulário para atualizar os dados
//      */
// 	public function Atualizar(){
// 		$this->load->model("Category_model");
// 		// Realiza o processo de validação dos dados
// 		$validacao = self::Validar('update');
// 		// Verifica o status da validação do formulário
// 		// Se não houverem erros, então insere no banco e informa ao usuário
// 		// caso contrário informa ao usuários os erros de validação
// 		if($validacao){
// 			// Recupera os dados do formulário
// 			$category = $this->input->post();
// 			// Atualiza os dados no banco recuperando o status dessa operação
// 			$status = $this->Category_model->Atualizar($category['CategoryID'],$category);
// 			// Checa o status da operação gravando a mensagem na seção
// 			if(!$status){
// 				$dados['category'] = $this->Category_model->GetById($category['CategoryID']);
// 				$this->session->set_flashdata('error', 'Não foi possível atualizar o category.');
// 			}else{
// 				$this->session->set_flashdata('success', 'category atualizado com sucesso.');
// 				// Redireciona o usuário para a home
// 				redirect();
// 			}
// 		}else{
// 			$this->session->set_flashdata('error', validation_errors());
// 		}
// 		// Carrega a view para edição
// 		$this->load->view('categories/update',$dados);
// 	}
// 	/**
//      * Realiza o processo de exclusão dos dados
//      */
// 	public function Excluir(){
// 		$this->load->model("Category_model");
// 		// Recupera o ID do registro - através da URL - a ser editado
// 		$CategoryID = $this->uri->segment(2);
// 		// Se não foi passado um ID, então redireciona para a home
// 		if(is_null($CategoryID))
// 			redirect();
// 		// Remove o registro do banco de dados recuperando o status dessa operação
// 		$status = $this->Category_model->Excluir($CategoryID);
// 		// Checa o status da operação gravando a mensagem na seção
// 		if($status){
// 			$this->session->set_flashdata('success', '<p>category excluído com sucesso.</p>');
// 		}else{
// 			$this->session->set_flashdata('error', '<p>Não foi possível excluir o category.</p>');
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
// 				$rules['CategoryName'] = array('trim', 'required', 'min_length[3]');
// 				// $rules['email'] = array('trim', 'required', 'valid_email', 'is_unique[category.email]');
// 				break;
// 			case 'update':
// 				$rules['CategoryName'] = array('trim', 'required', 'min_length[3]');
// 				// $rules['email'] = array('trim', 'required', 'valid_email');
// 				break;
// 			default:
// 				$rules['CategoryName'] = array('trim', 'required', 'min_length[3]');
// 				// $rules['email'] = array('trim', 'required', 'valid_email', 'is_unique[category.email]');
// 				break;
// 		}
// 		$this->form_validation->set_rules('CategoryName', 'Nome', $rules['CategoryName']);
// 		// Executa a validação e retorna o status
// 		return $this->form_validation->run();
// 	}
//
// }
