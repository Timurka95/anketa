<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController {

	public $components = array('Paginator');

	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('The user has been saved.'));
				return $this->redirect($this->referer());
			} else {
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
			}
		}
	}
	
	public function logout()
	{
		$this->User->id = $id = CakeSession::read('user_id');
		$user = $this->User->findById($id);
		
		CakeSession::delete('user_id');
		CakeSession::delete('name');
		CakeSession::delete('answers');
		
		if($user['User']['authorised'] == 1){
			$this->User->save(array('authorised' => 0));
		}
		
		$this->redirect(array('controller' => 'pages', 'action' => 'index'));
	}
	
	public function adminVerification()
	{
		if($id = CakeSession::read('user_id'))
		{
			if ($this->request->is('post')) {
				$user = $this->User->findById($id);
				$pass = $user['User']['pass'];
				
				if(md5($this->request->data['User']['pass']) == $pass)
				{
					$this->User->id = $user['User']['id'];
					$this->User->save(array('authorised' => '1'));
					return $this->redirect(array('controller' => 'admins', 'action' => 'index'));
				}
				else 
				{
					$this->Flash->error('Неправильный пароль!');
				}
			}
		}
	}
	
	public function userVerificationPassword()
	{
		if($id = CakeSession::read('user_id'))
		{
			if ($this->request->is('post')) {
				$user = $this->User->findById($id);
				$pass = $user['User']['pass'];
				
				if(md5($this->request->data['User']['pass']) == $pass)
				{
				    $this->Flash->success(__('Теперь вы можете продолжить'));
					$this->User->id = $user['User']['id'];
					$this->User->save(array('authorised' => '1'));
					return $this->redirect(array('controller' => 'pages', 'action' => 'index'));
				}
				else 
				{
					$this->Flash->error('Неправильный пароль!');
				}
			}
		}
	}
	
	public function userPasswordCreating()
	{
	}
	
	public function userVerification()
	{
		if ($this->request->is('post')) 
		{
			$name = $this->request->data['User']['name'];
			CakeSession::write('name', $name);
			if($user = $this->User->findByName($name))
			{
				CakeSession::write('user_id', $user['User']['id']);
				if($user['User']['group_id'] == 2)
				{
				    $this->adminVerification();
				}
				else
				{
					$this->userVerificationPassword();
				}
			}
			else
			{
				$this->User->create();
				$pass = md5($this->request->data['User']['pass']);
				$this->request->data['User']['pass']=$pass;
				if ($this->User->save($this->request->data)) {
					$user = $this->User->findByName($name);
					
					CakeSession::write('user_id', $user['User']['id']);
					
					$this->Flash->success(__('Теперь вы можете перейти к заполнению профиля'));
					return $this->redirect(array('controller' => 'pages', 'action' => 'index'));
				} else {
					$this->Flash->error(__('Ошибка при регистрации. Пожалуйста, попробуйте еще раз.'));
				}
			}
		}
	}

	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
	}

	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Flash->success(__('Данные о пользователе успешно удалены.'));
		} else {
			$this->Flash->error(__('Не удалось удалить данные. Попробуйте ещё раз.'));
		}
    		return $this->redirect(array('controller' => 'admins', 'action' => 'index'));
	}
}
