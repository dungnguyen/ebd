<?php
App::uses('Adposition', 'Model');

/**
 * Adposition Test Case
 *
 */
class AdpositionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.adposition'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Adposition = ClassRegistry::init('Adposition');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Adposition);

		parent::tearDown();
	}

}
