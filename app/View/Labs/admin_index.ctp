<div class="col-xs-12">
  <div class="table-responsive">
	<table id="" class="table table-striped table-bordered table-hover dataTable" aria-describedby="">

  	<? foreach( $contents as $content): ?>
  	  <tbody>
    	  <tr>
      		<td><?= h($content['Lab']['id']); ?>&nbsp;</td>
      		<td><?= h($content['Lab']['title']); ?>&nbsp;</td>
      		<td class="">
      		  <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
							<?= $this->Html->link( '<i class="icon-pencil bigger-130"></i>', array(
      			      'action' => 'edit',
      			      $content ['Lab']['id']
      			  ), array(
      			      'class' => 'btn btn-xs btn-success',
      			      'escape' => false
      			  )) ?>
      			  
      			  <?= $this->Html->link( '<i class="icon-trash bigger-130"></i>', array(
      			      'action' => 'delete',
      			      $content ['Lab']['id']
      			  ), array(
      			      'class' => 'btn btn-xs btn-danger',
      			      'escape' => false
      			  ), __d( 'admin', "¿Estás seguro de que quieres borrarlo?")) ?>
						</div>
      		</td>
      	</tr>
    	</tbody>
    <? endforeach ?>
	</table>
	</div>
</div>