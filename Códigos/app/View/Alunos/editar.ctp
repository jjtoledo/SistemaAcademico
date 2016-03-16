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
		  			<li><a href="#"> <?php echo $aluno['0']['Aluno']['nome'] ?> </a></li>
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
    <li><a href="meu_perfil">Meu Perfil</a></li>
    <li class="active">Editar</li>
  </ul>   

  <div class="row">
		<div class="col-md-3">
      <legend>Menu</legend>
		 	<ul class="nav nav-pills nav-stacked">
	    	<li><a href="home_aluno">Início</a></li>
	    	<li class="active"><a href="">Meu perfil</a></li>
				<li>
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">Lsitar Disciplinas<b class="caret"></b></a>
			    <ul class="dropdown-menu">
			    	<li><a href="disciplinas_my">Minhas Disciplinas</a></li>
			    	<li><a href="disciplinas_all">Todas</a></li>
			    </ul>
				</li>
				<li><a href="frequencia.html">Ver Frequência</a></li>
				<li class="dropdown">
			    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Ver Notas<b class="caret"></b></a>
			    <ul class="dropdown-menu">
			    	<li><a href="notasAtvs.html">Atividades</a></li>
			    	<li><a href="notasProvas.html">Provas</a></li>
			    </ul>
				</li>
	  	</ul>
		</div>
		<div class="col-md-1"></div>
		<div class="col-md-7">
			<?php 
				echo $this->Form->create('Aluno');
				echo $this->Form->input('id', array('class' => 'form-control'));
				echo $this->Form->input('matricula', array('class' => 'form-control'));
				echo $this->Form->input('nome', array('class' => 'form-control'));
				echo $this->Form->input('email', array('class' => 'form-control'));
				echo $this->Form->input('periodo', array('class' => 'form-control'));
				echo $this->Form->input('curso_id', array('class' => 'form-control'));
				echo $this->Form->input('Salvar', array('type' => 'submit', 'class' => 'btn btn-success', 'label' => ''));
			?>
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