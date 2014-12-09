<?php
App::uses('Adposition', 'Adpositions.Model');

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
		'plugin.adpositions.adposition'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Adposition = ClassRegistry::init('Adpositions.Adposition');
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
