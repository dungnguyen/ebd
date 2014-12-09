<?php
/**
 * TransactionFixture
 *
 */
class TransactionFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'ID' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false, 'key' => 'primary'),
		'TransactionType' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => false),
		'TransactionFee' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => false),
		'TransactionReferenceCode' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'TransactionDate' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'TransactionUserID' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => false),
		'TransactionStatus' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => false),
		'TransactionSubmittedDate' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'TransactionIPaddress' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
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
			'TransactionType' => 1,
			'TransactionFee' => 1,
			'TransactionReferenceCode' => 'Lorem ipsum dolor sit amet',
			'TransactionDate' => '2014-11-03 10:24:54',
			'TransactionUserID' => 1,
			'TransactionStatus' => 1,
			'TransactionSubmittedDate' => '2014-11-03 10:24:54',
			'TransactionIPaddress' => 'Lorem ipsum dolor sit amet'
		),
	);

}
