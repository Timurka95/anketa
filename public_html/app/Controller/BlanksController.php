<?php
App::uses('AppController', 'Controller');
/**
 * Blanks Controller
 *
 * @property Blank $Blank
 * @property PaginatorComponent $Paginator
 */
class BlanksController extends AppController {

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
		$this->Blank->recursive = 0;
		$this->set('blanks', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Blank->exists($id)) {
			throw new NotFoundException(__('Недопустимый бланк'));
		}
		$options = array('conditions' => array('Blank.' . $this->Blank->primaryKey => $id));
		$this->set('blank', $this->Blank->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Blank->create();
			if ($this->Blank->save($this->request->data)) {
				$this->Flash->success(__('Бланк сохранен'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('Бланк не может быть сохранен, попробуйте еще раз'));
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
		if (!$this->Blank->exists($id)) {
			throw new NotFoundException(__('Недопустимый бланк'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Blank->save($this->request->data)) {
				$this->Flash->success(__('Бланк сохранен'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('Бланк не может быть сохранен, попробуйте еще раз'));
			}
		} else {
			$options = array('conditions' => array('Blank.' . $this->Blank->primaryKey => $id));
			$this->request->data = $this->Blank->find('first', $options);
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
		$this->Blank->id = $id;
		if (!$this->Blank->exists()) {
			throw new NotFoundException(__('Недопустимый бланк'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Blank->delete()) {
			$this->Flash->success(__('Бланк удален'));
		} else {
			$this->Flash->error(__('Бланк не может быть удален, попробуйте еще раз'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
