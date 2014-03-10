<?php 
class AppSchema extends CakeSchema {

	public function before($event = array()) {
		return true;
	}

	public function after($event = array()) {
	}

	
	public $contents = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'content_type' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 16, 'key' => 'index'),
		'published' => array('type' => 'boolean', 'null' => true, 'default' => null, 'comment' => 'Indica si el objeto está visible'),
		'published_at' => array('type' => 'date', 'null' => true, 'default' => null),
		'slug' => array('type' => 'string', 'null' => true, 'default' => null, 'key' => 'unique', 'collate' => 'utf8_unicode_ci', 'comment' => 'Permalink creado a partir de title', 'charset' => 'utf8'),
		'title' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'El título de la incidencia', 'charset' => 'utf8'),
		'body' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'El campo de texto', 'charset' => 'utf8'),
		'summary' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'El título de la incidencia', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'content_type' => array('column' => 'content_type', 'unique' => 0),
			'slug' => array('column' => 'slug', 'unique' => 1),
			'published' => array('column' => 'published', 'unique' => 0),
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);

}
