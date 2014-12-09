<?php
App::uses('TransactionsAppModel', 'Transactions.Model');
/**
 * Transaction Model
 *
 */
class Transaction extends TransactionsAppModel {

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
	'Transactiontype' => array(
		'className' => 'Transactiontype',
		'foreignKey' => 'TransactionType'
		),
	);

}
