<?php
App::uses('Adverttariff', 'Adverttariff.Model');

/**
 * Adverttariff Test Case
 *
 */
class AdverttariffTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.adverttariff.adverttariff'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Adverttariff = ClassRegistry::init('Adverttariff.Adverttariff');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Adverttariff);

		parent::tearDown();
	}

}
