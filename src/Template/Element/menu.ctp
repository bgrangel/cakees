<nav class="navbar navbar-inverse nav-users">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toogle="collapse" data-target="#bs-example-navbar-collapse-2">
				<span class="sr-only"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<?= $this->Html->link('BGRANGEL', ['controller'=>'Users','action'=>'index'],['class'=>'navbar-brand']) ?>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
			<?php if(isset($current_user)):?>
			<ul class="nav navbar-nav">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Usuarios<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li>
								<?= $this->Html->link('Agregar usuarios',['controller'=>'Users','action'=>'add']) ?>
							</li>
							<li>
								<?= $this->Html->link('Lista de usuarios',['controller'=>'Users','action'=>'index']) ?>
							</li>
						</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Vehículos<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li>
								<?= $this->Html->link('Agregar carro',['controller'=>'Vehiculos','action'=>'add']) ?>
							</li>
							<li>
								<?= $this->Html->link('Lista de carros',['controller'=>'Vehiculos','action'=>'index']) ?>
							</li>
						</ul>
				</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li>
					<?= $this->Html->link('Salir',['controller'=>'Users','action'=>'logout'])?>
					</li>
				</ul>
				<?php else: ?>
				<ul class="nav navbar-nav navbar-right">
					<li>
					<?= $this->Html->link('Registrarse',['controller'=>'Users','action'=>'add'])?>
					</li>
				</ul>
			<?php endif; ?>
			</div>
		</div>
	</nav>