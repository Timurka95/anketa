<div class="blanks view">
<h2><?php echo __('Бланк'); ?></h2>
<table cellpadding="0" cellspacing="0">
	<thead><tr>
		<td><?php echo __('ID'); ?></td>
		<td><?php echo __('Номер'); ?></td>
		<td><?php echo __('Наименование'); ?></td>
	</tr></thead>
	<tbody><tr>
		<td>
			<?php echo h($blank['Blank']['id']); ?>
			&nbsp;
		</td>
		<td>
			<?php echo h($blank['Blank']['number']); ?>
			&nbsp;
		</td>
		<td>
			<?php echo h($blank['Blank']['name']); ?>
			&nbsp;
		</td>
	</tr></tbody></table>
</div>
<div class="actions">
	<h3 style="text-align: center"><?php echo __('Действия'); ?></h3>
	<ul>
		<li style="text-align: center; vertical-align: middle"><?php echo $this->Html->link(__('Изменить бланк'), array('action' => 'edit', $blank['Blank']['id'])); ?> </li>
		<li style="text-align: center; vertical-align: middle"><?php echo $this->Form->postLink(__('Удалить бланк'), array('action' => 'delete', $blank['Blank']['id']), array('confirm' => __('Вы уверены, что хотите удалить бланк №%s?', $blank['Blank']['id']))); ?> </li>
		<li style="text-align: center; vertical-align: middle"><?php echo $this->Html->link(__('Список бланков'), array('action' => 'index')); ?> </li>
		<li style="text-align: center; vertical-align: middle"><?php echo $this->Html->link(__('Новый бланк'), array('action' => 'add')); ?> </li>
		<li style="text-align: center; vertical-align: middle; font-size: 95%"><?php echo $this->Html->link(__('Список продуктов'), array('controller' => 'points', 'action' => 'index')); ?> </li>
		<li style="text-align: center; vertical-align: middle"><?php echo $this->Html->link(__('Новый продукт'), array('controller' => 'points', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Продукты в этой категории'); ?></h3>
	<?php if (!empty($blank['Point'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th style="text-align: center; vertical-align: middle"><?php echo __('ID'); ?></th>
		<th style="text-align: center; vertical-align: middle"><?php echo __('ID Бланка'); ?></th>
		<th style="text-align: center; vertical-align: middle"><?php echo __('Номер'); ?></th>
		<th style="text-align: center; vertical-align: middle"><?php echo __('Название'); ?></th>
		<th style="text-align: center; vertical-align: middle"><?php echo __('Порция'); ?></th>
		<th style="text-align: center; vertical-align: middle"><?php echo __('Число порций'); ?></th>
		<th style="text-align: center; vertical-align: middle"><?php echo __('Частота употребления'); ?></th>
		<th class="actions" style="text-align: center; vertical-align: middle"><?php echo __('Действия'); ?></th>
	</tr>
	<?php foreach ($blank['Point'] as $point): ?>
		<tr>
			<td style="text-align: center; vertical-align: middle"><?php echo $point['id']; ?></td>
			<td style="text-align: center; vertical-align: middle"><?php echo $point['blank_id']; ?></td>
			<td style="text-align: center; vertical-align: middle"><?php echo $point['number']; ?></td>
			<td style="text-align: center; vertical-align: middle"><?php echo $point['title']; ?></td>
			<td style="text-align: center; vertical-align: middle"><?php echo $point['portion']; ?></td>
			<td style="text-align: center; vertical-align: middle"><?php echo $point['portnumb']; ?></td>
			<td style="text-align: center; vertical-align: middle"><?php echo $point['frequency']; ?></td>
			<td class="actions" style="text-align: center; vertical-align: middle">
				<?php echo $this->Html->link(__('Просмотр'), array('controller' => 'points', 'action' => 'view', $point['id'])); ?>
				<?php echo $this->Html->link(__('Изменить'), array('controller' => 'points', 'action' => 'edit', $point['id'])); ?>
				<?php echo $this->Form->postLink(__('Удалить'), array('controller' => 'points', 'action' => 'delete', $point['id']), array('confirm' => __('Are you sure you want to delete # %s?', $point['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li style="text-align: center; vertical-align: middle"><?php echo $this->Html->link(__('Новый продукт'), array('controller' => 'points', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
