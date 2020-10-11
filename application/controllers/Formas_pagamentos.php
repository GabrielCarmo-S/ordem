<?php 

defined('BASEPATH') OR exit('Ação não permitida');

class Formas_pagamentos extends CI_Controller{
	
	public function __construct() {
		
		parent::__construct();

		if (!$this->ion_auth->logged_in()) {
			$this->session->set_flashdata('info', 'Sua sessão expirou!');
			redirect('login');
		}
		
	}


	public function index(){

		$data = array(

			'titulo' => 'Formas de Pagamentos', 

			'styles' => array(

				'vendor/datatables/dataTables.bootstrap4.min.css',

			),

			'scripts' => array(
				'vendor/mask/jquery.mask.min.js', 'vendor/mask/app.js',
				'vendor/datatables/jquery.dataTables.min.js',
				'vendor/datatables/dataTables.bootstrap4.min.js',
				'vendor/datatables/app.js'

			),

			'formas_pagamentos' => $this->core_model->get_all('formas_pagamentos'),

		);

		$this->load->view('layout/header', $data);

		$this->load->view('formas_pagamentos/index');

		$this->load->view('layout/footer');

	}

	public function edit($forma_pagamento_id = NULL){

		if (!$forma_pagamento_id || !$this->core_model->get_by_id('formas_pagamentos', array('forma_pagamento_id' => $forma_pagamento_id))) {

			$this->session->set_flashdata('error', 'Pagamentos não encontrados');
			redirect('modulo');

		} else {

			$this->form_validation->set_rules('forma_pagamento_nome','','trim|required|min_length[4]|max_length[45]|callback_check_pagamento_nome');
			$this->form_validation->set_rules('forma_pagamento_ativa','','required');
			$this->form_validation->set_rules('forma_pagamento_aceita_parc','','max_length[145]');

			if ($this->form_validation->run()) {

				$forma_pagamento_ativa = $this->input->post('forma_pagamento_ativa');

				if ($this->db->table_exists('vendas')) {

					if ($forma_pagamento_ativa == 0 && $this->core_model('vendas', array('venda_forma_pagamento_id' => $forma_pagamento_id, 'venda_status' =>0))){
						$this->sesion->set_flashdata('info', 'Forma de pagmento não pode ser desativada, pois está sendo utilizada em Vendas');
						redirect('modulo');
					}
				}

				if ($this->db->table_exists('ordem_servicos')) {

					if ($forma_pagamento_ativa == 0 && $this->core_model('ordem_servicos', array('ordem_servico_forma_pagamento_id' => $forma_pagamento_id, 'ordem_servico_status' =>0))){
						$this->sesion->set_flashdata('info', 'Forma de pagmento não pode ser desativada, pois está sendo utilizada em Servico');
						redirect('modulo');
					}
				}

				$data = elements(

					array(

						'forma_pagamento_nome',
						'forma_pagamento_ativa',
						'forma_pagamento_aceita_parc',
						

					), $this->input->post()

				);

				$data = html_escape($data);
				
				$this->core_model->update('formas_pagamentos', $data, array('forma_pagamento_id' => $forma_pagamento_id));

				redirect('modulo');	

			} else {

				$data = array(

					'titulo' => 'Atualizar Pagamentos', 

					'forma_pagamento' => $this->core_model->get_by_id('formas_pagamentos', array('forma_pagamento_id' => $forma_pagamento_id)), 


				);

				$this->load->view('layout/header', $data);

				$this->load->view('formas_pagamentos/edit');

				$this->load->view('layout/footer');

			}	



		}


	}

	public function add(){

		$this->form_validation->set_rules('forma_pagamento_cliente_id','','required');
		$this->form_validation->set_rules('forma_pagamento_data_vencto','','required');
		$this->form_validation->set_rules('forma_pagamento_valor','','required');
		$this->form_validation->set_rules('forma_pagamento_obs','','max_length[145]');

		if ($this->form_validation->run()) {

			$data = elements(

				array(

					'forma_pagamento_cliente_id',
					'forma_pagamento_data_vencto',
					'forma_pagamento_valor',
					'forma_pagamento_status',
					'forma_pagamento_obs',


				), $this->input->post()

			);
			$forma_pagamento_status = $this->input->post('forma_pagamento_status');

			if ($forma_pagamento_status == 1) {
				$data['forma_pagamento_data_pagamento'] == date('Y-m-d h:i:s');
			}


			$data = html_escape($data);

			$this->core_model->insert('formas_pagamentos', $data);

			redirect('receber');	

		} else {

			$data = array(

				'titulo' => 'Atualizar Pagamentos', 

				'styles' => array('vendor/select2/select2.min.css'),

				'scripts' => array('vendor/select2/select2.min.js', 'vendor/select2/app.js'),

				'clientes' => $this->core_model->get_all('clientes'),

			);

			$this->load->view('layout/header', $data);

			$this->load->view('receber/add');

			$this->load->view('layout/footer');

		}	

	}

	public function del($forma_pagamento_id = NULL){

		if (!$forma_pagamento_id || !$this->core_model->get_by_id('formas_pagamentos', array('forma_pagamento_id' => $forma_pagamento_id))) {

			$this->session->set_flashdata('error', 'Conta não Encontrada');

			redirect('receber');

		} else {
			$this->core_model->delete('formas_pagamentos', array('forma_pagamento_id' => $forma_pagamento_id));
			$this->session->set_flashdata('sucesso', 'Conta excluida com sucesso');
			redirect('receber');
		}

	}

	public function check_pagamento_nome($forma_pagamento_nome){

		$forma_pagamento_id = $this->input->post('forma_pagamento_id');

		if($this->core_model->get_by_id('formas_pagamentos', array('forma_pagamento_nome' => $forma_pagamento_nome, 'forma_pagamento_id !=' => $forma_pagamento_id))){

			$this->form_validation->set_message('check_pagamento_nome', 'Essa forma de pagamento já existe');

			return FALSE;

		} else {
			return TRUE;
		}

	}



}


?>
