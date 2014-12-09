<?php
App::uses('NetworkeventsAppModel', 'Networkevents.Model');
/**
 * Networkevent Model
 *
 */
class Networkevent extends NetworkeventsAppModel {

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
	'User' => array(
		'className' => 'User',
		'foreignKey' => 'Userid	'
		),
	'Networkorg' => array(
		'className' => 'Networkorg',
		'foreignKey' => 'NetworkOrganisation'
		),
	);
}
