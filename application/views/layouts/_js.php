<script>
	var resizefunc = [];
</script>

<!-- jQuery  -->

<script src="<?=base_url('resources/js/bootstrap.min.js')?>"></script>
<script src="<?=base_url('resources/js/waves.js')?>"></script>
<script src="<?=base_url('resources/js/wow.min.js')?>"></script>
<script src="<?=base_url('resources/js/jquery.nicescroll.js')?>" type="text/javascript"></script>
<script src="<?=base_url('resources/js/jquery.scrollTo.min.js')?>"></script>
<script src="<?=base_url('resources/assets/chat/moment-2.2.1.js')?>"></script>
<script src="<?=base_url('resources/assets/jquery-sparkline/jquery.sparkline.min.js')?>"></script>
<script src="<?=base_url('resources/assets/jquery-detectmobile/detect.js')?>"></script>
<script src="<?=base_url('resources/assets/fastclick/fastclick.js')?>"></script>
<script src="<?=base_url('resources/assets/jquery-slimscroll/jquery.slimscroll.js')?>"></script>
<script src="<?=base_url('resources/assets/jquery-blockui/jquery.blockUI.js')?>"></script>

<!-- sweet alerts -->
<script src="<?=base_url('resources/assets/sweet-alert/sweet-alert.min.js')?>"></script>
<script src="<?=base_url('resources/assets/sweet-alert/sweet-alert.init.js')?>"></script>

<!-- flot Chart -->

<script src="<?=base_url('resources/assets/flot-chart/jquery.flot.js')?>"></script>
<script src="<?=base_url('resources/assets/flot-chart/jquery.flot.time.js')?>"></script>
<script src="<?=base_url('resources/assets/flot-chart/jquery.flot.tooltip.min.js')?>"></script>
<script src="<?=base_url('resources/assets/flot-chart/jquery.flot.resize.js')?>"></script>
<script src="<?=base_url('resources/assets/flot-chart/jquery.flot.pie.js')?>"></script>
<script src="<?=base_url('resources/assets/flot-chart/jquery.flot.selection.js')?>"></script>
<script src="<?=base_url('resources/assets/flot-chart/jquery.flot.stack.js')?>"></script>
<script src="<?=base_url('resources/assets/flot-chart/jquery.flot.crosshair.js')?>"></script>

<!-- Counter-up -->
<script src="<?=base_url('resources/assets/counterup/waypoints.min.js')?>" type="text/javascript"></script>
<script src="<?=base_url('resources/assets/counterup/jquery.counterup.min.js')?>" type="text/javascript"></script>

<!-- CUSTOM JS -->
<script src="<?=base_url('resources/js/jquery.app.js')?>"></script>

<!-- DataTables -->
<script src="<?=base_url('resources/assets/datatables/jquery.dataTables.min.js')?>"></script>
<script src="<?=base_url('resources/assets/datatables/dataTables.bootstrap.js')?>"></script>

<!-- Dashboard
<script src="<?=base_url('resources/js/jquery.dashboard.js')?>"></script>
-->
<!-- Chat -->
<script src="<?=base_url('resources/js/jquery.chat.js')?>"></script>

<!-- Todo -->
<script src="<?=base_url('resources/js/jquery.todo.js')?>"></script>
<!--
<script type="text/javascript">
	/* ==============================================
	Counter Up
	=============================================== */
	jQuery(document).ready(function($) {
		$('.counter').counterUp({
			delay: 100,
			time: 1200
		});
	});
</script>
-->
<?php
	if($this->router->fetch_class() == 'empresas' && $this->router->fetch_method() == 'listar'){
		$this->datatables->jquery();
	}elseif ($this->router->fetch_class() == 'contatos' && $this->router->fetch_method() == 'listar') {
		$this->datatables->jquery();
	}elseif ($this->router->fetch_class() == 'atividades' && $this->router->fetch_method() == 'listar') {
		$this->datatables->jquery();
	}elseif ($this->router->fetch_class() == 'departamentos' && $this->router->fetch_method() == 'listar') {
		$this->datatables->jquery();
	}elseif ($this->router->fetch_class() == 'projetos' && $this->router->fetch_method() == 'listar') {
		$this->datatables->jquery();
	}
?>