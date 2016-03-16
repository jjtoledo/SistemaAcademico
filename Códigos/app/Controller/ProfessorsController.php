<?php 

class ProfessorsController extends AppController {

	public $helpers = array('Html' , 'Form');

	public function afterFilter() {
        if ($this->action == 'listar' ||
        	$this->action == 'add_admin' ||
        	$this->action == 'edit_admin'  ||
        	$this->action == 'detalhes_admin') {
            $this->autenticarAdmin();
        } else if ($this->action != 'login_prof') {
        	$this->autenticarProf();
        }
    }

    public function autenticarAdmin(){
        
        if (!$this->Session->check('Admin')) {
            $this->redirect(array('controller' => 'admins',
                                    'action' => 'index_login'));
            exit();
        } 
    }

    public function autenticarProf(){
        
        if (!$this->Session->check('Professor')) {
            $this->redirect(array('controller' => 'professors',
                                    'action' => 'login_prof'));
            exit();
        } 
    }

	public function login_prof(){
		
	}

	public function add(){
		if (!empty($this->data['Professor']['nome'])) {	
			$this->request->data['Professor']['senha'] = md5($this->request->data['Professor']['senha']);		
			if ($this->Professor->save($this->request->data)) {
	    		$this->Flash->set('Cadastro realizado com sucesso!');
	    		if ($this->Session->Check('Admin')) {
	    			$this->redirect(array('action' => 'listar'));
	    		} else {
	    			$this->Session->write('Professor', $professor);
	    			$this->redirect(array('action' => 'meu_perfil'));
	    		}
	    	}
		} else {
        	$this->redirect(array('action' => 'cadastrar'));
        	exit();
        }
	}

	public function login(){
	    if (!empty($this->data['Professor']['email']) and
	    	!empty($this->data['Professor']['senha'])) {
	    	$professor = $this->validar();

	    	if ($professor != false) {
	    		$this->Session->write('Professor', $professor);

	    		$this->set('professor', $professor);
	    		$this->redirect(array('action' => 'area_prof'));
	    		exit();
	    	} else {
	    		$this->Flash->set('Login e/ou senha inválidos!');
	    		$this->redirect(array('action' => 'login_prof'));
	    		exit();
	    	}
	    } else {
	    	$this->redirect(array('action' => 'login_prof'));
	    	exit();
	    }
	}

	public function logout(){
    	$this->Session->destroy();
    	$this->redirect('login_prof');
    	exit();
    }

	public function validar(){
		$professor = $this->Professor->findAllByEmailAndSenha(
									$this->data['Professor']['email'],
									md5($this->data['Professor']['senha']));
		if (!empty($professor)) {
			return $professor;
		} else {
			return false;
		}
	}

	public function edit_admin($id){
		$admin = $this->Session->read('Admin');
		$this->set('admin', $admin);
		
		$professor = $this->Professor->findById($id);
		$this->set('professor', $professor);
		if (empty($this->request->data)) {
			// Campos para edição
			$this->request->data = $this->Professor->findById($id);
		} else {
			// Atualizar os dados
			if ($this->Professor->save($this->request->data)) {
				$this->Flash->set('Professor atualizado com sucesso!');
				$this->redirect(array('action' => 'listar'));
			}
		}
	}

	public function listar(){
		$professors = $this->Professor->find('all');
		$this->set('professors', $professors);

		$admin = $this->Session->read('Admin');
		$this->set('admin', $admin);		
	}

	public function add_admin(){
		$admin = $this->Session->read('Admin');
		$this->set('admin', $admin);	
	}

	public function delete($id){
		$this->Professor->delete($id);
	    $this->Flash->set('Professor apagado com sucesso!');
	    $this->redirect(array('action' => 'listar'));
	}

	public function area_prof() {
		$professor = $this->Session->read('Professor');
    	$professor = $this->Professor->findById($professor['0']['Professor']['id']);
		$this->set('professor', $professor);
	}

	public function meu_perfil() {
		$professor = $this->Session->read('Professor');
    	$professor = $this->Professor->findById($professor['0']['Professor']['id']);
		$this->set('professor', $professor);
	}

	public function edit_prof(){
		$professor = $this->Session->read('Professor');
		$this->set('professor', $professor);
		
		if (empty($this->request->data)) {
			// Campos para edição
			$this->request->data = $this->Professor->findById($professor['0']['Professor']['id']);
		} else {
			// Atualizar os dados
			if ($this->Professor->save($this->request->data)) {
				$this->Flash->set('Professor atualizado com sucesso!');
				$this->redirect(array('action' => 'meu_perfil'));
			}
		}
	}

	public function detalhes_admin($id){
		$admin = $this->Session->read('Admin');
		$this->set('admin', $admin);

		$professor = $this->Professor->findById($id);
		$this->set('professor', $professor);

		$options['conditions'] = array(
		    'Disciplina.professor_id' => $id
		);

		$disciplinas = $this->Professor->Disciplina->find('all', $options);
		$this->set('disciplinas', $disciplinas);
	}

	public function disciplinas(){
		$professor = $this->Session->read('Professor');
		$this->set('professor', $professor);

		$options['conditions'] = array(
		    'Disciplina.professor_id' => $professor['0']['Professor']['id']
		);

		$disciplinas = $this->Professor->Disciplina->find('all', $options);
		$this->set('disciplinas', $disciplinas);
	}	

	public function add_chamada($id){
		$professor = $this->Session->read('Professor');
		$this->set('professor', $professor);

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
		    'Disciplina.id' => $id
		);

		$alunos = $this->Professor->Disciplina->find('all', $options);
		$this->set('alunos', $alunos);
	}

	public function add_atividade($id){
		$professor = $this->Session->read('Professor');
		$this->set('professor', $professor);

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
		    'Disciplina.id' => $id
		);

		$alunos = $this->Professor->Disciplina->find('all', $options);
		$this->set('alunos', $alunos);
	}

	public function chamadas(){
		$professor = $this->Session->read('Professor');
		$this->set('professor', $professor);

		$options['conditions'] = array(
		    'Disciplina.professor_id' => $professor['0']['Professor']['id']
		);

		$disciplinas = $this->Professor->Disciplina->find('all', $options);
		$this->set('disciplinas', $disciplinas);
	}	
}

?>