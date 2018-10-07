<div class="navbar navbar-default" role="navigation">
	<div class="container">
		<div class="">
			<div class="pull-left">
				<button class="button-menu-mobile open-left">
					<i class="fa fa-bars"></i>
				</button>
				<span class="clearfix"></span>
			</div>
			<ul class="nav navbar-nav navbar-right pull-right">
				<?php $this->load->view('layouts/notificacao')?>
				<li class="hidden-xs">
					<a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="md md-crop-free"></i></a>
				</li>
				<li class="dropdown">
					<a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="<?=base_url('resources/images/users/avatar-1.jpg')?>" alt="user-img" class="img-circle"> </a>
					<ul class="dropdown-menu">
						<li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Perfil</a></li>
						<li><a href="<?=base_url('auth/change_password')?>"><i class="md md-settings"></i> Mudar Senha</a></li>
						<li><a href="<?=base_url('auth/logout')?>"><i class="md md-settings-power"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
		<!--/.nav-collapse -->
	</div>
</div>