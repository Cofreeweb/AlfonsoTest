<?php
App::uses('Tagged', 'Category.Model');

/**
 * Tagged Test Case
 *
 */
class TaggedTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.category.tagged',
		'plugin.category.tag'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Tagged = ClassRegistry::init('Category.Tagged');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tagged);

		parent::tearDown();
	}

}
