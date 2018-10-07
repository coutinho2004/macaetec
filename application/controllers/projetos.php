<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Projetos extends CI_Controller {
	var $mes;
	var $empresas;
	var $contatos;
	var $idTipoVenda;
/**********************************************************************/
	public function __construct(){
		parent::__construct();
		$this->idTipoVenda = 1;
		$this->mes = array('Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro');
		$this->simNao = array(0=>'',1=>'SIM',2=>'Não');
		$this->niveis = array(0=>'',1=>'Proposta',2=>'Negociação',3=>'Fechamento');
		$this->empresas = $this->_empresas();
		$this->contatos = $this->_contatos();
	}
/**********************************************************************/
	private function semRegistro(){
		$this->session->set_flashdata('notif', notify('Não foram encontrados registros','info'));
		redirect(base_url("projetos/"));
	}
/**********************************************************************/
	public function listar($id=0){
		if (!$this->ion_auth->logged_in()){
			redirect('auth', 'refresh');
		}

		$t = new Datatables;

		$t->select('
			p.id,
			p.nome,
			p.aconteceraChance,
			p.status,
			p.idTipo,
			c.nome AS contatoNome,
			c.email
		')
		->from('projeto as p')
		->join('contato AS c', 'p.contato_id = c.id')
		->order_by('p.nome asc');

		$t->datatable('tabela_projetos')
		->set_options('searching', 'true')
		->searchable('p.nome')
		->style(array(
			'class' => 'table table-bordered table-striped',
		))
		->column('Nome', 'nome')
		->column('Status', 'status', function($data, $row){
			return empty(!$row['status'])?$row['status']:"Não informado!!";
		})
		->column('Contato', 'contatoNome')
		->column('E-mail', 'email', function ($data, $row){
			return empty(!$row['email'])?$row['email']:"Não informado!!";
		})
		/*->column('Tel', 'tel', function ($data, $row){
			return empty(!$row['tel'])?$row['tel']:"Não informado";
		})
		->column('Empresa', 'empresa')*/
		->column('Ações', 'id', function ($data, $row){
			return '<a href="'.site_url("projetos/edit/{$row['id']}").'" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> </a>';
		});

		$t->init();

		$this->template->load('layouts/template','dataTables');
	}
/**********************************************************************/
	private function form($path,$data){
		$this->template->load('layouts/template',$path,$data);
	}
/**********************************************************************/
	public function add(){
		$o = new Projeto(0);
		$data['obj'] = $o;
		$data['niveis'] = $this->niveis;
		$data['itemAprovado'] = $this->simNao;
		$data['mes'] = $this->mes;
		$data['empresas'] = $this->empresas;
		$data['action']  = "projetos/save/";
		$this->form('projeto/form',$data);
	}
/**********************************************************************/
	public function edit($id=''){
		if($id != ''){
			$o = new Projeto($id);
			$data['id'] = $id;
			$data['obj'] = $o;
			$data['niveis'] = $this->niveis;
			$data['itemAprovado'] = $this->simNao;
			$data['mes'] = $this->mes;
			$data['empresas'] = $this->empresas;
			$data['action'] = "projetos/save/$id";
			$this->form('projeto/form',$data);
		}else{
			$this->semRegistro();
		}
	}
/**********************************************************************/
	public function save($id=NULL){
		if ($this->input->post()){
			$o = new Projeto($id);
			$o->nome = $this->input->post('nome');
			$o->identificadoAno = $this->input->post('identificadoAno');
			$o->identificadoMes = $this->input->post('identificadoMes');
			$o->aconteceraAno = $this->input->post('aconteceraAno');
			$o->aconteceraMes = $this->input->post('aconteceraMes');
			$o->aconteceraChance = $this->input->post('aconteceraChance');
			$o->status = $this->input->post('status');
			$o->aprovado = $this->input->post('aprovado');
			$o->descricao = $this->input->post('descricao');
			$o->valor = $this->input->post('valor');
			$o->contato_id = $this->input->post('contato_id');
			$o->nivel_id = $this->input->post('idNivel');
			$o->idTipo = $this->idTipoVenda;

			$o->validate();
			if($o->valid){
				if($o->save()){
					$data['id'] = $id;
					$data['obj'] = $o;
					$data['niveis'] = $this->niveis;
					$data['itemAprovado'] = $this->simNao;
					$data['mes'] = $this->mes;
					$data['empresas'] = $this->empresas;
					$data['action'] = "projetos/save".(!$id)?"":"/$id";
					$this->form('projeto/form',$data);
				}
			}else{
				$data['id'] = $id;
				$data['obj'] = $o;
				$data['itemAprovado'] = $this->simNao;
				$data['mes'] = $this->mes;
				$data['niveis'] = $this->niveis;
				$data['empresas'] = $this->empresas;
				$data['contatos'] = $this->contatos;
				$data['action'] = "projetos/save".(!$id)?"":"/$id";
				$this->form('projeto/form',$data);
			}
		}
	}
/**********************************************************************/
	public function destroy($id){
		$o = new Projeto($id);
		if($o->exists()){
			$o->delete();
			redirect(base_url("projetos/"));
		}else{
			$this->semRegistro();
		}
	}
/**********************************************************************/
/**
 * Parte que controla as Observações do Projeto
 */
/**********************************************************************/
	public function addObservacao($idUser){
		$o = new Projeto_Observacao(0);
		$data['idUser'] = $idUser;
		$data['obj'] = $o;
		$data['action']  = "projetos/saveObservacao/$idUser";
		$this->form('projeto/observacao/form',$data);
	}
/**********************************************************************/
	public function editObservacao($idUser=NULL,$id=''){
		if($id != ''){
			$o = new Projeto_Observacao($id);
			$data['idUser'] = $idUser;
			$data['id'] = $id;
			$data['obj'] = $o;
			$data['action'] = "projetos/saveObservacao/$idUser/$id";
			$this->form('projeto/observacao/form',$data);
		}else{
			$this->semRegistro();
		}
	}
/**********************************************************************/
	public function saveObservacao($idUser=NULL,$id=NULL){
		if ($this->input->post()){
			$o = new Projeto_Observacao($id);
			$o->texto = $this->input->post('texto');
			$o->projeto_id = $this->input->post('idUser');
			$o->dataRegistro = date("Y-m-d");
			if($o->save()){
				redirect(base_url("projetos/edit/$idUser"));
			}else{
				$data['id'] = $id;
				$data['obj'] = $o;
				$data['action'] = "projetos/saveObservacao/$idUser".(!$id)?"":"/$id";
				$this->form('projeto/observacao/form',$data);
			}
		}
	}
/**********************************************************************/
	public function destroyObservacao($idUser,$id){
		$o = new Projeto_Observacao($id);
		if($o->exists()){
			$o->delete();
			redirect(base_url("projetos/edit/$idUser"));
		}else{
			$this->semRegistro();
		}
	}
/**********************************************************************/
/**
 * Parte que controla os Históricos do Projeto
 */
/**********************************************************************/
	public function addHistorico($idUser){
		$o = new Projeto_Observacao(0);
		$data['idUser'] = $idUser;
		$data['obj'] = $o;
		$data['action']  = "projetos/saveHistorico/$idUser";
		$this->form('projeto/historico/form',$data);
	}
/**********************************************************************/
	public function editHistorico($idUser=NULL,$id=''){
		if($id != ''){
			$o = new Projeto_Historico($id);
			$data['idUser'] = $idUser;
			$data['id'] = $id;
			$data['obj'] = $o;
			$data['action'] = "projetos/saveHistorico/$idUser/$id";
			$this->form('projeto/historico/form',$data);
		}else{
			$this->semRegistro();
		}
	}
/**********************************************************************/
	public function saveHistorico($idUser=NULL,$id=NULL){
		if ($this->input->post()){
			$user = $this->ion_auth->user()->row();
			$o = new Projeto_Historico($id);
			$o->texto = $this->input->post('texto');
			$o->projeto_id = $this->input->post('idUser');
			$o->dataNextContato = $this->brdate->Padrao2Banco($this->input->post('dataNextContato'));
			$o->dataRegistro = date("Y-m-d");
			$o->user_id = $user->id;
			if($o->save()){
				redirect(base_url("projetos/edit/$idUser"));
			}else{
				$data['idUser'] = $idUser;
				$data['id'] = $id;
				$data['obj'] = $o;
				$data['action'] = "projetos/saveHistorico/$idUser/$id";
				$this->form('projeto/historico/form',$data);
			}
		}
	}
/**********************************************************************/
	public function destroyHistorico($idUser,$id){
		$o = new Projeto_Historico($id);
		if($o->exists()){
			$o->delete();
			redirect(base_url("projetos/edit/$idUser"));
		}else{
			$this->semRegistro();
		}
	}
/**********************************************************************/
	private function _contatos(){
		$o = new Contato();
		return $o->get()->all_to_single_array('nome');
		unset($o);
	}
/**********************************************************************/
	private function _empresas(){
		$o = new Empresa();
		return $o->get()->order_by('nome ASC')->all_to_single_array('nome');
		unset($o);
	}
/**********************************************************************/
}

/* End of file projetos.php */
/* Location: ./application/controllers/projetos.php */