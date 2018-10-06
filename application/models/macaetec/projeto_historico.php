<?php

class Projeto_Historico extends DataMapper {
	var $db_params = 'default';
	var $table = 'projeto_historico';
	public $model = 'projeto_historico';
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
		,array(
			'field' => 'dataNextContato',
			'label' => 'Data do Próximo Contato',
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
	public function notificacao($user_id){
		$this->get_where(array('user_id'=>$user_id,'idLido'=>0));
		$dados['total'] = $this->result_count();
		$dados['result'] = $this->get_where(array('user_id'=>$user_id,'idLido'=>0));

		return $dados;
	}
/**********************************************************************/
/**********************************************************************/
}

/* End of file projeto_historico.php */
/* Location: ./application/models/macaetec/projeto_historico.php */
