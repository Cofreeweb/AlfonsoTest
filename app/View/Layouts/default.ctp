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
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');


		echo $this->fetch('meta');
		echo $this->fetch('script');
	?>
	
	<?= $this->Html->css( array(
	    '/management/css/bootstrap.min',
	    'style',
	    'font-awesome.min',
	    '/management/css/inline',
	    '/entry/css/flexslider.css'
	)) ?>
	
	<?= $this->Html->script( array(
	  'jquery-1.10.2.min.js',
    'angular',
    'angular-route.min.js',
    'angular-sanitize.js'
	)) ?>
  <link rel="stylesheet" type="text/css" href="/section/css/angular/ng-slider.round.css" />
  <link rel="stylesheet" type="text/css" href="/section/css/angular/ng-slider.css" />
</head>
<body ng-app="adminApp">
  <?= $this->Inline->toolbar() ?>
  <div id="wrapper">
    <header id="pageHeader" class="container clearfix noBorder">
      <div id="logo">
        <?= $this->Html->link( 'Viva el Responsive', '/') ?>
      </div>
      <nav id="mainNav">
			  <ul class="menu">
			    <?= $this->Section->nav( 'main') ?>
			  </ul>
			</nav>
    </header>
    
    <div id="mainContent" class="container" role="main">
      <?= $this->Session->flash() ?>
      
			<?= $this->fetch('content') ?>
    </div>
  </div>
  
	
	<footer class="footer">

	</footer>
	<?= $this->fetch( 'script') ?>
	<?= $this->Html->script( array(
	  '/entry/js/jquery.flexslider-min'
	)) ?>
	<?= $this->fetch( 'scriptBottom') ?>
	<?= $this->fetch( 'css') ?>
	
	<script>
	  
	</script>
</body>
</html>
