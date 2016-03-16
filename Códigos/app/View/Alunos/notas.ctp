<div class="container-fluid">
	<header class="row" id="menu">
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
				</button>
				<a class="navbar-brand" href="cadastdar">Sistêmico</a>
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
    <li class="active">Início</li>
  </ul>   

  <div class="row">
		<div class="col-md-3">
      <legend>Menu</legend>
		 	<ul class="nav nav-pills nav-stacked">
	    	<li><a href="home_aluno">Início</a></li>
	    	<li><a href="meu_perfil">Meu perfil</a></li>
				<li><a href="disciplinas">Listar Disciplinas</a></li>
				<li><a href="frequencias">Ver Frequência</a></li>
				<li class="active"><a href="">Ver Notas</a></li>
	  	</ul>
		</div>
		<div class="col-md-9">    
    	<?php foreach($disciplinas as $d): ?>
				<div class="table-responsive">
					<legend><?php echo $d['Disciplina']['nome'] ?></legend>
			    <table class="table table-striped table-hover table-bordered">
		   	   	<th>Nome</th>
		   	   	<th>Valor</th>
		   	   	<th>Nota</th>
		   	   		<?php foreach($notas as $n): ?>
		   	   			<tr>
		   	   			<?php if ($n['Atividade']['disciplina_id'] == $d['Disciplina']['id']) {
		   	   				echo '<td>' . $n['Atividade']['nome'] . '</td>';
		   	   				echo '<td>' . $n['Atividade']['valor'] . '</td>';
		   	   				echo '<td>' . $n['Atividade']['nota'] . '</td>';
		   	   			} ?>
		   	   			</tr>
			   	   	<?php endforeach ?>
			    </table>
				</div>
			<?php endforeach; ?>
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