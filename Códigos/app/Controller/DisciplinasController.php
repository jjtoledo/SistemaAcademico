<?php 

class DisciplinasController extends AppController {

	public $helpers = array('Html' , 'Form');
	public $components = array('Flash');

	public function index() {
		
	}

	public function add(){
		if (!empty($this->request->data)) {		
			if ($this->Disciplina->save($this->request->data)) {
	    		$this->Flash->set('Cadastro realizado com sucesso!');

	    		if ($this->Session->Check('Admin')) {
	    			$this->redirect(array('action' => 'listar'));
	    		} else {
	    			$this->redirect(array('controller' => 'admins', 'action' => 'area_admin'));
	    		}

	    		exit();
	    	}
		} else {
        	$this->redirect(array('controller' => 'admins', 'action' => 'area_admin'));
        	exit();
        }
	}

	public function edit_admin($id){
		$admin = $this->Session->read('Admin');
		$this->set('admin', $admin);	
		
		$this->set('professors', $this->Disciplina->Professor->find('list', array('fields' => array('id', 'nome'))));

		$this->set('cursos', $this->Disciplina->Curso->find('list', array('fields' => array('id', 'nome'))));

		$Disciplina = $this->Disciplina->findById($id);

		$this->set('Disciplina', $Disciplina);
		if (empty($this->request->data)) {
			// Campos para edição
			$this->request->data = $this->Disciplina->findById($id);
		} else {
			// Atualizar os dados
			if ($this->Disciplina->save($this->request->data)) {
				$this->Flash->set('Disciplina atualizado com sucesso!');
				$this->redirect(array('action' => 'listar'));
			}
		}
	}

	public function detalhes_admin($id){
		$admin = $this->Session->read('Admin');
		$this->set('admin', $admin);

		$Disciplina = $this->Disciplina->findById($id);
		$this->set('Disciplina', $Disciplina);

		$professor = $this->Disciplina->Professor->findById($Disciplina['Disciplina']['professor_id']);
		$this->set('professor', $professor);	

		$optionsCursos['conditions'] = array(
		    'Curso.id' => $Disciplina['Disciplina']['curso_id']
		);

		$curso = $this->Disciplina->Curso->find('all', $optionsCursos);
		$this->set('curso', $curso);	
	}

	public function listar(){
		$disciplinas = $this->Disciplina->find('all');
		$this->set('disciplinas', $disciplinas);

		$admin = $this->Session->read('Admin');
		$this->set('admin', $admin);		
	}

	public function add_admin(){
		$admin = $this->Session->read('Admin');
		$this->set('admin', $admin);

		$this->set('professors', $this->Disciplina->Professor->find('list', array('fields' => array('id', 'nome'))));
		
		$this->set('cursos', $this->Disciplina->Curso->find('list', array('fields' => array('id', 'nome'))));
	}

	public function delete($id){
		$this->Disciplina->delete($id);
	    $this->Flash->set('Disciplina apagado com sucesso!');
	    $this->redirect(array('action' => 'listar'));
	}	

}

?>