<?php
App::uses('Companiesfeatured', 'Companiesfeatured.Model');

/**
 * Companiesfeatured Test Case
 *
 */
class CompaniesfeaturedTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.companiesfeatured.companiesfeatured'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Companiesfeatured = ClassRegistry::init('Companiesfeatured.Companiesfeatured');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Companiesfeatured);

		parent::tearDown();
	}

}
