<?php
App::uses('AdtrackersAppController', 'Adtrackers.Controller');
/**
 * Adtrackers Controller
 *
 */
class AdtrackersController extends AdtrackersAppController {

/**
 * Scaffold
 *
 * @var mixed
 */
public $scaffold = 'Adtrackers';

	/**
     * index method
     */
	public function admin_index()
	{
		$this->Adtracker->recursive = 1;
		$options = array(
			'conditions' => array(),
			'order'      => array(
				'Adtracker.ID' => 'ASC'
				)
			);

        //handle search
		if (array_key_exists('Adtracker', $this->request->data)) {

			$filterAdtracker = array();

			if (!empty($this->request->data["Adtracker"]["search"])) {
				$search = $this->request->data["Adtracker"]["search"];
				$options["conditions"]['OR'] = array(
					'Adtracker.AdvertID LIKE'      => "%" . $search . "%",
          'Adtracker.DateTimeChecked LIKE'      => "%" . $search . "%",
          'Adtracker.IPaddresschecked LIKE'      => "%" . $search . "%",
          'Adtracker.ID LIKE'         => "%" . $search . "%"
          );

			}

      //set filter
			$filterAdtracker['search'] = $this->request->data["Adtracker"]["search"];
			$this->Session->write("filterAdtracker", $filterAdtracker);

		} else {
			$filterAdtracker = array();
			if ($this->Session->check('filterAdtracker')) {
				$filterAdtracker = $this->Session->read('filterAdtracker');
			} else {
				$filterAdtracker['search'] = '';
			}

		}

		$this->paginate = $options;
		$this->set('adtrackers', $this->paginate());
		$this->set('filterAdtracker', $filterAdtracker);
	}

    /**
     * add method
     *
     * @return void
     */
    public function admin_add()
    {
    	if ($this->request->is('Post') || $this->request->is('put')) {
        $this->request->data['Adtracker']['DateTimeChecked'] = date('Y-m-d H:i:s');
        $data['Adtracker'] = $this->request->data['Adtracker'];
        if ($this->Adtracker->save($data)) {
         $this->Session->setFlash(__("Add success"));
         $this->redirect(Router::url(array('controller' => 'adtrackers', 'action' => 'index', 'admin' => true)));
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
   $this->loadModel('Advertisement');
   $advertisements = $this->Advertisement->find('list', array('fields' => array('ID', 'AdvertismentText')));
   $this->set('advertisements', $advertisements);
 }

    /**
     * Edit a highlight
     * @param null $id
     * @throws NotFoundException
     */
    public function admin_edit($id = null)
    {
    	$banner = $this->Adtracker->read(null, $id);
    	if ($this->request->is('Post') || $this->request->is('put')) {
    		$this->Adtracker->id = $id;
        $this->request->data['Adtracker']['DateTimeChecked'] = date('Y-m-d H:i:s');
        $data = $this->request->data['Adtracker'];
        if ($this->Adtracker->save($data)) {
         $this->Session->setFlash(__("Edit success"));
         $this->redirect(Router::url(array('controller' => 'adtrackers', 'action' => 'index', 'admin' => true)));
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
    	$this->Adtracker->id = $id;
    	$this->Adtracker->delete();
    	$this->Session->setFlash(__("Delete success"));
    	$this->redirect($this->referer());
    }

  }
