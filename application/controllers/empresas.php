<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Empresas extends CI_Controller {
	var $simNao;
	var $path;
	var $uf;
	var $atividade;
	var $departamento;
/**********************************************************************/
	public function __construct(){
		parent::__construct();

		if (!$this->ion_auth->logged_in()){
			redirect('auth', 'refresh');
		}

		$this->simNao = array(0=>'',1=>'SIM',2=>'Não');
		$this->uf = $this->_uf();
		$this->atividade = $this->_atividade();
		$this->departamento = $this->_departamento();
	}
/**********************************************************************/
	private function semRegistro(){
		$this->session->set_flashdata('notif', notify('Não foram encontrados registros','info'));
		redirect(base_url("empresas/"));
	}
/**********************************************************************/
	public function autocomplete(){
		$o = new Empresa();

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
			id,
			nome,
			email
		')
		->from('empresa')
		->order_by('nome asc');

		$t->datatable('tabela_empresas')
		->set_options('searching', 'true')
		->searchable('nome')
		->style(array(
			'class' => 'table table-bordered table-striped',
		))
		->column('Nome', 'nome')
		->column('E-mail', 'email', function ($data, $row){
			return empty(!$row['email'])?$row['email']:"Não informado";
		})
		->column('Ações', 'id', function ($data, $row){
			$str = '<a href="'.site_url("empresas/edit/{$row['id']}").'" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Editar</a> | ';
			$str .= '<a href="'.site_url("empresas/remove/{$row['id']}").'" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Deletar</a>';
			return $str;
		});

		$t->init();

		$dados['add'] = 'empresas/add';
		$this->template->load('layouts/template','dataTables',$dados);
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

			$o = new Empresa();
			$total_rows = $o->like('nome',$keyword)->count();

			$this->pagination->initialize(
				btsPagination(
					base_url("empresas/search/"),
					$total_rows,
					$this->config->item('per_page')
				)
			);
			$data['total'] = $total_rows;
			$data['pagination'] = $this->pagination->create_links();
			$data['number'] = (int)$id+1;
			$data['obj'] = $o->like('nome',$keyword)->get($this->config->item('per_page'),$id);
			$this->form('empresa/grid',$data);
		}
	}
/**********************************************************************/
	private function form($path,$data){
		$this->template->load('layouts/template',$path,$data);
	}
/**********************************************************************/
	public function add(){
		$data['uf'] = $this->uf;
		$data['atividade'] = $this->atividade;
		$o = new Empresa(0);
		$data['obj'] = $o;
		$data['action']  = "empresas/save/";
		$this->form('empresa/form',$data);
	}
/**********************************************************************/
	public function edit($id=''){
		if($id != ''){
			$o = new Empresa($id);
			$data['uf'] = $this->uf;
			$data['atividade'] = $this->atividade;
			$data['id'] = $id;
			$data['obj'] = $o;
			$data['action'] = "empresas/save/$id";
			$this->form('empresa/form',$data);
		}else{
			$this->semRegistro();
		}
	}
/**********************************************************************/
	public function save($id=NULL){
		if ($this->input->post()){
			$o = new Empresa($id);
			$o->nome = $this->input->post('nome');
			$o->email = $this->input->post('email');
			$o->endereco = $this->input->post('endereco');
			$o->cep = $this->input->post('cep');
			$o->cidade = $this->input->post('cidade');
			$o->bairro = $this->input->post('bairro');
			$o->tel = $this->input->post('tel');
			$o->fax = $this->input->post('fax');
			$o->atividade_id = $this->input->post('atividade_id');
			$o->uf_id = $this->input->post('uf_id');
			if($o->save()){
				$id = (!$id)?$o->id:$id;
				$this->associar($id);
				redirect(base_url("empresas/edit/$id"));
			}else{
				$data['uf'] = $this->uf;
				$data['atividade'] = $this->atividade;
				$data['id'] = $id;
				$data['obj'] = $o;
				$data['action'] = "empresas/save/{$id}";
				$this->form('empresa/form',$data);
			}
		}
	}
/**********************************************************************/
	private function associar($id=0){
		$user = $this->ion_auth->user()->row();
		$obj = new Empresa_User();
		$obj->salvar($id,$user->id);
	}
/**********************************************************************/
	public function destroy($id){
		$o = new Empresa($id);
		if($o->exists()){
			$o->delete();
			redirect(base_url("empresas/"));
		}else{
			$this->semRegistro();
		}
	}
/**********************************************************************/
	public function getContato($idEmpresa=''){
		$o = new Empresa($idEmpresa);
		foreach ($o->contato->get() as $key => $rw){
			$data[$key]['id'] = $rw->id;
			$data[$key]['nome'] = $rw->nome ." - ".$rw->departamento->get()->nome;
		}
		echo json_encode($data);
	}
/**********************************************************************/
/**********************************************************************/
/**********************************************************************/
	private function _atividade(){
		$o = new Atividade();
		return $o->get()->all_to_single_array('nome');
		unset($o);
	}
/**********************************************************************/
	private function _uf(){
		$o = new Uf();
		return $o->get()->all_to_single_array('nome');
		unset($o);
	}
/**********************************************************************/
	private function _departamento(){
		$o = new Departamento();
		return $o->get()->all_to_single_array('nome');
		unset($o);
	}
/**********************************************************************/
	public function getNomeEmpresa($id=0){
		$o = new Empresa($id);
		return $o->nome;
	}
/**********************************************************************/
}

/* End of file empresas.php */
/* Location: ./application/controllers/empresas.php */