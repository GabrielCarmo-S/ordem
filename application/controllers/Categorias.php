<?php 

defined('BASEPATH') OR exit('Ação não permitida');

class Categorias extends CI_Controller{
	
	public function __construct() {
		
		parent::__construct();

		if (!$this->ion_auth->logged_in()) {
			$this->session->set_flashdata('info', 'Sua sessão expirou!');
			redirect('login');
		}
		
	}


	public function index(){

		$data = array(

			'titulo' => 'Categorias Cadastrados', 

			'styles' => array(

				'vendor/datatables/dataTables.bootstrap4.min.css',

			),

			'scripts' => array(

				'vendor/datatables/jquery.dataTables.min.js',
				'vendor/datatables/dataTables.bootstrap4.min.js',
				'vendor/datatables/app.js'

			),

			'categorias' => $this->core_model->get_all('categorias'),

		);

		$this->load->view('layout/header', $data);

		$this->load->view('categorias/index');

		$this->load->view('layout/footer');

	}

	public function add(){

			$this->form_validation->set_rules('categoria_nome','','trim|required|min_length[4]|max_length[45]|is_unique[categorias.categoria_nome]');

			if ($this->form_validation->run()) {

				$data = elements(

					array(

						'categoria_nome',
						'categoria_ativa',

					), $this->input->post()

				);

				$data = html_escape($data);

				$this->core_model->insert('categorias', $data);


				$this->session->set_flashdata('sucesso', 'categoria salvo com sucesso');
				redirect('categorias');

				
			} else {

				$data = array(

					'titulo' => 'Cadastrar categoria', 

					'scripts' => array('vendor/mask/jquery.mask.min.js',
						'vendor/mask/app.js',
						'js/categorias.js'),
					
				);



				$this->load->view('layout/header', $data);

				$this->load->view('categorias/add');

				$this->load->view('layout/footer');


			}
			
	}

	public function edit($categoria_id = NULL){

		if (!$categoria_id || !$this->core_model->get_by_id('categorias', array('categoria_id' => $categoria_id))) {
				
			$this->session->set_flashdata('error', 'Categoria não encontrada');
				redirect('categorias');

		} else {

			$this->form_validation->set_rules('categoria_nome','','trim|required|min_length[4]|max_length[45]|callback_check_categoria_nome');

			if ($this->form_validation->run()) {

				$data = elements(

					array(

						'categoria_nome',
						'categoria_ativa',

					), $this->input->post()

				);

				$data = html_escape($data);

				$this->core_model->update('categorias', $data, array('categoria_id' => $categoria_id));

					redirect('categorias');

			} else {

				$data = array(

					'titulo' => 'Atualizar categoria', 

					'scripts' => array('vendor/mask/jquery.mask.min.js', 'vendor/mask/app.js'),

					'categoria' => $this->core_model->get_by_id('categorias', array('categoria_id' => $categoria_id)), 

				);

				$this->load->view('layout/header', $data);

				$this->load->view('categorias/edit');

				$this->load->view('layout/footer');

			}	

		}

	}

	public function del($categoria_id = NULL){

			if (!$categoria_id || !$this->core_model->get_by_id('categorias', array('categoria_id' => $categoria_id))) {

				$this->session->set_flashdata('error', 'categoria não Encontrado');

				redirect('categorias');
				
			} else {
				$this->core_model->delete('categorias', array('categoria_id' => $categoria_id));
				$this->session->set_flashdata('sucesso', 'categoria excluido com sucesso');
				redirect('categorias');
			}

	}

	public function check_categoria_nome($categoria_nome){
		$categoria_id = $this->input->post('categoria_id');

		if($this->core_model->get_by_id('categorias', array('categoria_nome' => $categoria_nome, 'categoria_id != ' => $categoria_id))){
			$this->form_validation->set_message('check_categoria_nome', 'Este nome já existe');
			return FALSE;
		} else {
			return TRUE;
		}

	}


}


?>
