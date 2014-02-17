<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Add User'); ?></legend>
	<?php
		//echo $this->Form->input('group_id');
		echo $this->Form->input('username',array('label' => 'Nombre de usuario'));
		echo $this->Form->input('Perfils.email', array('label' => 'Correo electronico'));
		echo $this->Form->input('password', array('label' => 'Clave'));
		echo $this->Form->input('repassword', array('label' => 'Repite la clave'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Perfils'), array('controller' => 'perfils', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Perfil'), array('controller' => 'perfils', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
	</ul>
</div>
