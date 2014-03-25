<?php

class LabsController extends AppController 
{
  public $name = 'Labs';
  
  public function beforeFilter()
  {
    parent::beforeFilter();
    $this->Auth->allow();
  }
  
  public function admin_index()
  {
    $contents = $this->Lab->find( 'all', array(
        'revision' => 'draft'
    ));
    $this->set( compact( 'contents'));
  }
  
  public function admin_add()
  {
    if( $this->request->is( 'post')) 
    {
      $this->Lab->create();
      
      if( $this->Lab->save( $this->request->data, array(
          'revision' => 'draft'
      ))) 
      {
        $this->redirect( array( 'action' => 'index'));
      } 
      else
      {
      }
    }
  }
  
  public function admin_test( $id)
  {
    $this->Lab->id = $id;
    $this->Lab->addSubdocument( 'uploads', array(
        'title' => 'Leches',
        'subtitle' => 'Milk'
    ), array(
        'revision' => 'draft'
    ));
    // $this->Lab->mongoNoSetOperator = '$push';
    // $this->Lab->id = $id;
    // $this->Lab->save( array(
    //     'uploads' => array(
    //         array(
    //             'id' => new MongoId(),
    //             'title' => 'Alfonso',
    //             'subtitle' => 'Arambillet'
    //         )
    //     )
    // ), array(
    //     'revision' => 'draft'
    // ));
    
    // $this->Lab->updateSubdocument( 'uploads', '531e053dcae8b7c22e000004', array(
    //     'title' => 'Ayer',
    //     'photos' => array(
    //         
    //     )
    // ), array(
    //     'revision' => 'draft'
    // ));
    
    // $this->Lab->updateSubcontent( array(
    //     'uploads.$' => array(
    //         'id' => new MongoId( '531e053dcae8b7c22e000004'),
    //         'title' => 'Pacos',
    //         'subtitle' => 'Brunos'
    //     )
    // ), array(
    //     'uploads.id' => new MongoId( '531e053dcae8b7c22e000004')
    // ), array(
    //     'revision' => 'draft'
    // ));
    
    $this->redirect( array( 'action' => 'edit', $id));
  }
  
  public function admin_edit( $id = null) 
  {     
    // $this->Lab->updateAll( array(
    //     'upload.subtitle' => 'Hostias',
    // ), array(
    //     'upload.subtitle' => 'Casas del bosque'
    // ));
    // $this->Lab->published( $id);
    $this->Lab->id = $id;
    
    if( !$this->Lab->exists()) 
    {
      throw new NotFoundException( 'Invalid group');
    }
    
    if( $this->request->is( 'post') || $this->request->is( 'put')) 
    {
      $this->request->data ['Lab']['user_id'] = $this->Auth->user( 'id');
      
      if( $this->Lab->save( $this->request->data, array(
          'revision' => 'draft'
      ))) 
      {
        $this->redirect( array( 'action' => 'edit', $id));
      } 
      else 
      {
      }
    } 
    else 
    {
      $this->request->data = $this->Lab->find( 'first', array(
          'conditions' => array(
              'Lab.id' => $id
          ),
          'revision' => 'draft',
          'recursive' => -1
      ));
    }
  }
  
  public function admin_published( $id)
  {
    $this->Lab->published( $id);
    $this->redirect( array( 'action' => 'edit', $id));
  }
  
  public function admin_delete( $id)
  {
    $this->Lab->delete( $id);
    $this->redirect( array( 'action' => 'index'));
  }
  

  
  public function view( $id)
  {
    $content = $this->Lab->find( 'first', array(
        'conditions' => array(
            'Lab.id' => $id
        ),
    ));
    
    $this->set( compact( 'content'));
  }
}
?>