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
		  			<li><a href="#"> <?php echo $aluno['Aluno']['nome'] ?> </a></li>
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
    <li><a href="home_aluno">Início</a></li>
    <li class="active">Meu Perfil</li>
  </ul>   

  <div class="row">
		<div class="col-md-3">
      <legend>Menu</legend>
		 	<ul class="nav nav-pills nav-stacked">
	    	<li><a href="home_aluno">Início</a></li>
	    	<li class="active"><a href="">Meu perfil</a></li>
				<li><a href="disciplinas">Listar Disciplinas</a></li>
				<li><a href="frequencias">Ver Frequência</a></li>
				<li><a href="notas">Ver Notas</a></li>
	  	</ul>
		</div>
		<div class="col-md-1"></div>
		<div class="col-md-7">
			<div class="table-responsive">
				<legend>Dados do Usuário</legend>
		    <table class="table table-striped table-hover">
	   	   	<tr>
	   	   		<th>Nome</th>
	    	    <td><?php echo $aluno['Aluno']['nome'] ?></td>
	    	    
	        </tr>
			    <tr>
			    	<th>Email</th>
			    	<td><?php echo $aluno['Aluno']['email'] ?></td>
					</tr>

					<tr>
						<th>Curso</th>
						<td><?php echo $cursos['Curso']['nome'] ?></td>
					</tr>

					<tr>
						<th>Período</th>
						<td><?php echo $aluno['Aluno']['periodo'] . 'º' ?></td>
					</tr>
		    </table>
		    <?php 
				  echo $this->Html->link("Editar dados", 
				  							array('controller' => 'alunos', 
				  									'action' => 'editar'),
				  							array('class' => 'btn btn-warning', 'target' => '_self'));
				?>
		    <a class="btn btn-danger" data-toggle="modal" data-target="#modalExcluir">Excluir Conta</a>
		    
		    <div id="modalExcluir" class="modal fade" role="dialog">
			  	<div class="modal-dialog">
			   		<div class="modal-content">
		      		<div class="modal-header">
		        		<button type="button" class="close" data-dismiss="modal">&times;</button>
		       			<h4 class="modal-title">Atenção</h4>
			     		</div>
		      		<div class="modal-body">
		        		<p>Tem certeza que quer EXCLUIR sua conta?</p>
		      		</div>
			      	<div class="modal-footer">
				      	<?php 
							  	echo $this->Html->link("Sim, desejo excluir minha conta", 
							  							array('controller' => 'alunos', 
							  									'action' => 'delete', $aluno['Aluno']['id']),
							  							array('class' => 'btn btn-default', 'target' => '_self'));
								?>
				        <button type="button" class="btn btn-primary" data-dismiss="modal">Não, vou ficar com a conta</button>
			      	</div>
			    	</div>
				 	</div>
				</div>
	    </div>
			<br /><br />
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