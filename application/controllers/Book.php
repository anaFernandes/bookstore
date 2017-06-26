<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends CI_Controller {
		public function index() {
			$data['books'] = $this->load_books();
			$data['user_type'] = $this->verify_role();
			if($data['user_type'] == 1) {
				$data['h1'] = "Livros";
			} else {
				$data['h1'] = "Produtos";
			}
			$data['page'] = 'index';
			$this->build_static_info();
			$data = $this->change_book_description($data);
		 	$this->load->view('book/book_list', $data);
			$this->build_static_footer();

		}

		public function show_book($ISBN) {
			$data['book'] = book_model::get_from_id($ISBN);
			$data['book_authors'] = AuthorBook_model::get_from_isbn($ISBN);
			$data['book_categories'] = CategoryBook_model::get_from_isbn($ISBN);

			if(sizeof($data['book_authors']) > 1) {
				foreach ($data['book_authors'] as $authors) {
					$data['authors'] = Author_model::get_from_id($authors->AuthorID);
				}
			} else {
				$data['authors'] = Author_model::get_from_id($data['book_authors']->AuthorID);
			}

			if(sizeof($data['book_categories']) > 1) {
				foreach ($data['book_categories'] as $categories) {
					$data['categories'] = category_model::get_from_id($categories->CategoryID);
				}
			} else {
				$data['categories'] = Author_model::get_from_id($data['book_categories']->CategoryID);
			}

			$data['user_type'] = $this->verify_role();
			$data['h1'] = $data['book']->title;

			$this->build_static_info();
		 	$this->load->view('book/book_description', $data);

			$this->build_static_footer();
		}


		public function change_book_description($data) {
			if(count($data)) {
				foreach ($data['books'] as $book) {
					$new_description = implode(' ', array_slice(explode(' ', $book->description), 0, 10));
					$book->description = $new_description;
				}
			}
			return $data;
		}

		public function verify_role() {
			if(isset($_SESSION['user']))
				return 1;
			else
				return 0;
		}

		public function build_static_info() {
			$header_data['categories'] = category_model::get_all();
			$header_data['active'] = 'books';
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

		public function searchFromUrl($search_string) {
			$data['books_from_categories'] = CategoryBook_model::get_from_category($search_string);
			$category = category_model::get_from_id($search_string);
			$data['books'] = [];
			$data['user_type'] = $this->verify_role();
			$data['h1'] = 'Livros da categoria : '.$category->CategoryName;
			$data['page'] = 'busca';
			if($data['books_from_categories']) {
				foreach ($data['books_from_categories'] as $book) {
					$book = Book_model::get_from_id($book->ISBN);
					array_push($data['books'], $book);
				}
			}
			$this->build_static_info();
			$data = $this->change_book_description($data);
			$this->load->view('book/book_list', $data);
			$this->build_static_footer();
		}

		public function searchAll() {
			$data['user_type'] = $this->verify_role();
			$data['h1'] = "Busca feita : ".$_POST['SearchString'];
			$data['books'] = Book_model::search_all_columns($_POST['SearchString']);
			$header_data['categories'] = category_model::get_all();
			$header_url = 'layout/header';
			$data['page'] = 'busca';
			$this->change_book_description($data);

			$this->load->view($header_url, $header_data);
		 	$this->load->view('book/book_list', $data);
			$this->load->view('layout/footer');
		}

		public function register() {
			$this->build_static_info();
			$authors = author_model::get_all();
			$data['authors'] = $authors;
			$categories = category_model::get_all();
			$data['categories'] = $categories;
			if($this->verify_role() == 1) {
					$this->load->view('book/book_register', $data);
			} else {
					$this->load->view('acesso-negado');
			}
			$this->build_static_footer();
		}


		public function edit($ISBN) {
			$this->build_static_info();

			$book = book_model::get_from_id($ISBN);
			$data['book'] = $book;
			$authors = author_model::get_all();
			$data['authors'] = $authors;
			$categories = category_model::get_all();
			$data['categories'] = $categories;

			if($this->verify_role() == 1) {
					$this->load->view('book/book_edit', $data);
			} else {
					$this->load->view('acesso-negado');
			}

			$this->build_static_footer();
		}

		public function update($ISBN) {
			$book = new book_model($ISBN);

			$book->ISBN = $_POST['ISBN'];

			$book->title = $this->clean_str($_POST['title']);
			$book->description = $this->clean_str($_POST['description']);
			$book->price = $_POST['price'];
			$book->publisher = $this->clean_str($_POST['publisher']);
			$book->pubdate = $_POST['pubdate'];
			$book->edition = $_POST['edition'];
			$book->pages = $_POST['pages'];

			$book->saveUpdate();

			$authorsID = $this->input->post('authors');

			if($authorsID != NULL){
				AuthorBook_model::delete($ISBN);

				foreach ($authorsID as $key => $AuthorID) {
					$authorBook = new AuthorBook_model();
					$authorBook->ISBN = $book->ISBN;
					$authorBook->AuthorID = $AuthorID;
					$authorBook->saveInsert();
				}
			}

			$categoriesID = $this->input->post('categories');

			if($categoriesID != NULL){
				CategoryBook_model::delete($ISBN);

				foreach ($categoriesID as $key => $CategoryID) {
					$categoryBook = new CategoryBook_model();
					$categoryBook->ISBN = $book->ISBN;
					$categoryBook->CategoryID = $CategoryID;
					$categoryBook->saveInsert();
				}
			}

			$img1 = $_FILES['Small_File'];
			$img2 = $_FILES['Medium_File'];
			$img3 = $_FILES['Large_File'];

			self::InsertImg($book, $img1, $img2, $img3);

			redirect(base_url('book'));
		}

		public function del($ISBN){
			$book = new book_model($ISBN);
			AuthorBook_model::delete($ISBN);
			CategoryBook_model::delete($ISBN);
			Image_model::deleteISBN($ISBN);
			$book->delete();
			redirect(base_url('book'));
		}


		public function load_books() {
			return book_model::get_all();
		}

		public function clean_str($string) {
			return htmlspecialchars( $string, ENT_QUOTES, "UTF-8");
		}

		public function saveInsert() {
			$book = new book_model();

			$book->ISBN = $_POST['ISBN'];
			$book->title = $this->clean_str($_POST['title']);
			$book->description = $this->clean_str($_POST['description']);
			$book->price = $_POST['price'];
			$book->publisher = $_POST['publisher'];
			$book->pubdate = $_POST['pubdate'];
			$book->edition = $_POST['edition'];
			$book->pages = $_POST['pages'];

			$img1 = $_FILES['Small_File'];
			$img2 = $_FILES['Medium_File'];
			$img3 = $_FILES['Large_File'];

			self::InsertImg($book, $img1, $img2, $img3);
			self::InsertAuthorsBook($book);
			self::InsertCategoryBook($book);

			$book->saveInsert();

			redirect(base_url('book'));
		}

		private function InsertAuthorsBook($book){
			$data = $this->input->post('authors');

			foreach ($data as $key => $AuthorID) {
				$authorBook = new AuthorBook_model();
				$authorBook->ISBN = $book->ISBN;
				$authorBook->AuthorID = $AuthorID;
				$authorBook->saveInsert();
				}
		}

		private function InsertCategoryBook($book){
			$categoriesID = $this->input->post('categories');

			foreach ($categoriesID as $key => $CategoryID) {
				$categoryBook = new CategoryBook_model();
				$categoryBook->ISBN = $book->ISBN;
				$categoryBook->CategoryID = $CategoryID;
				$categoryBook->saveInsert();
			}

		}
		private function InsertImg($book, $img1, $img2, $img3){

			if($img1['name'] != NULL){
				$img = new Image_model();
				$img->ISBN = $book->ISBN;
				$img->urlimg = $book->ISBN.'.01.THUMBZZZ.jpg';
				$file_name = 'Small_File';
				$img->delete($img->urlimg);
				$img->save();
				self::upload($img->urlimg, $file_name);
			}

			if($img2['name'] != NULL){
				$img = new Image_model();
				$img->ISBN = $book->ISBN;
				$img->urlimg = $book->ISBN.'.01.MZZZZZZZ.jpg';
				$file_name = 'Medium_File';
				$img->delete($img->urlimg);
				$img->save();
				self::upload($img->urlimg, $file_name);
			}

			if($img3['name'] != NULL){
				$img = new Image_model();
				$img->ISBN = $book->ISBN;
				$img->urlimg = $book->ISBN.'.01.LZZZZZZZ.jpg';
				$file_name = 'Large_File';
				$img->delete($img->urlimg);
				$img->save();
				self::upload($img->urlimg, $file_name);
				}
				exit();

		}

private function upload($urlimg, $file_name){
	var_dump('ok');
	// var_dump('_________________________');
	// 	var_dump($urlimg);
	// 	var_dump($file_name);
	// var_dump('_________________________');

		$config['upload_path']   = './public/upload';
    $config	['allowed_types'] = 'gif|jpg|png';
    $config['max_size']      = 500;
    $config['max_width']     = 1024;
    $config['max_height']    = 1068;
		$config['file_name']		 = $urlimg;
		//$config['overwrite']     =  TRUE;
    $this->load->library('upload', $config);

		// foreach ($_FILES as $file) {

			if ( ! $this->upload->do_upload($file_name))
			{
							$error = array('error' => $this->upload->display_errors());
							var_dump($error);
							// $this->load->view('/', $error);
			}
			else
			{
							$data = array('upload_data' => $this->upload->data());
							var_dump('_________________________');
							var_dump('_________________________');
							var_dump('_________________________');
								var_dump($urlimg);
							  var_dump($file_name);
							var_dump('_________________________');
							var_dump($data);
							var_dump('_________________________');
								// var_dump($urlimg);
								// var_dump($file_name);
							var_dump('_________________________');
			}
		// }
	}

}


	// public function index()
	// {
	// 	$this->load->model('book_model');
	// 	// Recupera os book através do model
	// 	$books = $this->book_model->GetAll('ISBN');
	// 	// Passa os book para o array que será enviado à home
	// 	$dados['books'] =$this->book_model->Formatar($books);
	// 	// Chama a home enviando um array de dados a serem exibidos
	// 	$this->load->view('books/index',$dados);
	// }
	//
	// /**
  //    * Processa o formulário para salvar os dados
  //    */
	// public function cadastrar(){
	// 	$this->load->model('book_model');
	// 	$this->load->model('category_model');
	// 	$this->load->model('author_model');
	//
	// 	$dados['categories'] = $this->category_model->GetAll('CategoryISBN');
	// 	$dados['authors'] = $this->author_model->GetAll('ISBNF');
	//
	// 	$this->load->view('books/cadastrar', $dados);
	// }
	//
	// public function Salvar(){
	//
	// 	$this->load->model('book_model');
	// 	// Recupera os book através do model
	// 	$books = $this->book_model->GetAll('ISBN');
	// 	// Passa os book para o array que será enviado à home
	// 	$dados['books'] =$this->book_model->Formatar($books);
	// 	// Executa o processo de validação do formulário
	// 	$validacao = self::Validar();
	// 	// Verifica o status da validação do formulário
	// 	// Se não houverem erros, então insere no banco e informa ao usuário
	// 	// caso contrário informa ao usuários os erros de validação
	// 	if($validacao){
	// 		// Recupera os dados do formulário
	// 		$book = $this->input->post();
	// 		$array_book[
	//
	// 		]
	// 		$categoryID = $this->input->post('CategoryID');
	// 		// Insere os dados no banco recuperando o status dessa operação
	// 		$status = $this->book_model->Inserir($book);
	// 		//$statusCat = $this->book_model->Inserir($category, $book);
	// 		// Checa o status da operação gravando a mensagem na seção
	// 		if(!$status && !$statusCat){
	// 			$this->session->set_flashdata('error', 'Não foi possível inserir o livro.');
	// 		}else{
	// 			$this->session->set_flashdata('success', 'Livro inserido com sucesso.');
	// 			// Redireciona o usuário para a home
	// 			redirect();
	// 		}
	// 	}else{
	// 		$this->session->set_flashdata('error', validation_errors('<p>','</p>'));
	// 	}
	// 	// Carrega a home
	// 	$this->load->view('books/cadastrar',$dados);
	// }
	// /**
  //    * Carrega a view para edição dos dados
  //    */
	// public function Editar(){
	// 	$this->load->model("book_model");
	// 	// Recupera o ID do registro - através da URL - a ser editado
	// 	$ISBN = $this->uri->segment(2);
	// 	// Se não foi passado um ID, então redireciona para a home
	// 	if(is_null($ISBN))
	// 		redirect();
	// 	// Recupera os dados do registro a ser editado
	// 	$dados['book'] = $this->book_model->GetById($ISBN);
	// 	// Carrega a view passando os dados do registro
	// 	$this->load->view('books/update',$dados);
	// }
	// /**
  //    * Processa o formulário para atualizar os dados
  //    */
	// public function Atualizar(){
	// 	$this->load->model("book_model");
	// 	// Realiza o processo de validação dos dados
	// 	$validacao = self::Validar('update');
	// 	// Verifica o status da validação do formulário
	// 	// Se não houverem erros, então insere no banco e informa ao usuário
	// 	// caso contrário informa ao usuários os erros de validação
	// 	if($validacao){
	// 		// Recupera os dados do formulário
	// 		$book = $this->input->post();
	// 		// Atualiza os dados no banco recuperando o status dessa operação
	// 		$status = $this->book_model->Atualizar($book['ISBN'],$book);
	// 		// Checa o status da operação gravando a mensagem na seção
	// 		if(!$status){
	// 			$dados['book'] = $this->book_model->GetById($book['ISBN']);
	// 			$this->session->set_flashdata('error', 'Não foi possível atualizar o Livro.');
	// 		}else{
	// 			$this->session->set_flashdata('success', 'Livro atualizado com sucesso.');
	// 			// Redireciona o usuário para a home
	// 			redirect();
	// 		}
	// 	}else{
	// 		$this->session->set_flashdata('error', validation_errors());
	// 	}
	// 	// Carrega a view para edição
	// 	$this->load->view('books/update',$dados);
	// }
	// /**
  //    * Realiza o processo de exclusão dos dados
  //    */
	// public function Excluir(){
	// 	$this->load->model("book_model");
	// 	// Recupera o ID do registro - através da URL - a ser editado
	// 	$ISBN = $this->uri->segment(2);
	// 	// Se não foi passado um ID, então redireciona para a home
	// 	if(is_null($ISBN))
	// 		redirect();
	// 	// Remove o registro do banco de dados recuperando o status dessa operação
	// 	$status = $this->book_model->Excluir($ISBN);
	// 	// Checa o status da operação gravando a mensagem na seção
	// 	if($status){
	// 		$this->session->set_flashdata('success', '<p>Livro excluído com sucesso.</p>');
	// 	}else{
	// 		$this->session->set_flashdata('error', '<p>Não foi possível excluir o Livro.</p>');
	// 	}
	// 	// Redirecionao o usuário para a home
	// 	redirect();
	// }
	//
	// private function Validar($operacao = 'insert'){
	// 	// Com base no parâmetro passado
	// 	// determina as regras de validação
	// 	switch($operacao){
	// 		case 'insert':
	// 			$rules['ISBN'] = array('required');
	// 			// $rules['title'] = array('trim', 'required', 'min_length[3]');
  //       // $rules['title'] = array('trim', 'required', 'min_length[3]');
  //       // $rules['price'] = array('trim', 'required', 'min_length[3]');
  //       // $rules['publisher'] = array('trim', 'required', 'min_length[3]');
  //       // $rules['pubdate'] = array('trim', 'required', 'min_length[3]');
  //       // $rules['edition'] = array('trim', 'required', 'min_length[3]');
  //       // $rules['pages'] = array('trim', 'required', 'min_length[3]');
	// 			// $rules['email'] = array('trim', 'required', 'valid_email', 'is_unique[book.email]');
	// 			break;
	// 		case 'update':
	// 			$rules['ISBN'] = array('trim', 'required', 'min_length[3]');
	// 			// $rules['title'] = array('trim', 'required', 'min_length[3]');
  //       // $rules['title'] = array('trim', 'required', 'min_length[3]');
  //       // $rules['price'] = array('trim', 'required', 'min_length[3]');
  //       // $rules['publisher'] = array('trim', 'required', 'min_length[3]');
  //       // $rules['pubdate'] = array('trim', 'required', 'min_length[3]');
  //       // $rules['edition'] = array('trim', 'required', 'min_length[3]');
  //       // $rules['pages'] = array('trim', 'required', 'min_length[3]');
	// 			// $rules['email'] = array('trim', 'required', 'valid_email');
	// 			break;
	// 		default:
	// 			$rules['ISBN'] = array('trim', 'required', 'min_length[3]');
	// 			// $rules['title'] = array('trim', 'required', 'min_length[3]');
  //       // $rules['title'] = array('trim', 'required', 'min_length[3]');
  //       // $rules['price'] = array('trim', 'required', 'min_length[3]');
  //       // $rules['publisher'] = array('trim', 'required', 'min_length[3]');
  //       // $rules['pubdate'] = array('trim', 'required', 'min_length[3]');
  //       // $rules['edition'] = array('trim', 'required', 'min_length[3]');
  //       // $rules['pages'] = array('trim', 'required', 'min_length[3]');
	// 			// $rules['email'] = array('trim', 'required', 'valid_email', 'is_unique[book.email]');
	// 			break;
	// 	}
	// 	$this->form_validation->set_rules('ISBN', 'ISBN', $rules['ISBN']);
	// 	// $this->form_validation->set_rules('title', 'TÍtulo', $rules['title']);
  //   // $this->form_validation->set_rules('title', 'Descrição', $rules['title']);
  //   // $this->form_validation->set_rules('price', 'Preço', $rules['price']);
  //   // $this->form_validation->set_rules('publisher', 'Editora', $rules['publisher']);
  //   // $this->form_validation->set_rules('pubdate', 'Data de publicação', $rules['pubdate']);
  //   // $this->form_validation->set_rules('edition', 'Edição', $rules['edition']);
  //   // $this->form_validation->set_rules('pages', 'Número de páginas', $rules['pages']);
	// 	// Executa a validação e retorna o status
	// 	return $this->form_validation->run();
	// }
// }
