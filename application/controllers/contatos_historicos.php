<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contatos_Historicos extends CI_Controller {
	var $simNao;
	var $departamento;
/**********************************************************************/
	public function __construct(){
		parent::__construct();
		$this->simNao = array(0=>'',1=>'SIM',2=>'Não');
		$this->departamento = $this->_departamento();
	}
/**********************************************************************/
	private function form($path,$data){
		$this->template->load('layouts/template',$path,$data);
	}
/**********************************************************************/
	public function add($idUser,$idContato){
		$o = new Contato_Historico(0);
		$data['idUser'] = $idUser;
		$data['idContato'] = $idContato;
		$data['obj'] = $o;
		$data['action']  = "contatos_historicos/save/$idUser/$idContato";
		$data['departamento'] = $this->departamento;
		$this->form('empresa/formContatoHistorico',$data);
	}
/**********************************************************************/
	public function edit($idUser=NULL,$idContato=NULL,$id=''){
		if($id != ''){
			$o = new Contato_Historico($id);
			$data['idUser'] = $idUser;
			$data['idContato'] = $idContato;
			$data['id'] = $id;
			$data['obj'] = $o;
			$data['departamento'] = $this->departamento;
			$data['action'] = "contatos_historicos/save/$idUser/$idContato/$id";
			$this->form('empresa/formContatoHistorico',$data);
		}else{
			$this->semRegistro();
		}
	}
/**********************************************************************/
	public function save($idUser=NULL,$idContato=NULL,$id=NULL){
		if ($this->input->post()){
			$o = new Contato_Historico($id);
			$o->texto = $this->input->post('texto');
			$o->contato_id = $idContato;
			$o->dataRegistro = date("Y-m-d");
			if($o->save()){
				redirect(base_url("contatos/edit/$idUser/$idContato"));
			}else{
				$data['id'] = $id;
				$data['obj'] = $o;
				$data['idUser'] = $idUser;
				$data['idContato'] = $idContato;
				$data['action'] = "contatos_historicos/save/$idUser/$idContato".(!$id)?"":"/$id";
				$this->form('empresa/formContatoHistorico',$data);
			}
		}
	}
/**********************************************************************/
	public function destroy($idUser,$idContato,$id){
		$o = new Contato_Historico($id);
		if($o->exists()){
			$o->delete();
			redirect(base_url("contatos/edit/$idUser/$idContato"));
		}else{
			$this->semRegistro();
		}
	}
/**********************************************************************/
/**********************************************************************/
/**********************************************************************/
/**********************************************************************/
/**********************************************************************/
	private function _departamento(){
		$o = new Departamento();
		return $o->get()->all_to_single_array('nome');
		unset($o);
	}
/**********************************************************************/
	public function getNomeEmpresa($id=0){
		$o = new Empresa($id);
		return $o->nome;
	}
/**********************************************************************/
}

/* End of file contatos_historicos.php */
/* Location: ./application/controllers/contatos_historicos.php */