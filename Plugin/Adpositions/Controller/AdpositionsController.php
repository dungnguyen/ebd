<?php
App::uses('AdpositionsAppController', 'Adpositions.Controller');
/**
 * Adpositions Controller
 *
 */
class AdpositionsController extends AdpositionsAppController {

/**
 * Scaffold
 *
 * @var mixed
 */
public $scaffold = 'Adpositions';

	/**
     * index method
     */

	public function admin_index()
	{
		$this->Adposition->recursive = 1;
		$options = array(
			'conditions' => array(),
			'order'      => array(
				'Adposition.ID' => 'ASC'
				)
			);

        //handle search
		if (array_key_exists('Adposition', $this->request->data)) {

			$filterAdposition = array();

			if (!empty($this->request->data["Adposition"]["search"])) {
				$search = $this->request->data["Adposition"]["search"];
				$options["conditions"]['OR'] = array(
					'Adposition.position LIKE'      => "%" . $search . "%",
					'Adposition.ID LIKE'         => "%" . $search . "%"
					);

			}

            //set filter
			$filterAdposition['search'] = $this->request->data["Adposition"]["search"];
			$this->Session->write("filterAdposition", $filterAdposition);

		} else {
			$filterAdposition = array();
			if ($this->Session->check('filterAdposition')) {
				$filterAdposition = $this->Session->read('filterAdposition');
			} else {
				$filterAdposition['search'] = '';
			}

		}

		$this->paginate = $options;
		$this->set('adpositions', $this->paginate());
		$this->set('filterAdposition', $filterAdposition);
	}

    /**
     * add method
     *
     * @return void
     */
    public function admin_add()
    {
    	if ($this->request->is('Post') || $this->request->is('put')) {
    		$data['Adposition'] = $this->request->data['Adposition'];
    		if ($this->Adposition->save($data)) {
    			$this->Session->setFlash(__("Add success"));
    			$this->redirect(Router::url(array('controller' => 'adpositions', 'action' => 'index', 'admin' => true)));
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
    	$banner = $this->Adposition->read(null, $id);
    	if ($this->request->is('Post') || $this->request->is('put')) {
    		$this->Adposition->id = $id;
    		$data = $this->request->data['Adposition'];
    		if ($this->Adposition->save($data)) {
    			$this->Session->setFlash(__("Edit success"));
    			$this->redirect(Router::url(array('controller' => 'adpositions', 'action' => 'index', 'admin' => true)));
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
    	$this->Adposition->id = $id;
    	$this->Adposition->delete();
    	$this->Session->setFlash(__("Delete success"));
    	$this->redirect($this->referer());
    }

}
