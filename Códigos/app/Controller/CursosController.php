<?php 

class CursosController extends AppController {

	public $helpers = array('Html' , 'Form');

	public function listar(){
		$cursos = $this->Curso->find('all');
		$this->set('cursos', $cursos);

		$admin = $this->Session->read('Admin');
		$this->set('admin', $admin);		
	}

	public function delete($id){
		$this->Curso->delete($id);
	    $this->Flash->set('curso apagado com sucesso!');
	    $this->redirect(array('action' => 'listar'));
	}	

	public function edit($id){
		$this->set('disciplinas', $this->Curso->Disciplina->find('list', array('fields' => array('id', 'nome'))));
		$admin = $this->Session->read('Admin');
		$this->set('admin', $admin);	

		$curso = $this->Curso->findById($id);
		$this->set('curso', $curso);
		if (empty($this->request->data)) {
			// Campos para edição
			$this->request->data = $this->Curso->findById($id);
			
			// debug($this->request->data);
		} else {
			// Atualizar os dados
			// debug($this->request->data);
			if ($this->Curso->save($this->request->data)) {
				$this->Flash->set('curso atualizado com sucesso!');
				$this->redirect(array('action' => 'listar'));
			}
		}
	}

	public function add(){
		if (!empty($this->request->data['Curso']['nome'])) {
			if ($this->Curso->save($this->request->data)) {
	    		$this->Flash->set('Cadastro realizado com sucesso!');
    			$this->redirect(array('action' => 'listar'));
	    		exit();
	    	}
		} else {
        	$this->redirect(array('action' => 'cadastrar'));
        	exit();
        }
	}

	public function cadastrar(){
		$admin = $this->Session->read('Admin');
		$this->set('admin', $admin);
	}

	public function detalhes_admin($id){
		$admin = $this->Session->read('Admin');
		$this->set('admin', $admin);

		$curso = $this->Curso->findById($id);
		$this->set('curso', $curso);

		$options['conditions'] = array(
		    'Curso.id' => $id
		);

		$disciplinas = $this->Curso->Disciplina->find('all', $options);
		$this->set('disciplinas', $disciplinas);
	}

}