<!DOCTYPE html>
<html lang="pt_BR">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>MacaeTec</title>
		<link href="<?=base_url('assets/bootstrap/dist/css/bootstrap.min.css')?>" rel="stylesheet">
		<link href="<?=base_url('assets/css/bootstrap-chosen.css')?>" rel="stylesheet">
		<link href="<?=base_url('assets/MetisMenu/css/metisMenu.min.css')?>" rel="stylesheet">
		<link href="<?=base_url('assets/css/sb-admin-2.css')?>" rel="stylesheet">
		<link href="<?=base_url('assets/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet">
		<link href="<?=base_url('assets/css/jquery-ui.css')?>" rel="stylesheet">
		<!-- jQuery -->
		<script src="<?=base_url('assets/jquery/jquery.min.js')?>"></script>
		<script src="<?=base_url('assets/jquery/chosen.jquery.js')?>"></script>
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div id="wrapper">

			<!-- Navigation -->
			<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?=base_url('app')?>">MacaeTec - Intranet</a>
				</div>
				<!-- /.navbar-header -->

				<ul class="nav navbar-top-links navbar-right">
					<!-- /.dropdown -->
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<i class="fa fa-user fa-fw"></i>
							<?php
								if($this->ion_auth->logged_in()){
									echo($this->ion_auth->user()->row()->first_name);
								}
							?>
							<i class="fa fa-caret-down"></i>
						</a>
						<ul class="dropdown-menu dropdown-user">
							<li><a href="#"><i class="fa fa-user fa-fw"></i> Perfil do Usuário</a>
							</li>
							<li><a href="<?=base_url('auth/change_password')?>"><i class="fa fa-gear fa-fw"></i> Alterar Senha</a>
							</li>
							<li class="divider"></li>
							<li><a href="<?=base_url('auth/logout')?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
							</li>
						</ul>
						<!-- /.dropdown-user -->
					</li>
					<!-- /.dropdown -->
				</ul>
				<!-- /.navbar-top-links -->

				<div class="navbar-default sidebar" role="navigation">
					<div class="sidebar-nav navbar-collapse">
						<ul class="nav" id="side-menu">
							<li>
								<a href="<?=base_url('app/')?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
							</li>
							<li>
								<a href="<?=base_url('empresas')?>"><i class="fa fa-edit fa-fw"></i> Empresas</a>
							</li>
							<li>
								<a href="<?=base_url('contatos')?>"><i class="fa fa-edit fa-fw"></i> Contatos</a>
							</li>
							<li>
								<a href="<?=base_url('funil')?>"><i class="fa fa-edit fa-fw"></i> Funil de Vendas</a>
							</li>
							<li>
								<a href="<?=base_url('follow')?>"><i class="fa fa-edit fa-fw"></i> Follow Up</a>
							</li>
							<li>
								<a href="#"><i class="fa fa-table fa-fw"></i> Gerenciamento<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="<?=base_url('atividades')?>"><i class="fa fa-edit fa-fw"></i> Atividades</a>
									</li>
									<li>
										<a href="<?=base_url('departamentos')?>"><i class="fa fa-edit fa-fw"></i> Departamentos</a>
									</li>
									<?php if($this->ion_auth->in_group(1)):?>
									<li>
										<a href="<?=base_url('auth/index')?>"><i class="fa fa-edit fa-fw"></i> Usuários do Sistema</a>
									</li>
									<?php endif ?>
									<li>
										<a href="<?=base_url('app/backup')?>"><i class="fa fa-edit fa-fw"></i> Backup</a>
									</li>
								</ul>
								<!-- /.nav-second-level -->
							</li>
							<li>
								<a href="#"><i class="fa fa-table fa-fw"></i> Consultas<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="<?=base_url('consultas/contatoByAtividade/1')?>"><i class="fa fa-edit fa-fw"></i> Contatos por Atividades</a>
									</li>
								</ul>
								<!-- /.nav-second-level -->
							</li>
							<li>
								<a href="#"><i class="fa fa-table fa-fw"></i> Extração<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="<?=base_url('consultas/extrairEmailEmpresa')?>"><i class="fa fa-edit fa-fw"></i> Email de Empresas</a>
									</li>
									<li>
										<a href="#"><i class="fa fa-table fa-fw"></i> E-mail por Departamento<span class="fa arrow"></span></a>
										<ul class="nav nav-second-level">
											<li><a href="<?=base_url('consultas/extrairEmailCompra')?>"><i class="fa fa-edit fa-fw"></i> Compra</a></li>
											<li><a href="<?=base_url('consultas/extrairEmailContato')?>"><i class="fa fa-edit fa-fw"></i> Demais</a></li>
										</ul>
									</li>
								</ul>
								<!-- /.nav-second-level -->
							</li>
						</ul>
					</div>
					<!-- /.sidebar-collapse -->
				</div>
				<!-- /.navbar-static-side -->
			</nav>

			<!-- Page Content -->
			<div id="page-wrapper">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<?=$contents;?>
						</div>
						<!-- /.col-lg-12 -->
					</div>
					<!-- /.row -->
				</div>
				<!-- /.container-fluid -->
			</div>
			<!-- /#page-wrapper -->
		</div>
		<!-- /#wrapper -->
		<!-- Bootstrap Core JavaScript -->
		<script src="<?=base_url('assets/bootstrap/dist/js/bootstrap.min.js')?>"></script>
		<!-- Metis Menu Plugin JavaScript -->
		<script src="<?=base_url('assets/metisMenu/js/metisMenu.min.js')?>"></script>
		<!-- Custom Theme JavaScript -->
		<script src="<?=base_url('assets/js/sb-admin-2.js')?>"></script>
	</body>
</html>