<?php

class Empresa extends DataMapper {
	var $db_params = 'default';
	var $table = 'empresa';
	public $model = 'empresa';
	var $has_one = array('atividade','uf');
	var $has_many = array('setor','historico','contato');
	var $CI;
	var $validation = array(
		'nome' => array(
			'rules' => array(
				'required',
				'trim',
				'unique',
				'min_length'=>3,
				'max_length' => 200
			)
		),
		'atividade_id' => array(
			'rules' => array('required')
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

/* End of file empresa.php */
/* Location: ./application/models/macaetec/empresa.php */
