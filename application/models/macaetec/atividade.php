<?php

class Atividade extends DataMapper {
	var $db_params = 'default';
	var $table = 'atividade';
	public $model = 'atividade';
	var $has_many = array('empresa');
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

/* End of file atividade.php */
/* Location: ./application/models/macaetec/atividade.php */
