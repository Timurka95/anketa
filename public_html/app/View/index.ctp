<p>Список всех пользователей</p>

<table class="table-bordered" cellpadding="0" cellspacing="0">	
<thead>
<tr>
	<td>ФИО</td>
	<td width="100">Бланков заполнено</td>
	<td width="100">Создать csv</td>
</tr>
</thead>
<tbody>
<?php foreach ($users as $user):?>
<tr>
	<td><?php 
		if($user['Profile']['id']){
			echo $this->Html->link($user['User']['name'], array(
															'controller' => 'profiles',
															'action' => 'show',
															$user['Profile']['id']));
		}
		else echo $user['User']['name'];
	?></td>
	<td><?php 
		echo $user['Profile']['id'] ? $user['Profile']['blanks_filled'] : " - "; 
	?></td>
	<td>
		<?php
		if($user['Profile']['blanks_filled'] == 10){ 
			echo $this->Html->link('Создать csv', array(
												'controller' => 'admins',
												'action' => 'createcsv',
												$user['User']['id']));
		}
	?></td>
	
</tr>
<?php endforeach; ?>
</table>