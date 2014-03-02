<?php echo $this->Html->css('post');?>
<div class="posts view">
<h2><?php echo h($post['Post']['title']); ?></h2>
	
		<div id='contenido_post'>
		
			<?php echo stripslashes($post['Post']['body']); ?>
			&nbsp;
		
		<p>
			<?php echo __('Publicado por '); ?>
			<?php echo $this->Html->link($post['User']['username'], array('controller' => 'users', 'action' => 'view', $post['User']['id'])); ?>
			<?php echo __(' el ');
			echo h($post['Post']['created']); ?>
			&nbsp;
		<span class="modify_post"><?php echo __('Modificado el'); ?>
			<?php echo h($post['Post']['modified']); ?></span>
			&nbsp;
		</p>

</div>

<!--//comentarios-->

<div class="comments">
<?php echo $this->Form->create('Comment'); ?>

	<?php
		echo $this->Form->input('user_id',array('type'=>'hidden'));
		echo $this->Form->input('post_id',array('type'=>'hidden','value'=>$post['Post']['id']));
		echo $this->Form->input('title',array('type'=>'hidden'));
        echo $this->tinyMce->input('Comment.comment', array(
            'label' => 'Comentario'
            ),array(
                'language'=>'en'
            ),
            'simple' );
	?>

<?php echo $this->Form->end(__('Comentar')); ?>
</div>


<div class="related">
	<?php 
		$i = 0;
		foreach ($post['Comment'] as $comment): 
			$i++;
		endforeach; 
	?>
	<h3><?php echo $i.' Comentarios'; ?></h3>
	<?php if (!empty($post['Comment'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<!--<tr>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Comment'); ?></th>
		<th><?php echo __('Created'); ?></th>
	</tr>-->
	<?php
		$i = 0;
		foreach ($post['Comment'] as $comment): ?>
		<tr>
			<td><?php echo $comment['user_id']; ?></td>
			<td class="comment_body"><?php echo $comment['comment']; ?></td>
		</tr>
		<tr><td>&nbsp;</td><td class="comment_created"><?php echo 'Creado el '.$comment['created']; ?></td></tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Comment'), array('controller' => 'comments', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
