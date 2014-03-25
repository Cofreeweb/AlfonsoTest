<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 */

App::uses( 'Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller 
{
  public $helpers = array(
		'Session',
		'Management.AdminNav',
		'Acl.Auth',
		'Upload.Asset',
		'Upload.Upload',
		'AssetCompress.AssetCompress',
		'Section.Section',
		'Management.Inline',
		'Angular.Seter'
	);
  
  public $components = array(
      'I18n.Langs',
      'Acl',
      'Auth' => array(
          'authenticate' => array(
              'Form' => array(
                  'fields' => array('username' => 'email'),
                  'scope'  => array('User.status' => 1)
              )
          ),
          'authorize' => array(
              'Actions' => array( 'actionPath' => 'controllers')
          ),
          'loginAction' => array(
              'plugin' => 'acl',
              'controller' => 'users',
              'action' => 'login'
          )
      ),
      'Session',
      'Management.Manager',
      'RequestHandler',
      'Angular.Angular',
      'Acl.AclAccess'
  );
  

}
