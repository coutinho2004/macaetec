<?php

class Notificacao extends DataMapper {
	var $db_params = 'default';
	var $table = 'projeto_historico';
	var $default_order_by = array('dataRegistro' => 'desc');
	var $total;
	var $lista;
/**********************************************************************/
	function __construct($id = NULL){
		//$this->CI =& get_instance();
		parent::__construct();
		if($id!=NULL){
			$this->lista = $this->get_where(array('user_id'=>$id,'idLido'=>0));
			$this->total = $this->get_where(array('user_id'=>$id,'idLido'=>0))->result_count();
		}
	}
/**********************************************************************/
/**********************************************************************/
}

/* End of file projeto_historico.php */
/* Location: ./application/models/macaetec/projeto_historico.php */
