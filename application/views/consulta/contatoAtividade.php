<section class="panel panel-default">
	<header class="panel-heading">
		<div class="row">
			<div class="col-md-8 col-xs-3">
				<a href="<?php echo base_url("consultas/exportaContatoAtividade/$keyword"); ?>" target="_Blank" class="btn btn-default">
					<i class="glyphicon glyphicon-floppy-save"></i> Exportar
				</a>
			</div>
			<div class="col-md-4 col-xs-9">
				<?php echo form_open(base_url('consultas/contatoByAtividade'), 'role="search" class="form"') ;?>
					<div class="input-group pull-right">
					<?php
							echo form_dropdown(
								'q'
								,$atividade
								,$keyword
								,'class="form-control input-sm"'
							);
						?>
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
					<th>E-mail</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($obj as $o) : ?>
					<tr>
						<td><?php echo $number++;?> </td>
						<td><?php echo $o->nome;?></td>
						<td><?php echo $o->email;?></td>
					</tr>
					<?php foreach($o->contato->get() as $c):?>
						<tr>
							<td><?php echo $number++;?> </td>
							<td><?php echo $c->nome;?></td>
							<td><?php echo $c->email;?></td>
						</tr>
					<?php endforeach; ?>
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
			</div>
			<div class="col-md-9">
			</div>
		</div>
	</div>
</section>