<?php
App::uses('AdverttariffAppModel', 'Adverttariff.Model');
/**
 * Adverttariff Model
 *
 */
class Adverttariff extends AdverttariffAppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
public $useTable = 'adverttariff';

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
 	'Adpageoption' => array(
 		'className' => 'Adpageoption',
 		'foreignKey' => 'adpage'
 		),
 	'Adposition' => array(
 		'className' => 'Adposition',
 		'foreignKey' => 'adposition'
 		),
 	'Adtype' => array(
 		'className' => 'Adtype',
 		'foreignKey' => 'adtype'
 		)
 	);
}
