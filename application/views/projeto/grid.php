<h3 class="page-header"><?php echo ($this->idTipoVenda==1)?"Funil de Vendas":"Follow Up";?></h3>
<div class="row">
	<div class="col-lg-12 col-md-12">
		<?php
			//echo create_breadcrumb();
			echo $this->session->flashdata('notify');
		?>
	</div>
</div><!-- /.row -->

<section class="panel panel-default">
	<header class="panel-heading">
		<div class="row">
			<div class="col-md-8 col-xs-3">
				<?php
					$url = ($this->idTipoVenda==1)?'funil/add':'follow/add';
					echo anchor(
						base_url($url),
						'<i class="glyphicon glyphicon-plus"></i>',
						'class="btn btn-success btn-sm" data-tooltip="tooltip" data-placement="top" title="Adicionar Dados"'
					);
				?>
			</div>
			<div class="col-md-4 col-xs-9">
				<?php 
				$url = ($this->idTipoVenda==1)?'funil/search':'follow/search';
				echo form_open(base_url($url), 'role="search" class="form"') ;?>
					<div class="input-group pull-right">
						<input type="text" class="form-control input-sm" placeholder="Pesquisar por Projeto" name="q" autocomplete="off">
							<span class="input-group-btn">
								<button class="btn btn-primary btn-sm" type="submit"><i class="glyphicon glyphicon-search"></i> Pesquisar</button>
							</span>
					</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</header>
	<div class="panel-body">
		<?php if ($obj) : ?>
		<table class="table table-hover table-condensed">
			<thead>
				<tr>
					<th>Data</th>
					<th>N.º da Proposta</th>
					<th>Projeto</th>
					<th>Aprovado</th>
					<th>Status</th>
					<th>Empresa</th>
					<th>Valor</th>
					<th class="red header" align="right" width="120">Ação</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($obj as $o) : ?>
				<tr>
					<td style="width:10%"><?php echo date_format(date_create($o->created),'d-m-Y');?></td>
					<td><?php echo $o->numeroProposta;?></td>
					<td><?php echo $o->nome;?></td>
					<td><?php echo ($o->aprovado==1)?"Sim":"Não";?></td>
					<td><?php echo $o->status;?></td>
					<td><?php echo $o->contato->get()->empresa->get()->nome; ?></td>
					<td><?php echo number_format($o->valor, 2, ',', '.');?></td>
					<td>
						<?php
							$url = ($this->idTipoVenda==1)?"funil/edit/{$o->id}":"follow/edit/{$o->id}";
							echo anchor(
								base_url($url),
								'<i class="glyphicon glyphicon-edit"></i>',
								'class="btn btn-sm btn-success" data-tooltip="tooltip" data-placement="top" title="Editar"'
							);

							if($this->idTipoVenda==1){
								echo anchor(
									base_url("follow/edit/{$o->id}"),
									'<i class="glyphicon glyphicon-share"></i>',
									'class="btn btn-sm btn-info" data-tooltip="tooltip" data-placement="top" title="Transformar em Follow Up"'
								);
							}

							if($this->ion_auth->in_group(1)){
								$url = ($this->idTipoVenda==1)?"funil/edit/{$o->id}":"follow/edit/{$o->id}";
								echo anchor(
									base_url("funil/destroy/{$o->id}"),
									'<i class="glyphicon glyphicon-trash"></i>',
									'onclick="return confirm(\'Deseja prosseguir com a exclusão..???\');" class="btn btn-sm btn-danger" data-tooltip="tooltip" data-placement="top" title="Excluir"'
								);
							}
						?>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<?php else: ?>
			<?php  echo notify('Não há dados contato','info');?>
		<?php endif; ?>
	</div>
	<div class="panel-footer">
		<div class="row">
			<div class="col-md-3">
				Registro(s)
				<span class="label label-info">
					<?php echo $total; ?>
				</span>
			</div>
			<div class="col-md-9">
				<?php echo $pagination; ?>
			</div>
		</div>
	</div>
</section>