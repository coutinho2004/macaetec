<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
	<div class="sidebar-inner slimscrollleft">
		<div class="user-details">
			<div class="pull-left">
				<img src="<?=base_url('resources/images/users/avatar-1.jpg')?>" alt="" class="thumb-md img-circle">
			</div>
			<div class="user-info">
				<div class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
					<?php
						$user = $this->ion_auth->user()->row();
						echo $user->first_name;
					?>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Perfil<div class="ripple-wrapper"></div></a></li>
						<li><a href="<?=base_url('auth/change_password')?>"><i class="md md-settings"></i> Mudar Senha</a></li>
						<li><a href="<?=base_url('auth/logout')?>"><i class="md md-settings-power"></i> Logout</a></li>
					</ul>
				</div>
				<?if ($this->ion_auth->is_admin()):?>
					<p class="text-muted m-0">Administrador</p>
				<?else:?>
					<p class="text-muted m-0">Membro da Empresa</p>
				<?endif?>
			</div>
		</div>
		<!--- Divider -->
		<div id="sidebar-menu">
			<ul>
				<li>
					<a href="<?=base_url('app')?>" class="waves-effect <?=($this->router->fetch_class() == 'app' && $this->router->fetch_method() == 'index') ? 'active' : null; ?>"><i class="md md-home"></i><span> Dashboard </span></a>
				</li>

				<li class="has_sub">
					<a href="#" class="waves-effect <?=(
						$this->router->fetch_class() == 'atividades' or
						$this->router->fetch_class() == 'departamentos') ? 'active' : null; ?>"><i class="md md-view-list"></i><span> Gerenciamento </span><span class="pull-right"><i class="md md-add"></i></span></a>
					<ul class="list-unstyled">
						<li <?=($this->router->fetch_class() == 'atividades') ? 'class="active"' : null; ?>><a href="<?=base_url('atividades')?>">Atividades</a></li>
						<li <?=($this->router->fetch_class() == 'departamentos') ? 'class="active"' : null; ?>><a href="<?=base_url('departamentos')?>">Departamentos</a></li>
						<?if ($this->ion_auth->is_admin()):?>
							<li><a href="<?=base_url('auth/index')?>">Usuários do Sistema</a></li>
							<li><a href="responsive-table.html">Backup</a></li>
						<?endif?>
					</ul>
				</li>

				<li>
					<a href="<?=base_url('empresas')?>" class="waves-effect <?=($this->router->fetch_class() == 'empresas') ? 'active' : null; ?>"><i class="md md-business"></i><span> Empresas </span></a>
				</li>

				<li>
					<a href="<?=base_url('contatos')?>" class="waves-effect <?=($this->router->fetch_class() == 'contatos') ? 'active' : null; ?>"><i class="md md-perm-contact-cal"></i><span> Contatos </span></a>
				</li>

				<li>
					<a href="<?=base_url('projetos')?>" class="waves-effect <?=($this->router->fetch_class() == 'projetos') ? 'active' : null; ?>"><i class="md md-grid-on"></i><span> Projetos </span></a>
				</li>

				<li class="has_sub">
					<a href="javascript:void(0);" class="waves-effect"><i class="md md-share"></i><span>Extração </span><span class="pull-right"><i class="md md-cloud-download"></i></span></a>
					<ul>
						<li>
							<a href="<?=base_url('consultas/extrairEmailEmpresa')?>"><span>E-mail das Empresas</span></a>
						</li>
						<li class="has_sub">
							<a href="javascript:void(0);" class="waves-effect"><span>E-mail por Departamento</span> <span class="pull-right"><i class="md md-add"></i></span></a>
							<ul style="">
								<li><a href="<?=base_url('consultas/extrairEmailCompra')?>"><span>Compra</span></a></li>
								<li><a href="<?=base_url('consultas/extrairEmailContato')?>"><span>Demais</span></a></li>
							</ul>
						</li>
					</ul>
				</li>
			</ul>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- Left Sidebar End -->