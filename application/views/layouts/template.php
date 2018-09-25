<!DOCTYPE html>
<html>
	<head>
		<?php $this->load->view('layouts/_header')?>
	</head>

	<body class="fixed-left">

		<!-- Begin page -->
		<div id="wrapper">

			<!-- Top Bar Start -->
			<div class="topbar">
				<!-- LOGO -->
				<div class="topbar-left">
					<div class="text-center">
						<a href="<?=base_url()?>" class="logo"> <span><?=APP_NOME_EMPRESA?> </span></a>
					</div>
				</div>
				<!-- Button mobile view to collapse sidebar menu -->
				<?php $this->load->view('layouts/menuSuperior')?>
			</div>
			<!-- Top Bar End -->

			<?php $this->load->view('layouts/menuLateral')?>


			<!-- ============================================================== -->
			<!-- Start right Content here -->
			<!-- ============================================================== -->
			<div class="content-page">
				<!-- Start content -->
				<div class="content">
					<div class="container">
						<?= $contents ?>
					</div> <!-- container -->

				</div> <!-- content -->

				<footer class="footer text-right">
					2018 © <?=APP_NOME?>.
				</footer>

			</div>
			<!-- ============================================================== -->
			<!-- End Right content here -->
			<!-- ============================================================== -->

		</div>
		<!-- END wrapper -->

		<?php $this->load->view('layouts/_js')?>
	</body>
</html>