<?php

class Lab extends AppModel 
{
  public $name = 'Lab';
  
  public $useDbConfig = 'mongo';
  
  public $mongoSchema = array(
    'title' => array(' type' =>'string'),
    'published' => array( 'type' =>'boolean'),
    'user_id' => array( 'type' =>'integer'),
    'uploads' => array(
        'title' => array( 'type' => 'string'),
        'subtitle' => array( 'type' => 'string')
    ),
    'deleted' => array( 'type' =>'boolean', 'default' => 0),
    'removed' => array( 'type' =>'boolean', 'default' => 0),
    'published_at' => array( 'type' =>'date'),
    'created' => array( 'type' =>'datetime'),
    'modified' => array( 'type' =>'datetime'),
  );
  
  public $actsAs = array(
      'Cofree.Deletable',
      'Mongodb.Schemaless',
	    'Mongodb.SqlCompatible',
      'Mongodb.Revision',
  );
  
  public $belongsTo = array(
      'User' => array(
          'className' => 'Acl.User',
          'foreignKey' => 'user_id',
      )
  );
}
?>