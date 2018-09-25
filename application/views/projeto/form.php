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
	<li class="active"><a href="#projeto" data-toggle="tab">Projeto</a></li>
	<?php if($obj->exists()):?>
	<li><a href="#observacao" data-toggle="tab">Observação</a></li>
	<li><a href="#historico" data-toggle="tab">Histórico</a></li>
	<?php endif?>
</ul>


<!-- Tab panes -->
<div class="tab-content">
	<div class="tab-pane fade in active" id="projeto">
		<!-- Formulário Empresa -->
		<?php echo form_open(base_url($action),'role="form" class="form-horizontal" id="form_contato" parsley-validate'); ?>
		<div class="panel panel-default">
		<div class="panel-heading"><i class="fa fa-edit fa-fw"></i> Dados do Projeto</div>
			<div class="panel-body">
				<?php if($this->idTipoVenda==2):?>
				<div class="form-group">
					<label for="numeroProposta" class="col-sm-2 control-label">Nº da Proposta <span class="required-input">*</span></label>
					<div class="col-sm-2">
						<?php
							echo form_input(
							array(
								'name'=>'numeroProposta',
								'id'=>'numeroProposta',
								'class'=>'form-control input-sm  required',
								'placeholder'=>'',
								'maxlength'=>'100'
							)
							,set_value('numeroProposta',$obj->numeroProposta)
						);
						?>
						<?php if (!empty($obj->error->numeroProposta)):?>
							<div class="error"><?php print $obj->error->numeroProposta; ?></div>
						<?php endif; ?>
					</div>
					<label for="numeroRQ" class="col-sm-2 control-label">Nº da RQ <span class="required-input">*</span></label>
					<div class="col-sm-2">
						<?php
							echo form_input(
							array(
								'name'=>'numeroRQ',
								'id'=>'numeroRQ',
								'class'=>'form-control input-sm  required',
								'placeholder'=>'',
								'maxlength'=>'100'
							)
							,set_value('numeroRQ',$obj->numeroRQ)
						);
						?>
						<?php if (!empty($obj->error->numeroRQ)):?>
							<div class="error"><?php print $obj->error->numeroRQ; ?></div>
						<?php endif; ?>
					</div>
					<label for="idVendido" class="col-sm-2 control-label">Vendido <span class="required-input">*</span></label>
					<div class="col-sm-2">
						<?php
							echo form_dropdown(
								'idVendido'
								,$itemAprovado
								,$obj->idVendido
								,'id="idVendido" class="form-control input-sm"'
							);?>
						<?php if (!empty($obj->error->idVendido)):?>
							<div class="error"><?php print $obj->error->idVendido; ?></div>
						<?php endif; ?>
					</div>
				</div> <!--/ Proposta -->
				<?php endif?>
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

				</div> <!--/ Ano, Mês e Chance -->

				<div class="form-group">
					<label for="empresa_id" class="col-sm-2 control-label">Empresa <span class="required-input">*</span></label>
					<div class="col-sm-10">
						<?php
							echo form_dropdown(
								'empresa_id'
								,$empresas
								,$obj->contato->get()->empresa_id
								,'id="empresa_id" class="form-control input-sm"'
							);
						?>
						<?php if (!empty($obj->error->empresa_id)):?>
							<div class="error"><?php print $obj->error->empresa_id; ?></div>
						<?php endif; ?>
					</div>
				</div> <!--/ Empresa -->

				<div class="form-group">
					<label for="contato_id" class="col-sm-2 control-label">Cliente <span class="required-input">*</span></label>
					<div class="col-sm-10">
						<?php
							$dados = ($obj->contato->get()->exists())?array($obj->contato->get()->id=>$obj->contato->get()->nome.' - '.$obj->contato->get()->tel):array(''=>'Escolha uma Empresa');
							echo form_dropdown(
								'contato_id'
								,$dados
								,''
								,'id="contato_id" class="form-control input-sm"'
							);
						?>
						<?php if (!empty($obj->error->contato_id)):?>
							<div class="error"><?php print $obj->error->contato_id; ?></div>
						<?php endif; ?>
					</div>
				</div> <!--/ Cliente -->

				<div class="form-group">
					<label for="descricao" class="col-sm-2 control-label">Descrição <span class="required-input">*</span></label>
					<div class="col-sm-10">
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
				</div> <!--/ Cliente -->
				<div class="form-group">
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
					<label for="idNivel" class="col-sm-2 control-label">Nível <span class="required-input">*</span></label>
					<div class="col-sm-2">
						<?php
							echo form_dropdown(
								'idNivel'
								,$niveis
								,$obj->nivel_id
								,'id="idNivel" class="form-control input-sm"'
							);?>
						<?php if (!empty($obj->error->idNivel)):?>
							<div class="error"><?php print $obj->error->idNivel; ?></div>
						<?php endif; ?>
					</div>
				</div>

			</div> <!--/ Panel Body -->
			<div class="panel-footer">
				<div class="row">
					<div class="col-md-10 col-sm-12 col-md-offset-2 col-sm-offset-0">
						<a href="<?php echo base_url('app'); ?>" class="btn btn-default">
							<i class="glyphicon glyphicon-chevron-left"></i> DashBoard
						</a>
						<a href="<?php echo base_url('projetos'); ?>" class="btn btn-default">
							<i class="glyphicon glyphicon-chevron-left"></i> Lista Geral
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
		<div class="tab-pane fade" id="observacao">
			<?php $this->load->view('projeto/observacao/grid');?>
		</div>
		<div class="tab-pane fade" id="historico">
			<?php $this->load->view('projeto/historico/grid');?>
		</div>
	<?php endif?>
</div>


<script type="text/javascript">
	$(function(){
		$("select[name=empresa_id]").change(function(){
			empresa = $(this).val();
			if ( empresa === '')
				return false;

			resetaCombo('contato_id');
			$.getJSON('<?php echo site_url('/empresas/getContato/');?>' +'/' + empresa, function (data){
				var option = new Array();
				$.each(data, function(i, obj){
					option[i] = document.createElement('option');
					$( option[i] ).attr( {value : obj.id} );
					$( option[i] ).append( obj.nome );
					$("select[name='contato_id']").append( option[i] );
				});
			});
		});
		//$("select[name=empresa_id]").chosen();
	});
/**************************************************************************/
	function resetaCombo( el ) {
		$("select[name='"+el+"']").empty();
		var option = document.createElement('option');
		$( option ).attr( {value : ''} );
		$( option ).append( 'Escolha uma Empresa' );
		$("select[name='"+el+"']").append( option );
	}
</script>