<?php
App::uses('CakeEventListener', 'Event');

class AppEvents extends Object implements CakeEventListener
{
  public function implementedEvents()
  {
    return array(
      'Acl.Schema.before' => array(
        'callable' => 'beforeSchema',
      ),
    );
  }

  public function beforeSchema( $event)
  {
    $schema = $event->subject();
    _d( $schema->users);
  }
}



?>