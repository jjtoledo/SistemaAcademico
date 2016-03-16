<div class="container-fluid">
	<header class="row" id="menu">
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
				</button>
				<a class="navbar-brand" href="cadastrar">Sistêmico</a>
			</div>	

			<div class="collapse navbar-collapse" id="myNavbar">
				<div class="col-md-4 col-sm-4 col-xs-12">
			
			  </div>
		  	<div class="col-md-6 col-sm-6 col-xs-12">
		  		<ul class="nav navbar-nav pull-right">	
		  			<li><a href="#"> <?php echo $professor['0']['Professor']['nome'] ?> </a></li>
		  			<li><a data-toggle="modal" data-target="#modalSair">
		  					Logout <span class="glyphicon glyphicon-log-out"></span></a>
		  			</li>
		  		</ul>
		  	</div>
			</div>
  	</nav>
	</header>

	<div id="modalSair" class="modal fade" role="dialog">
  	<div class="modal-dialog">
   		<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
       			<h4 class="modal-title">Atenção</h4>
     		</div>
      		<div class="modal-body">
        		<p>Tem certeza que quer sair?</p>
      		</div>
	      	<div class="modal-footer">
		      	<a href="logout" class="btn btn-default">Sim</a>
		        <button type="button" class="btn btn-primary" data-dismiss="modal">Não</button>
	      	</div>
    	</div>
	 	</div>
	</div>

	<ul class="breadcrumb" id="bread">
    <li><a href="area_prof">Início</a></li>
    <li class="active">Disciplinas</li>
  </ul>   

  <div class="row">
		<div class="col-md-3">
      <legend>Menu</legend>
		 	<ul class="nav nav-pills nav-stacked">
		    <li><a href="area_prof">Início</a></li>
		    <li><a href="../professors/meu_perfil">Meu Perfil</a></li>
				<li class="active"><a href="">Listar Disciplinas</a></li>
				<li><a href="chamadas">Chamadas</a></li>
				<li><a href="atividades">Atividades</a></li>
		  </ul>
		</div>
		<div class="col-md-1"></div>
		<div class="col-md-7">
	 		<div class="table-responsive">
				<legend>Disciplinas Lecionadas</legend>
				<table class="table table-striped table-hover table-bordered">
					<tr>
						<th>ID</th>
						<th>Nome</th>
						<th>Departamento</th>
						<th>Carga Horária</th>
						<th>Ação</th>
					</tr>

					<?php foreach ($disciplinas as $s): ?>
					<tr>
						<td><?php echo $s['Disciplina']['id'] ?></td>
						<td><?php echo $s['Disciplina']['nome'] ?></td>
						<td><?php echo $s['Disciplina']['departamento'] ?></td>
						<td><?php echo $s['Disciplina']['carga_horaria'] ?></td>
						<td><?php echo $this->Html->link(
									    'Fazer Chamada', 
									    array('action' => 'add_chamada', 
									    			$s['Disciplina']['id']),
									    array('class' => 'btn btn-success')) . ' ';
								echo $this->Html->link(
									    'Adicionar Atividade', 
									    array('action' => 'add_atividade', 
									    			$s['Disciplina']['id']),
									    array('class' => 'btn btn-warning')); ?>
						</td>
					</tr>
					<?php endforeach; ?>
				</table>
			</div>
	    	
		</div>
	</div>

	<div class="container-fluid" id="foot">
		<footer id="footerRow">
    	<div class="col-md-6">
    		Sistêmico © Sistema Acadêmico<br />Universidade Federal de Ouro Preto		        
    	</div>	

    	<div class="col-md-6">
    		José Cassimiro Toledo Júnior - jjtoledo93@gmail.com<br />
    		Guilherme Silva Felix - guilhermesfelix@gmail.com
    	</div>
  	</footer>
  </div>
</div>