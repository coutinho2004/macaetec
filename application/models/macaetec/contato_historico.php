<?php

class Contato_Historico extends DataMapper {
	var $db_params = 'default';
	var $table = 'contato_historico';
	public $model = 'contato_historico';
	var $has_one = array('contato');
	var $CI;
	var $validation = array(
		array(
			'field' => 'texto',
			'label' => 'Texto',
			'rules' => array(
				'required',
				'trim',
				'min_length'=>3
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

/* End of file contato_historico.php */
/* Location: ./application/models/macaetec/contato_historico.php */
