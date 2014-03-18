<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

	public function beforeFilter() {
		//Permitimos solo acceso libre al registro de usuarios
		$this->Auth->allow('register','login');
		$this->Auth->allow();
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$perfils = $this->User->Perfil->find('first');
		$groups = $this->User->Group->find('list');
		$this->set(compact('perfils', 'groups'));
	}

/**
 * index method
 *
 * @return void
 */ 
	public function index(){
		
	}

/**
 * admin_index method
 *
 * @return void
 */ 
	public function admin_index(){
		$group = $this->User->Group;
		$group->id = 1;
		//$this->Acl->allow($group, 'controllers');
		debug($group);
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * login method
 *
 * @return void
 */
	public function login(){
		if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirect());
            }
            $this->Session->setFlash(__('Tu usuario o clave es incorrecta'));
        }

	}


	public function admin_login() {
		return $this->redirect('/users/login');
	}

/**
 * logout method
 *
 * @return void
 */
	public function logout(){
		$this->redirect('/users/login');
	}
	
/**
 * regsiter method
 *
 * @return void
 */
	public function register() {
		if ($this->request->is('post')) {
			$options = array('conditions' => array('Group.name' => 'User'));
			$grupousers = $this->User->Group->find('first', $options);
			$this->User->create();
			$this->request->data['User']['group_id']= $grupousers['Group']['id'];
			if ($this->User->saveAll($this->request->data)) {
				$this->Session->setFlash(__('Gracias por registrarse.'));
				return $this->redirect(array('action' => 'login'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$perfils = $this->User->Perfil->find('list');
		$groups = $this->User->Group->find('list');
		$this->set(compact('perfils', 'groups'));
	}


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

	public function admin_view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

}
