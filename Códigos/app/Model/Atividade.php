<?php

class Atividade extends AppModel {
	public $belongsTo = array(
        'Disciplina' => array(
            'className' => 'Disciplina',
            'foreignKey' => 'disciplina_id'
        ),
        'Tipo' => array(
            'className' => 'Tipo',
            'foreignKey' => 'tipo_id'
        ),
        'Aluno' => array(
            'className' => 'Aluno',
            'foreignKey' => 'aluno_id'
        )
    );
}
