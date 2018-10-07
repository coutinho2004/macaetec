<li clas--s="dropdown hidden-xs">
	<a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
		<i class="md md-notifications"></i>
		<span class="badge badge-xs badge-danger">
			<?php	$user = $this->ion_auth->user()->row();	$o = new Notificacao($user->id); echo($o->total);?>
		</span>
	</a>
	<ul class="dropdown-menu dropdown-menu-lg">
		<li class="text-center notifi-title">Notificação</li>
		<li class="list-group">
			<?php $user = $this->ion_auth->user()->row();
				$o = new Notificacao($user->id);
				$i=1;
				foreach ($o->lista as $obj):?>
			<a href="<?=base_url('projetos/edit/'.$obj->projeto_id.'#historico')?>" class="list-group-item">
			  <div class="media">
				 <div class="pull-left">
					<em class="fa fa-bell-o fa-2x text-danger"></em>
				 </div>
				 <div class="media-body clearfix">
					<div class="media-heading"><?=$i;?>ª Notificação</div>
					<p class="m-0">
					   <small><?php echo $obj->texto;?></small>
					</p>
				 </div>
			  </div>
			</a>
			<?php $i++; endforeach?>
		   <!-- last list item -->
			<a href="javascript:void(0);" class="list-group-item">
			  <small>ver todas notificações</small>
			</a>
		</li>
	</ul>
</li>

