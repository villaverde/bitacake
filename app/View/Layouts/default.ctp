<?php
/**
 *
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');
		echo $this->Html->css('normalize.css');
		echo $this->Html->css('bitacake.css');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<header>
			<h1>BitaCake</h1>
			<div class="menuuser">
			<?php if (AuthComponent::user('id')){
				echo "<figure><img src=\"".$this->Session->read('Auth.User.Perfil.avatar')."\"></figure>";
   				echo $this->Session->read('Auth.User.username');
   				}else{
   					echo $this->Html->link('Regístrate','/users/register')." - ".$this->Html->link('Entrar','/users/login');
   				}
   			?> 
   			</div>
		</header>
		<nav>
				<ul>
					<li>Inicio</li>
					<li>Contacta</li>
				</ul>
		</nav>
		<section id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</section>
		<footer>
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</footer>
	</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
