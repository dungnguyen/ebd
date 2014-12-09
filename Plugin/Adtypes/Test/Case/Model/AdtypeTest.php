<?php
App::uses('Adtype', 'Adtypes.Model');

/**
 * Adtype Test Case
 *
 */
class AdtypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.adtypes.adtype'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Adtype = ClassRegistry::init('Adtypes.Adtype');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Adtype);

		parent::tearDown();
	}

}
