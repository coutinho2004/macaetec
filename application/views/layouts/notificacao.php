<ul class="dropdown-menu dropdown-menu-lg">
	<li class="text-center notifi-title">Notificação</li>
	<li class="list-group">
		<!-- list item-->
		<a href="javascript:void(0);" class="list-group-item">
				<?
					$user = $this->ion_auth->user()->row();
					$o = new Projeto_Historico();
					$dados = $o->notificacao($user->id);
					$i=1;
					foreach ($dados['result'] as $obj):
				?>
			<div class="media">
				<div class="pull-left">
					<em class="fa fa-bell-o fa-2x text-danger"></em>
				</div>
					<div class="media-body clearfix">
						<div class="media-heading">Notificação <?=$i?></div>
						<p class="m-0">
							<small>
								<span class="text-primary"></span> <a href="<?=base_url('projetos/edit/'.$obj->projeto_id.'#historico')?>"><?php echo $obj->texto;?></a>
							</small>
						</p>
					</div>
				</div>
				<?php $i++;
					endforeach?>
		</a>
	</li>
</ul>