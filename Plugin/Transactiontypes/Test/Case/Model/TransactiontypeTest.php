<?php
App::uses('Transactiontype', 'Transactiontypes.Model');

/**
 * Transactiontype Test Case
 *
 */
class TransactiontypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.transactiontypes.transactiontype'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Transactiontype = ClassRegistry::init('Transactiontypes.Transactiontype');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Transactiontype);

		parent::tearDown();
	}

}
