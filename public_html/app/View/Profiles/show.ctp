
<h2><?php echo('Профиль'); ?></h2>
<p><?php
	if($profile['Profile']['user_id'] == cakesession::read('user_id'))
	{
		echo $this->Html->link('Редактировать профиль', array('action' => 'edit', $profile['Profile']['id']));
	}
?></p>

<table class="table-bordered">
	<tr>
		<td>Пользователь:</td>
		<td><?= $profile['User']['name']?></td>
	</tr>
	<tr>
	    <td>ФИО:</td>
		<td><?= $profile['Profile']['fullname']?></td>
	</tr>
	<tr>
		<td>Заполнено бланков:</td>
		<td><?= $profile['Profile']['blanks_filled']?></td>
	</tr>
	<tr>
		<td>Возраст:</td>
		<td><?= $profile['Profile']['age']?></td>
	</tr>
	<tr>
		<td>Email:</td>
		<td><?= $profile['Profile']['email']?></td>
	</tr>
	<tr>
		<td>Пол:</td>
		<td><?php 
			switch ($profile['Profile']['sex']){
				case 'm': echo "М"; break;
				case 'w': echo "Ж"; break;
			}
		?></td>
	</tr>
	<tr>
		<td>Проживание:</td>
		<td><?php 
			switch ($profile['Profile']['loc']){
				case 1: echo "Общежитие"; break;
				case 2: echo "С родителями или собственной семьёй"; break;
				case 3: echo "Съёмная квартира"; break;
			}
		?></td>
	</tr>
	<tr>
		<td>Регион основного места жительства:</td>
		<td><?= $profile['Profile']['region']?></td>
	</tr>
	<tr>
		<td>Оценка собственного питания:</td>
		<td><?= $profile['Profile']['ration']?></td>
	</tr>
	<tr>
		<td>Рост:</td>
		<td><?= $profile['Profile']['growth']?></td>
	</tr>
	<tr>
		<td>Вес:</td>
		<td><?= $profile['Profile']['weight']?></td>
	</tr>
	<tr>
		<td>Жалобы:</td>
		<td><?= $profile['Profile']['complaints']?></td>
	</tr>
	<tr>
		<td>Объём талии (см):</td>
		<td><?= $profile['Profile']['waist']?></td>
	</tr>
	<tr>
		<td>Объём бёдер (см):</td>
		<td><?= $profile['Profile']['hips']?></td>
	</tr>
	<tr>
		<td>Окружность плеча (см):</td>
		<td><?= $profile['Profile']['shoulder']?></td>
	</tr>
</table>

<table class="table-bordered">
<tr>
	<td>№</td>
	<td>Продукт</td>
	<td>Число порций</td>
	<td>Частота</td>
</tr>
<?php

$blank = -1;

foreach($points as $point):
	if($point['Point']['blank_id'] != $blank)
	{ 
		$blank = $point['Point']['blank_id'];
		echo "<tr><td colspan=\"4\" class=\"blank_name\">$blank</td></tr>";
	} ?>

	<tr>
		<td><?= $point['Point']['number']?></td>
		<td><?= $point['Point']['title']?></td>
		<td><?= $point['Answer']['portnumb_value']?></td>
		<td><?= $point['Answer']['frequency_value']?></td>
	</tr>


<?php endforeach; ?>


</table>
