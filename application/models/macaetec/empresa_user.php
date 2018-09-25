<?php

class Empresa_User extends DataMapper {
	var $db_params = 'default';
	var $table = 'empresa_user';
	var $CI;
/**********************************************************************/
	function __construct($id = NULL){
		$this->CI =& get_instance();
		parent::__construct();
		if($id!=NULL){
			$this->get_by_id($id);
		}
	}
/**********************************************************************/
	public function salvar($empresa_id=0,$user_id=0){
		$this->get_where(array('empresa_id'=>$empresa_id,'user_id'=>$user_id));
		if(!$this->exists()){
			$this->empresa_id = $empresa_id;
			$this->user_id = $user_id;
			$this->save();
		}
	}
/**********************************************************************/
/**********************************************************************/
}

/* End of file empresa_user.php */
/* Location: ./application/models/macaetec/empresa_user.php */
