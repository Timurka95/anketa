<?php
App::uses('AppController', 'Controller');

class AdminsController extends AppController {

	public $components = array('Paginator');
	
	public function index(){
		if($this->checkAccess()){
			$this->loadModels();
			$this->set('users', $this->User->find('all', array('conditions' => array(
																'group_id' => 1))));
		}
	}
	
	public function view($id = null) {
		if ($this->checkAccess()) {
			$this->loadModels();
			if (!$this->User->exists($id)) {
				throw new NotFoundException(__('Invalid user'));
			}
			$this->set('answers', $this->Answer->find('all', array('conditions' => array('user_id' => $id))));
		}
	}
	
	private function loadModels()
	{
		$this->loadModel('Question');
		$this->loadModel('Answer');
		$this->loadModel('User');
		$this->LoadModel('Profile');
	}
	
	public function createcsv($user_id) {
		if ($this->checkAccess()){
			$this->loadModels();
			
			$user = $this->User->findById($user_id);
			$answers = $this->Answer->find('all', array('conditions' => array('user_id' => $user_id)));
			
			$data = array();
			$data[0] = array('Username','Email', '№ п/п', 'Пол', 'Группа ФА', 'Код норм', 'ФИО', 'Группа', 
						'1а', '2а', '3а', '4а', '5а', '6а', '7а', '8а', '9а', '10а',
						'11а', '12а', '13а', '14а', '15а', '16а', '17а', '18а', '19а', '20а',
						'21а', '22а', '23а', '24а', '25а', '26а', '27а', '28а', '29а', '30а',
						'31а', '32а', '33а', '34а', '35а', '36а', '37а', '38а', '39а', '40а',
						'41а', '42а', '43а', '44а', '45а', '46а', '47а', '48а', '49а', '50а',
						'51а', '52а', '53а', '54а', '55а', '56а', '57а', '58а', '59а', '60а',
						'61а', '62а', '63а', '64а', '65а', '66а', '67а',
						'1б', '2б', '3б', '4б', '5б', '6б', '7б', '8б', '9б', '10б',
						'11б', '12б', '13б', '14б', '15б', '16б', '17б', '18б', '19б', '20б',
						'21б', '22б', '23б', '24б', '25б', '26б', '27б', '28б', '29б', '30б',
						'31б', '32б', '33б', '34б', '35б', '36б', '37б', '38б', '39б', '40б',
						'41б', '42б', '43б', '44б', '45б', '46б', '47б', '48б', '49б', '50б',
						'51б', '52б', '53б', '54б', '55б', '56б', '57б', '58б', '59б', '60б',
						'61б', '62б', '63б', '64б', '65б', '66б', '67б',
						'Возраст', 'Проживание', 'Регион', 'Оценка питания', 'Рост', 'Вес',
						'Талия', 'Бедра', 'Окр плеча', 'Жалобы', 'Вит А', 'Вит В', 'Вит С',
						'Вит Д', 'Вит Е', 'Кальций', 'Железо', 'Клетч', 'Белок', 'Минералы',
				);
				
			$data[1] = $this->getCsvField($user, $answers);
			
			$body = "";
			foreach($data as $fields) {
				foreach($fields as $field){
					$body .= $field . ';';
				}
				$body .= "\r\n";
				$body = chr(239) . chr(187) . chr(191) . $body;
			}
			$name = 'user' . $user_id. '.csv';
			file_put_contents("files/$name", $body);
			
			$this->redirect(array('controller' => 'admins', 'action' => 'download', $name));
			
		}
		$this->redirect(array('controller' => 'admins', 'action' => 'index'));
	}
	
	function overallcsv()
	{
		if ($this->checkAccess())
		{
			$this->loadModels();
			
			$data[0] = array('Username','Email', '№ п/п', 'Пол', 'Группа ФА', 'Код норм', 'ФИО', 'Группа',
						'1а', '2а', '3а', '4а', '5а', '6а', '7а', '8а', '9а', '10а',
						'11а', '12а', '13а', '14а', '15а', '16а', '17а', '18а', '19а', '20а',
						'21а', '22а', '23а', '24а', '25а', '26а', '27а', '28а', '29а', '30а',
						'31а', '32а', '33а', '34а', '35а', '36а', '37а', '38а', '39а', '40а',
						'41а', '42а', '43а', '44а', '45а', '46а', '47а', '48а', '49а', '50а',
						'51а', '52а', '53а', '54а', '55а', '56а', '57а', '58а', '59а', '60а',
						'61а', '62а', '63а', '64а', '65а', '66а', '67а',
						'1б', '2б', '3б', '4б', '5б', '6б', '7б', '8б', '9б', '10б',
						'11б', '12б', '13б', '14б', '15б', '16б', '17б', '18б', '19б', '20б',
						'21б', '22б', '23б', '24б', '25б', '26б', '27б', '28б', '29б', '30б',
						'31б', '32б', '33б', '34б', '35б', '36б', '37б', '38б', '39б', '40б',
						'41б', '42б', '43б', '44б', '45б', '46б', '47б', '48б', '49б', '50б',
						'51б', '52б', '53б', '54б', '55б', '56б', '57б', '58б', '59б', '60б',
						'61б', '62б', '63б', '64б', '65б', '66б', '67б',
						'Возраст', 'Проживание', 'Регион', 'Оценка питания', 'Рост', 'Вес',
						'Талия', 'Бедра', 'Окр плеча', 'Жалобы', 'Вит А', 'Вит В', 'Вит С',
						'Вит Д', 'Вит Е', 'Кальций', 'Железо', 'Клетч', 'Белок', 'Минералы',
				);
				
			$profiles = $this->Profile->find('all', array('conditions'));// => array('blanks_filled' => 10)));
			
			foreach($profiles as $p)
			{
				$user_id = $p['Profile']['user_id'];
				$user = $this->User->findById($user_id);
				$answers = $this->Answer->find('all', array('conditions' => array('user_id' => $user_id)));
				
				$data[] = $this->getCsvField($user, $answers);
			}
			
			$body = "";
			foreach($data as $fields) {
				foreach($fields as $field){
					$body .= $field . ';';
				}
				$body .= "\r\n";
				//$body = chr(239) . chr(187) . chr(191) . $body;
			}
			$name = 'overall.csv';
			file_put_contents("files/$name", $body);
			
			$this->redirect(array('controller' => 'admins', 'action' => 'download', $name));
		}
		$this->redirect(array('controller' => 'admins', 'action' => 'index'));
	}
	
	function download($file){
		$this->response->file(WWW_ROOT. "files". DS . $file , array('download' => true, 'name' => $file));
		return $this->response;
	}
	
	private function getCsvField($user, $answers){
		$this->loadModels();
	
		$field = array();
		$field[] = $user['User']['name'];
		$field[] = $user['Profile']['email'];
		$field[] = '';
		$field[] = $user['Profile']['sex'];
		$field[] = $user['Profile']['group'];
		$field[] = $user['Profile']['blanks_filled'];
		$field[] = '';
		$field[] =  $user['Profile']['fullname'];
		
		$field[] = '';
		
		foreach($answers as $answer){
			$field[] = str_replace('.', ',', $answer['Answer']['portnumb_value']);
		}
		foreach($answers as $answer){
			$field[] = $answer['Answer']['frequency_value'];
		}
		
		$field[] = $user['Profile']['age'];
		$field[] = $user['Profile']['loc'];
		$field[] = $user['Profile']['region'];
		$field[] = $user['Profile']['ration'];
		$field[] = str_replace('.', ',', $user['Profile']['growth']);
		$field[] = $user['Profile']['weight'];
		$field[] = $user['Profile']['waist'];
		$field[] = $user['Profile']['hips'];
		$field[] = $user['Profile']['shoulder'];
		$field[] = $user['Profile']['complaints'];	
		
		return $field;
	}
	
	private function checkAccess()
	{
		$this->loadModel('User');
		if(CakeSession::check('user_id') && $this->User->exists(CakeSession::read('user_id')))
		{
			$user = $this->User->findById(CakeSession::read('user_id'));
			if($user['User']['group_id'] == 2 and $user['User']['authorised'] == 1)
			{
				return true;
			}
		}
		else return $this->redirect(array('controller' => 'users', 'action' => 'logout'));
		
	}
}