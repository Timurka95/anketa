<div class="profiles form">
<?php echo $this->Form->create('Profile'); ?>
	<fieldset>
		<legend><?php echo __('Add Profile'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('age');
		echo $this->Form->input('email');
		echo $this->Form->input('sex');
		echo $this->Form->input('group');
		echo $this->Form->input('loc');
		echo $this->Form->input('region');
		echo $this->Form->input('ration');
		echo $this->Form->input('growth');
		echo $this->Form->input('weight');
		echo $this->Form->input('complaints');
		echo $this->Form->input('waist');
		echo $this->Form->input('hips');
		echo $this->Form->input('shoulder');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Profiles'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
