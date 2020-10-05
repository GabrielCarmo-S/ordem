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

	public function edit($produto_id = NULL){

		if (!$produto_id || !$this->core_model->get_by_id('produtos', array('produto_id' => $produto_id))) {

			$this->session->set_flashdata('error', 'Produtos não encontrados');
			redirect('produtos');

		} else {

			$this->form_validation->set_rules('produto_descricao','','trim|required|min_length[5]|max_length[145]|callback_check_produto_descricao');
			$this->form_validation->set_rules('last_name','','trim|required');
			$this->form_validation->set_rules('email','','trim|required|callback_email_check');
			$this->form_validation->set_rules('username','','trim|required|callback_username_check');
			$this->form_validation->set_rules('password','Senha','min_length[5]|max_length[255]');
			$this->form_validation->set_rules('confirm_password','Confirma','matches[password]');

			if ($this->form_validation->run()) {

				$data = elements(

					array(

						'first_name',
						'last_name',
						'email',
						'username',
						'active',
						'password'

					), $this->input->post()

				);

				redirect('produtos');	

			} else {

				$data = array(

					'titulo' => 'Atualizar produto', 

					'scripts' => array('vendor/mask/jquery.mask.min.js', 'vendor/mask/app.js'),

					'produto' => $this->core_model->get_by_id('produtos', array('produto_id' => $produto_id)), 

					'marcas' => $this->core_model->get_all('marcas'), 

					'categorias' => $this->core_model->get_all('categorias'),

					'fornecedores' => $this->core_model->get_all('fornecedores'),

				);

				$this->load->view('layout/header', $data);

				$this->load->view('produtos/edit');

				$this->load->view('layout/footer');

			}	



		}


	}

	public function check_produto_descricao($produto_descrica){
		$produto_id = $this->input->post('produto_id');

		if($this->core_model->get_by_id('produtos', array('produto_descrica' => $produto_descrica, 'produto_id != ' => $produto_id))){
			$this->form_validation->set_message('check_produto_descricao', 'Este produto já existe');
			return FALSE;
		} else {
			return TRUE;
		}

	}

}


	?>
