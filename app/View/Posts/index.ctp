<?php echo $this->Html->css('post');?>
<div class="posts index">
	<div>
		<?php foreach ($posts as $post): ?>
		<div class="titulo"><?php echo h($post['Post']['title']); ?></div>
		<div class="contenido">
			<?php echo substr(stripslashes($post['Post']['body']),0,72430); ?>
			<?php echo "<p class='noticia'>".$this->html->link('leer más...',array('controller'=>'posts','action'=>'view',$post['Post']['id']))."</p>"; ?>
		</div>
		<div class="action">
			<?php echo $this->Html->link(__('Modificar'), array('action' => 'edit', $post['Post']['id'])); ?>
			<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $post['Post']['id']), null, __('Are you sure you want to delete # %s?', $post['Post']['id'])); ?>
		</div>
		<div class="pie_post">
			Creado el 
			<span class="creado"><?php echo h($post['Post']['created']); ?></span>
			Modificado el
			<span class="modificado"><?php echo h($post['Post']['modified']); ?></span>
			Por
			<span class="user_post"><?php echo $this->Html->link($post['User']['username'], array('controller' => 'users', 'action' => 'view', $post['User']['id'])); ?></span>
		</div>
		<?php endforeach; ?>
	</div>

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

