<? if(isset($add)):?>
<div class="row">
	<div class="col-md-8 col-xs-12">
		<a href="<?=base_url($add)?>" class="btn btn-success btn-sm" data-tooltip="tooltip" data-placement="top" title="Adicionar Dados"><i class="glyphicon glyphicon-plus"></i></a>
		<p></p>
	</div>
</div>
<?endif?>
<?php $this->datatables->generate();?>