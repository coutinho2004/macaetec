<div class="page-header">
	<h3>Empresa - <?=$obj->nome?></h3>
	<hr>
	<?php echo anchor(base_url('macaetec/empresaListar'), '<span class="fa fa-chevron-left"></span> Voltar', 'class="btn btn-sm btn-default"');?>
</div>
<?php if($obj) :?>
<table id="detail" class="table table-striped table-condensed">
	<tbody>
		<tr>
			<td width="20%" align="right"><strong>CNPJ</strong></td>
			<td><?=$obj->cnpj?></td>
		</tr>
		<tr>
			<td width="20%" align="right"><strong>Nome</strong></td>
			<td><?=$obj->nome?></td>
		</tr>
	</tbody>
</table>
<br /><br />
	<div class="panel panel-primary">
		<div class="panel-heading">
			Dados da Empresa
		</div>
		<!-- /.panel-heading -->
		<div class="panel-body">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs">
				<li class="active"><a href="#setor" data-toggle="tab">Setor</a></li>
				<li><a href="#outro" data-toggle="tab">Outros</a></li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
				<div class="tab-pane fade in active" id="setor">
					<?php $this->load->view('empresa/setor/view');?>
				</div>
				<div class="tab-pane fade" id="outro">
					<h4>Outros dados</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				</div>
			</div>
		</div>
		<!-- /.panel-body -->
	</div>
<?php endif;?>