<?php
App::uses('Blank', 'Model');

/**
 * Blank Test Case
 */
class BlankTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.blank',
		'app.point'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Blank = ClassRegistry::init('Blank');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Blank);

		parent::tearDown();
	}

}
