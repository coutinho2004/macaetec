<?php

class Historico extends DataMapper {
	var $db_params = 'default';
	var $table = 'historico';
	public $model = 'historico';
	var $has_one = array('empresa');
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

/* End of file historico.php */
/* Location: ./application/models/macaetec/historico.php */
