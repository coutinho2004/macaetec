<p></p>
<div class="row">
	<div class="col-lg-12 col-md-12">
		<?php
			//echo create_breadcrumb();
			echo $this->session->flashdata('notify');
		?>
	</div>
</div><!-- /.row -->

<?php echo form_open(base_url($action),'role="form" class="form-horizontal" id="form_contato" parsley-validate'); ?>
<div class="panel panel-default">
	<div class="panel-heading">
		<i class="glyphicon glyphicon-signal"></i> 
		<? echo ($obj->exists())?"Edição":"Inclusão"?> de Atividade
	</div>
		<div class="panel-body">
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
		</div> <!--/ Panel Body -->
		<div class="panel-footer">
			<div class="row">
				<div class="col-md-10 col-sm-12 col-md-offset-2 col-sm-offset-0">
					<a href="<?php echo base_url('atividades'); ?>" class="btn btn-default">
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