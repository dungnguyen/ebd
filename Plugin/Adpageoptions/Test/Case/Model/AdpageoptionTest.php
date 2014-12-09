<?php
App::uses('Adpageoption', 'Adpageoptions.Model');

/**
 * Adpageoption Test Case
 *
 */
class AdpageoptionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.adpageoptions.adpageoption'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Adpageoption = ClassRegistry::init('Adpageoptions.Adpageoption');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Adpageoption);

		parent::tearDown();
	}

}
