<div class="panel panel-default">
	<div class="panel-heading">
		<i class="glyphicon glyphicon-signal"></i>
		<h3 class="panel-title"><strong><?php echo lang('edit_group_heading');?></strong></h3>
		<p><?php echo lang('edit_group_subheading');?></p>
		<div id="infoMessage"><?php echo $message;?></div>
	</div>
	<?php echo form_open(current_url());?>
	<div class="panel-body">
		<div class="form-group">
			<label for="group_name" class="col-sm-4 control-label"><?php echo lang('edit_group_name_label', 'group_name');?> <span class="required-input">*</span></label>
			<div class="col-sm-8">
				<?php echo form_input($group_name);?>
			</div>
		</div> <!--/ group_name -->
		<br>
		<div class="form-group">
			<label for="group_description" class="col-sm-4 control-label"><?php echo lang('edit_group_desc_label', 'description');?> <span class="required-input">*</span></label>
			<div class="col-sm-8">
				<?php echo form_input($group_description);?>
			</div>
		</div> <!--/ group_description -->
		
	</div> <!--/ Panel Body -->
	<div class="panel-footer">
		<div class="row">
			<div class="col-md-10 col-sm-12 col-md-offset-2 col-sm-offset-0">
				<a href="<?php echo base_url('auth/index'); ?>" class="btn btn-default">
					<i class="glyphicon glyphicon-chevron-left"></i> Voltar
				</a>
				<button type="submit" class="btn btn-primary" name="post">
					<i class="glyphicon glyphicon-floppy-save"></i> <?php echo(lang('edit_group_submit_btn'));?>
				</button>
			</div>
		</div>
	</div><!--/ Panel Footer -->
	<?php echo form_close();?>
</div><!--/ Panel -->