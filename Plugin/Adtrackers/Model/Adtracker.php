<?php
App::uses('AdtrackersAppModel', 'Adtrackers.Model');
/**
 * Adtracker Model
 *
 */
class Adtracker extends AdtrackersAppModel {

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
	'Advertisement' => array(
		'className' => 'Advertisement',
		'foreignKey' => 'AdvertID'
		),
	);

/**
 * Validation rules
 *
 * @var array
 */
public $validate = array(
	'AdvertID' => array(
		'numeric' => array(
			'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	'DateTimeChecked' => array(
		'datetime' => array(
			'rule' => array('datetime'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	'IPaddresschecked' => array(
		'notEmpty' => array(
			'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}
