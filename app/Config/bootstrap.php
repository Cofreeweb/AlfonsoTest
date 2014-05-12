<?php

// Setup a 'default' cache configuration for use in the application.
Cache::config('default', array('engine' => 'File'));
Cache::config('dictionaries', array('engine' => 'File'));

Configure::write('Dispatcher.filters', array(
	'AssetDispatcher',
	'CacheDispatcher'
));

/**
 * Configures default file logging options
 */
App::uses('CakeLog', 'Log');
CakeLog::config('debug', array(
	'engine' => 'File',
	'types' => array('notice', 'info', 'debug'),
	'file' => 'debug',
));
CakeLog::config('error', array(
	'engine' => 'File',
	'types' => array('warning', 'error', 'critical', 'alert', 'emergency'),
	'file' => 'error',
));

define('DEFAULT_LANGUAGE', 'spa'); // The 3 letters code for your default language


Configure::load( 'management');
Configure::load( 'upload');
Configure::load( 'events');

CakePlugin::load( 'Dictionary', array('bootstrap' => true, 'routes' => false));
CakePlugin::load( 'I18n', array( 'bootstrap' => true, 'routes' => true));

CakePlugin::load( 'Cofree', array( 'bootstrap' => true));
CakePlugin::load( 'Section', array( 'bootstrap' => true, 'routes' => true));

// CakePlugin::load( 'Template', array( 'bootstrap' => false, 'routes' => false));
CakePlugin::load( 'Blog', array(' bootstrap' => false, 'routes' => false));
CakePlugin::load( 'Search');
CakePlugin::load( 'Acl', array( 'routes' => true));
CakePlugin::load( 'Upload', array( 'routes' => true));
CakePlugin::load( 'Comments');
CakePlugin::load( 'Geocoder');
CakePlugin::load( 'AssetCompress', array('bootstrap' => true));
CakePlugin::load( 'Rating');
CakePlugin::load( 'Utility');
CakePlugin::load( 'Recaptcha');
CakePlugin::load( 'Management', array( 'bootstrap' => true, 'routes' => true));
CakePlugin::load( 'Entry', array('bootstrap' => true, 'routes' => true));
CakePlugin::load( 'Angular', array('bootstrap' => false, 'routes' => false));
CakePlugin::load( 'Mongodb');
CakePlugin::load( 'Fixturize');
CakePlugin::load( 'Configuration', array('bootstrap' => false, 'routes' => false));
Configure::write( 'Path.files.photos', '/files/');

// Configure::load( 'settings');
App::uses('CofreeEventManager', 'Cofree.Event');
CofreeEventManager::loadListeners();

if( isset( $_SERVER ['REQUEST_URI']))
{
  CakeLog::write( 'debug', $_SERVER ['REQUEST_URI']);
  
}





CakePlugin::load('Websys', array('bootstrap' => false, 'routes' => false));
