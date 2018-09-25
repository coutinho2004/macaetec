<?php

class Projeto_Observacao extends DataMapper {
	var $db_params = 'default';
	var $table = 'projeto_observacao';
	public $model = 'projeto_observacao';
	var $has_one = array('projeto');
	var $CI;
	var $validation = array(
		array(
			'field' => 'texto',
			'label' => 'texto',
			'rules' => array(
				'required',
				'trim',
			)
		)
	);
	var $default_order_by = array('dataRegistro' => 'desc');
/**********************************************************************/
	function __construct($id = NULL){
		$this->CI =& get_instance();
		parent::__construct();
		if($id!=NULL){
			$this->get_by_id($id);
		}
	}
/**********************************************************************/
/**********************************************************************/
/**********************************************************************/
}

/* End of file projeto_observacao.php */
/* Location: ./application/models/macaetec/projeto_observacao.php */
