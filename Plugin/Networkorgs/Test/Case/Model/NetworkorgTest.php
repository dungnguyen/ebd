<?php
App::uses('Networkorg', 'Networkorgs.Model');

/**
 * Networkorg Test Case
 *
 */
class NetworkorgTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.networkorgs.networkorg'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Networkorg = ClassRegistry::init('Networkorgs.Networkorg');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Networkorg);

		parent::tearDown();
	}

}
