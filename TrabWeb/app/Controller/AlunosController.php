<?php 

class AlunosController extends AppController {

	public $helpers = array('Html' , 'Form');
	public $components = array('Flash');

	public function index() {
		
	}

	public function login(){
	    if (!empty($this->data['Aluno']['matricula']) and
	    	!empty($this->data['Aluno']['senha'])) {
	    	$aluno = $this->validar();

	    	if ($aluno != false) {
	    		$this->Session->write('Aluno', $aluno);

	    		$this->set('aluno', $aluno);
	    		$this->redirect(array('action' => 'meu_perfil'));
	    		exit();
	    	} else {
	    		$this->Flash->set('Login e/ou senha inválidos!');
	    		$this->redirect(array('controller' => 'homes', 'action' => 'index'));
	    		exit();
	    	}
	    } else {
	    	$this->redirect(array('controller' => 'homes', 'action' => 'index'));
	    	exit();
	    }
	}

	public function validar(){
		$aluno = $this->Aluno->findAllByMatriculaAndSenha(
									$this->data['Aluno']['matricula'],
									$this->data['Aluno']['senha']);
		if (!empty($aluno)) {
			return $aluno;
		} else {
			return false;
		}
	}
}

?>