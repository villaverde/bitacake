<?php
App::uses('Perfil', 'Model');

/**
 * Perfil Test Case
 *
 */
class PerfilTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.perfil',
		'app.user',
		'app.group'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Perfil = ClassRegistry::init('Perfil');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Perfil);

		parent::tearDown();
	}

}
