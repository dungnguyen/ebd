<?php
App::uses('TransactiontypesAppController', 'Transactiontypes.Controller');
/**
 * Transactiontypes Controller
 *
 */
class TransactiontypesController extends TransactiontypesAppController {


/**
 * Scaffold
 *
 * @var mixed
 */
public $scaffold = 'Transactions Types';

	/**
     * index method
     */
	public function admin_index()
	{
		$this->Transactiontype->recursive = 1;
		$options = array(
			'conditions' => array(),
			'order'      => array(
				'Transactiontype.ID' => 'ASC'
				)
			);

        //handle search
		if (array_key_exists('Transactiontype', $this->request->data)) {

			$filterTransactionType = array();

			if (!empty($this->request->data["Transactiontype"]["search"])) {
				$search = $this->request->data["Transactiontype"]["search"];
				$options["conditions"]['OR'] = array(
					'Transactiontype.TransactionTypeName LIKE'           => "%" . $search . "%",
					'Transactiontype.TransactionTypeCost LIKE'      => "%" . $search . "%",
					'Transactiontype.ID LIKE'                  => "%" . $search . "%"
					);

			}

            //set filter
			$filterTransactionType['search'] = $this->request->data["Transactiontype"]["search"];
			$this->Session->write("filterTransactionType", $filterTransactionType);

		} else {
			$filterTransactionType = array();
			if ($this->Session->check('filterTransactionType')) {
				$filterTransactionType = $this->Session->read('filterTransactionType');
			} else {
				$filterTransactionType['search'] = '';
			}

		}

		$this->paginate = $options;
		$this->set('transactiontypes', $this->paginate());
		$this->set('filterTransactionType', $filterTransactionType);
	}

    /**
     * add method
     *
     * @return void
     */
    public function admin_add()
    {
    	if ($this->request->is('Post') || $this->request->is('put')) {
    		$data['Transactiontype'] = $this->request->data['Transactiontype'];
    		if ($this->Transactiontype->save($data)) {
    			$this->Session->setFlash(__("Add success"));
    			$this->redirect(Router::url(array('controller' => 'transactiontypes', 'action' => 'index', 'admin' => true)));
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
    	$banner = $this->Transactiontype->read(null, $id);
    	if ($this->request->is('Post') || $this->request->is('put')) {
    		$this->Transactiontype->id = $id;
    		$data = $this->request->data['Transactiontype'];
    		if ($this->Transactiontype->save($data)) {
    			$this->Session->setFlash(__("Edit success"));
    			$this->redirect(Router::url(array('controller' => 'transactiontypes', 'action' => 'index', 'admin' => true)));
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
    	$this->Transactiontype->id = $id;
    	$this->Transactiontype->delete();
    	$this->Session->setFlash(__("Delete success"));
    	$this->redirect($this->referer());
    }

}
