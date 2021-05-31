<?php
App::uses('AppController', 'Controller');
/**
 * Points Controller
 *
 * @property Point $Point
 * @property PaginatorComponent $Paginator
 */
class PointsController extends AppController {

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
		$this->Point->recursive = 0;
		$this->set('points', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Point->exists($id)) {
			throw new NotFoundException(__('Invalid point'));
		}
		$options = array('conditions' => array('Point.' . $this->Point->primaryKey => $id));
		$this->set('point', $this->Point->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Point->create();
			if ($this->Point->save($this->request->data)) {
				$this->Flash->success(__('The point has been saved.'));
				return $this->redirect(array('action' => 'add'));
			} else {
				$this->Flash->error(__('The point could not be saved. Please, try again.'));
			}
		}
		$blanks = $this->Point->Blank->find('list');
		$this->set(compact('blanks'));
	}

	public function saveset(){
		if ($this->request->is('post')) {
			
			$this->loadModel('Answer');
			$this->loadModel('Profile');
			
			
			$count = $this->Point->find('all', array('conditions' => array('blank_id' => $this->request->data['Point']['blank_id'])));
			$count = count($count);
			$data = array();
			for($i = 0; $i < $count; $i++){
				
				$data['user_id'] = $this->request->data['Point']['user_id'];
				$data['point_id'] = $this->request->data['Point']["point_id$i"];
				$data['portnumb_value'] = $this->request->data['Point']["portnumb$i"];
				$data['frequency_value'] = $this->request->data['Point']["freq$i"];
				
				if($data['portnumb_value'] == 0 && $data['frequency_value'] > 1){
					$this->Flash->error(__('Если Вы указали частоту потребления "Не употребляется", то число порций должно быть равно 0'));
					break;
				}
				if($data['portnumb_value'] > 0 && $data['frequency_value'] == 1){
					$this->Flash->error(__('Если Вы указали число порций равным 0, то частота потребления должна быть отмечена в "Не употребляется"'));
					break;
				}
				
				if($answ = $this->Answer->find('first', array('conditions' => array('user_id' => $data['user_id'], 'point_id' => $data['point_id']))))
				{
					$this->Answer->id = $answ['Answer']['id'];
				}
				else $this->Answer->create();
				
				if(!$this->Answer->save($data))
				{
					$this->Flash->error(__('Где-то ошибка'));
					break;
				}
			}
			
			if($i  == $count)
			{	
				$profile = $this->Profile->find('first', array('conditions' => array('user_id' => $this->request->data['Point']['user_id'])));
				$this->Profile->id = $profile['Profile']['id'];
				$this->Profile->save(array('blanks_filled' => $profile['Profile']['blanks_filled'] + 1));
				$this->Flash->success("Ваш ответ сохранён!");
			}
			
			$this->redirect(array('controller' => 'pages', 'action' => 'index'));
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
		if (!$this->Point->exists($id)) {
			throw new NotFoundException(__('Invalid point'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Point->save($this->request->data)) {
				$this->Flash->success(__('The point has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The point could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Point.' . $this->Point->primaryKey => $id));
			$this->request->data = $this->Point->find('first', $options);
		}
		$blanks = $this->Point->Blank->find('list');
		$this->set(compact('blanks'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Point->id = $id;
		if (!$this->Point->exists()) {
			throw new NotFoundException(__('Invalid point'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Point->delete()) {
			$this->Flash->success(__('The point has been deleted.'));
		} else {
			$this->Flash->error(__('The point could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
