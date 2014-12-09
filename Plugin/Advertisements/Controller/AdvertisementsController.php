<?php
App::uses('AdvertisementsAppController', 'Advertisements.Controller');
/**
 * Advertisements Controller
 *
 */
class AdvertisementsController extends AdvertisementsAppController {

/**
 * Scaffold
 *
 * @var mixed
 */
public $scaffold = 'Advertisements';

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

        $this->Advertisement->recursive = 1;
        $options = array(
         'conditions' => array(),
         'order'      => array(
            'Advertisement.ID' => 'ASC'
            )
         );

        //handle search
        if (array_key_exists('Advertisement', $this->request->data)) {

         $filterType = $this->request->data["Advertisement"]["AdvertisementType"];
         $filterPage = $this->request->data["Advertisement"]["AdvertisementPageType"];
         $filterPosition = $this->request->data["Advertisement"]["AdvertisementPosition"];
         $options["conditions"] = array('OR' =>array(
            'Advertisement.AdvertisementType' => $filterType,
            'Advertisement.AdvertisementPageType' => $filterPage,
            'Advertisement.AdvertisementPosition' => $filterPosition
            ));

         $filterAdvertisement = array();

         if (!empty($this->request->data["Advertisement"]["search"])) {
            $search = $this->request->data["Advertisement"]["search"];
            $options["conditions"]['OR'] = array(
               'Advertisement.DateStart LIKE'      => "%" . $search . "%",
               'Advertisement.DateEnd LIKE'      => "%" . $search . "%",
               'Advertisement.ID LIKE'         => "%" . $search . "%"
               );

        }

            //set filter
        $filterAdvertisement['search'] = $this->request->data["Advertisement"]["search"];
        $this->Session->write("filterAdvertisement", $filterAdvertisement);

    } else {
     $filterAdvertisement = array();
     if ($this->Session->check('filterAdvertisement')) {
        $filterAdvertisement = $this->Session->read('filterAdvertisement');
    } else {
        $filterAdvertisement['search'] = '';
    }

}

$this->paginate = $options;
$this->set('advertisements', $this->paginate());
$this->set('filterAdvertisement', $filterAdvertisement);
}

    /**
     * add method
     *
     * @return void
     */
    public function admin_add()
    {
    	if ($this->request->is('Post') || $this->request->is('put')) {
            $this->request->data['Advertisement']['AdvertisementUpdated'] = date('Y-m-d H:i:s');
            $this->request->data['Advertisement']['UserID'] = $this->Auth->user('id');
            $data['Advertisement'] = $this->request->data['Advertisement'];
            if ($this->Advertisement->save($data)) {
             $this->Session->setFlash(__("Add success"));
             $this->redirect(Router::url(array('controller' => 'advertisements', 'action' => 'index', 'admin' => true)));
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
    	$banner = $this->Advertisement->read(null, $id);
    	if ($this->request->is('Post') || $this->request->is('put')) {
    		$this->Advertisement->id = $id;
            $this->request->data['Advertisement']['AdvertisementUpdated'] = date('Y-m-d H:i:s');
            $this->request->data['Advertisement']['UserID'] = $this->Auth->user('id');  
            $data = $this->request->data['Advertisement'];
            if ($this->Advertisement->save($data)) {
               $this->Session->setFlash(__("Edit success"));
               $this->redirect(Router::url(array('controller' => 'advertisements', 'action' => 'index', 'admin' => true)));
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
    	$this->Advertisement->id = $id;
    	$this->Advertisement->delete();
    	$this->Session->setFlash(__("Delete success"));
    	$this->redirect($this->referer());
    }

}
