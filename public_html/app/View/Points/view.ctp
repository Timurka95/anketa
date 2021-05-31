<div class="points view">
<h2><?php echo __('Продукт'); ?></h2>
<table cellpadding="0" cellspacing="0">
	<thead><tr>
		<td><?php echo __('Id'); ?></td>
		<td><?php echo __('Blank'); ?></td>
		<td><?php echo __('Number'); ?></td>
		<td><?php echo __('Title'); ?></td>
		<td><?php echo __('Portion'); ?></td>
		<td><?php echo __('Portnumb'); ?></td>
		<td><?php echo __('Frequency'); ?></td>
	</tr></thead>
	<tbody><tr>
		<td>
			<?php echo h($point['Point']['id']); ?>
			&nbsp;
		</td>
		<td>
			<?php echo $this->Html->link($point['Blank']['name'], array('controller' => 'blanks', 'action' => 'view', $point['Blank']['id'])); ?>
			&nbsp;
		</td>
		<td>
			<?php echo h($point['Point']['number']); ?>
			&nbsp;
		</td>
		<td>
			<?php echo h($point['Point']['title']); ?>
			&nbsp;
		</td>
		<td>
			<?php echo h($point['Point']['portion']); ?>
			&nbsp;
		</td>
		<td>
			<?php echo h($point['Point']['portnumb']); ?>
			&nbsp;
		</td>
		<td>
			<?php echo h($point['Point']['frequency']); ?>
			&nbsp;
		</td>
	</tr></tbody></table>
</div>
<div class="actions">
	<h3 style="text-align: center"><?php echo __('Действия'); ?></h3>
	<ul>
		<li style="text-align: center; vertical-align: middle"><?php echo $this->Html->link(__('Изменить'), array('action' => 'edit', $point['Point']['id'])); ?> </li>
		<li style="text-align: center; vertical-align: middle"><?php echo $this->Form->postLink(__('Удалить'), array('action' => 'delete', $point['Point']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $point['Point']['id']))); ?> </li>
		<li style="text-align: center; vertical-align: middle; font-size: 95%"><?php echo $this->Html->link(__('Список продуктов'), array('action' => 'index')); ?> </li>
		<li style="text-align: center; vertical-align: middle"><?php echo $this->Html->link(__('Новый продукт'), array('action' => 'add')); ?> </li>
		<li style="text-align: center; vertical-align: middle"><?php echo $this->Html->link(__('Список бланков'), array('controller' => 'blanks', 'action' => 'index')); ?> </li>
		<li style="text-align: center; vertical-align: middle"><?php echo $this->Html->link(__('Новый бланк'), array('controller' => 'blanks', 'action' => 'add')); ?> </li>
	</ul>
</div>
