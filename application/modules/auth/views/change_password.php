<div class="panel panel-default">
	<div class="panel-heading">
		<i class="glyphicon glyphicon-signal"></i>
		<h3 class="panel-title"><strong><?php echo lang('change_password_heading');?></strong></h3>
		<div id="infoMessage"><?php echo $message;?></div>
	</div>
	<?php echo form_open("auth/change_password");?>
	<div class="panel-body">
		<div class="form-group">
			<label for="old_password" class="col-sm-4 control-label"><?php echo lang('change_password_old_password_label', 'old_password');?> <span class="required-input">*</span></label>
			<div class="col-sm-8">
				<?php echo form_input($old_password);?>
			</div>
		</div> <!--/ old_password -->
		<br>
		<div class="form-group">
			<label for="new_password" class="col-sm-4 control-label"><?php echo sprintf(lang('change_password_new_password_label'), $min_password_length);?> <span class="required-input">*</span></label>
			<div class="col-sm-8">
				<?php echo form_input($new_password);?>
			</div>
		</div> <!--/ new_password -->
		<br>
		<div class="form-group">
			<label for="new_password" class="col-sm-4 control-label"><?php echo lang('change_password_new_password_confirm_label', 'new_password_confirm');?> <span class="required-input">*</span></label>
			<div class="col-sm-8">
				<?php echo form_input($new_password_confirm);?>
			</div>
		</div> <!--/ new_password -->
		<?php echo form_input($user_id);?>
	</div> <!--/ Panel Body -->
	<div class="panel-footer">
		<div class="row">
			<div class="col-md-10 col-sm-12 col-md-offset-2 col-sm-offset-0">
				<a href="<?php echo base_url('auth/index'); ?>" class="btn btn-default">
					<i class="glyphicon glyphicon-chevron-left"></i> Voltar
				</a>
				<button type="submit" class="btn btn-primary" name="post">
					<i class="glyphicon glyphicon-floppy-save"></i> <?php echo(lang('change_password_submit_btn'));?>
				</button>
			</div>
		</div>
	</div><!--/ Panel Footer -->
	<?php echo form_close();?>
</div><!--/ Panel -->