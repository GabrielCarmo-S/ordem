<?php 

defined('BASEPATH') OR exit('Ação não permitida');

class Produtos extends CI_Controller{
	
	public function __construct() {
		
		parent::__construct();

		if (!$this->ion_auth->logged_in()) {
			$this->session->set_flashdata('info', 'Sua sessão expirou!');
			redirect('login');
		}

		$this->load->model('produtos_model');
		
	}


	public function index(){

		$data = array(

			'titulo' => 'Produtos Cadastrados', 

			'styles' => array(

				'vendor/datatables/dataTables.bootstrap4.min.css',

			),

			'scripts' => array(

				'vendor/datatables/jquery.dataTables.min.js',
				'vendor/datatables/dataTables.bootstrap4.min.js',
				'vendor/datatables/app.js'

			),

			'produtos' => $this->produtos_model->get_all(),

		);

		$this->load->view('layout/header', $data);

		$this->load->view('produtos/index');

		$this->load->view('layout/footer');

	}


}


?>
