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

		echo $this->Html->css('normalize.css');
		echo $this->Html->css('foundation');
		echo $this->Html->script('vendor/modernizr.js');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	  <!-- Nav Bar -->
 
  <div class="row">
    <div class="large-12 columns">
      <div class="nav-bar right">
       <ul class="button-group">
         <li><?php echo $this->Html->link('Inicio','/', array('class' => 'button')); ?></li>
         <li><a href="#" class="button">Contacta</a></li>
         <?php if($this->Session->read('Auth.User')==null){?>
         <li><?php echo $this->Html->link('Entrar',array('controller' => 'users', 'action' => 'login',), array('class' => 'button')); ?></li>
         <?php } else {  ?>
         <li><?php echo $this->Html->link('Salir',array('controller' => 'users', 'action' => 'logout',), array('class' => 'button')); ?></li>
         <?php } ?>
         <?php if($this->Session->read('Auth.User')==null){?>
         <li><?php echo $this->Html->link('Rgistrarse',array('controller' => 'users', 'action' => 'register',), array('class' => 'button')); ?></li>
         <? } else {?>
              <li><a href="#" class="button">Perfil</a></li>
         <? } ?>
        </ul>
      </div>
      <h1>BitaCake <small>Blog creado con cakephp</small></h1>
      <hr />
    </div>
  </div>
 
  <!-- End Nav -->
 
 
  <!-- Main Page Content and Sidebar -->
 
  <div class="row">
 
    <!-- Main Blog Content -->
    <div class="large-9 columns" role="content">
      <?php echo $this->Session->flash(); ?>
     <?php echo $this->fetch('content'); ?>
  
    </div>
 
    <!-- End Main Content -->
 
 
    <!-- Sidebar -->
 
    <aside class="large-3 columns">
 
      <h5>Categories</h5>
      <ul class="side-nav">
        <li><a href="#">News</a></li>
        <li><a href="#">Code</a></li>
        <li><a href="#">Design</a></li>
        <li><a href="#">Fun</a></li>
        <li><a href="#">Weasels</a></li>
      </ul>
 
      <div class="panel">
        <h5>Featured</h5>
        <p>Pork drumstick turkey fugiat. Tri-tip elit turducken pork chop in. Swine short ribs meatball irure bacon nulla pork belly cupidatat meatloaf cow.</p>
        <a href="#">Read More →</a>
      </div>
 
    </aside>
 
    <!-- End Sidebar -->
  </div>
 
  <!-- End Main Content and Sidebar -->
 
 
  <!-- Footer -->
 
  <footer class="row">
    <div class="large-12 columns">
      <hr />
      <div class="row">
        <div class="large-6 columns">
          
        </div>
        <div class="large-6 columns">
          <ul class="inline-list right">
            <li><a href="#">Link 1</a></li>
            <li><a href="#">Link 2</a></li>
            <li><a href="#">Link 3</a></li>
            <li><a href="#">Link 4</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>	
</body>
</html>
