<?php

class My_Datamapper extends DataMapper {

/************************************************************************************/
	public function deletar($cods){
		$selectedRows = json_decode(stripslashes($cods));
		$count = 0;
		foreach($selectedRows as $row_id){
			$id = (int) $row_id;
			$this->get_by_id($id);//Filtra o registro
			if($this->exists()){//Verifica se tem o registro
				$this->delete();
				$count++;
			}
		}
		if($count){
			$response = array('success'=>'true', 'del_count'=>$count);
			echo json_encode($response);
		}else{
			echo '{failure: true}';
		}
	}
/************************************************************************************/
	public function status($dataInicial,$dataLimite){
		$dataAtual = date('Ymd');
		$aux = '';
		$aux = explode('-', $dataInicial);
		$dataInicial = $aux[0].$aux[1].$aux[2];
		$aux = '';
		$aux = explode('-', $dataLimite);
		$dataLimite = $aux[0].$aux[1].$aux[2];
		if($dataAtual >= $dataInicial){
			if($dataAtual <= $dataLimite){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
/************************************************************************************/
	function criarDV($str){
		$digito = 0;
		$dvCalc = 0;
		if(Strlen($str)==8){
			for($i=0;$i<=7;$i++){
				$digito = substr($str,$i,1);
				$dvCalc = $dvCalc + $digito * ($i+1);
			}
			$dvCalc = $dvCalc%10;
			return $dvCalc;
		}
		else{return "Falha";}
	}
/************************************************************************************/
}

/* End of file My_DataMapper.php */
/* Location: ./application/models/My_DataMapper.php */
