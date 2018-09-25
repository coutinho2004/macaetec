<div class="row">
	<div class="col-sm-12">
		<h4 class="pull-left page-title">Macaetec</h4>
		<ol class="breadcrumb pull-right">
			<li><a href="#">Macaetec</a></li>
			<li class="active">Dasboard</li>
		</ol>
	</div>
</div>

<table class="table table-hover">
	<thead>
		<tr>
			<th width="25%">Prospecção <?=anchor(base_url('empresas/add'),'<i class="glyphicon glyphicon-plus"></i>','class="btn btn-success btn-sm" data-tooltip="tooltip" data-placement="top" title="Adicionar Prospecção"');?></th>
			<th width="25%">Proposta <?=anchor(base_url('projetos/add'),'<i class="glyphicon glyphicon-plus"></i>','class="btn btn-success btn-sm" data-tooltip="tooltip" data-placement="top" title="Adicionar Prospecção"');?></th>
			<th width="25%">Negociação</th>
			<th width="25%">Fechamento</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td width="25%">
				<? foreach($prospeccao as $o):?>
				<div class="panel panel-default panel-border">
					<div class="panel-heading">
						<h5 class="panel-title"> <a href="<?=base_url("empresas/edit/$o->id")?>"><?=$o->nome?></a></h5>
					</div>
					<div class="panel-body">
						<p>
							<small>
								E-mail: <?=$o->email?><br>
								Tel: <?=$o->tel?><br>
							</small>
						</p>
					</div>
				</div>
				<? endforeach?>
			</td>
			<td width="25%">
				<? foreach($proposta as $o):?>
				<div class="panel panel-primary panel-border">
					<div class="panel-heading">
						<h5 class="panel-title"> <a href="<?=base_url("projetos/edit/$o->id")?>"><?=$o->nome?> <?= isset($o->numeroProposta)?'- Proposta Nº '.$o->numeroProposta:''?></a></h5>
					</div>
					<div class="panel-body">
						<p>
							<small>
								Valor: R$ <?=number_format($o->valor,2, ',', '.')?><br>
								Descrição: <?=$o->descricao?><br>
								Chance: <span class="badge badge-primary"><?= empty($o->aconteceraChance)?"Não informado!!":$o->aconteceraChance?></span>
							</small>
						</p>
					</div>
				</div>
				<? endforeach?>
			</td>
			<td width="25%">
				<? foreach($negiciacao as $o):?>
				<div class="panel panel-warning panel-border">
					<div class="panel-heading">
						<h5 class="panel-title"> <a href="<?=base_url("projetos/edit/$o->id")?>"><?=$o->nome?> <?= isset($o->numeroProposta)?'- Proposta Nº '.$o->numeroProposta:''?></a></h5>
					</div>
					<div class="panel-body">
						<p>
							<small>
								Valor: R$ <?=number_format($o->valor,2, ',', '.')?><br>
								Descrição: <?=$o->descricao?><br>
								Chance: <span class="badge badge-warning"><?= empty($o->aconteceraChance)?"Não informado!!":$o->aconteceraChance?></span>
							</small>
						</p>
					</div>
				</div>
				<? endforeach?>
			</td>
			<td width="25%">
				<? foreach($fechamento as $o):?>
				<div class="panel panel-success panel-border">
					<div class="panel-heading">
						<h5 class="panel-title"> <a href="<?=base_url("projetos/edit/$o->id")?>"><?=$o->nome?> <?= isset($o->numeroProposta)?'- Proposta Nº '.$o->numeroProposta:''?></a></h5>
					</div>
					<div class="panel-body">
						<p>
							<small>
								Valor: R$ <?=number_format($o->valor,2, ',', '.')?><br>
								Descrição: <?=$o->descricao?><br>
								Chance: <span class="badge badge-success"><?= empty($o->aconteceraChance)?"Não informado!!":$o->aconteceraChance?></span>
							</small>
						</p>
					</div>
				</div>
				<? endforeach?>
			</td>
		</tr>
	</tbody>
</table>