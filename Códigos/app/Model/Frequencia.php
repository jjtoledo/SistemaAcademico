<?php

class Frequencia extends AppModel {
	public $belongsTo = array(
        'Disciplina' => array(
            'className' => 'Disciplina',
            'foreignKey' => 'disciplina_id'
        ),
        'Aluno' => array(
            'className' => 'Aluno',
            'foreignKey' => 'aluno_id'
        )
    );

}

?>