<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><?php echo lang('forgot_password_heading');?></h3>
				</div>
				<div class="panel-body">
					<div id="infoMessage"><?php echo $message;?></div>
					<?php echo form_open("auth/forgot_password");?>
					<fieldset>
						<div class="form-group">
							<label>
								<?php echo (($type=='email') ? sprintf(lang('forgot_password_email_label'), $identity_label) : sprintf(lang('forgot_password_identity_label'), $identity_label));?>
								<?php echo form_input($identity);?>
							</label>
						</div>
						<?php echo form_submit('submit', lang('forgot_password_submit_btn'),'class="btn btn-primary"');?>
					</fieldset>
					<?php echo form_close();?>
				</div>
			</div>
		</div>
	</div>
</div>