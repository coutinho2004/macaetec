<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contatos extends CI_Controller {
	var $simNao;
	var $path;
	var $departamento;
/**********************************************************************/
	public function __construct(){
		parent::__construct();
		$this->simNao = array(0=>'',1=>'SIM',2=>'Não');
		$this->departamento = $this->_departamento();
	}
/**********************************************************************/
	private function semRegistro(){
		$this->session->set_flashdata('notif', notify('Não foram encontrados registros','info'));
		redirect(base_url("contatos/listar/"));
	}
/**********************************************************************/
	public function autocomplete(){
		$o = new Contato();

		foreach($o->like('nome',$this->input->get('term'))->get() as $key => $rw){
			$data[$key] = $rw->nome;
		}
		echo json_encode($data);
	}
/**********************************************************************/
	public function listar($id=0){
		if (!$this->ion_auth->logged_in()){
			redirect('auth', 'refresh');
		}

		$t = new Datatables;

		$t->select('
			c.id,
			c.nome,
			c.email,
			c.tel,
			c.empresa_id,
			e.nome AS empresa
		')
		->from('contato as c')
		->join('empresa AS e', 'c.empresa_id = e.id')
		->order_by('c.nome asc');

		$t->datatable('tabela_contatos')
		->set_options('searching', 'true')
		->searchable('c.nome, e.nome')
		->style(array(
			'class' => 'table table-bordered table-striped',
		))
		->column('Nome', 'nome')
		->column('E-mail', 'email', function ($data, $row){
			return empty(!$row['email'])?$row['email']:"Não informado";
		})
		->column('Tel', 'tel', function ($data, $row){
			return empty(!$row['tel'])?$row['tel']:"Não informado";
		})
		->column('Empresa', 'empresa')
		->column('Ações', 'id', function ($data, $row){
			$str = '<a href="'.site_url("contatos/edit/{$row['empresa_id']}/{$row['id']}").'" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a>';
			//$str .= ' | <a href="'.site_url("funil/listarContato/{$row['id']}").'" class="btn btn-success btn-xs"><span class="fa fa-filter"></span> </a>';
			return $str;
		});

		$t->init();

		$this->template->load('layouts/template','dataTables');
	}
/**********************************************************************/
	public function search($id=0){
		if (!$this->ion_auth->logged_in()){
			redirect('auth', 'refresh');
		}
		if($this->input->post('q')){
			$keyword = $this->input->post('q');
			$this->session->set_userdata(
				array('keyword' => $this->input->post('q',TRUE))
			);

			$keyword = $this->session->userdata('keyword');
			$o = new Contato();
			$total_rows = $o->like('nome',$keyword)->count();

			$this->pagination->initialize(
				btsPagination(
					base_url("contatos/search/"),
					$total_rows,
					$this->config->item('per_page')
				)
			);
			$data['total'] = $total_rows;
			$data['pagination'] = $this->pagination->create_links();
			$data['number'] = (int)$id+1;
			$data['obj'] = $o->like('nome',$keyword)->get($this->config->item('per_page'),$id);
			$this->form('contato/grid',$data);
		}
	}
/**********************************************************************/
	private function form($path,$data){
		$this->template->load('layouts/template',$path,$data);
	}
/**********************************************************************/
	public function add($idUser){
		$o = new Contato(0);
		$data['idUser'] = $idUser;
		$data['obj'] = $o;
		$data['action']  = "contatos/save/$idUser";
		$data['empresaNome'] = $this->getNomeEmpresa($idUser);
		$data['departamento'] = $this->departamento;
		$data['simNao'] = $this->simNao;
		$this->form('empresa/formContato',$data);
	}
/**********************************************************************/
	public function edit($idUser=NULL,$id=''){
		if($id != ''){
			$o = new Contato($id);
			$data['idUser'] = $idUser;
			$data['id'] = $id;
			$data['obj'] = $o;
			$data['empresaNome'] = $this->getNomeEmpresa($idUser);
			$data['departamento'] = $this->departamento;
			$data['simNao'] = $this->simNao;
			$data['action'] = "contatos/save/$idUser/$id";
			$this->form('empresa/formContato',$data);
		}else{
			$this->semRegistro();
		}
	}
/**********************************************************************/
	public function save($idUser=NULL,$id=NULL){
		if ($this->input->post()){
			$o = new Contato($id);
			$o->nome = $this->input->post('nome');
			$o->email = $this->input->post('email');
			$o->obs = $this->input->post('obs');
			$o->tel = $this->input->post('tel');
			$o->cel = $this->input->post('cel');
			$o->idExportar = $this->input->post('idExportar');
			$o->empresa_id = $this->input->post('idUser');
			$o->departamento_id = $this->input->post('departamento_id');
			$o->dataRegistro = date("Y-m-d");
			if($o->save()){
				redirect(base_url("contatos/edit/$idUser"));
			}else{
				$data['id'] = $id;
				$data['obj'] = $o;
				$data['action'] = "contatos/save/$idUser".(!$id)?"":"/$id";
				$this->form('empresa/formContato',$data);
			}
		}
	}
/**********************************************************************/
	public function destroyContato($idUser,$id){
		$o = new Contato($id);
		if($o->exists()){
			$o->delete();
			redirect(base_url("empresas/edit/$idUser"));
		}else{
			$this->semRegistro();
		}
	}
/**********************************************************************/
/**********************************************************************/
/**********************************************************************/
/**********************************************************************/
/**********************************************************************/
	private function _departamento(){
		$o = new Departamento();
		return $o->get()->all_to_single_array('nome');
		unset($o);
	}
/**********************************************************************/
	public function getNomeEmpresa($id=0){
		$o = new Empresa($id);
		return ($o->exists())?$o->nome:"Empresa não Encotrada";
	}
/**********************************************************************/
}

/* End of file contatos.php */
/* Location: ./application/controllers/contatos.php */