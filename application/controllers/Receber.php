<?php 

defined('BASEPATH') OR exit('Ação não permitida');

class Receber extends CI_Controller{
	
	public function __construct() {
		
		parent::__construct();

		if (!$this->ion_auth->logged_in()) {
			$this->session->set_flashdata('info', 'Sua sessão expirou!');
			redirect('login');
		}

		$this->load->model('financeiro_model');
		
	}


	public function index(){

		$data = array(

			'titulo' => 'Contas A Receber', 

			'styles' => array(

				'vendor/datatables/dataTables.bootstrap4.min.css',

			),

			'scripts' => array(
				'vendor/mask/jquery.mask.min.js', 'vendor/mask/app.js',
				'vendor/datatables/jquery.dataTables.min.js',
				'vendor/datatables/dataTables.bootstrap4.min.js',
				'vendor/datatables/app.js'

			),

			'contas_receber' => $this->financeiro_model->get_all_receber(),

		);

		$this->load->view('layout/header', $data);

		$this->load->view('receber/index');

		$this->load->view('layout/footer');

	}

	public function edit($conta_receber_id = NULL){

		if (!$conta_receber_id || !$this->core_model->get_by_id('contas_receber', array('conta_receber_id' => $conta_receber_id))) {

			$this->session->set_flashdata('error', 'Pagamentos não encontrados');
			redirect('receber');

		} else {

			$this->form_validation->set_rules('conta_receber_cliente_id','','required');
			$this->form_validation->set_rules('conta_receber_data_vencto','','required');
			$this->form_validation->set_rules('conta_receber_valor','','required');
			$this->form_validation->set_rules('conta_receber_obs','','max_length[145]');

			if ($this->form_validation->run()) {

				$data = elements(

					array(

						'conta_receber_cliente_id',
						'conta_receber_data_vencto',
						'conta_receber_valor',
						'conta_receber_status',
						'conta_receber_obs',
						

					), $this->input->post()

				);
				$conta_receber_status = $this->input->post('conta_receber_status');

				if ($conta_receber_status == 1) {
					$data['conta_receber_data_pagamento'] == date('Y-m-d h:i:s');
				}

				$data = html_escape($data);
				
				$this->core_model->update('contas_receber', $data, array('conta_receber_id' => $conta_receber_id));

				redirect('receber');	

			} else {

				$data = array(

					'titulo' => 'Atualizar Pagamentos', 

					'styles' => array('vendor/select2/select2.min.css'),

					'scripts' => array('vendor/select2/select2.min.js', 'vendor/select2/app.js'),

					'conta_receber' => $this->core_model->get_by_id('contas_receber', array('conta_receber_id' => $conta_receber_id)), 

					'clientes' => $this->core_model->get_all('clientes'),

				);

				$this->load->view('layout/header', $data);

				$this->load->view('receber/edit');

				$this->load->view('layout/footer');

			}	



		}


	}

	public function add(){

		$this->form_validation->set_rules('conta_receber_fornecedor_id','','required');
			$this->form_validation->set_rules('conta_receber_data_vencto','','required');
			$this->form_validation->set_rules('conta_receber_valor','','required');
			$this->form_validation->set_rules('conta_receber_obs','','max_length[145]');

			if ($this->form_validation->run()) {

				$data = elements(

					array(

						'conta_receber_fornecedor_id',
						'conta_receber_data_vencto',
						'conta_receber_valor',
						'conta_receber_status',
						'conta_receber_obs',
						

					), $this->input->post()

				);
				$conta_receber_status = $this->input->post('conta_receber_status');

				if ($conta_receber_status == 1) {
					$data['conta_receber_data_pagamento'] == date('Y-m-d h:i:s');
				}

				$data = html_escape($data);
				
				$this->core_model->insert('contas_receber', $data);

				redirect('receber');	

			} else {

				$data = array(

					'titulo' => 'Cadastrar Pagamentos', 

					'styles' => array('vendor/select2/select2.min.css'),

					'scripts' => array('vendor/select2/select2.min.js', 'vendor/select2/app.js'),

					'clientes' => $this->core_model->get_all('clientes'),

				);

				$this->load->view('layout/header', $data);

				$this->load->view('receber/add');

				$this->load->view('layout/footer');


		}

	}

	public function del($conta_receber_id = NULL){

		if (!$conta_receber_id || !$this->core_model->get_by_id('contas_receber', array('conta_receber_id' => $conta_receber_id))) {

			$this->session->set_flashdata('error', 'Conta não Encontrada');

			redirect('receber');

		} else {
			$this->core_model->delete('contas_receber', array('conta_receber_id' => $conta_receber_id));
			$this->session->set_flashdata('sucesso', 'Conta excluida com sucesso');
			redirect('receber');
		}

	}



}


?>