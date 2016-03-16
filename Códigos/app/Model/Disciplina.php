<?php

class Disciplina extends AppModel {
	public $belongsTo = array(
        'Professor' => array(
            'className' => 'Professor',
            'foreignKey' => 'professor_id'
        ),
        'Curso' => array(
            'className' => 'Curso',
            'foreignKey' => 'curso_id'
        )
    );

    public $hasMany = 'Frequencia';

    public $hasAndBelongsToMany = array(
        'Aluno' => array(
            'className' => 'Aluno',
            'joinTable' => 'alunos_disciplinas',
            'foreignKey' => 'disciplina_id',
            'associationForeignKey' => 'aluno_id'
        )
    );
}
?>
