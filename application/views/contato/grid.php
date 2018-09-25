<p></p>
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
			<div class="col-md-3 col-xs-2">
				Lista de Contatos
			</div>
			<div class="col-md-9 col-xs-10">
				<?php echo form_open(base_url('contatos/search'), 'role="search" class="form"') ;?>
					<div class="input-group pull-right">
						<input type="text" class="form-control input-sm" placeholder="Pesquisar" id="q" name="q" autocomplete="off">
							<span class="input-group-btn">
								<button class="btn btn-primary btn-sm" type="submit"><i class="glyphicon glyphicon-search"></i> Pesquisar</button>
							</span>
					</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</header>
	<div class="panel-body">
		<?php if ($obj->exists()) : ?>
		<table class="table table-hover table-condensed">
			<thead>
				<tr>
					<th>Nome</th>
					<th class="header">Empresa</th>
					<th class="header">Último Contato</th>
					<th class="red header" align="right" width="120">Ação</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($obj as $o) : ?>
				<tr>
					<td><?=$o->nome?></td>
					<td><?=$o->empresa->get()->nome?></td>
					<td><?=$this->brdate->Banco2Padrao($o->contato_historico->select('dataRegistro')->order_by('dataRegistro','DESC')->get()->dataRegistro)?></td>
					<td>
						<?php
							echo anchor(
								base_url("contatos/edit/{$o->empresa_id}/{$o->id}"),
								'<i class="glyphicon glyphicon-edit"></i>',
								'class="btn btn-sm btn-success" data-tooltip="tooltip" data-placement="top" title="Editar"'
							);
						?>
						<?php
							echo anchor(
								base_url("funil/listarContato/0/{$o->empresa_id}/{$o->id}"),
								'<i class="glyphicon glyphicon-filter"></i>',
								'class="btn btn-sm btn-info" data-tooltip="tooltip" data-placement="top" title="Editar"'
							);
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
	<div class="panel-footer">
		<div class="row">
			<div class="col-md-3 col-xs-2">
				Registro(s)
				<span class="label label-info">
					<?php echo $total; ?>
				</span>
			</div>
			<div class="col-md-9 col-xs-10">
				<?php echo $pagination; ?>
			</div>
		</div>
	</div>
</section>

<script src="<?=base_url('assets/jquery/jquery-ui.js')?>"></script>
<script>
	$(function(){
		function log( message ){
			$("<div>").text(message).prependTo("#log");
			$("#log").scrollTop(0);
		}

		$("#q").autocomplete({
			source: "contatos/autocomplete",
			minLength: 3,
			select: function(event,ui){
				log("Selected: " + ui.item.label);
			}
		});
	});
</script>