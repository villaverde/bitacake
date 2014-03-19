<?php echo $this->Html->css('post');?>
<div class="posts index">
	<div>
		<table>
			<tr>
				<th>TITULO</th>
				<th  style="text-align:right;" colspan="2">ACCIONES</th>
			</tr>
			
		<?php foreach ($posts as $post): ?>
		<tr>
			<td><?php echo h($post['Post']['title']); ?></td>
			
			<td class="action">	<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'admin_delete', $post['Post']['id']), null, __('Are you sure you want to delete # %s?', $post['Post']['id'])); ?>
			</td>
			<td class="action"><?php echo $this->Html->link(__('Modificar'), array('action' => 'admin_edit', $post['Post']['id'])); ?></td>
		</tr>
		<?php endforeach; ?>
		</table>
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

