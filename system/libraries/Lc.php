<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class CI_Lc {
	var $CI;
	function __construct(){
		$this->CI =& get_instance();
	}
/*********************************************************************************/
	public function clearFormatacao($str){
		return str_replace("/", "", str_replace("-", "", str_replace(".", "", $str)));
	}
/*********************************************************************************/
	public function clearLast($str,$char){return substr($str,0,strrpos($str,$char));}
/*********************************************************************************/
	public function poeZero($n,$str){$t = strlen($str);if($n > $t){for($i=0; $i<($n-$t); $i++){$str = "0".$str;}}return $str;}
/*********************************************************************************/
	public function formataEstilo($str,$id){
		switch($id){
			case 1:{//formata cpf
				$str = $this->poeZero(11,$str);return substr($str,0,3).".".substr($str,3,3).".".substr($str,6,3)."-".substr($str,9,2);
				break;
			}
			case 2:{//formata processo
				$str = $this->poeZero(12,$str);return substr($str,0,6)."/".substr($str,6,4)."-".substr($str,10,2);
				break;
			}
			case 3:{//formata portaria
				$str = $this->poeZero(6,$str);return substr($str,0,4)."-".substr($str,4,2);
				break;
			}
			case 4:{//formata cnpj
				$str = $this->poeZero(15,$str);return substr($str,0,3).".".substr($str,3,3).".".substr($str,6,3)."/".substr($str,9,4)."-".substr($str,13,2);
				break;
			}
			case 5:{//formata data 00/00/0000
				if(isset($str)){
					$str = explode('-', $str);
					$str = $str[2].'/'.$str[1].'/'.$str[0];
				}
				break;
			}
			case 6:{//formada data com 00 de mes de 0000
				if($str == '0000-00-00'){
					$str = '00 de 00 de 0000';
				}else{
					if(isset($str)){
						$data = explode('-', $str);
						$ptMes = array("01" => "janeiro","02" => "fevereiro","03" => "março","04" => "abril","05" => "maio","06" => "junho","07" => "julho","08" => "agosto","09" => "setembro","10" => "outubro","11" => "novembro","12" => "dezembro");
						$str = $data[2].' de '.$ptMes[$data[1]].' de '.$data[0];
					}
				}
				break;
			}
			case 7:{//formata cnpj 00.000.000/0000-00
				$str = $this->poeZero(14,$str);return substr($str,0,2).".".substr($str,2,3).".".substr($str,5,3)."/".substr($str,8,4)."-".substr($str,12,2);
				break;
			}
			case 8:{//formada data com de Mes de 0000
				if($str == '0000-00-00'){
					$str = '00 de 00 de 0000';
				}else{
					if(isset($str)){
						$data = explode('-', $str);
						$ptMes = array("01" => "Janeiro","02" => "Fevereiro","03" => "Março","04" => "Abril","05" => "Maio","06" => "Junho","07" => "Julho","08" => "Agosto","09" => "Setembro","10" => "Outubro","11" => "Novembro","12" => "Dezembro");
						$str = 'de '.$ptMes[$data[1]].' de '.$data[0];
					}
				}
				break;
			}
			case 9:{//formata data 00/00 . dia da semana
				$diaSemana = array('Domingo', 'Segunda-Feira', 'Terça-Feira', 'Quarta-Feira', 'Quinta-Feira', 'Sexta-Feira', 'Sabado');
				$numeroSemana = date('w', strtotime($str));
				if(isset($str)){
					$str = explode('-', $str);
					$str = $str[2].'/'.$str[1].' . '.$diaSemana[$numeroSemana];
				}
				break;
			}
		}
		return $str;
	}
/*********************************************************************************/
	public function convertMes($idMes){
		$ptMes = array("1" => "janeiro","2" => "fevereiro","3" => "março","4" => "abril","5" => "maio","6" => "junho","7" => "julho","8" => "agosto","9" => "setembro","10" => "outubro","11" => "novembro","12" => "dezembro");
		return $ptMes[$idMes];
	}
/*********************************************************************************/
	public function fds($dia,$mes,$ano){
		$today = getdate(mktime(0, 0, 0, $mes, $dia, $ano));
		return $today['wday'];
	}
/*********************************************************************************/
	public function isHoliday($dia,$mes,$ano){
		//pesquisa se é feriado movel
		$data = $ano.'-'.$mes.'-'.$dia;
		$o = new Feriado_Movel();
		$o->get_by_data($data);
		//$qry = $this->CI->db->get_where('db.feriado_moveis',array('Feriado'=>$data));
		//if($qry->num_rows() > 0){
		if($o->exists()){
			return true;
		}else{
			//verifica se é feriado fixo
			$o = new Feriado_Fixo();
			$o->where(array('dia' =>$dia,'mes' =>$mes))->get();
			//$qry = $this->CI->db->get_where('db.feriado_fixo',array('Dia'=>$dia,'Mes'=>$mes));
			//if($qry->num_rows() > 0){
			if($o->exists()){
				return true;
			}else{
				return false;
			}
		}
	}
/*********************************************************************************/
	public function heapsort(&$vet){
		for($i=(int)((count($vet) - 1) / 2); $i >= 0; $i--){
			$count = count($vet) - 1;
			$this->buildheap($vet, $i, $count);
		}
		for($i = (count($vet) - 1); $i >= 1; $i--){
			$aux = $vet[0];
			$vet [0] = $vet [$i];
			$vet [$i] = $aux;
			$this->buildheap($vet, 0, $i - 1);
		}
	}
/*********************************************************************************/
	public function buildheap(&$vet, $i, $f){
		$aux = $vet[$i];
		$j = $i * 2 + 1;
		while ($j <= $f){
			if($j < $f){
				if($vet[$j] < $vet[$j + 1]) {
					$j = $j + 1; 
				}
			}
			if($aux < $vet[$j])
			{
				$vet[$i] = $vet[$j];
				$i = $j;
				$j = 2 * $i + 1;
			}else{
				$j = $f + 1;
			}
		}
		$vet[$i] = $aux;
	}
/*********************************************************************************/
	public function utf8_strtr($str){
		$from = "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ";
		$to = "aaaaeeiooouucAAAAEEIOOOUUC";
		$keys = array();
		$values = array();
		preg_match_all('/./u', $from, $keys);
		preg_match_all('/./u', $to, $values);
		$mapping = array_combine($keys[0], $values[0]);
		return strtr($str, $mapping);
	}
/*********************************************************************************/
	public static function getusrip() {
		$ip = null;
		if ((isset($_SERVER['HTTP_X_FORWARDED_FOR'])) &&
				(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))) {
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		}
		elseif ((isset($_SERVER['HTTP_CLIENT_IP'])) &&
				(!empty($_SERVER['HTTP_CLIENT_IP']))) {
			$ip = explode(".", $_SERVER['HTTP_CLIENT_IP']);
			$ip = "{$ip[3]}.{$ip[2]}.{$ip[1]}.{$ip[0]}";
		}
		elseif ((!isset($_SERVER['HTTP_X_FORWARDED_FOR'])) &&
				(empty($_SERVER['HTTP_X_FORWARDED_FOR'])) &&
				(!isset($_SERVER['HTTP_CLIENT_IP'])) &&
				(empty($_SERVER['HTTP_CLIENT_IP'])) &&
				(isset($_SERVER['REMOTE_ADDR']))) {
			$ip = ($_SERVER['REMOTE_ADDR']);
		}
		else {
			// ip is null
		}
		return ($ip);
	}
/*********************************************************************************/
	public function ipIntranet(){
		$ip = $this->getusrip();
		if(strpos($ip,".")){
			$d = explode(".",$ip);

			if($d[0].$d[1].$d[2]==14616482){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
/************************************************************************/
	public function do_upload($path,$id,$fileName = null){

		$config['upload_path'] = $path.$id;
		$config['allowed_types'] = 'pdf';
		//$config['max_size']	= '2048';
		$config['max_width']  = '0';
		$config['max_height']  = '0';
		$config['overwrite'] = true;
		if(!is_null($fileName)){
			$config['file_name'] = $id;
		}

		$this->CI->load->library('upload', $config);

		if(! $this->CI->upload->do_upload()){
			$error = array('error' => $this->CI->upload->display_errors());
			echo '{success:false,msg:"'.$this->CI->upload->display_errors().'"}';
		}else{
			echo '{success:true}';
		}
	}
/*********************************************************************************/
	public function listDiretorio($path,$id){
		//Verifica se a pasta uploads existe
		$pathname = FCPATH.$path;
		if(!is_dir($pathname)){
			mkdir($pathname,0777);
		}
		//Verifica se a pasta com o id existe
		$diretorio = $pathname.$id;
		if(!is_dir($diretorio)){
			mkdir($diretorio,0777);
		}
		$dados = array();

		$webPath = base_url().$path.$id.'/';
		$this->CI->load->helper('directory');
		$files = directory_map($diretorio);
		$count = count($files);
		for($i = 0; $i < $count; $i++){
			$dados[$i] = array('id'=>$files[$i],'nomeFile'=>$files[$i],'webPath'=>$webPath.$files[$i]);
		}

		return $dados;
	}
/*********************************************************************************/
}
// END CI_Lc class

/* End of file Lc.php */
/* Location: ./system/libraries/Lc.php */
