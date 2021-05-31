<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');

class PagesController extends AppController {

	public $uses = array();

	public function index(){
		if(CakeSession::check('name'))
		{
			$this->loadModel('User');
			$this->loadModel('Question');
			$this->loadModel('Profile');
			$this->loadModel('Blank');
			$this->loadModel('Point');
			
			if(!$profile = $this->Profile->find('first', array('conditions' => array('user_id' => CakeSession::read('user_id')))))
			{
				$this->redirect(array('controller' => 'profiles', 'action' => 'create'));
			}
			else
			{
				$nextBlank = $profile['Profile']['blanks_filled'] + 1;
				if($nextBlank > $this->Blank->find('count'))
				{
					$this->Flash->success('Вы ответили на все вопросы.');
					$this->redirect(array('controller' => 'profiles', 'action' => 'show', $profile['Profile']['id']));
				}
				else
				{
					$this->set('points', $this->Point->find('all', array('conditions' => array('blank_id' => $nextBlank))));
				}	
			}
		}
	}
}
