<div class="profiles index">
	<h2><?php echo __('Profiles'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('age'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('sex'); ?></th>
			<th><?php echo $this->Paginator->sort('group'); ?></th>
			<th><?php echo $this->Paginator->sort('loc'); ?></th>
			<th><?php echo $this->Paginator->sort('region'); ?></th>
			<th><?php echo $this->Paginator->sort('ration'); ?></th>
			<th><?php echo $this->Paginator->sort('growth'); ?></th>
			<th><?php echo $this->Paginator->sort('weight'); ?></th>
			<th><?php echo $this->Paginator->sort('complaints'); ?></th>
			<th><?php echo $this->Paginator->sort('waist'); ?></th>
			<th><?php echo $this->Paginator->sort('hips'); ?></th>
			<th><?php echo $this->Paginator->sort('shoulder'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($profiles as $profile): ?>
	<tr>
		<td><?php echo h($profile['Profile']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($profile['User']['name'], array('controller' => 'users', 'action' => 'view', $profile['User']['id'])); ?>
		</td>
		<td><?php echo h($profile['Profile']['age']); ?>&nbsp;</td>
		<td><?php echo h($profile['Profile']['email']); ?>&nbsp;</td>
		<td><?php echo h($profile['Profile']['sex']); ?>&nbsp;</td>
		<td><?php echo h($profile['Profile']['group']); ?>&nbsp;</td>
		<td><?php echo h($profile['Profile']['loc']); ?>&nbsp;</td>
		<td><?php echo h($profile['Profile']['region']); ?>&nbsp;</td>
		<td><?php echo h($profile['Profile']['ration']); ?>&nbsp;</td>
		<td><?php echo h($profile['Profile']['growth']); ?>&nbsp;</td>
		<td><?php echo h($profile['Profile']['weight']); ?>&nbsp;</td>
		<td><?php echo h($profile['Profile']['complaints']); ?>&nbsp;</td>
		<td><?php echo h($profile['Profile']['waist']); ?>&nbsp;</td>
		<td><?php echo h($profile['Profile']['hips']); ?>&nbsp;</td>
		<td><?php echo h($profile['Profile']['shoulder']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $profile['Profile']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $profile['Profile']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $profile['Profile']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $profile['Profile']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Profile'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
