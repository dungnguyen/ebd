<?php
App::uses('CompaniesfeaturedAppModel', 'Companiesfeatured.Model');
/**
 * Companiesfeatured Model
 *
 */
class Companiesfeatured extends CompaniesfeaturedAppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
public $useTable = 'companiesfeatured';

/**
 * Primary key field
 *
 * @var string
 */
public $primaryKey = 'ID';

/**
 * Model associations: belongsTo
 *
 * @var array
 * @access public
 */
public $belongsTo = array(
	'Companyentry' => array(
		'className' => 'Companyentry',
		'foreignKey' => 'CompanyID'
		),
	);
}
