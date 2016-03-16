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
		  			<li><a href="#"> <?php echo $admin['0']['Admin']['login'] ?> </a></li>
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
		      	<a href="../../admins/logout" class="btn btn-default">Sim</a>
		        <button type="button" class="btn btn-primary" data-dismiss="modal">Não</button>
	      	</div>
    	</div>
	 	</div>
	</div>

	<ul class="breadcrumb" id="bread">
    <li><?php echo $this->Html->link(
						    'Início', 
						    array('controller' => 'admins',
						    		'action' => 'area_admin', $admin['0']['Admin']['id'])); ?></li>
		<li><a href="../listar">Disciplinas</a></li>
		<li class="active">Detalhes</li>
  </ul>   
	<div class="table-responsive">
		<legend>Detalhes da disciplina</legend>
		<table class="table table-striped table-hover table-bordered">
			<tr>
				<th>ID</th>
				<th>Nome</th>
				<th>Departamento</th>
				<th>Professor</th>
				<th>Carga Horária</th>
				<th>Ação</th>
			</tr>

			<tr>
				<td><?php echo $Disciplina['Disciplina']['id'] ?></td>
				<td><?php echo $Disciplina['Disciplina']['nome'] ?></td>
				<td><?php echo $Disciplina['Disciplina']['departamento'] ?></td>
				<td><?php echo $professor['Professor']['nome'] ?></td>
				<td><?php echo $Disciplina['Disciplina']['carga_horaria'] ?></td>
				<td><?php echo $this->Html->link(
							    'Editar', 
							    array('action' => 'edit_admin', 
							    			$Disciplina['Disciplina']['id']),
							    array('class' => 'btn btn-success')) . ' ';
						echo $this->Html->link(
							    'Excluir', 
							    array('action' => 'delete', 
							    			$Disciplina['Disciplina']['id']),
							    array('class' => 'btn btn-danger')); ?>
				</td>
			</tr>
		</table>
	</div>
	
	<div class="table-responsive">
		<legend>Curso Relacionado</legend>
		<table class="table table-striped table-hover table-bordered">
			<tr>
				<th>Código</th>
				<th>Nome</th>
				<th>Perídos</th>
			</tr>

			<tr>
				<td><?php echo $curso['0']['Curso']['id'] ?></td>
				<td><?php echo $curso['0']['Curso']['nome'] ?></td>
				<td><?php echo $curso['0']['Curso']['periodos'] ?></td>
			</tr>
		</table>
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