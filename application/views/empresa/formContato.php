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
	<li class="active"><a href="#contato" data-toggle="tab">Contato</a></li>
	<?php if($obj->exists()):?>
	<li><a href="#historico" data-toggle="tab">Histórico</a></li>
	<?php endif?>
</ul>

<!-- Tab panes -->
<div class="tab-content">

	<div class="tab-pane fade in active" id="contato">
		<!-- Formulário Contato da Empresa -->
		<?php echo form_open(base_url($action),'role="form" class="form-horizontal" id="form_contato" parsley-validate'); ?>
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="glyphicon glyphicon-signal"></i>
				<i>
					<strong>
						<a href="<?php echo base_url("empresas/edit/$idUser"); ?>">Empresa</a>	
					</strong> - <?php	echo $empresaNome;?></i>
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label for="atividade_id" class="col-sm-2 control-label">Departamento <span class="required-input">*</span></label>
					<div class="col-sm-8">
					<?php
							echo form_dropdown(
								'departamento_id'
								,$departamento
								,$obj->departamento_id
								,'id="departamento_id" class="form-control input-sm"'
							);
						?>
						<?php if (!empty($obj->error->departamento_id)):?>
							<div class="error"><?php print $obj->error->departamento_id; ?></div>
						<?php endif; ?>
					</div>
				</div> <!--/ Nome -->
				<div class="form-group">
					<label for="nome" class="col-sm-2 control-label">Nome <span class="required-input">*</span></label>
					<div class="col-sm-6">
						<?php
						echo form_input(
						array(
							'name'=>'nome',
							'id'=>'nome',
							'class'=>'form-control input-sm  required',
							'placeholder'=>'Nome',
							'maxlength'=>'40'
						)
						,set_value('nome',$obj->nome)
					);
						?>
						<?php if (!empty($obj->error->nome)):?>
							<div class="error"><?php print $obj->error->nome; ?></div>
						<?php endif; ?>
					</div>
				</div> <!--/ Nome -->
				<div class="form-group">
					<label for="email" class="col-sm-2 control-label">E-mail <span class="required-input">*</span></label>
					<div class="col-sm-4">
						<?php
						echo form_input(
						array(
							'name'=>'email',
							'id'=>'email',
							'class'=>'form-control input-sm  required',
							'placeholder'=>'E-mail',
							'maxlength'=>'200'
						)
						,set_value('email',$obj->email)
					);
						?>
						<?php if (!empty($obj->error->email)):?>
							<div class="error"><?php print $obj->error->email; ?></div>
						<?php endif; ?>
					</div>

					<label for="exportar" class="col-sm-2 control-label">Exportar <span class="required-input">*</span></label>
					<div class="col-sm-2">
						<?php
							echo form_dropdown(
								'idExportar'
								,$simNao
								,$obj->idExportar
								,'id="idExportar" class="form-control input-sm"'
							);?>
						<?php if (!empty($obj->error->idExportar)):?>
							<div class="error"><?php print $obj->error->idExportar; ?></div>
						<?php endif; ?>
					</div>


				</div> <!--/ Email -->
				<div class="form-group">
					<label for="tel" class="col-sm-2 control-label">Telefone</label>
					<div class="col-sm-3">
						<?php
						echo form_input(
							array(
								'name'=>'tel',
								'id'=>'tel',
								'class'=>'form-control input-sm  required',
								'placeholder'=>'Tel',
								'maxlength'=>'50'
							)
							,set_value('tel',$obj->tel)
						);
						?>
						<?php if (!empty($obj->error->tel)):?>
							<div class="error"><?php print $obj->error->tel; ?></div>
						<?php endif; ?>
					</div>
					<label for="cel" class="col-sm-2 control-label">Cel</label>
					<div class="col-sm-3">
						<?php
						echo form_input(
							array(
								'name'=>'cel',
								'id'=>'cel',
								'class'=>'form-control input-sm  required',
								'placeholder'=>'Cel',
								'maxlength'=>'50'
							)
							,set_value('cel',$obj->cel)
						);
						?>
						<?php if (!empty($obj->error->cel)):?>
							<div class="error"><?php print $obj->error->cel; ?></div>
						<?php endif; ?>
					</div>
				</div> <!--/ Tel, Cel -->
				<div class="form-group">
					<label for="obs" class="col-sm-2 control-label">Obs</label>
					<div class="col-sm-6">
						<?php
						echo form_input(
						array(
							'name'=>'obs',
							'id'=>'obs',
							'class'=>'form-control input-sm  required',
							'placeholder'=>'Obs',
							'maxlength'=>'40'
						)
						,set_value('obs',$obj->obs)
					);
						?>
						<?php if (!empty($obj->error->obs)):?>
							<div class="error"><?php print $obj->error->obs; ?></div>
						<?php endif; ?>
					</div>
				</div> <!--/ Obs -->
				<?php echo form_hidden('idUser',$idUser);?>
			</div> <!--/ Panel Body -->
			<div class="panel-footer">
				<div class="row">
					<div class="col-md-10 col-sm-12 col-md-offset-2 col-sm-offset-0">
						<a href="<?php echo base_url("empresas/edit/$idUser"); ?>" class="btn btn-default">
							<i class="glyphicon glyphicon-chevron-left"></i> Voltar
						</a>
						<button type="submit" class="btn btn-primary" name="post">
							<i class="glyphicon glyphicon-floppy-save"></i> Salvar
						</button>
					</div>
				</div>
			</div><!--/ Panel Footer -->
		</div><!--/ Panel -->
		<?php echo form_close(); ?>
	</div>

	<?php if($obj->exists()):?>
		<div class="tab-pane fade" id="historico">
			<?php $this->load->view('empresa/gridContatoHistorico');?>
		</div>
	<?php endif?>
</div>