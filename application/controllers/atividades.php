<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Atividades extends CI_Controller {
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
		->from('atividade')
		->order_by('nome asc');

		$t->datatable('tabela_atividade')
		->set_options('searching', 'true')
		->searchable('nome')
		->style(array(
			'class' => 'table table-bordered table-striped',
		))
		->column('Nome', 'nome')
		->column('Ações', 'id', function ($data, $row){
			$str = '<a href="'.site_url("atividades/edit/{$row['id']}").'" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Editar</a> | ';
			$str .= '<a href="'.site_url("atividades/remove/{$row['id']}").'" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Deletar</a>';
			return $str;
		});

		$t->init();

		$dados['add'] = 'atividades/add';
		$this->template->load('layouts/template','dataTables',$dados);
	}
/**********************************************************************/
	public function add(){
		$o = new Atividade(0);
		$data['obj'] = $o;
		$data['action']  = "atividades/save/";
		$this->form('atividade/form',$data);
	}
/**********************************************************************/
	public function edit($id=''){
		if($id != ''){
			$o = new Atividade($id);
			$data['id'] = $id;
			$data['obj'] = $o;
			$data['action'] = "atividades/save/$id";
			$this->form('atividade/form',$data);
		}else{
			$this->semRegistro();
		}
	}
/**********************************************************************/
	public function save($id=NULL){
		if ($this->input->post()){
			$o = new Atividade($id);
			$o->nome = $this->input->post('nome');
			if($o->save()){
				redirect(base_url("atividades/"));
			}else{
				$data['id'] = $id;
				$data['obj'] = $o;
				$data['action'] = "atividades/save".(!$id)?"":"/$id";
				$this->form('atividade/form',$data);
			}
		}
	}
/**********************************************************************/
	public function destroy($id){
		$o = new Atividade($id);
		if($o->exists()){
			$o->delete();
			redirect(base_url("atividades/"));
		}else{
			$this->semRegistro();
		}
	}
/**********************************************************************/
/**********************************************************************/
}

/* End of file atividades.php */
/* Location: ./application/controllers/atividades.php */