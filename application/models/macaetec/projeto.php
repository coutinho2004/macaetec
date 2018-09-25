<?php

class Projeto extends DataMapper {
	var $db_params = 'default';
	var $table = 'projeto';
	public $model = 'projeto';
	var $has_one = array('contato');
	var $has_many = array('projeto_observacao','projeto_historico');
	var $CI;
	var $validation = array(
		array(
			'field' => 'nome',
			'label' => 'Nome',
			'rules' => array(
				'required',
				'trim',
				'min_length'=>3,
				'max_length'=>200
			)
		)
		,array(
			'field' => 'contato_id',
			'label' => 'Contato',
			'rules' => array(
				'required'
			)
		)
	);
	var $default_order_by = array('created' => 'desc');
/**********************************************************************/
	function __construct($id = NULL){
		$this->CI =& get_instance();
		parent::__construct();
		if($id!=NULL){
			$this->get_by_id($id);
		}
	}
/**********************************************************************/
	public function total(){
		if($this->CI->idTipoVenda==1){
			return $this->totalFunilVendas();
		}else{
			return $this->totalFOllowUp();
		}
	}
/**********************************************************************/
	public function listar($limit=0,$start=0){
		if($this->CI->idTipoVenda==1){
			return $this->listarFunilVendas($limit,$start);
		}else{
			return $this->listarFollowUp($limit,$start);
		}
	}
/**********************************************************************/
	private function totalFunilVendas(){
		return $this
		->where(array('idTipo'=>1,'idVendido <>'=>1))
		->get()
		->result_count();
	}
/**********************************************************************/
	private function listarFunilVendas($limit=0,$start=0){
		return $this
		->where(array('idTipo'=>1,'idVendido <>'=>1))
		->get($limit,$start);
	}
/**********************************************************************/
	private function totalFollowUp(){
		return $this
		->where(array('idTipo'=>2,'idVendido <>'=>1))
		->get()
		->result_count();
	}
/**********************************************************************/
	private function listarFollowUp($limit=0,$start=0){
		return $this
		->where(array('idTipo'=>2,'idVendido <>'=>1))
		->get($limit,$start);
	}
/**********************************************************************/
/**********************************************************************/
}

/* End of file projeto.php */
/* Location: ./application/models/macaetec/projeto.php */
