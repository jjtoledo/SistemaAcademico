<h1>Inserir Atividade</h1>

<?php 
	echo $this->Form->create('Atividade', array(
    					'url' => array('controller' => 'atividades', 'action' => 'add', $ida, $idd)));
	echo $this->Form->input('nome', array('class' => 'form-control'));
	echo $this->Form->input('valor', array('class' => 'form-control'));
	echo $this->Form->input('nota', array('class' => 'form-control'));
	echo $this->Form->label('Data');
	echo $this->Form->date('dataEntrega', array('class' => 'form-control'));
	echo $this->Form->input('tipo_id', array('class' => 'form-control'));
	echo $this->Form->input('Salvar', array('type' => 'submit', 'class' => 'btn btn-success', 'label' => ''));
?>