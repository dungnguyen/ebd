<?php
/**
 * AdvertisementFixture
 *
 */
class AdvertisementFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'ID' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false, 'key' => 'primary'),
		'AdvertisementType' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false),
		'UserID' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false),
		'DateStart' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'DateEnd' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'AdvertisementURL' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'AdvertisementImage' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'AdvertismentText' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'AdvertisementPosition' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false, 'comment' => 'option from ebd_adposition'),
		'AdvertisementPageType' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3, 'unsigned' => false, 'comment' => 'option from ebd_adpageoptions'),
		'AdvertisementChecked' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false),
		'AdvertisementCheckBy' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false),
		'AdvertisementUpdated' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'AdvertisementUpdatedBy' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false),
		'AdvertisementUpdateChecked' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false),
		'AdvertisementUpdateCheckedBy' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false),
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
			'AdvertisementType' => 1,
			'UserID' => 1,
			'DateStart' => '2014-10-22 02:44:51',
			'DateEnd' => '2014-10-22 02:44:51',
			'AdvertisementURL' => 'Lorem ipsum dolor sit amet',
			'AdvertisementImage' => 'Lorem ipsum dolor sit amet',
			'AdvertismentText' => 'Lorem ipsum dolor sit amet',
			'AdvertisementPosition' => 1,
			'AdvertisementPageType' => 1,
			'AdvertisementChecked' => 1,
			'AdvertisementCheckBy' => 1,
			'AdvertisementUpdated' => '2014-10-22 02:44:51',
			'AdvertisementUpdatedBy' => 1,
			'AdvertisementUpdateChecked' => 1,
			'AdvertisementUpdateCheckedBy' => 1
		),
	);

}
