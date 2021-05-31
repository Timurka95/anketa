<p>
	Список всех пользователей. 
	<?php echo $this->Html->link('(Экспортировать всё)', array('action' => 'overallcsv'))?>
</p>
<p style="text-align: right">
    <?php  echo $this->Html->link('Правка бланков', array('controller' => 'Blanks', 'action' => 'index'))?>
</p>

<table class="table-bordered" cellpadding="0" cellspacing="0">	
<thead>
<tr>
    <td width="150" style="text-align: center; vertical-align: middle">Пользователь</td>
	<td style="text-align: center; vertical-align: middle">ФИО</td>
	<td width="100" style="text-align: center; vertical-align: middle">Бланков заполнено</td>
	<td width="100" style="text-align: center; vertical-align: middle">Экспорт в Excel</td>
	<td width="100" style="text-align: center; vertical-align: middle">Удалить</td>
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
		if($user['Profile']['id']){
			echo $user['Profile']['fullname'];
		}
		else echo $user['Profile']['fullname'];
	?></td>
	<td style="text-align: center; vertical-align: middle"><?php 
		echo $user['Profile']['id'] ? $user['Profile']['blanks_filled'] : " - "; 
	?></td>
	<td style="text-align: center; vertical-align: middle"><?php
		//if($user['Profile']['blanks_filled'] == 10){ 
			echo $this->Html->link('Экспорт', array(
												'controller' => 'admins',
												'action' => 'createcsv',
												$user['User']['id']));
		//}
	?></td>
	<td style="text-align: center; vertical-align: middle"><?php echo $this->Form->postLink('Удалить', array('controller' => 'users', 'action' => 'delete', $user['User']['id']));?></td>
	
</tr>
<?php endforeach; ?>
</table>