<?php
App::uses('NetworkorgsAppController', 'Networkorgs.Controller');
/**
 * Networkorgs Controller
 *
 */
class NetworkorgsController extends NetworkorgsAppController {

/**
 * Scaffold
 *
 * @var mixed
 */
public $scaffold = 'Network Orgs';
	/**
     * index method
     */
	public function admin_index()
	{
		$this->Networkorg->recursive = 1;
		$options = array(
			'conditions' => array(),
			'order'      => array(
				'Networkorg.ID' => 'ASC'
				)
			);

        //handle search
		if (array_key_exists('Networkorg', $this->request->data)) {

			$filterNetworkOrg = array();

			if (!empty($this->request->data["Networkorg"]["search"])) {
				$search = $this->request->data["Networkorg"]["search"];
				$options["conditions"]['OR'] = array(
					'Networkorg.NetworkOrganisation LIKE'           => "%" . $search . "%",
					'Networkorg.Networkcontactname LIKE'           => "%" . $search . "%",
					'Networkorg.Networkcontacttel LIKE'           => "%" . $search . "%",
					'Networkorg.Networkcontactemail LIKE'           => "%" . $search . "%",
					'Networkorg.Networkcontacturl LIKE'           => "%" . $search . "%",
					'Networkorg.ID LIKE'                  => "%" . $search . "%"
					);

			}

            //set filter
			$filterNetworkOrg['search'] = $this->request->data["filterNetworkOrg"]["search"];
			$this->Session->write("filterNetworkOrg", $filterNetworkOrg);

		} else {
			$filterNetworkOrg = array();
			if ($this->Session->check('filterNetworkOrg')) {
				$filterNetworkOrg = $this->Session->read('filterNetworkOrg');
			} else {
				$filterNetworkOrg['search'] = '';
			}

		}

		$this->paginate = $options;
		$this->set('networkorgs', $this->paginate());
		$this->set('filterNetworkOrg', $filterNetworkOrg);
	}

    /**
     * add method
     *
     * @return void
     */
    public function admin_add()
    {
    	if ($this->request->is('Post') || $this->request->is('put')) {
    		$data['Networkorg'] = $this->request->data['Networkorg'];
    		if ($this->Networkorg->save($data)) {
    			$this->Session->setFlash(__("Add success"));
    			$this->redirect(Router::url(array('controller' => 'networkorgs', 'action' => 'index', 'admin' => true)));
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
    	$banner = $this->Networkorg->read(null, $id);
    	if ($this->request->is('Post') || $this->request->is('put')) {
    		$this->Networkorg->id = $id;
    		$data = $this->request->data['Networkorg'];
    		if ($this->Networkorg->save($data)) {
    			$this->Session->setFlash(__("Edit success"));
    			$this->redirect(Router::url(array('controller' => 'networkorgs', 'action' => 'index', 'admin' => true)));
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
    	$this->Networkorg->id = $id;
    	$this->Networkorg->delete();
    	$this->Session->setFlash(__("Delete success"));
    	$this->redirect($this->referer());
    }
}
