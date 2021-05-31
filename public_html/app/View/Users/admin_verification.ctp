<?php
if($this->MyCookie->checkCookie('name'))
{

	echo "<p>Введите пароль: </p>";
	echo $this->Form->create('User', array('action' => 'adminVerification'));
	echo $this->Form->input('pass', array('label' => 'Пароль', 'type' => 'password'));
	echo $this->Form->end('ОК');

}

?>