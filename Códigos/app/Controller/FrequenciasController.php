<?php 

class FrequenciasController extends AppController {

	public $helpers = array('Html' , 'Form');

	public function add($ida, $idd){
		if (!empty($this->data['Frequencia']['data'])) {	
			$this->request->data['Frequencia']['disciplina_id'] = $idd;
			$this->request->data['Frequencia']['aluno_id'] = $ida;
			if ($this->Frequencia->save($this->request->data)) {

	    		$this->Flash->set('Cadastro realizado com sucesso!');

    			$this->redirect(array('controller' => 'professors', 
    									'action' => 'add_chamada', $idd));
	    	}
		} else {
        	$this->redirect(array('action' => 'cadastrar'));
        	exit();
        }
	}

	public function index_add($ida, $idd){
		$this->set('ida', $ida);
		$this->set('idd', $idd);
	}
}