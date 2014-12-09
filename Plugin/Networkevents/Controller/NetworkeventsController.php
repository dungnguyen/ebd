<?php
App::uses('NetworkeventsAppController', 'Networkevents.Controller');
/**
 * Networkevents Controller
 *
 */
class NetworkeventsController extends NetworkeventsAppController {

/**
 * Scaffold
 *
 * @var mixed
 */
public $scaffold = 'Network Events';

	/**
     * index method
     */
	public function admin_index()
	{
    $this->loadModel('Networkorg');
    $networkorgs = $this->Networkorg->find('list', array('fields' => array('ID', 'NetworkOrganisation')));
    $this->set('networkorgs', $networkorgs);

    $this->Networkevent->recursive = 1;
    $options = array(
     'conditions' => array(),
     'order'      => array(
      'Networkevent.ID' => 'ASC'
      )
     );

        //handle search
    if (array_key_exists('Networkevent', $this->request->data)) {

      if (!empty($this->request->data["Networkevent"]["NetworkOrganisation"])) {
        $filterOrg = $this->request->data["Networkevent"]["NetworkOrganisation"];
        $options["conditions"] = array(
          'Networkevent.NetworkOrganisation' => $filterOrg
          );
      }
      
      $filterNetworkevent = array();

      if (!empty($this->request->data["Networkevent"]["search"])) {
        $search = $this->request->data["Networkevent"]["search"];
        $options["conditions"]['OR'] = array(
         'Networkevent.NetworkCost LIKE'           => "%" . $search . "%",
         'Networkevent.ID LIKE'                  => "%" . $search . "%"
         );

      }

            //set filter
      $filterNetworkevent['search'] = $this->request->data["filterNetworkevent"]["search"];
      $this->Session->write("filterNetworkevent", $filterNetworkevent);

    } else {
     $filterNetworkevent = array();
     if ($this->Session->check('filterNetworkevent')) {
      $filterNetworkevent = $this->Session->read('filterNetworkevent');
    } else {
      $filterNetworkevent['search'] = '';
    }

  }

  $this->paginate = $options;
  $this->set('networkevents', $this->paginate());
  $this->set('filterNetworkevent', $filterNetworkevent);
}

    /**
     * add method
     *
     * @return void
     */
    public function admin_add()
    {
    	if ($this->request->is('Post') || $this->request->is('put')) {
        $this->request->data['Networkevent']['Networkdatetime'] = date('Y-m-d H:i:s');
        $this->request->data['Networkevent']['Userid'] = $this->Auth->user('id');
        $data['Networkevent'] = $this->request->data['Networkevent'];
        if ($this->Networkevent->save($data)) {
         $this->Session->setFlash(__("Add success"));
         $this->redirect(Router::url(array('controller' => 'networkevents', 'action' => 'index', 'admin' => true)));
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
   $this->loadModel('Networkorg');
   $networkorgs = $this->Networkorg->find('list', array('fields' => array('ID', 'NetworkOrganisation')));
   $this->set('networkorgs', $networkorgs);

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
    	$banner = $this->Networkevent->read(null, $id);
    	if ($this->request->is('Post') || $this->request->is('put')) {
    		$this->Networkevent->id = $id;
        $this->request->data['Networkevent']['Networkdatetime'] = date('Y-m-d H:i:s');
        $this->request->data['Networkevent']['Userid'] = $this->Auth->user('id');
        $data = $this->request->data['Networkevent'];
        if ($this->Networkevent->save($data)) {
         $this->Session->setFlash(__("Edit success"));
         $this->redirect(Router::url(array('controller' => 'networkevents', 'action' => 'index', 'admin' => true)));
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
    	$this->Networkevent->id = $id;
    	$this->Networkevent->delete();
    	$this->Session->setFlash(__("Delete success"));
    	$this->redirect($this->referer());
    }
  }
