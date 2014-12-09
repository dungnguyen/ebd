<?php
App::uses('Companyprofile', 'Companyprofile.Model');

/**
 * Companyprofile Test Case
 *
 */
class CompanyprofileTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.companyprofile.companyprofile'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Companyprofile = ClassRegistry::init('Companyprofile.Companyprofile');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Companyprofile);

		parent::tearDown();
	}

}
