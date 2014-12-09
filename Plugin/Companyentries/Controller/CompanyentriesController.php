<?php
App::uses('CompanyentriesAppController', 'Companyentries.Controller');
/**
 * Companyentries Controller
 *
 */
class CompanyentriesController extends CompanyentriesAppController {

/**
 * Scaffold
 *
 * @var mixed
 */
public $scaffold = 'Company Entries';
/**
     * index method
     */
public function admin_index()
{
	$this->Companyentry->recursive = 1;
	$options = array(
		'conditions' => array(),
		'order'      => array(
			'Companyentry.id' => 'ASC'
			)
		);

        //handle search
	if (array_key_exists('Companyentry', $this->request->data)) {

		$filterCompanyentry = array();

		if (!empty($this->request->data["Companyentry"]["search"])) {
			$search = $this->request->data["Companyentry"]["search"];
			$options["conditions"]['OR'] = array(
				'Companyentry.companyname LIKE'              => "%" . $search . "%",
				'Companyentry.street LIKE'      => "%" . $search . "%",
				'Companyentry.phone LIKE'        => "%" . $search . "%",
				'Companyentry.fax LIKE'        => "%" . $search . "%",
				'Companyentry.email LIKE'        => "%" . $search . "%",
				'Companyentry.zip LIKE'        => "%" . $search . "%",
				'Companyentry.status LIKE'        => "%" . $search . "%",
				'Companyentry.id LIKE'                     => "%" . $search . "%"
				);

		}

            //set filter
		$filterCompanyentry['search'] = $this->request->data["Companyentry"]["search"];
		$this->Session->write("filterCompanyentry", $filterCompanyentry);

	} else {
		$filterCompanyentry = array();
		if ($this->Session->check('filterCompanyentry')) {
			$filterCompanyentry = $this->Session->read('filterCompanyentry');
		} else {
			$filterCompanyentry['search'] = '';
		}

	}

	$this->paginate = $options;
	$this->set('companyentries', $this->paginate());
	$this->set('filterCompanyentry', $filterCompanyentry);
}

    /**
     * add method
     *
     * @return void
     */
    public function admin_add()
    {
    	if ($this->request->is('Post') || $this->request->is('put')) {
    		$data['Companyentry'] = $this->request->data['Companyentry'];
    		if ($this->Companyentry->save($data)) {
    			$this->Session->setFlash(__("Add success"));
    			$this->redirect(Router::url(array('controller' => 'companyentries', 'action' => 'index', 'admin' => true)));
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
    	$banner = $this->Companyentry->read(null, $id);
    	if ($this->request->is('Post') || $this->request->is('put')) {
    		$this->Companyentry->id = $id;
    		$data = $this->request->data['Companyentry'];
    		if ($this->Companyentry->save($data)) {
    			$this->Session->setFlash(__("Edit success"));
    			$this->redirect(Router::url(array('controller' => 'companyentries', 'action' => 'index', 'admin' => true)));
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
    	$this->Companyentry->id = $id;
    	$this->Companyentry->delete();
    	$this->Session->setFlash(__("Delete success"));
    	$this->redirect($this->referer());
    }
}
