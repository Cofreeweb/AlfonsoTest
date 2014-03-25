<?php
/**
 *
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Errors
 * @since         CakePHP(tm) v 0.10.0.1076
 */
?>
<? if (Configure::read('debug') > 0): ?>
    <h2><?= $name ?></h2>
<? else: ?>
    <h2><?= __( "Página no encontrada") ?></h2>
<? endif ?>

<p class="error">
	<?php printf(
  		__( 'La dirección %s no ha sido encontrada en nuestro servidor.'),
		"<strong>'{$url}'</strong>"
	); ?>
</p>

<?php
if (Configure::read('debug') > 0):
	echo $this->element('exception_stack_trace');
endif;
?>
