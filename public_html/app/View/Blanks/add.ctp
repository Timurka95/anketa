<div class="blanks form">
<?php echo $this->Form->create('Blank'); ?>
	<fieldset>
		<legend><?php echo __('Новый бланк'); ?></legend>
	<?php
		echo $this->Form->input('number', array('label' => 'Номер'));
		echo $this->Form->input('name', array('label' => 'Наименование'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Сохранить')); ?>
</div>
<div class="actions">
	<h3 style="text-align: center"><?php echo __('Действия'); ?></h3>
	<ul>

		<li style="text-align: center; vertical-align: middle"><?php echo $this->Html->link(__('Список бланков'), array('action' => 'index')); ?></li>
		<li style="text-align: center; vertical-align: middle; font-size: 95%"><?php echo $this->Html->link(__('Список продуктов'), array('controller' => 'points', 'action' => 'index')); ?> </li>
		<li style="text-align: center; vertical-align: middle"><?php echo $this->Html->link(__('Новый продукт'), array('controller' => 'points', 'action' => 'add')); ?> </li>
	</ul>
</div>
