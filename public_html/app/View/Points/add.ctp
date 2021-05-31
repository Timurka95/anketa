<div class="points form">
<?php echo $this->Form->create('Point'); ?>
	<fieldset>
		<legend><?php echo __('Новый продукт'); ?></legend>
	<?php
		echo $this->Form->input('blank_id', array('label' => 'Бланк', 'default' => 10));
		echo $this->Form->input('number', array('label' => 'Номер'));
		echo $this->Form->input('title', array('label' => 'Название'));
		echo $this->Form->input('portion', array('label' => 'Порция'));
		echo $this->Form->input('portnumb', array('label' => 'Число порций'));
		echo $this->Form->input('frequency', array('label' => 'Частота употребления'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Сохранить')); ?>
</div>
<div class="actions">
	<h3 style="text-align: center; vertical-align: middle"><?php echo __('Действия'); ?></h3>
	<ul>

		<li style="text-align: center; vertical-align: middle; font-size: 95%"><?php echo $this->Html->link(__('Список продуктов'), array('action' => 'index')); ?></li>
		<li style="text-align: center; vertical-align: middle"><?php echo $this->Html->link(__('Список бланков'), array('controller' => 'blanks', 'action' => 'index')); ?> </li>
		<li style="text-align: center; vertical-align: middle"><?php echo $this->Html->link(__('Новый бланк'), array('controller' => 'blanks', 'action' => 'add')); ?> </li>
	</ul>
</div>
