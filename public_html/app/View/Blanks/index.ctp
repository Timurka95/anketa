<div class="blanks index">
	<h2><?php echo __('Бланки'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th style="text-align: center; vertical-align: middle"><?php echo $this->Paginator->sort('ID'); ?></th>
			<th style="text-align: center; vertical-align: middle"><?php echo $this->Paginator->sort('Номер'); ?></th>
			<th style="text-align: center; vertical-align: middle"><?php echo $this->Paginator->sort('Наименование'); ?></th>
			<th class="actions" style="text-align: center; vertical-align: middle"><?php echo __('Действия'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($blanks as $blank): ?>
	<tr>
		<td style="text-align: center; vertical-align: middle"><?php echo h($blank['Blank']['id']); ?>&nbsp;</td>
		<td style="text-align: center; vertical-align: middle"><?php echo h($blank['Blank']['number']); ?>&nbsp;</td>
		<td><?php echo h($blank['Blank']['name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Просмотр'), array('action' => 'view', $blank['Blank']['id'])); ?>
			<?php echo $this->Html->link(__('Изменить'), array('action' => 'edit', $blank['Blank']['id'])); ?>
			<?php echo $this->Form->postLink(__('Удалить'), array('action' => 'delete', $blank['Blank']['id']), array('confirm' => __('Вы уверены, что хотите удалить бланк №%s?', $blank['Blank']['id']))); ?>
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
	<h3 style="text-align: center"><?php echo __('Действия'); ?></h3>
	<ul>
		<li style="text-align: center; vertical-align: middle"><?php echo $this->Html->link(__('Новый бланк'), array('action' => 'add')); ?></li>
		<li style="text-align: center; vertical-align: middle; font-size: 95%"><?php echo $this->Html->link(__('Список продуктов'), array('controller' => 'points', 'action' => 'index')); ?> </li>
		<li style="text-align: center; vertical-align: middle"><?php echo $this->Html->link(__('Новый продукт'), array('controller' => 'points', 'action' => 'add')); ?> </li>
	</ul>
</div>
