<?php
/**
 * NetworkeventFixture
 *
 */
class NetworkeventFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'ID' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false, 'key' => 'primary'),
		'Userid' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => false),
		'Networkdatetime' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'NetworkOrganisation' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => false),
		'NetworkCost' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'Networkstatus' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => false),
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
			'Userid' => 1,
			'Networkdatetime' => '2014-11-03 10:14:21',
			'NetworkOrganisation' => 1,
			'NetworkCost' => 'Lorem ipsum dolor sit amet',
			'Networkstatus' => 1
		),
	);

}
