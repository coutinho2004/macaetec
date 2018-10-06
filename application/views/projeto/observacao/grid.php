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
					echo anchor(
						base_url("projetos/addObservacao/{$obj->id}/"),
						'<i class="glyphicon glyphicon-plus"></i>',
						'class="btn btn-success btn-sm" data-tooltip="tooltip" data-placement="top" title="Adicionar Dados"'
					);
				?>
			</div>
			<div class="col-md-4 col-xs-9">

			</div>
		</div>
	</header>
	<div class="panel-body">
		<?php if ($obj->projeto_observacao->get()->exists()) : ?>
		<table class="table table-hover table-condensed">
			<thead>
				<tr>
					<th class="header">#</th>
					<th>Texto</th>
					<th class="red header" align="right" width="120">Ação</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($obj->projeto_observacao->get() as $o) : ?>
				<tr>
					<td><?=$this->brdate->Banco2Padrao($o->dataRegistro)?></td>
					<td><?=$o->texto?></td>
					<td>
						<?php
							echo anchor(
								base_url("projetos/editObservacao/{$obj->id}/{$o->id}"),
								'<i class="glyphicon glyphicon-edit"></i>',
								'class="btn btn-sm btn-success" data-tooltip="tooltip" data-placement="top" title="Editar"'
							);
						?>
						<?php
							if($this->ion_auth->in_group(1)){
								echo anchor(
									base_url("projetos/destroyObservacao/{$obj->id}/{$o->id}"),
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
			<?php  echo notify('Não há registros','info');?>
		<?php endif; ?>
	</div>
</section>