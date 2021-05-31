<?php
if($this->MyCookie->checkCookie('name'))
{

    echo "<p>Повторите попытку: </p>";
	echo $this->Form->create('User', array('action' => 'userVerification'));
	echo $this->Form->input('name', array('label' => 'Логин'));
	echo $this->Form->input('pass', array('label' => 'Пароль', 'type' => 'password'));
	echo $this->Form->end('ОК');

}
?>
