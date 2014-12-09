<?php
App::uses('Advertisement', 'Advertisements.Model');

/**
 * Advertisement Test Case
 *
 */
class AdvertisementTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.advertisements.advertisement'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Advertisement = ClassRegistry::init('Advertisements.Advertisement');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Advertisement);

		parent::tearDown();
	}

}
