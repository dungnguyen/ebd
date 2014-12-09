<?php
App::uses('FeaturedarticlesAppModel', 'Featuredarticles.Model');
/**
 * Featuredarticle Model
 *
 */
class Featuredarticle extends FeaturedarticlesAppModel {

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
