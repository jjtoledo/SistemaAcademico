<?php 

class AtividadesController extends AppController {

	public $helpers = array('Html' , 'Form');

	public function add($ida, $idd){
		if (!empty($this->data['Atividade']['nome'])) {	
			$this->request->data['Atividade']['disciplina_id'] = $idd;
			$this->request->data['Atividade']['aluno_id'] = $ida;
			if ($this->Atividade->save($this->request->data)) {

	    		$this->Flash->set('Cadastro realizado com sucesso!');

    			$this->redirect(array('controller' => 'professors', 
    									'action' => 'add_atividade', $idd));
	    	}
		} else {
        	$this->redirect(array('action' => 'cadastrar'));
        	exit();
        }
	}

	public function index_add($ida, $idd){
		$this->loadModel('Tipo');
		$tipos = $this->Tipo->find('list', array('fields' => array('id', 'tipo'))); 
		$this->set('tipos', $tipos);
		
		$this->set('ida', $ida);
		$this->set('idd', $idd);
	}
}