<?php
/**
 * EmbersController
 * 
 * [Short Description]
 *
 * @package default
 * @author Alfonso Etxeberria
 * @version $Id$
 * @copyright __MyCompanyName__
 **/

class EmbersController extends AppController 
{
  public $name = 'Embers';
  
  public $helpers = array( 'Ember.Handlebars');
  
  public $components = array( 'Ember.EmberData');
  
  public function beforeFilter()
  {
    parent::beforeFilter();
    
    $this->Auth->allow();
  }
  
  public function edit()
  {
    if( $this->request->is( 'post', 'put'))
    {      
      $data = array(
          'id' => 1,
          'title' => 'Leches',
          'body' => 'En vinagre'
      );
      
      $this->set( compact( 'data'));
      $this->set( '_serialize', array( 'data'));
    }
  }
}
?>