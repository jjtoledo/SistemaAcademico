<!DOCTYPE html>
<html>
	<head>
		<title>Home</title>
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
						<a class="navbar-brand" href="home.html">Sistêmico</a>
					</div>	

					<div class="collapse navbar-collapse" id="myNavbar">
						<div class="col-md-4 col-sm-4 col-xs-12">
					  	<ul class="nav navbar-nav">						    
						    <li><a href="tabela.html">Informações</a></li> 
						    <li><a href="contato.html">Contato</a></li>  
					  	</ul>
					  	</div>
					  	<div class="col-md-6 col-sm-6 col-xs-12">
						  	<form class="navbar-form pull-right horizontal-form" role="form" name="Login" method="post" action="alunos/login">
						        <div class="col-sm-3 col-xs-12 input-group input-group-sm">
								 	<span class="input-group-addon" id="sizing-addon3"><img id="icone" src="img/user.png"/></span>
								 	<input type="text" class="form-control" placeholder="Email" aria-describedby="sizing-addon3">
								</div>
							  
						        <div class="col-sm-3 col-xs-12 input-group input-group-sm">
								 	<span class="input-group-addon" id="sizing-addon3"><img id="icone" src="img/lock.png"/></span>
								 	<input type="password" class="form-control" placeholder="Senha" aria-describedby="sizing-addon3">
								</div>

								<div class="col-sm-1 col-xs-12 input-group input-group-sm">					
									<button type="submit" class="btn btn-default btn-sm"><b>Login</b></button>
								</div>

								<div class="col-sm-3 col-xs-12 input-group input-group-sm">	
									<a href="recuperarSenha.html" id="recuperar">Esqueci minha senha!</a>
								</div>								
							</form>
						</div>					
					</div>
	    	</nav>
			</header>

			<div class="jumbotron" id="conteudo">
				<div class="row">
					<div class="col-md-5">
				    <div class="thumbnail inner-border">
				      	<img class="img-responsive" id="logo" src="img/ufop.png" alt="Logo Sistêmico">
				    </div>
					</div>
					<div class="col-md-6 col-sm-12 pull-right">
						<div class="panel panel-default">
              <div class="panel-heading"><h4>Cadastro</h4></div>
	              <div class="panel-body">
	                <ul class="nav nav-tabs">
										<li class="active"><a href="homes">Aluno</a></li>
										<li><?php echo $this->Html->link('Professor', 
																	array('controller' => 'professores',
																			'action' => 'cadastrar')); ?></li>
									</ul>					    
						    		<?php 
							    		echo $this->Form->create(
															    			"Aluno", 
															    			array('controller' => 'alunos',
															    				'action'=>'cadastrar')); 
							    		echo $this->Form->input('matricula', array('class' => 'form-control'));
							    		echo $this->Form->input('nome', array('class' => 'form-control'));
							    		echo $this->Form->input('periodo', array('class' => 'form-control'));
							    		echo $this->Form->input('email', array('class' => 'form-control'));
							    		echo $this->Form->end('Cadastrar');
						    		?>
								</div>
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