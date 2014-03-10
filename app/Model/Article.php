<?php

class Article extends AppModel 
{
  public $name = 'Article';
  
  public $useDbConfig = 'mongo';
  
  public $mongoSchema = array(
    'title' => array('type'=>'string'),
    'published'=>array('type'=>'boolean'),
    'created'=>array('type'=>'datetime'),
    'modified'=>array('type'=>'datetime'),
  );
  
  public $admin = array(
      'nameSingular' => 'Ficha',
      'namePlural' => 'Fichas',
      'batchProcess' => false,
      'actionButtons' => true,
      'fieldsIndex' => array(
          'title',
      ),

      'fieldsSearch' => array(
          'title',
      )
  );
  
  public $fields = array(
      'published' => array(
          'title' => 'Publicado'
      ),
      'title' => array(
          'title' => 'Título'
      ),
      
  );
}
?>  