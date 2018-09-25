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
	<li class="active"><a href="#empresa" data-toggle="tab">Empresa</a></li>
	<?php if($obj->exists()):?>
	<li><a href="#contato" data-toggle="tab">Contato(s)</a></li>
	<li><a href="#obs" data-toggle="tab">Obs</a></li>
	<?php endif?>
</ul>

<!-- Tab panes -->
<div class="tab-content">

	<div class="tab-pane fade in active" id="empresa">
		<!-- Formulário Empresa -->

		<?php echo form_open(base_url($action),'role="form" class="form-horizontal" id="form_contato" parsley-validate'); ?>
		<div class="panel panel-default">
			<div class="panel-heading"><i class="glyphicon glyphicon-signal"></i></div>
				<div class="panel-body">
						<div class="form-group">
							<label for="atividade_id" class="col-sm-2 control-label">Atividade <span class="required-input">*</span></label>
							<div class="col-sm-8">
							<?php
									echo form_dropdown(
										'atividade_id'
										,$atividade
										,$obj->atividade_id
										,'id="atividade_id" class="form-control input-sm"'
									);
								?>
								<?php if (!empty($obj->error->atividade_id)):?>
									<div class="error"><?php print $obj->error->atividade_id; ?></div>
								<?php endif; ?>
							</div>
						</div> <!--/ Nome -->
						<div class="form-group">
							<label for="nome" class="col-sm-2 control-label">Nome <span class="required-input">*</span></label>
							<div class="col-sm-8">
								<?php
								echo form_input(
								array(
									'name'=>'nome',
									'id'=>'nome',
									'class'=>'form-control input-sm  required',
									'placeholder'=>'Nome',
									'maxlength'=>'255'
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
							<label for="endereco" class="col-sm-2 control-label">Endereço <span class="required-input">*</span></label>
							<div class="col-sm-8">
								<?php
								echo form_input(
								array(
									'name'=>'endereco',
									'id'=>'endereco',
									'class'=>'form-control input-sm  required',
									'placeholder'=>'Endereço',
									'maxlength'=>'255'
								)
								,set_value('endereco',$obj->endereco)
							);
								?>
								<?php if (!empty($obj->error->endereco)):?>
									<div class="error"><?php print $obj->error->endereco; ?></div>
								<?php endif; ?>
							</div>
						</div> <!--/ Endereço -->
						<div class="form-group">
							<label for="cep" class="col-sm-2 control-label">Cep</label>
							<div class="col-sm-3">
								<?php
								echo form_input(
									array(
										'name'=>'cep',
										'id'=>'cep',
										'class'=>'form-control input-sm  required',
										'placeholder'=>'CEP',
										'maxlength'=>'50'
									)
									,set_value('cep',$obj->cep)
								);
								?>
								<?php if (!empty($obj->error->cep)):?>
									<div class="error"><?php print $obj->error->cep; ?></div>
								<?php endif; ?>
							</div>
							<label for="cidade" class="col-sm-2 control-label">Cidade</label>
							<div class="col-sm-3">
								<?php
								echo form_input(
									array(
										'name'=>'cidade',
										'id'=>'cidade',
										'class'=>'form-control input-sm  required',
										'placeholder'=>'Cidade',
										'maxlength'=>'100'
									)
									,set_value('cidade',$obj->cidade)
								);
								?>
								<?php if (!empty($obj->error->cep)):?>
									<div class="error"><?php print $obj->error->cep; ?></div>
								<?php endif; ?>
							</div>
						</div> <!--/ Cep, Cidade -->
						<div class="form-group">
							<label for="bairro" class="col-sm-2 control-label">Bairro</label>
							<div class="col-sm-3">
								<?php
								echo form_input(
									array(
										'name'=>'bairro',
										'id'=>'bairro',
										'class'=>'form-control input-sm  required',
										'placeholder'=>'Bairro',
										'maxlength'=>'100'
									)
									,set_value('bairro',$obj->bairro)
								);
								?>
								<?php if (!empty($obj->error->bairro)):?>
									<div class="error"><?php print $obj->error->bairro; ?></div>
								<?php endif; ?>
							</div>
							<label for="uf_id" class="col-sm-2 control-label">Estado</label>
							<div class="col-sm-3">
								<?php
									echo form_dropdown(
										'uf_id'
										,$uf
										,$obj->uf_id
										,'id="uf_id" class="form-control input-sm"'
									);
								?>
								<?php if (!empty($obj->error->uf_id)):?>
									<div class="error"><?php print $obj->error->uf_id; ?></div>
								<?php endif; ?>
							</div>
						</div> <!--/ Bairro, Estado -->
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
							<label for="fax" class="col-sm-2 control-label">Fax</label>
							<div class="col-sm-3">
								<?php
								echo form_input(
									array(
										'name'=>'fax',
										'id'=>'fax',
										'class'=>'form-control input-sm  required',
										'placeholder'=>'Fax',
										'maxlength'=>'50'
									)
									,set_value('fax',$obj->fax)
								);
								?>
								<?php if (!empty($obj->error->fax)):?>
									<div class="error"><?php print $obj->error->fax; ?></div>
								<?php endif; ?>
							</div>
						</div> <!--/ Tel, Fax -->
						<div class="form-group">
							<label for="email" class="col-sm-2 control-label">E-mail</label>
							<div class="col-sm-5">
								<?php
								echo form_input(
									array(
										'name'=>'email',
										'id'=>'email',
										'class'=>'form-control input-sm  required',
										'placeholder'=>'E-mail',
										'maxlength'=>'150'
									)
									,set_value('email',$obj->email)
								);
								?>
								<?php if (!empty($obj->error->email)):?>
									<div class="error"><?php print $obj->error->email; ?></div>
								<?php endif; ?>
							</div>
						</div> <!--/ E-mail -->
				</div> <!--/ Panel Body -->
				<div class="panel-footer">
					<div class="row">
						<div class="col-md-10 col-sm-12 col-md-offset-2 col-sm-offset-0">
							<a href="<?php echo base_url('empresas'); ?>" class="btn btn-default">
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
	<div class="tab-pane fade" id="contato">
		<?php $this->load->view('empresa/gridContato');?>
	</div>
	<div class="tab-pane fade" id="obs">
		<?php $this->load->view('empresa/gridHistorico');?>
	</div>
	<?php endif?>
</div>