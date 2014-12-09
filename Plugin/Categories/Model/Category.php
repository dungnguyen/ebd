<?php
App::uses('CategoriesAppModel', 'Categories.Model');
/**
 * Category Model
 *
 */
class Category extends CategoriesAppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'parent' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}
