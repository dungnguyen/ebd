<?php
App::uses('AdvertstatusesAppController', 'Advertstatuses.Controller');
/**
 * Advertstatuses Controller
 *
 */
class AdvertstatusesController extends AdvertstatusesAppController {

/**
 * Scaffold
 *
 * @var mixed
 */
public $scaffold = 'Advertstatuses';

	/**
     * index method
     */
	public function admin_index()
	{
		$this->Advertstatus->recursive = 1;
		$options = array(
			'conditions' => array(),
			'order'      => array(
				'Advertstatus.ID' => 'ASC'
				)
			);

        //handle search
		if (array_key_exists('Advertstatus', $this->request->data)) {

			$filterAdvertstatus = array();

			if (!empty($this->request->data["Advertstatus"]["search"])) {
				$search = $this->request->data["Advertstatus"]["search"];
				$options["conditions"]['OR'] = array(
					'Advertstatus.AdvertisementStatuses LIKE'      => "%" . $search . "%",
					'Advertstatus.ID LIKE'         => "%" . $search . "%"
					);

			}

            //set filter
			$filterAdvertstatus['search'] = $this->request->data["Advertstatus"]["search"];
			$this->Session->write("filterAdvertstatus", $filterAdvertstatus);

		} else {
			$filterAdvertstatus = array();
			if ($this->Session->check('filterAdvertstatus')) {
				$filterAdvertstatus = $this->Session->read('filterAdvertstatus');
			} else {
				$filterAdvertstatus['search'] = '';
			}

		}

		$this->paginate = $options;
		$this->set('advertstatuses', $this->paginate());
		$this->set('filterAdvertstatus', $filterAdvertstatus);
	}

    /**
     * add method
     *
     * @return void
     */
    public function admin_add()
    {
    	if ($this->request->is('Post') || $this->request->is('put')) {
    		$data['Advertstatus'] = $this->request->data['Advertstatus'];
    		if ($this->Advertstatus->save($data)) {
    			$this->Session->setFlash(__("Add success"));
    			$this->redirect(Router::url(array('controller' => 'advertstatuses', 'action' => 'index', 'admin' => true)));
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

    }

    /**
     * Edit a highlight
     * @param null $id
     * @throws NotFoundException
     */
    public function admin_edit($id = null)
    {
    	$banner = $this->Advertstatus->read(null, $id);
    	if ($this->request->is('Post') || $this->request->is('put')) {
    		$this->Advertstatus->id = $id;
    		$data = $this->request->data['Advertstatus'];
    		if ($this->Advertstatus->save($data)) {
    			$this->Session->setFlash(__("Edit success"));
    			$this->redirect(Router::url(array('controller' => 'advertstatuses', 'action' => 'index', 'admin' => true)));
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
    	$this->Advertstatus->id = $id;
    	$this->Advertstatus->delete();
    	$this->Session->setFlash(__("Delete success"));
    	$this->redirect($this->referer());
    }
}
