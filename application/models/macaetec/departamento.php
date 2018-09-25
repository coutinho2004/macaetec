<?php

class Departamento extends DataMapper {
	var $db_params = 'default';
	var $table = 'departamento';
	public $model = 'departamento';
	var $has_many = array('contato');
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
	);
	var $default_order_by = array('nome' => 'asc');
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

/* End of file departamento.php */
/* Location: ./application/models/macaetec/departamento.php */
