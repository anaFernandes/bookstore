<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class aboutme extends CI_Controller {
		public function index() {
			$data['page'] = "notexist";
			$data['user_type'] = $this->verify_role();
			$data['descricao'] = "Born in São Paulo, Carol Ribas is a professional make-up artist currently living and working in Switzerland. Graduated in Psychology on 2010 and specialized in People Management, has discovered her passion for make-up only on 2011. On the following year, has taken part in her first course and started working in her own studio in Brazil. Moved to the UK and then Switzerland, where graduated as a professional Swiss make-up artist through The Make Up Academy Valeria Meier. She has ever since worked as Valeria Meier assistant, renowned make-up artist in Switzerland. Her portfolio also has Lucian Hunziker, award-winning protographer, as well as many other publicity events, photoshooting , weddings, among others.";
			$this->build_static_info($data);
			$this->load->view('aboutme/about', $data);
			$this->build_static_footer();
		}

		public function germany() {
			$databuild['page'] = "notexist";
			$data['descricao'] = "Carol Ribas, geboren in São Paulo in Brasilien, ist professionlle Visagistin und lebt und arbeitet zur Zeit in der Schweiz.
Sie schloss 2010 ihr Psychologiestudium ab und machte dann ein Aufbaustudium in Personalmanagement.  Ihre Leidenschaft für das Schminken entdeckte sie erst im Jahre 2011. Im darauffolgenden Jahr machte sie dann ihren ersten Kursus zur Visagistin  und begann in ihrem eigenen Studio in diesem Bereich zu arbeiten.
Dann wohnte sie für ein gutes Jahr in England und zog danach in die Schweiz, wo sie einen weiteren Kursus zur Visagistin bei The Make Up Academy Valeria Meier (beauty & style academy) erfolreich absolvierte.
Seitdem arbeitet sie sporadisch / temporär als Assistentin für Valeria Meier, einer erfolgreichen und sehr bekannten Visagistin in der Schweiz, und hat dabei auch in Zusammenarbeit mit dem renommierten und preisgekrönten Fotograph Lucian Hunziker. Arbeiten für die Werbung, verschiedenste Events / Veranstaltungen, Fotoshootings, Hochzeiten und vieles mehr realisiert.";
			$this->build_static_info($databuild);
			$this->load->view('aboutme/about', $data);
			$this->build_static_footer();
		}

		public function brazil() {
			$databuild['page'] = "notexist";
			$data['descricao'] = "Nascida na cidade de São Paulo no Brasil, Carol Ribas é maquiadora profissional e atualmente vive e trabalha na Suíça.
Formada em Psicologia no ano de 2010 e pós graduada em Gestão de Pessoas,  descobriu sua paixão pela maquiagem apenas em 2011. No ano seguinte, fez seu primeiro curso profissional na área e começou a trabalhar em seu próprio estúdio no Brasil. Morou na Inglaterra  e, em seguida, mudou para a Suíça, onde formou se novamente como Maquiadora Profissional pelo The Make Up Academy Valeria Meier. Desde então, trabalhou como assistente de Valeria Meier, renomada maquiadora na Suíça, com o premiado fotógrafo Lucian Hunziker, e também realizou trabalhos para publicidade, eventos, ensaios fotográficos, casamentos, entre outros.";
			$this->build_static_info($databuild);
			$this->load->view('aboutme/about', $data);
			$this->build_static_footer();
		}
    public function build_static_info($databuild) {
      // $header_data['active'] = 'images';
      // if($this->verify_role() == 1) {
          // $header_url = 'layout/admin-header';
          // $this->load->view($header_url, $header_data);
      // } else {
          $header_url = 'layout/header';
          $this->load->view($header_url, $databuild);
          // $this->load->view($header_url, $header_data);
      // }
    }

    public function build_static_footer() {
      $this->load->view('layout/footer');
    }

		public function verify_role() {
			if(isset($_SESSION['user']))
				return 1;
			else
				return 0;
		}

}
