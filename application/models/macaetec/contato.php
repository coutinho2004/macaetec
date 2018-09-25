<?php

class Contato extends DataMapper {
	var $db_params = 'default';
	var $table = 'contato';
	public $model = 'contato';
	var $has_one = array('empresa','departamento');
	var $has_many = array('contato_historico','projeto');
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

/* End of file contato.php */
/* Location: ./application/models/macaetec/contato.php */
