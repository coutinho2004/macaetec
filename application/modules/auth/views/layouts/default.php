<!DOCTYPE html>
<html lang="pt_BR">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>MacaeTec</title>
		<link href="<?=base_url('assets/bootstrap/dist/css/bootstrap.min.css')?>" rel="stylesheet">
		<!-- jQuery -->
		<script src="<?=base_url('assets/jquery/jquery.min.js')?>"></script>
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div id="wrapper">
			<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?=base_url('macaetec')?>">MacaeTec - Intranet</a>
				</div>
			</nav>

			<div id="page-wrapper">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<?=$contents;?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="<?=base_url('assets/bootstrap/dist/js/bootstrap.min.js')?>"></script>
	</body>
</html>