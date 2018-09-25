<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Departamentos extends CI_Controller {
/**********************************************************************/
	public function __construct(){
		parent::__construct();

		if (!$this->ion_auth->logged_in()){
			redirect('auth', 'refresh');
		}
	}
/**********************************************************************/
	private function form($path,$data){
		$this->template->load('layouts/template',$path,$data);
	}
/**********************************************************************/
	public function listar($id=0){
		$t = new Datatables;

		$t->select('
			id,
			nome
		')
		->from('departamento')
		->order_by('nome asc');

		$t->datatable('tabela_departamento')
		->set_options('searching', 'true')
		->searchable('nome')
		->style(array(
			'class' => 'table table-bordered table-striped',
		))
		->column('Nome', 'nome')
		->column('Ações', 'id', function ($data, $row){
			$str = '<a href="'.site_url("departamentos/edit/{$row['id']}").'" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Editar</a> | ';
			$str .= '<a href="'.site_url("departamentos/remove/{$row['id']}").'" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Deletar</a>';
			return $str;
		});

		$t->init();

		$dados['add'] = 'departamentos/add';
		$this->template->load('layouts/template','dataTables',$dados);
	}
/**********************************************************************/
	public function add(){
		$o = new Departamento(0);
		$data['obj'] = $o;
		$data['action']  = "departamentos/save/";
		$this->form('departamento/form',$data);
	}
/**********************************************************************/
	public function edit($id=''){
		if($id != ''){
			$o = new Departamento($id);
			$data['id'] = $id;
			$data['obj'] = $o;
			$data['action'] = "departamentos/save/$id";
			$this->form('departamento/form',$data);
		}else{
			$this->semRegistro();
		}
	}
/**********************************************************************/
	public function save($id=NULL){
		if ($this->input->post()){
			$o = new Departamento($id);
			$o->nome = $this->input->post('nome');
			if($o->save()){
				redirect(base_url("departamentos/"));
			}else{
				$data['id'] = $id;
				$data['obj'] = $o;
				$data['action'] = "departamentos/save".(!$id)?"":"/$id";
				$this->form('departamento/form',$data);
			}
		}
	}
/**********************************************************************/
	public function destroy($id){
		$o = new Departamento($id);
		if($o->exists()){
			$o->delete();
			redirect(base_url("departamentos/"));
		}else{
			$this->semRegistro();
		}
	}
/**********************************************************************/
/**********************************************************************/
}

/* End of file departamentos.php */
/* Location: ./application/controllers/departamentos.php */