<?php
class ShoppingCart extends CI_Controller {

    public function index($info="") {
      $data['books'] = $this->get_cookies();
      if(count($data['books'])) {
        $data['books'] = $this->sort_interests($data['books']);
        $data['final_price'] = $this->get_final_price($data['books']);
        $this->build_static_info();
        $data['error_label'] = $info;
        $data['h1'] = "Seu carrinho";
        $this->load->view('user/carrinho', $data);
        $this->build_static_footer();
      } else {
        $data['h1'] = "Carrinho vazio =(";
        $this->build_static_info();
        $data['final_price'] = 0;
  		 	$this->load->view('user/carrinho', $data);
  			$this->build_static_footer();
      }
    }

    public function user_exists($email) {
      $customer = Customer_model::get_from_email($email);
      return $customer;
    }

    public function open_second_checkout ($email) {
      $this->build_static_info();
      $data['customer'] = $this->user_exists($email);
      if($data['customer'] != NULL) {
        $data['h1'] = 'Bem vindo de volta. Por favor, confirme seu endereço de entrega';
      } else {
        $data['h1'] = 'Bem vindo ao nosso site. Por favor, forneça um endereço para entrega';
      }
      $this->load->view('user/user_register', $data);
    }

    public function second_checkout() {
      Customer::save($_POST['fname'],
                     $_POST['$lname'],
                     $_POST['$email'],
                     $_POST['$street'],
                     $_POST['$city'],
                     $_POST['$state'],
                     $_POST['$zip']
      );
    }

    public function first_checkout() {
     if(isset($_POST['input_email'])) {
       $email = $_POST['input_email'];
       if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
         $this->open_second_checkout($email);
       } else {
         $this->index("email inválido");
       }
     } else {
       $this->index("por favor insira seu email");
     }
    }

    public function get_final_price($data) {
      $final_price = 0;
      foreach($data as $product) {
        if($final_price == 0) {
            $final_price += 10 + $product['price'];
        } else {
          $final_price += $product['price'] + 5;
        }

      }
      return $final_price;
    }

    public function sort_interests($data) {
      $filtered_books = [];
      foreach ($data as $book) {
        if($filtered_books == NULL) {
          $book['number'] = 1;
          array_push($filtered_books, $book);
        }
        else {
          $exists = false;
          foreach($filtered_books as $key => $filter_book) {
            if($filtered_books[$key]['title'] == $book['title']) {
              if(isset($filtered_books[$key]['number'])) {
                  $filtered_books[$key]['number'] ++;
              }
              $filtered_books[$key]['price'] += $book['price'];
              $exists = true;
            }
          } if(!$exists) {
            $book['number'] = 1;
            array_push($filtered_books, $book);
          }
        }
      }
      return $filtered_books;
    }

    public function get_cookies() {
      $data = json_decode(get_cookie('shopping_cart'),true);
      return $data;
    }

    public function add_to_cart($ISBN) {
      if(get_cookie("shopping_cart") != NULL) {
        $data['books'] = $this->get_cookies();
        $book = $this->clean_array(book_model::get_from_id($ISBN));

        array_push($data['books'], $book);

        $cookie_value = json_encode($data['books']);
        $cookie = array (
            'name' => 'shopping_cart',
            'value' => $cookie_value,
            'expire' => 10000,
        );
        set_cookie($cookie);

      } else {
        $data[] = $this->clean_array(book_model::get_from_id($ISBN));
        $cookie_value = json_encode($data);
        $cookie = array (
            'name' => 'shopping_cart',
            'value' => $cookie_value,
            'expire' => 10000,
        );
        set_cookie($cookie);
      }
      redirect(base_url('ShoppingCart'));
    }

    public function clean_array($book) {
      unset($book->description);
      unset($book->publisher);
      unset($book->pubdate);
      unset($book->edition);
      unset($book->pages);

      return $book;
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

    public function unset_cookie() {
      delete_cookie('shopping_cart');
      redirect(base_url('ShoppingCart'));
    }

    public function verify_role() {
			if(isset($_SESSION['user']))
				return 1;
			else
				return 0;
		}

}
