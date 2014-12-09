<?php
App::uses('Featuredarticle', 'Featuredarticles.Model');

/**
 * Featuredarticle Test Case
 *
 */
class FeaturedarticleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.featuredarticles.featuredarticle'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Featuredarticle = ClassRegistry::init('Featuredarticles.Featuredarticle');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Featuredarticle);

		parent::tearDown();
	}

}
