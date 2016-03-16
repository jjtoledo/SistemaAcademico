<h1>Inserir Frequência</h1>

<?php 
	echo $this->Form->create('Frequencia', array(
    					'url' => array('controller' => 'frequencias', 'action' => 'add', $ida, $idd)));
	echo $this->Form->date('data', array('class' => 'form-control'));
	echo $this->Form->input('frequencia', array('class' => 'form-control'));
	echo $this->Form->input('Salvar', array('type' => 'submit', 'class' => 'btn btn-success', 'label' => ''));
?>