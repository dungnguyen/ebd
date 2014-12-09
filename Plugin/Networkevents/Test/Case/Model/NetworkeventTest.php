<?php
App::uses('Networkevent', 'Networkevents.Model');

/**
 * Networkevent Test Case
 *
 */
class NetworkeventTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.networkevents.networkevent'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Networkevent = ClassRegistry::init('Networkevents.Networkevent');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Networkevent);

		parent::tearDown();
	}

}
