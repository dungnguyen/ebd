<?php
/**
 * AdtrackerFixture
 *
 */
class AdtrackerFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'ID' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false, 'key' => 'primary'),
		'AdvertID' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false),
		'DateTimeChecked' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'IPaddresschecked' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'ID', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'ID' => 1,
			'AdvertID' => 1,
			'DateTimeChecked' => '2014-10-22 02:33:48',
			'IPaddresschecked' => 'Lorem ipsum dolor sit amet'
		),
	);

}
