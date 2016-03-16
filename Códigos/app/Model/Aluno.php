<?php

class Aluno extends AppModel {
	public $belongsTo = 'Curso';

	public $hasMany = array(
		'Frequencia' => array(
			'className' => 'Frequencia'
		),
		'Atividade' => array(
			'className' => 'Atividade'
		)
	);

	public $hasAndBelongsToMany = array(
		'Disciplina' =>	array(
			'className' => 'Disciplina',
			'joinTable' => 'alunos_disciplinas',
			'foreignKey' => 'aluno_id',
			'associationForeignKey' => 'disciplina_id'
		)
	);
}

?>
