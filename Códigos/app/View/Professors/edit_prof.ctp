<!DOCTYPE html>
<html>
	<head>
		<title>Editar Perfil</title>
	</head>
	
	<body>
		<div class="container-fluid">
			<header class="row" id="menu">
				<nav class="navbar navbar-inverse navbar-fixed-top">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>                        
						</button>
						<a class="navbar-brand">Sistêmico</a>
					</div>	

					<div class="collapse navbar-collapse" id="myNavbar">
						<div class="col-md-4 col-sm-4 col-xs-12">
					  	
						</div>
					  	<div class="col-md-6 col-sm-6 col-xs-12">
					  		<ul class="nav navbar-nav pull-right">	
					  			<li><a href="#"> <?php echo $professor['0']['Professor']['nome'] ?> </a></li>
					  			<li><a data-toggle="modal" data-target="#modalSair">
					  					Logout<span class="glyphicon glyphicon-log-out"></span></a>
					  			</li>
					  		</ul>
					  	</div>
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

			<div id="modalSalvar" class="modal fade" role="dialog">
			  	<div class="modal-dialog">
			   		<div class="modal-content">
			      		<div class="modal-header">
			        		<button type="button" class="close" data-dismiss="modal">&times;</button>
			       			<h4 class="modal-title">Atenção</h4>
			     		</div>
			      		<div class="modal-body">
			        		<p>Tem certeza que quer salvar as alterações feitas?</p>
			      		</div>
				      	<div class="modal-footer">
					      	<a href="../professors/meu_perfil" class="btn btn-default">Sim</a>
					        <button type="button" class="btn btn-primary" data-dismiss="modal">Não</button>
				      	</div>
			    	</div>
			 	</div>
			</div>
			
			<ul class="breadcrumb" id="bread">
				<li><a href="../professors/area_prof">Início</a></li>
        <li><a href="../professors/meu_perfil">Meu Perfil</a></li>
        <li class="active">Editar Perfil</li>
	    </ul>   

	        <div class="container-fluid">
        		<div class="row">
					<div class="col-md-3">
	        	<legend>Menu</legend>
			 			<ul class="nav nav-pills nav-stacked">
					    <li><a href="../professors/area_prof">Início</a></li>
					    <li class="active"><a href="#">Meu Perfil</a></li>
							<li><a href="../disciplinas/listar">Listar Disciplinas</a></li>
							<li><a href="../turmas/chamada">Fazer chamada</a></li>
							<li><a href="../disciplinas/add_nota">Adicionar Notas</a></li>
					  </ul>
					  <div class="tab-content">
					    	
					  </div>
					</div>
					
					<div class="col-md-1"></div>
					<div class="col-md-7">
						<div class="jumbotron">
							<legend>Editar Dados:</legend>								
					    <?php 
								echo $this->Form->create('Professor');
								echo $this->Form->input('id', array('class' => 'form-control'));
								echo $this->Form->input('nome', array('class' => 'form-control'));
								echo $this->Form->input('email', array('class' => 'form-control'));
								echo $this->Form->input('senha', array('class' => 'form-control', 'type' => 'password'));
								
								echo $this->Form->input('Salvar', array('type' => 'submit', 'class' => 'btn btn-success', 'label' => ''));
					    ?>	
						</div>
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
	</body>
</html>




