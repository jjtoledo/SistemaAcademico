<?php 

class AlunosController extends AppController {

	public $helpers = array('Html' , 'Form');
	public $components = array('Flash');

	public function afterFilter() {
        if ($this->action == 'listar' ||
        	$this->action == 'add_admin' ||
        	$this->action == 'edit_admin' ||
        	$this->action == 'detalhes_admin') {
            $this->autenticarAdmin();
        } else if ($this->action != 'login_aluno') {
        	$this->autenticarAluno();
        }
    }

    public function autenticarAdmin(){
        
        if (!$this->Session->check('Admin')) {
            $this->redirect(array('controller' => 'admins',
                                    'action' => 'index_login'));
            exit();
        } 
    }

    public function autenticarAluno(){
        
        if (!$this->Session->check('Aluno')) {
            $this->redirect(array('controller' => 'alunos',
                                    'action' => 'login_aluno'));
            exit();
        } 
    }

	public function index() {
		
	}

	public function login(){
	    if (!empty($this->data['Aluno']['email']) and
	    	!empty($this->data['Aluno']['senha'])) {
	    	$aluno = $this->validar();

	    	if ($aluno != false) {
	    		$this->Session->write('Aluno', $aluno);

	    		$this->set('aluno', $aluno);
	    		$this->redirect(array('action' => 'home_aluno'));
	    		exit();
	    	} else {
	    		$this->Flash->set('Login e/ou senha inválidos!');
	    		$this->redirect(array('action' => 'login_aluno'));
	    		exit();
	    	}
	    } else {
	    	$this->redirect(array('action' => 'login_aluno'));
	    	exit();
	    }
	}

	public function validar(){
		$aluno = $this->Aluno->findAllByEmailAndSenha(
									$this->data['Aluno']['email'],
									md5($this->data['Aluno']['senha']));
		if (!empty($aluno)) {
			return $aluno;
		} else {
			return false;
		}
	}

	public function add(){
		$admin = $this->Session->read('Admin');
		$this->set('admin', $admin);		
		
		if (!empty($this->request->data['Aluno']['matricula'])) {
			$this->request->data['Aluno']['senha'] = md5($this->request->data['Aluno']['senha']);			
			if ($this->Aluno->save($this->request->data)) {
	    		$this->Flash->set('Cadastro realizado com sucesso!');

	    		if ($this->Session->Check('Admin')) {
	    			$this->redirect(array('action' => 'listar'));
	    		} else {
	    			$this->Session->write('Aluno', $this->request->data);
	    			$this->redirect(array('action' => 'login_aluno'));
	    		}

	    		exit();
	    	}
		} else {
        	$this->redirect(array('action' => 'cadastrar'));
        	exit();
        }
	}

	public function login_aluno(){
		
	}

	public function edit_admin($id){
		$admin = $this->Session->read('Admin');
		$this->set('admin', $admin);		

		$this->set('cursos', $this->Aluno->Curso->find('list', array('fields' => array('id', 'nome'))));

		$this->set('disciplinas', $this->Aluno->Disciplina->find('list', array('fields' => array('id', 'nome'))));
		
		$aluno = $this->Aluno->findById($id);
		$this->set('aluno', $aluno);
		if (empty($this->request->data)) {
			// Campos para edição
			$this->request->data = $this->Aluno->findById($id);
		} else {
			// Atualizar os dados
			if ($this->Aluno->save($this->request->data)) {
				$this->Flash->set('Aluno atualizado com sucesso!');
				$this->redirect(array('action' => 'listar'));
			}
		}
	}

	public function listar(){
		$alunos = $this->Aluno->find('all');
		$this->set('alunos', $alunos);

		$admin = $this->Session->read('Admin');
		$this->set('admin', $admin);		
	}

	public function add_admin(){
		$admin = $this->Session->read('Admin');
		$this->set('admin', $admin);		
		$this->set('cursos', $this->Aluno->Curso->find('list', array('fields' => array('id', 'nome'))));

		$this->set('disciplinas', $this->Aluno->Disciplina->find('list', array('fields' => array('id', 'nome'))));
	}

	public function delete($id){
		$this->Aluno->delete($id);
	    $this->Flash->set('Aluno apagado com sucesso!');
	    if ($this->Session->Check('Admin')) {
			$this->redirect(array('action' => 'listar'));
		} else {
			$this->redirect(array('action' => 'cadastrar'));
		}
	}	

	public function home_aluno(){
		$aluno = $this->Session->read('Aluno');
		$this->set('aluno', $aluno);

		$options['joins'] = array(
		    array('table' => 'alunos_disciplinas',
		        'alias' => 'AlunosDisciplina',
		        'type' => 'LEFT',
		        'conditions' => array(
		            'Disciplina.id = AlunosDisciplina.disciplina_id'
	        	)
	        ),
		    array('table' => 'alunos',
		        'alias' => 'Aluno',
		        'type' => 'left',
		        'conditions' => array(
		            'AlunosDisciplina.aluno_id = Aluno.id'
		        )
		    )
		);

		$options['conditions'] = array(
		    'Aluno.id' => $aluno['0']['Aluno']['id']
		);

		$disciplinas = $this->Aluno->Disciplina->find('all', $options);
		$this->set('disciplinas', $disciplinas);
	}

	public function logout(){
    	$this->Session->destroy();
    	$this->redirect('login_aluno');
    	exit();
    }

    public function meu_perfil(){
    	$aluno = $this->Session->read('Aluno');
    	$aluno = $this->Aluno->findById($aluno['0']['Aluno']['id']);
		$this->set('aluno', $aluno);
		$this->set('cursos', $this->Aluno->Curso->findById($aluno['Aluno']['curso_id']));	
    }

    public function editar(){
		$this->set('cursos', $this->Aluno->Curso->find('list', array('fields' => array('id', 'nome'))));
		
		$aluno = $this->Session->read('Aluno');
		$this->set('aluno', $aluno);
		if (empty($this->request->data)) {
			// Campos para edição
			$this->request->data = $this->Aluno->findById($aluno['0']['Aluno']['id']);
		} else {
			// Atualizar os dados
			if ($this->Aluno->save($this->request->data)) {
				$this->Flash->set('Aluno atualizado com sucesso!');
				$this->redirect(array('action' => 'meu_perfil'));
			}
		}
	}

	public function detalhes_admin($id){
		$admin = $this->Session->read('Admin');
		$this->set('admin', $admin);

		$aluno = $this->Aluno->findById($id);
		$this->set('aluno', $aluno);

		$curso = $this->Aluno->Curso->findById($aluno['Aluno']['curso_id']);
		$this->set('curso', $curso);

		$options['joins'] = array(
		    array('table' => 'alunos_disciplinas',
		        'alias' => 'AlunosDisciplina',
		        'type' => 'LEFT',
		        'conditions' => array(
		            'Disciplina.id = AlunosDisciplina.disciplina_id'
	        	)
	        ),
		    array('table' => 'alunos',
		        'alias' => 'Aluno',
		        'type' => 'left',
		        'conditions' => array(
		            'AlunosDisciplina.aluno_id = Aluno.id'
		        )
		    )
		);

		$options['conditions'] = array(
		    'Aluno.id' => $id
		);

		$disciplinas = $this->Aluno->Disciplina->find('all', $options);
		$this->set('disciplinas', $disciplinas);
	}

	public function disciplinas(){
		$aluno = $this->Session->read('Aluno');
		$this->set('aluno', $aluno);

		$options['joins'] = array(
		    array('table' => 'alunos_disciplinas',
		        'alias' => 'AlunosDisciplina',
		        'type' => 'LEFT',
		        'conditions' => array(
		            'Disciplina.id = AlunosDisciplina.disciplina_id'
	        	)
	        ),
		    array('table' => 'alunos',
		        'alias' => 'Aluno',
		        'type' => 'left',
		        'conditions' => array(
		            'AlunosDisciplina.aluno_id = Aluno.id'
		        )
		    )
		);

		$options['conditions'] = array(
		    'Aluno.id' => $aluno['0']['Aluno']['id']
		);

		$disciplinas = $this->Aluno->Disciplina->find('all', $options);
		$this->set('disciplinas', $disciplinas);

	}

	public function frequencias(){
		$aluno = $this->Session->read('Aluno');
		$this->set('aluno', $aluno);

		$options['joins'] = array(
		    array('table' => 'alunos_disciplinas',
		        'alias' => 'AlunosDisciplina',
		        'type' => 'LEFT',
		        'conditions' => array(
		            'Disciplina.id = AlunosDisciplina.disciplina_id'
	        	)
	        ),
		    array('table' => 'alunos',
		        'alias' => 'Aluno',
		        'type' => 'left',
		        'conditions' => array(
		            'AlunosDisciplina.aluno_id = Aluno.id'
		        )
		    )
		);

		$options['conditions'] = array(
		    'Aluno.id' => $aluno['0']['Aluno']['id']
		);

		$disciplinas = $this->Aluno->Disciplina->find('all', $options);
		$this->set('disciplinas', $disciplinas);

		$optionsFrequencias['conditions'] = array(
		    'Aluno.id' => $aluno['0']['Aluno']['id']
		);

		$frequencias = $this->Aluno->Frequencia->find('all', $optionsFrequencias);
		$this->set('frequencias', $frequencias);
	}

	public function notas(){
		$aluno = $this->Session->read('Aluno');
		$this->set('aluno', $aluno);

		$options['joins'] = array(
		    array('table' => 'alunos_disciplinas',
		        'alias' => 'AlunosDisciplina',
		        'type' => 'LEFT',
		        'conditions' => array(
		            'Disciplina.id = AlunosDisciplina.disciplina_id'
	        	)
	        ),
		    array('table' => 'alunos',
		        'alias' => 'Aluno',
		        'type' => 'left',
		        'conditions' => array(
		            'AlunosDisciplina.aluno_id = Aluno.id'
		        )
		    )
		);

		$options['conditions'] = array(
		    'Aluno.id' => $aluno['0']['Aluno']['id']
		);

		$disciplinas = $this->Aluno->Disciplina->find('all', $options);
		$this->set('disciplinas', $disciplinas);

		$optionsNotas['conditions'] = array(
		    'Aluno.id' => $aluno['0']['Aluno']['id']
		);

		$notas = $this->Aluno->Atividade->find('all', $optionsNotas);
		$this->set('notas', $notas);
	}

}

?>