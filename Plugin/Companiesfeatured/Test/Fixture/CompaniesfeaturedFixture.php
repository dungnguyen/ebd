<?php
/**
 * CompaniesfeaturedFixture
 *
 */
class CompaniesfeaturedFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'companiesfeatured';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'ID' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'CompanyID' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'FeaturedStartDate' => array('type' => 'date', 'null' => true, 'default' => null),
		'FeaturedEndDate' => array('type' => 'date', 'null' => true, 'default' => null),
		'isDeleted' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 3, 'unsigned' => false),
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
			'CompanyID' => 1,
			'FeaturedStartDate' => '2014-11-03',
			'FeaturedEndDate' => '2014-11-03',
			'isDeleted' => 1
		),
	);

}
