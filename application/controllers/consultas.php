<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Consultas extends CI_Controller {
	var $atividade;
/**********************************************************************/
	public function __construct(){
		parent::__construct();
		
		if (!$this->ion_auth->logged_in()){
			redirect('auth', 'refresh');
		}
		$this->atividade = $this->_atividade();
	}
/**********************************************************************/
	private function form($path,$data){
		$this->template->load('layouts/template',$path,$data);
	}
/**********************************************************************/
	public function contatoByAtividade(){
		if($this->input->post('q')){
			$keyword = $this->input->post('q');
			$this->session->set_userdata(
				array('keyword' => $this->input->post('q',TRUE))
			);
		}

		$keyword = $this->session->userdata('keyword');
		$o = new Empresa();
		$data['obj'] = $o->where('email <>','')->get_by_atividade_id($keyword);
		$data['number'] = 1;
		$data['keyword'] = $keyword;
		$data['atividade'] = $this->atividade;
		$this->form('consulta/contatoAtividade',$data);
	}
/**********************************************************************/
	public function exportaContatoAtividade($idAtividade=0){
		if (!$this->ion_auth->logged_in()){
			redirect('auth', 'refresh');
		}
		$keyword = $this->session->userdata('keyword');
		$o = new Empresa();
		$data['obj'] = $o->where('email <>','')->get_by_atividade_id($keyword);
		$this->exporta_excel->exportaContatoAtividade($data);
	}
/**********************************************************************/
	public function extrairEmailEmpresa(){
		if (!$this->ion_auth->logged_in()){
			redirect('auth', 'refresh');
		}
		$this->exporta_excel->extrairEmailEmpresa();
	}
/**********************************************************************/
	public function extrairEmailCompra(){
		if (!$this->ion_auth->logged_in()){
			redirect('auth', 'refresh');
		}
		$this->exporta_excel->extrairEmailCompra();
	}
/**********************************************************************/
	public function extrairEmailContato(){
		if (!$this->ion_auth->logged_in()){
			redirect('auth', 'refresh');
		}
		$this->exporta_excel->extrairEmailContato();
	}
/**********************************************************************/
/**********************************************************************/
/**********************************************************************/
/**********************************************************************/
	private function _atividade(){
		$o = new Atividade();
		return $o->get()->all_to_single_array('nome');
		unset($o);
	}
/**********************************************************************/
/**********************************************************************/
}

/* End of file consultas.php */
/* Location: ./application/controllers/consultas.php */