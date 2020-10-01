<?php 

defined('BASEPATH') OR exit('Ação não permitida');


class Core_model extends CI_Model{

	public function get_all($tabela = NULL, $condicao = NULL){

		if ($tabela) {

			if(is_array($condicao)){
				$this->db->where($condicao);
			}

			return $this->db->get($tabela)->result();
		} else {

			return FALSE;

		}

	}

	public function get_by_id($tabela = NULL, $condicao = NULL){

		if($tabela && is_array($condicao)){
			$this->db->where($condicao);
			$this->db->limit(1);

			return $this->db->get($tabela)->row();

		}else{
			return FALSE;
		}

	}

	public function insert($tabela = NULL, $data = NULL, $get_last_id = NULL){

		if ($tabela && is_array($data)) {

			$this->db->insert($tabela, $data);

			if ($get_last_id) {

				$this->session->set_userdata('last_id', $this->db->insert_id());

			}

			if ($this->db->affected_rows() > 0 ) {

				$this->session->set_flashdata('sucesso', 'Dados Salvos');

			}else{

				$this->session->set_flashdata('error','Erro ao salvar dados');

			}

		}

	}

	public function update($tabela = NULL, $data = NULL, $condicao = NULL){

		if ($tabela && is_array($data) && is_array($condicao)) {

			if ($this->db->update($tabela, $data, $condicao)) {

				$this->session->set_flashdata('sucesso', 'Dados Salvos');

			} else {

				$this->session->set_flashdata('error', 'Erro ao atualizar');

			}	

		} else {

			return FALSE;

		}

	}

	public function delete($tabela = NULL, $condicao = NULL){

		$this->db->db_debug = false;

		if ($tabela && is_array($condicao)) {
			
			$status = $this->db->delete($tabela, $condicao);

			$error = $this->db->error();

			if(!$status){

				foreach ($error as $code) {

					if ($code == 1451) {
						
						$this->session->set_flashdata('error', 'Esse registro não pode ser excluido');

					} 

				}

			} else {

				$this->session->set_flashdata('sucesso', 'Registro Exluido');

			}

			$this->db->db_debug = TRUE;

		} else {

			return FALSE;

		}

	}

	public function generate_unique_code($table = NULL, $type_of_code = NULL, $size_of_code, $field_search) {

		do {
			$code = random_string($type_of_code, $size_of_code);
			$this->db->where($field_search, $code);
			$this->db->from($table);
		} while ($this->db->count_all_results() >= 1);

		return $code;
	}



}



?>