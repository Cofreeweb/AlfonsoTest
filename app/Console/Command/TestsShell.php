<?php
/**
 * TestsShell
 * 
 * [Short Description]
 *
 * @package default
 * @author Alfonso Etxeberria
 * @version $Id$
 * @copyright __MyCompanyName__
 **/

class TestsShell extends Shell {

  /**
   * An array containing the names of tasks this shell uses. The array elements should
   * not contain the "Shell" part of the classname.
   *
   * @var mixed A single name as a string or a list of names as an array.
   * @access protected
   */
  var $tasks = array();

  /**
   * An array containing the names of models this shell uses.
   *
   * @var mixed A single name as a string or a list of names as an array.
   * @access protected
   */
  var $uses = array( 'Entry.Entry', 'Blog.Post');  

  /**
   * Main action
   *
   * @access public
   */
  public function sub() 
  {
    // $this->Entry->addSubdocument( array(
    //     'blocks' => array()
    // ), array(
    //     'id' => '53343b44cae8b7f50300000c',
    //     'path' => 'rows'
    // ));
    
    $this->Post->addSubdocument( array(
        'title' => 'Vamos Dinamo!!!'
    ), array(
        'id' => '5331e5a0cae8b760e8000002',
        'path' => 'photos',
    ));

  }
  
  
  public function del() 
  {
    $this->Post->deleteSubdocument( 'photos', '5336abb3cae8b7bd7a000008', array(
        'revision' => 'draft'
    ));
  }
  
  public function find()
  {
    $entry = $this->Entry->findSubdocumentById( 'Entry.rows', '53298076cae8b70d0d00001e', 'draft');
    _d( $entry);    
  }
  
  public function addblock( $id = '53343f74cae8b7d70c000000')
  {
    $block_id = $this->Entry->addSubdocument( array(
        'title' => 'Block '. rand( 0, 9889)
    ), array(
        'id' =>  $id,
        'path' => 'rows.blocks',
    ));
  }
  
  public function add_entry()
  {
    $this->Entry->createEntry( 3);
    $entry = $this->Entry->getEntry( 3, 'draft');
    $block_id = $this->addblock( $entry ['Entry']['rows'][0]['id']);
  }
  
  
  public function add_row( $id = '5328a47acae8b75b35000004')
  {
    $this->Entry->id = $id;
    $row_id = $this->Entry->addSubdocument( 'rows', array(
        'blocks' => array()
    ), $options = array( 'revision' => 'draft'));
    
    $block_id = $this->addblock( $row_id);
    $this->__addBlock( $block_id);
  }
  
  public function __addBlock( $block_id)
  {
    $this->Entry->addSubSubdocument( 'rows.blocks.photos', $block_id, array(
        'title' => 'Una foto',
        'foots' => array(
            array(
                'id' => new MongoId(),
                'title' => 'Una y dos'
            ),
            array(
                'id' => new MongoId(),
                'title' => 'dos y tres'
            )
        )
    ), array(
        'revision' => 'draft'
    ));
    
    $this->Entry->addSubSubdocument( 'rows.blocks.photos', $block_id, array(
        'title' => 'Dos fotos',
        'foots' => array(
            array(
                'id' => new MongoId(),
                'title' => 'Cuatro y dos'
            ),
            array(
                'id' => new MongoId(),
                'title' => 'Cinco y tres'
            )
        )
    ), array(
        'revision' => 'draft'
    ));
  }
  
  public function move()
  {
    $data = $this->Entry->moveSubdocument( '532b5061cae8b70dd3000001', '532b0fa4cae8b7dc7000000f', array(
        'path' => 'rows.blocks'
    ));
    _d( $data);
  }
  
  
  public function save_post()
  {
    $data = array(
        'title' => 'Mi vida en un segundo',
    );
    
    $this->Post->createPost( 4);
    $post = $this->Post->find( 'first', array(
        'conditions' => array(
            'Post.id' => $this->Post->id
        ),
        'revision' => 'draft'
    ));
    
    $url = Router::url( array(
        'plugin' => 'blog',
        'controller' => 'posts',
        'action' => 'edit',
        'slug' => $post ['Post']['slug']
    ));
    _d( $url);
  }
  
  public function index()
  {
    $posts = $this->Post->find( 'all', array(
        'conditions' => array(
            'Post.section_id' => 4
        ),
        'revision' => 'draft',
        'onlyDraft' => true
    ));
    
    _d( $posts);
  }
}
?>