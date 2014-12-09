<?php
App::uses('Adtracker', 'Adtrackers.Model');

/**
 * Adtracker Test Case
 *
 */
class AdtrackerTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.adtrackers.adtracker'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Adtracker = ClassRegistry::init('Adtrackers.Adtracker');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Adtracker);

		parent::tearDown();
	}

}
