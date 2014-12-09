<?php
App::uses('Advertstatuse', 'Advertstatuses.Model');

/**
 * Advertstatuse Test Case
 *
 */
class AdvertstatuseTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.advertstatuses.advertstatuse'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Advertstatuse = ClassRegistry::init('Advertstatuses.Advertstatuse');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Advertstatuse);

		parent::tearDown();
	}

}
