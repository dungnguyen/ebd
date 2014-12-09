<?php
App::uses('AdtypesAppController', 'Adtypes.Controller');
/**
 * Adtypes Controller
 *
 */
class AdtypesController extends AdtypesAppController {

/**
 * Scaffold
 *
 * @var mixed
 */
public $scaffold = 'Adtypes';

/**
     * index method
     */
public function admin_index()
{
	$this->Adtype->recursive = 1;
	$options = array(
		'conditions' => array(),
		'order'      => array(
			'Adtype.ID' => 'ASC'
			)
		);

        //handle search
	if (array_key_exists('Adtype', $this->request->data)) {

       if (!empty($this->request->data["Adtype"]["adtype"])) {
          $filterType = $this->request->data["Adtype"]["adtype"];
          $options["conditions"] = array(
            'Adtype.adtype' => $filterType
            );
      }
      
      $filterAdtype = array();

      if (!empty($this->request->data["Adtype"]["search"])) {
         $search = $this->request->data["Adtype"]["search"];
         $options["conditions"]['OR'] = array(
            'Adtype.adtype LIKE'      => "%" . $search . "%",
            'Adtype.advariation LIKE'      => "%" . $search . "%",
            'Adtype.ID LIKE'         => "%" . $search . "%"
            );

     }

        //set filter
     $filterAdtype['search'] = $this->request->data["Adtype"]["search"];
     $this->Session->write("filterAdtype", $filterAdtype);

 } else {
  $filterAdtype = array();
  if ($this->Session->check('filterAdtype')) {
     $filterAdtype = $this->Session->read('filterAdtype');
 } else {
     $filterAdtype['search'] = '';
 }

}

$this->paginate = $options;
$this->set('adtypes', $this->paginate());
$this->set('filterAdtype', $filterAdtype);
}

    /**
     * add method
     *
     * @return void
     */
    public function admin_add()
    {
    	if ($this->request->is('Post') || $this->request->is('put')) {
    		$data['Adtype'] = $this->request->data['Adtype'];
    		if ($this->Adtype->save($data)) {
    			$this->Session->setFlash(__("Add success"));
    			$this->redirect(Router::url(array('controller' => 'adtypes', 'action' => 'index', 'admin' => true)));
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
    	$banner = $this->Adtype->read(null, $id);
    	if ($this->request->is('Post') || $this->request->is('put')) {
    		$this->Adtype->id = $id;
    		$data = $this->request->data['Adtype'];
    		if ($this->Adtype->save($data)) {
    			$this->Session->setFlash(__("Edit success"));
    			$this->redirect(Router::url(array('controller' => 'adtypes', 'action' => 'index', 'admin' => true)));
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
    	$this->Adtype->id = $id;
    	$this->Adtype->delete();
    	$this->Session->setFlash(__("Delete success"));
    	$this->redirect($this->referer());
    }

}
