<div class="groups form">
  <? if( isset( $this->request->data ['Lab']['id'])): ?>
      <?= $this->Html->link( 'Publicar', array(
          'action' => 'published',
          $this->request->data ['Lab']['id']
      ))?> | 
      <?= $this->Html->link( 'Test', array(
          'action' => 'test',
          $this->request->data ['Lab']['id']
      ))?>
  <? endif ?>
<?= $this->Form->create( 'Lab', array(
    'class' => 'form-horizontal'
)) ?>
    <?= $this->Form->hidden( 'Lab.id') ?>
    <?= $this->Form->input( 'Lab.title', array(
        'type' => 'text',
        'label' => 'Nombre'
    )) ?>
    
    <?= $this->Form->input( 'Lab.published_at', array(
        'type' => 'text',
        'class' => 'date-picker',
        'after' => '<span class="input-group-addon"><i class="icon-calendar bigger-110"></i></span>',
        'colsInput' => 2,
        'label' => __d( 'admin', 'Fecha de publicación')
    )) ?>
    
    <? foreach( (array)@$this->request->data ['Lab']['upload'] as $upload): ?>
        <?= $upload ['title'] ?><br />
    <? endforeach ?>
    <div class="col-md-offset-2 col-md-2">
      <?= $this->Form->submit( __d( 'admin', 'Guardar')) ?>
    </div>
<?= $this->Form->end() ?>
</div>
