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
						<a class="navbar-brand" href="">Sistêmico</a>
					</div>	

					<div class="collapse navbar-collapse" id="myNavbar">
						<div class="col-md-4 col-sm-4 col-xs-12">
					  	
					  </div>
				  	<div class="col-md-6 col-sm-6 col-xs-12">
				  		<ul class="nav navbar-nav pull-right">	
				  			<li class="pull-right"><a href="../alunos/login_aluno">Acadêmico</a></li>
				  		</ul>
				  	</div>
					</div>
	    	</nav>
			</header>

			<div class="jumbotron" id="conteudo">
				<div class="row">
					<div class="col-md-5">
				    <div class="thumbnail inner-border">
				      <img class="img-responsive" id="logo" src="../img/ufop.png" alt="Logo Sistêmico">
				    </div>
					</div>
					<div class="col-md-6 col-sm-12 pull-right">
						<div class="panel panel-default">
              <div class="panel-heading"><h4>Login</h4></div>
              <div class="panel-body">
                <ul class="nav nav-tabs">
									<li class="active"><a href="login_aluno">Admin</a></li>
								</ul>					    
					    		<?php 
						    		echo $this->Form->create(
														    			"Admin", 
														    			array('controller' => 'admins',
														    				'action'=>'login')); 
						    		echo $this->Form->input('login', array('class' => 'form-control'));
						    		echo $this->Form->input('senha', array('class' => 'form-control', 'type' => 'password'));
						    		echo $this->Form->input('Login', array('type' => 'submit', 'class' => 'btn btn-success', 'label' => ''));
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