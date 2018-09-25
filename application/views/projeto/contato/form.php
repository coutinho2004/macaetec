<p></p>
<div class="row">
	<div class="col-lg-12 col-md-12">
		<?php
			//echo create_breadcrumb();
			echo $this->session->flashdata('notify');
		?>
	</div>
</div><!-- /.row -->

<!-- Nav tabs -->
<ul class="nav nav-tabs">
	<li class="active"><a href="#funilVenda" data-toggle="tab">Funil de Vendas</a></li>
	<?php if($obj->exists()):?>
	<li><a href="#observacao" data-toggle="tab">Observação</a></li>
	<li><a href="#historico" data-toggle="tab">Histórico</a></li>
	<?php endif?>
</ul>

<!-- Tab panes -->
<div class="tab-content">
	<div class="tab-pane fade in active" id="funilVenda">
		<?php echo form_open(base_url($action),'role="form" class="form-horizontal" id="form_contato" parsley-validate'); ?>
		<div class="panel panel-default">
			<div class="panel-heading"><i class="glyphicon glyphicon-edit"> <?=$nomeContato?></i></div>
				<div class="panel-body">
					<div class="form-group">
						<label for="nome" class="col-sm-2 control-label">Projeto <span class="required-input">*</span></label>
						<div class="col-sm-2">
							<?php
							echo form_input(
								array(
									'name'=>'nome',
									'id'=>'nome',
									'class'=>'form-control input-sm  required',
									'placeholder'=>'',
									'maxlength'=>'255'
								)
								,set_value('nome',$obj->nome)
							);?>
							<?php if (!empty($obj->error->nome)):?>
								<div class="error"><?php print $obj->error->nome; ?></div>
							<?php endif; ?>
						</div>

						<label for="aprovado" class="col-sm-2 control-label">Aprovado <span class="required-input">*</span></label>
						<div class="col-sm-2">
							<?php
								echo form_dropdown(
									'aprovado'
									,$itemAprovado
									,$obj->aprovado
									,'id="aprovado" class="form-control input-sm"'
								);?>
							<?php if (!empty($obj->error->aprovado)):?>
								<div class="error"><?php print $obj->error->aprovado; ?></div>
							<?php endif; ?>
						</div>

						<label for="status" class="col-sm-2 control-label">Status <span class="required-input">*</span></label>
						<div class="col-sm-2">
							<?php
							echo form_input(
								array(
									'name'=>'status',
									'id'=>'status',
									'class'=>'form-control input-sm  required',
									'placeholder'=>'',
									'maxlength'=>'100'
								)
								,set_value('nome',$obj->status)
							);?>
							<?php if (!empty($obj->error->status)):?>
								<div class="error"><?php print $obj->error->status; ?></div>
							<?php endif; ?>
						</div>

					</div> <!--/ Projeto, Aprovado e Status -->

					<div class="form-group">
						<label for="aconteceraAno" class="col-sm-2 control-label">Ano <span class="required-input">*</span></label>
						<div class="col-sm-2">
							<?php
							echo form_input(
								array(
									'name'=>'aconteceraAno',
									'id'=>'aconteceraAno',
									'class'=>'form-control input-sm  required',
									'placeholder'=>'',
									'maxlength'=>'255'
								)
								,set_value('aconteceraAno',$obj->aconteceraAno)
							);?>
							<?php if (!empty($obj->error->aconteceraAno)):?>
								<div class="error"><?php print $obj->error->aconteceraAno; ?></div>
							<?php endif; ?>
						</div>

						<label for="aconteceraMes" class="col-sm-2 control-label">Mês <span class="required-input">*</span></label>
						<div class="col-sm-2">
							<?php
								echo form_dropdown(
									'aconteceraMes'
									,$mes
									,$obj->aconteceraMes
									,'id="aconteceraMes" class="form-control input-sm"'
								);?>
							<?php if (!empty($obj->error->aconteceraMes)):?>
								<div class="error"><?php print $obj->error->aconteceraMes; ?></div>
							<?php endif; ?>
						</div>

						<label for="aconteceraChance" class="col-sm-2 control-label">Chance <span class="required-input">*</span></label>
						<div class="col-sm-2">
							<?php
							echo form_input(
								array(
									'name'=>'aconteceraChance',
									'id'=>'aconteceraChance',
									'class'=>'form-control input-sm  required',
									'placeholder'=>'',
									'maxlength'=>'100'
								)
								,set_value('aconteceraChance',$obj->aconteceraChance)
							);?>
							<?php if (!empty($obj->error->aconteceraChance)):?>
								<div class="error"><?php print $obj->error->aconteceraChance; ?></div>
							<?php endif; ?>
						</div>
					</div> <!--/ Ano Mês Chance -->

					<div class="form-group">
						<label for="descricao" class="col-sm-2 control-label">Descrição <span class="required-input">*</span></label>
						<div class="col-sm-6">
							<?php
								echo form_input(
								array(
									'name'=>'descricao',
									'id'=>'descricao',
									'class'=>'form-control input-sm  required',
									'placeholder'=>'',
									'maxlength'=>'100'
								)
								,set_value('descricao',$obj->descricao)
							);
							?>
							<?php if (!empty($obj->error->descricao)):?>
								<div class="error"><?php print $obj->error->descricao; ?></div>
							<?php endif; ?>
						</div>
						<label for="valor" class="col-sm-2 control-label">Valor <span class="required-input">*</span></label>
						<div class="col-sm-2">
							<?php
								echo form_input(
								array(
									'name'=>'valor',
									'id'=>'valor',
									'class'=>'form-control input-sm  required',
									'placeholder'=>'',
									'maxlength'=>'100'
								)
								,set_value('valor',$obj->valor)
							);
							?>
							<?php if (!empty($obj->error->valor)):?>
								<div class="error"><?php print $obj->error->valor; ?></div>
							<?php endif; ?>
						</div>
					</div> <!--/ Descricao e Valor -->

				</div> <!--/ Panel Body -->
				<div class="panel-footer">
					<div class="row">
						<div class="col-md-10 col-sm-12 col-md-offset-2 col-sm-offset-0">
							<a href="<?php echo base_url("funil/listarContato/0/$idEmpresa/$idContato"); ?>" class="btn btn-default">
								<i class="glyphicon glyphicon-chevron-left"></i> Voltar
							</a>
							<button type="submit" class="btn btn-primary" name="post">
								<i class="glyphicon glyphicon-floppy-save"></i> Salvar
							</button>
						</div>
					</div>
			</div><!--/ Panel Footer -->
		</div><!--/ Panel -->
		<?php echo form_hidden('contato_id',$idContato);?>
		<?php echo form_hidden('empresa_id',$idEmpresa);?>
		<?php echo form_close(); ?>
	</div>

	<?php if($obj->exists()):?>
	<div class="tab-pane fade" id="observacao">
		<?php $this->load->view('projeto/contato/observacao/grid');?>
	</div>
	<div class="tab-pane fade" id="historico">
		<?php $this->load->view('projeto/contato/historico/grid');?>
	</div>
	<?php endif?>
</div>