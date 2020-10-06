<?php 

defined('BASEPATH') OR exit('Ação não permitida');

class Pagar extends CI_Controller{
	
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

			'titulo' => 'Contas A Pagar', 

			'styles' => array(

				'vendor/datatables/dataTables.bootstrap4.min.css',

			),

			'scripts' => array(

				'vendor/datatables/jquery.dataTables.min.js',
				'vendor/datatables/dataTables.bootstrap4.min.js',
				'vendor/datatables/app.js'

			),

			'contas_pagar' => $this->financeiro_model->get_all_pagar(),

		);

		$this->load->view('layout/header', $data);

		$this->load->view('pagar/index');

		$this->load->view('layout/footer');

	}

	public function edit($conta_pagar_id = NULL){

		if (!$conta_pagar_id || !$this->core_model->get_by_id('contas_pagar', array('conta_pagar_id' => $conta_pagar_id))) {

			$this->session->set_flashdata('error', 'Pagamentos não encontrados');
			redirect('pagar');

		} else {

			$this->form_validation->set_rules('pagar_descricao','','trim|required|min_length[5]|max_length[145]|callback_check_pagar_descricao');
			$this->form_validation->set_rules('pagar_unidade','unidade','trim|required|min_length[2]|max_length[5]');
			$this->form_validation->set_rules('pagar_preco_custo','Preço de custo','trim|required|max_length[45]');
			$this->form_validation->set_rules('pagar_preco_venda','Preço de venda','trim|required|max_length[45]|callback_check_pagar_preco_venda');
			$this->form_validation->set_rules('pagar_estoque_minimo','Estoque Minimo','trim|greater_than_equal_to[0]');
			$this->form_validation->set_rules('pagar_qtde_estoque','Quantidade Estoque','trim|required');
			$this->form_validation->set_rules('pagar_obs','Estoque Minimo','trim|max_length[200]');

			if ($this->form_validation->run()) {

				$data = elements(

					array(

						'pagar_codigo',
						'pagar_categoria_id',
						'pagar_marca_id',
						'pagar_fornecedor_id',
						'pagar_descricao',
						'pagar_unidade',
						'pagar_preco_custo',
						'pagar_preco_venda',
						'pagar_estoque_minimo',
						'pagar_qtde_estoque',
						'pagar_ativo',
						'pagar_obs',

					), $this->input->post()

				);

				$data = html_escape($data);
				
				$this->core_model->update('pagars', $data, array('pagar_id' => $pagar_id));

				redirect('pagar');	

			} else {

				$data = array(

					'titulo' => 'Atualizar Pagamentos', 

					'styles' => array('vendor/select2/select2.min.css'),

					'scripts' => array('vendor/select2/select2.min.js', 'vendor/select2/app.js'),

					'conta_pagar' => $this->core_model->get_by_id('contas_pagar', array('conta_pagar_id' => $conta_pagar_id)), 

					'fornecedores' => $this->core_model->get_all('fornecedores'),

				);

				$this->load->view('layout/header', $data);

				$this->load->view('pagar/edit');

				$this->load->view('layout/footer');

			}	



		}


	}

	public function add(){

			$this->form_validation->set_rules('pagar_descricao','','trim|required|min_length[5]|max_length[145]|is_unique[pagars.pagar_descricao]');
			$this->form_validation->set_rules('pagar_unidade','unidade','trim|required|min_length[2]|max_length[5]');
			$this->form_validation->set_rules('pagar_preco_custo','Preço de custo','trim|required|max_length[45]');
			$this->form_validation->set_rules('pagar_preco_venda','Preço de venda','trim|required|max_length[45]|callback_check_pagar_preco_venda');
			$this->form_validation->set_rules('pagar_estoque_minimo','Estoque Minimo','trim|required|greater_than_equal_to[0]');
			$this->form_validation->set_rules('pagar_qtde_estoque','Quantidade Estoque','trim|required');
			$this->form_validation->set_rules('pagar_obs','Estoque Minimo','trim|max_length[200]');

			if ($this->form_validation->run()) {

				$data = elements(

					array(

						'pagar_codigo',
						'pagar_categoria_id',
						'pagar_marca_id',
						'pagar_fornecedor_id',
						'pagar_descricao',
						'pagar_unidade',
						'pagar_preco_custo',
						'pagar_preco_venda',
						'pagar_estoque_minimo',
						'pagar_qtde_estoque',
						'pagar_ativo',
						'pagar_obs',

					), $this->input->post()

				);

				$data = html_escape($data);

				$this->core_model->insert('pagars', $data);


				$this->session->set_flashdata('sucesso', 'pagar salvo com sucesso');
				redirect('pagars');

				
			} else {

				$data = array(

					'titulo' => 'Cadastrar pagar', 

					'scripts' => array('vendor/mask/jquery.mask.min.js',
						'vendor/mask/app.js',
						'js/pagars.js'),

					'pagar_codigo' => $this->core_model->generate_unique_code('pagars', 'numeric', 8, 'pagar_codigo'), 

					'marcas' => $this->core_model->get_all('marcas'), 

					'categorias' => $this->core_model->get_all('categorias'),

					'fornecedores' => $this->core_model->get_all('fornecedores'),
					
				);



				$this->load->view('layout/header', $data);

				$this->load->view('pagars/add');

				$this->load->view('layout/footer');


			}
			
	}

	public function del($pagar_id = NULL){

			if (!$pagar_id || !$this->core_model->get_by_id('pagars', array('pagar_id' => $pagar_id))) {

				$this->session->set_flashdata('error', 'pagar não Encontrado');

				redirect('pagars');
				
			} else {
				$this->core_model->delete('pagars', array('pagar_id' => $pagar_id));
				$this->session->set_flashdata('sucesso', 'pagar excluido com sucesso');
				redirect('pagars');
			}

	}

	public function check_pagar_descricao($pagar_descrica){
		$pagar_id = $this->input->post('pagar_id');

		if($this->core_model->get_by_id('pagars', array('pagar_descricao' => $pagar_descrica, 'pagar_id != ' => $pagar_id))){
			$this->form_validation->set_message('check_pagar_descricao', 'Este pagar já existe');
			return FALSE;
		} else {
			return TRUE;
		}

	}

	public function check_pagar_preco_venda($pagar_preco_venda){

		$pagar_preco_custo = $this->input->post('pagar_preco_custo');


		$pagar_preco_custo = str_replace('.', '', $pagar_preco_custo);
		$pagar_preco_venda = str_replace('.', '', $pagar_preco_venda);
		$pagar_preco_custo = str_replace(',', '', $pagar_preco_custo);
		$pagar_preco_venda = str_replace(',', '', $pagar_preco_venda);

		if($pagar_preco_custo > $pagar_preco_venda){

			$this->form_validation->set_message('check_pagar_preco_venda', 'Preço de venda deve ser maior');

			return FALSE;


		} else {
			return TRUE;
		}

	}

}


	?>
