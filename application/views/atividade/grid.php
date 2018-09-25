<h3 class="page-header">Gerenciar Atividades</h3>
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
			<div class="col-md-4 col-xs-3">
				<?php
					echo anchor(
						base_url('atividades/add'),
						'<i class="glyphicon glyphicon-plus"></i>',
						'class="btn btn-success btn-sm" data-tooltip="tooltip" data-placement="top" title="Adicionar Dados"'
					);
				?>
			</div>
			<div class="col-md-8 col-xs-9">
				<?php echo form_open(base_url('atividades/search'), 'role="search" class="form"') ;?>
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
		<?php if ($obj) : ?>
		<table class="table table-hover table-condensed">
			<thead>
				<tr>
					<th class="header">#</th>
					<th>Nome</th>
					<th class="red header" align="right" width="120">Ação</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($obj as $o) : ?>
				<tr>
					<td><?php echo $number++;?> </td>
					<td><?php echo $o->nome;?></td>
					<td>
						<?php
							echo anchor(
								base_url("atividades/edit/{$o->id}"),
								'<i class="glyphicon glyphicon-edit"></i>',
								'class="btn btn-sm btn-success" data-tooltip="tooltip" data-placement="top" title="Editar"'
							);
						?>
						<?php
							if($this->ion_auth->in_group(1)){
								echo anchor(
									base_url("atividades/destroy/{$o->id}"),
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
<script src="<?=base_url('assets/jquery/jquery-ui.js')?>"></script>
<script>
	$(function(){
		function log( message ){
			$("<div>").text(message).prependTo("#log");
			$("#log").scrollTop(0);
		}

		$("#q").autocomplete({
			source: "atividades/autocomplete",
			minLength: 3,
			select: function(event,ui){
				log("Selected: " + ui.item.label);
			}
		});
	});
</script>