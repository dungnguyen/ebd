<?php
App::uses('AdverttariffAppController', 'Adverttariff.Controller');
/**
 * Adverttariffs Controller
 *
 */
class AdverttariffController extends AdverttariffAppController {

/**
 * Scaffold
 *
 * @var mixed
 */
public $scaffold = 'Adverttariff';

	/**
     * index method
     */
	public function admin_index()
	{
        $this->loadModel('Adpageoption');
        $adpageoptions = $this->Adpageoption->find('list', array('fields' => array('ID', 'pagetype')));
        $this->set('adpageoptions', $adpageoptions);

        $this->loadModel('Adposition');
        $adpositions = $this->Adposition->find('list', array('fields' => array('ID', 'position')));
        $this->set('adpositions', $adpositions);

        $this->loadModel('Adtype');
        $adtypes = $this->Adtype->find('list', array('fields' => array('ID', 'advariation')));
        $this->set('adtypes', $adtypes);

        $this->Adverttariff->recursive = 1;
        $options = array(
           'conditions' => array(),
           'order'      => array(
            'Adverttariff.ID' => 'ASC'
            )
           );

        //handle search
        if (array_key_exists('Adverttariff', $this->request->data)) {

            $filterType = $this->request->data["Adverttariff"]["adtype"];
            $filterPage = $this->request->data["Adverttariff"]["adpage"];
            $filterPosition = $this->request->data["Adverttariff"]["adposition"];
            $options["conditions"] = array('OR' =>array(
                'Adverttariff.adtype' => $filterType,
                'Adverttariff.adpage' => $filterPage,
                'Adverttariff.adposition' => $filterPosition
                ));

            $filterAdverttariff = array();

            if (!empty($this->request->data["Adverttariff"]["search"])) {
                $search = $this->request->data["Adverttariff"]["search"];
                $options["conditions"]['OR'] = array(
                 'Adverttariff.adtype LIKE'      => "%" . $search . "%",
                 'Adverttariff.adpage LIKE'      => "%" . $search . "%",
                 'Adverttariff.adposition LIKE'      => "%" . $search . "%",
                 'Adverttariff.adcost LIKE'      => "%" . $search . "%",
                 'Adverttariff.period LIKE'      => "%" . $search . "%",
                 'Adverttariff.ID LIKE'         => "%" . $search . "%"
                 );

            }

            //set filter
            $filterAdverttariff['search'] = $this->request->data["Adverttariff"]["search"];
            $this->Session->write("filterAdverttariff", $filterAdverttariff);

        } else {
           $filterAdverttariff = array();
           if ($this->Session->check('filterAdverttariff')) {
            $filterAdverttariff = $this->Session->read('filterAdverttariff');
        } else {
            $filterAdverttariff['search'] = '';
        }

    }

    $this->paginate = $options;
    $this->set('adverttariff', $this->paginate());
    $this->set('filterAdverttariff', $filterAdverttariff);
}

    /**
     * add method
     *
     * @return void
     */
    public function admin_add()
    {
    	if ($this->request->is('Post') || $this->request->is('put')) {
    		$data['Adverttariff'] = $this->request->data['Adverttariff'];
    		if ($this->Adverttariff->save($data)) {
    			$this->Session->setFlash(__("Add success"));
    			$this->redirect(Router::url(array('controller' => 'adverttariff', 'action' => 'index', 'admin' => true)));
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
       $this->loadModel('Adpageoption');
       $adpageoptions = $this->Adpageoption->find('list', array('fields' => array('ID', 'pagetype')));
       $this->set('adpageoptions', $adpageoptions);

       $this->loadModel('Adposition');
       $adpositions = $this->Adposition->find('list', array('fields' => array('ID', 'position')));
       $this->set('adpositions', $adpositions);

       $this->loadModel('Adtype');
       $adtypes = $this->Adtype->find('list', array('fields' => array('ID', 'advariation')));
       $this->set('adtypes', $adtypes);
   }

    /**
     * Edit a highlight
     * @param null $id
     * @throws NotFoundException
     */
    public function admin_edit($id = null)
    {
    	$banner = $this->Adverttariff->read(null, $id);
    	if ($this->request->is('Post') || $this->request->is('put')) {
    		$this->Adverttariff->id = $id;
    		$data = $this->request->data['Adverttariff'];
    		if ($this->Adverttariff->save($data)) {
    			$this->Session->setFlash(__("Edit success"));
    			$this->redirect(Router::url(array('controller' => 'adverttariff', 'action' => 'index', 'admin' => true)));
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
    	$this->Adverttariff->id = $id;
    	$this->Adverttariff->delete();
    	$this->Session->setFlash(__("Delete success"));
    	$this->redirect($this->referer());
    }
}
