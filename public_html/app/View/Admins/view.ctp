<?php if($answers){ ?>	
	<p>Ответы пользователя <b><?= $answers[0]['User']['name'] ?></b></p>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><a>Номер вопроса</a></th>
			<th><a>Текст вопроса</a></th>
			<th><a>Ответ пользователя</a></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($answers as $answer): ?>
	<tr>
		<td><?php echo $answer['Question']['number']; ?></td>
		<td><?php echo $answer['Question']['question']?></td>
		<td><?php echo h($answer['Answer']['answer']); ?></td>
	</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php }else {?>
	<p>Пользователь не ответил ни на один вопрос</p>
<?php }?>