<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App extends CI_Controller {
/**********************************************************************/
	public function __construct(){
		parent::__construct();

		if (!$this->ion_auth->logged_in()){
			redirect('auth', 'refresh');
		}
	}
/**********************************************************************/
	public function backup(){
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()){
			redirect('auth', 'refresh');
		}
		$this->load->dbutil();
		$backup =& $this->dbutil->backup();
		$this->load->helper('file');
		write_file('/path/to/mybackup.zip', $backup);
		$this->load->helper('download');
		force_download('mybackup.zip', $backup);
	}
/**********************************************************************/
	public function index(){
		if (!$this->ion_auth->logged_in()){
			redirect('auth', 'refresh');
		}

		$dados['prospeccao'] = $this->prospeccao();
		$dados['proposta'] = $this->projetoStatus(array('ENVIADO'));
		$dados['negiciacao'] = $this->projetoStatus(array('AGUARDANDO','EM ANDAMENTO','PROCESSO PARADO'));
		$dados['fechamento'] = $this->projetoStatus(array('PEDIDO'));

		$this->template->load('layouts/template','dashboard',$dados);
	}
/**********************************************************************/
	private function projetoStatus($values=''){
		$o = new Projeto();
		return $o->distinct()
		->where_in('status',$values)
		->get();
	}
/**********************************************************************/
	private function prospeccao(){
		$user = $this->ion_auth->user()->row();

		$sql = "SELECT
		a.id,
		a.nome,
		a.email,
		a.tel
		FROM
		empresa AS a
		INNER JOIN empresa_user AS b ON a.id = b.empresa_id
		WHERE
		b.user_id IN ({$user->id})";
		return $this->db->query($sql)->result();
	}
/**********************************************************************/
}

/* End of file app.php */
/* Location: ./application/controllers/app.php */