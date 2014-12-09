<?php
App::uses('Companyentry', 'Companyentries.Model');

/**
 * Companyentry Test Case
 *
 */
class CompanyentryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.companyentries.companyentry'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Companyentry = ClassRegistry::init('Companyentries.Companyentry');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Companyentry);

		parent::tearDown();
	}

}
