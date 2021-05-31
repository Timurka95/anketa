<div class="points index">
	<h2><?php echo __('Продукты'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th style="text-align: center; vertical-align: middle"><?php echo $this->Paginator->sort('id', 'ID'); ?></th>
			<th style="text-align: center; vertical-align: middle"><?php echo $this->Paginator->sort('blank_id','ID Бланка'); ?></th>
			<th style="text-align: center; vertical-align: middle"><?php echo $this->Paginator->sort('number', 'Номер'); ?></th>
			<th style="text-align: center; vertical-align: middle"><?php echo $this->Paginator->sort('title', 'Название'); ?></th>
			<th style="text-align: center; vertical-align: middle"><?php echo $this->Paginator->sort('portion', 'Порция'); ?></th>
			<th style="text-align: center; vertical-align: middle"><?php echo $this->Paginator->sort('portnumb', 'Число порций'); ?></th>
			<th style="text-align: center; vertical-align: middle"><?php echo $this->Paginator->sort('frequency', 'Частота употребления'); ?></th>
			<th class="actions" style="text-align: center; vertical-align: middle"><?php echo __('Действия'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($points as $point): ?>
	<tr>
		<td style="text-align: center; vertical-align: middle"><?php echo h($point['Point']['id']); ?>&nbsp;</td>
		<td style="text-align: center; vertical-align: middle">
			<?php echo $this->Html->link($point['Blank']['name'], array('controller' => 'blanks', 'action' => 'view', $point['Blank']['id'])); ?>
		</td>
		<td style="text-align: center; vertical-align: middle"><?php echo h($point['Point']['number']); ?>&nbsp;</td>
		<td style="text-align: center; vertical-align: middle"><?php echo h($point['Point']['title']); ?>&nbsp;</td>
		<td style="text-align: center; vertical-align: middle"><?php echo h($point['Point']['portion']); ?>&nbsp;</td>
		<td style="text-align: center; vertical-align: middle"><?php echo h($point['Point']['portnumb']); ?>&nbsp;</td>
		<td style="text-align: center; vertical-align: middle"><?php echo h($point['Point']['frequency']); ?>&nbsp;</td>
		<td class="actions" style="text-align: center; vertical-align: middle">
			<?php echo $this->Html->link(__('Просмотр'), array('action' => 'view', $point['Point']['id'])); ?>
			<?php echo $this->Html->link(__('Изменить'), array('action' => 'edit', $point['Point']['id'])); ?>
			<?php echo $this->Form->postLink(__('Удалить'), array('action' => 'delete', $point['Point']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $point['Point']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Страница {:page} из {:pages}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('предыдущая'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('следующая') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3 style="text-align: center; vertical-align: middle"><?php echo __('Действия'); ?></h3>
	<ul>
		<li style="text-align: center; vertical-align: middle"><?php echo $this->Html->link(__('Новый продукт'), array('action' => 'add')); ?></li>
		<li style="text-align: center; vertical-align: middle"><?php echo $this->Html->link(__('Список бланков'), array('controller' => 'blanks', 'action' => 'index')); ?> </li>
		<li style="text-align: center; vertical-align: middle"><?php echo $this->Html->link(__('Новый бланк'), array('controller' => 'blanks', 'action' => 'add')); ?> </li>
	</ul>
</div>
