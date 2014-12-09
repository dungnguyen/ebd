<?php
/**
 * AdverttariffFixture
 *
 */
class AdverttariffFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'adverttariff';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'ID' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'adtype' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 3, 'unsigned' => false, 'comment' => 'option from adpositions'),
		'adpage' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'option from adpageoption', 'charset' => 'utf8'),
		'adposition' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 3, 'unsigned' => false),
		'adcost' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '4,2', 'unsigned' => false),
		'period' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'utf8_general_ci', 'comment' => 'monthly, quaterly, biannual, annual', 'charset' => 'utf8'),
		'isDeleted' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 3, 'unsigned' => false),
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
			'adtype' => 1,
			'adpage' => 'Lorem ipsum dolor sit amet',
			'adposition' => 1,
			'adcost' => 1,
			'period' => 'Lorem ip',
			'isDeleted' => 1
		),
	);

}
