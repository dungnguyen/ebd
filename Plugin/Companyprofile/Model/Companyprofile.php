<?php
App::uses('CompanyprofileAppModel', 'Companyprofile.Model');
/**
 * Companyprofile Model
 *
 */
class Companyprofile extends CompanyprofileAppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
public $useTable = 'companyprofile';

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
