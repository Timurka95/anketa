<?php
App::uses('AppController', 'Controller');
/**
 * Profiles Controller
 *
 * @property Profile $Profile
 * @property PaginatorComponent $Paginator
 */
class ProfilesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	
	

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Profile->recursive = 0;
		$this->set('profiles', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Profile->exists($id)) {
			throw new NotFoundException(__('Invalid profile'));
		}
		$options = array('conditions' => array('Profile.' . $this->Profile->primaryKey => $id));
		$this->set('profile', $this->Profile->find('first', $options));
	}
	
	public function show($id = null) {
		if (!$this->Profile->exists($id)) {
			throw new NotFoundException(__('Invalid profile'));
		}
		$this->loadModel('User');
		$this->loadModel('Answer');
		
		$profile = $this->Profile->findById($id);
		$user = $this->User->findById(CakeSession::read('user_id'));
		if($user['User']['id'] == $profile['Profile']['user_id'] or ($user['User']['group_id'] == 2))
		{
			$options = array('conditions' => array('Profile.' . $this->Profile->primaryKey => $id));
			$this->set('profile', $this->Profile->find('first', $options));
			$options = array('order' => 'Point.number', 'conditions' => array('user_id' => $profile['Profile']['user_id']));
			$this->set('points', $this->Answer->find('all', $options));
		}
		else
		{
			$this->redirect(array('controller' => 'users', 'action' => 'logout'));
		}
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Profile->create();
			if ($this->Profile->save($this->request->data)) {
				$this->Flash->success(__('The profile has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The profile could not be saved. Please, try again.'));
			}
		}
		$users = $this->Profile->User->find('list');
		$this->set(compact('users'));
	}
	
	public function create() {
		if ($this->request->is('post')) {
			$this->Profile->create();
			if ($this->Profile->save($this->request->data)) {
				$this->Flash->success(__('Ваш профиль успешно сохранен.'));
				return $this->redirect(array('controller' => 'pages', 'action' => 'index'));
			} else {
				$this->Flash->error(__('Не удалось сохранить профиль. Попробуйте еще раз.'));
			}
		}
	}
	

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		
		$this->loadModel('User');
		
		$profile = $this->Profile->findById($id);
		$user = $this->User->findById(CakeSession::read('user_id'));
		
		if($user['User']['id'] == $profile['Profile']['user_id'])
		{	
		if (!$this->Profile->exists($id)) 
		{
			throw new NotFoundException(__('Invalid profile'));
		}
		if ($this->request->is(array('post', 'put')))
		{
			$this->Profile->id = $id;
			if ($this->Profile->save($this->request->data)) 
			{
				$this->Flash->success(__('Профиль успешно сохранён.'));
				return $this->redirect(array('controller' => 'pages', 'action' => 'index'));
			} else 
			{
				$this->Flash->error(__('Не удалось сохранить профиль. Попробуйте ещё раз.'));
			}
		} 
		else
		{
			$profile = $this->Profile->findById($id);
			$this->set('profile', $profile);
		}
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Profile->id = $id;
		if (!$this->Profile->exists()) {
			throw new NotFoundException(__('Invalid profile'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Profile->delete()) {
			$this->Flash->success(__('The profile has been deleted.'));
		} else {
			$this->Flash->error(__('The profile could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
