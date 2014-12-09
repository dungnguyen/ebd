<?php
App::uses('TransactionsAppController', 'Transactions.Controller');
/**
 * Transactions Controller
 *
 */
class TransactionsController extends TransactionsAppController {

/**
 * Scaffold
 *
 * @var mixed
 */
public $scaffold = 'Transactions';

	/**
     * index method
     */
	public function admin_index()
	{
        $this->loadModel('Transactiontype');
        $transactiontypes = $this->Transactiontype->find('list', array('fields' => array('ID', 'TransactionTypeName')));
        $this->set('transactiontypes', $transactiontypes);


        $this->Transaction->recursive = 1;
        $options = array(
           'conditions' => array(),
           'order'      => array(
            'Transaction.ID' => 'ASC'
            )
           );

        //handle search
        if (array_key_exists('Transaction', $this->request->data)) {

            if (!empty($this->request->data["Transaction"]["TransactionType"])) {
              $filterType = $this->request->data["Transaction"]["TransactionType"];
              $options["conditions"] = array(
                'Transaction.TransactionType' => $filterType
                );
          }
          
          $filterTransaction = array();

          if (!empty($this->request->data["Transaction"]["search"])) {
            $search = $this->request->data["Transaction"]["search"];
            $options["conditions"]['OR'] = array(
             'Transaction.TransactionReferenceCode LIKE'           => "%" . $search . "%",
             'Transaction.TransactionIPaddress LIKE'      => "%" . $search . "%",
             'Transaction.TransactionFee LIKE'      => "%" . $search . "%",
             'Transaction.TransactionSubmittedDate LIKE'      => "%" . $search . "%",
             'Transaction.TransactionType LIKE'      => "%" . $search . "%",
             'Transaction.ID LIKE'                  => "%" . $search . "%"
             );

        }

            //set filter
        $filterTransaction['search'] = $this->request->data["Transaction"]["search"];
        $this->Session->write("filterTransaction", $filterTransaction);

    } else {
        $filterTransaction = array();
        if ($this->Session->check('filterTransaction')) {
            $filterTransaction = $this->Session->read('filterTransaction');
        } else {
            $filterTransaction['search'] = '';
        }

    }

    $this->paginate = $options;
    $this->set('transactions', $this->paginate());
    $this->set('filterTransaction', $filterTransaction);
}

    /**
     * add method
     *
     * @return void
     */
    public function admin_add()
    {
    	if ($this->request->is('Post') || $this->request->is('put')) {
            $this->request->data['Transaction']['TransactionDate'] = date('Y-m-d H:i:s');
            $this->request->data['Transaction']['TransactionSubmittedDate'] = date('Y-m-d H:i:s');
            $this->request->data['Transaction']['TransactionUserID'] = $this->Auth->user('id');
            $data['Transaction'] = $this->request->data['Transaction'];
            if ($this->Transaction->save($data)) {
             $this->Session->setFlash(__("Add success"));
             $this->redirect(Router::url(array('controller' => 'transactions', 'action' => 'index', 'admin' => true)));
         } else {
             $this->Session->setFlash(__("Error"));
         }
     } else {
      $this->GetFormData();
  }
}

    //Get relation data
public function GetFormData()
{
    $this->loadModel('Transactiontype');
    $transactiontypes = $this->Transactiontype->find('list', array('fields' => array('ID', 'TransactionTypeName')));
    $this->set('transactiontypes', $transactiontypes);

    $status = array('1' => 'Unpublished', '2' => 'Published', '3'=>'Preview');
    $this->set('status', $status);
}

    /**
     * Edit a highlight
     * @param null $id
     * @throws NotFoundException
     */
    public function admin_edit($id = null)
    {
    	$banner = $this->Transaction->read(null, $id);
    	if ($this->request->is('Post') || $this->request->is('put')) {
    		$this->Transaction->id = $id;
            $this->request->data['Transaction']['TransactionDate'] = date('Y-m-d H:i:s');
            $this->request->data['Transaction']['TransactionSubmittedDate'] = date('Y-m-d H:i:s');
            $this->request->data['Transaction']['TransactionUserID'] = $this->Auth->user('id');         
            $data = $this->request->data['Transaction'];
            if ($this->Transaction->save($data)) {
             $this->Session->setFlash(__("Edit success"));
             $this->redirect(Router::url(array('controller' => 'transactions', 'action' => 'index', 'admin' => true)));
         } else {
             $this->Session->setFlash(__("Error"));
         }
     }

     $this->request->data = $banner;

     $this->GetFormData();
 }

    /**
     * delete method
     *
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null)
    {
    	$this->Transaction->id = $id;
    	$this->Transaction->delete();
    	$this->Session->setFlash(__("Delete success"));
    	$this->redirect($this->referer());
    }
}
