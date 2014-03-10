<?php
App::uses('Tag', 'Category.Model');

/**
 * Tag Test Case
 *
 */
class TagTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.category.tag',
		'plugin.category.tagged'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Tag = ClassRegistry::init('Category.Tag');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tag);

		parent::tearDown();
	}

}
