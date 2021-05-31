<div class="profiles view">
<h2><?php echo __('Profile'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($profile['User']['name'], array('controller' => 'users', 'action' => 'view', $profile['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Age'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['age']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sex'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['sex']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Group'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['group']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Loc'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['loc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Region'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['region']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ration'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['ration']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Growth'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['growth']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Weight'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['weight']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Complaints'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['complaints']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Waist'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['waist']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hips'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['hips']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Shoulder'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['shoulder']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Profile'), array('action' => 'edit', $profile['Profile']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Profile'), array('action' => 'delete', $profile['Profile']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $profile['Profile']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Profiles'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Profile'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
