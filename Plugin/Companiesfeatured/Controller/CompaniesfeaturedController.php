<?php
App::uses('CompaniesfeaturedAppController', 'Companiesfeatured.Controller');
/**
 * Companiesfeatureds Controller
 *
 */
class CompaniesfeaturedController extends CompaniesfeaturedAppController {

/**
 * Scaffold
 *
 * @var mixed
 */
public $scaffold = 'Companies Featured';
	/**
     * index method
     */
	public function admin_index()
	{
        $this->loadModel('Companyentry');
        $companyentries = $this->Companyentry->find('list', array('fields' => array('id', 'companyname')));
        $this->set('companyentries', $companyentries);

        $this->Companiesfeatured->recursive = 1;
        $options = array(
         'conditions' => array(),
         'order'      => array(
            'Companiesfeatured.ID' => 'ASC'
            )
         );

        //handle search
        if (array_key_exists('Companiesfeatured', $this->request->data)) {

            if (!empty($this->request->data["Companiesfeatured"]["CompanyID"])) {
                $filterCompany = $this->request->data["Companiesfeatured"]["CompanyID"];
                $options["conditions"] = array(
                  'Companiesfeatured.CompanyID' => $filterCompany
                  );
            }
            
            $filterCompaniesFeatured = array();

            if (!empty($this->request->data["Companiesfeatured"]["search"])) {
                $search = $this->request->data["Companiesfeatured"]["search"];
                $options["conditions"]['OR'] = array(
                   'Companiesfeatured.CompanyID LIKE'              => "%" . $search . "%",
                   'Companiesfeatured.FeaturedStartDate LIKE'      => "%" . $search . "%",
                   'Companiesfeatured.FeaturedEndDate LIKE'        => "%" . $search . "%",
                   'Companiesfeatured.ID LIKE'                     => "%" . $search . "%"
                   );

            }

            //set filter
            $filterCompaniesFeatured['search'] = $this->request->data["Companiesfeatured"]["search"];
            $this->Session->write("filterCompaniesFeatured", $filterCompaniesFeatured);

        } else {
         $filterCompaniesFeatured = array();
         if ($this->Session->check('filterCompaniesFeatured')) {
            $filterCompaniesFeatured = $this->Session->read('filterCompaniesFeatured');
        } else {
            $filterCompaniesFeatured['search'] = '';
        }

    }

    $this->paginate = $options;
    $this->set('companiesfeatured', $this->paginate());
    $this->set('filterCompaniesFeatured', $filterCompaniesFeatured);
}

    /**
     * add method
     *
     * @return void
     */
    public function admin_add()
    {
    	if ($this->request->is('Post') || $this->request->is('put')) {
    		$data['Companiesfeatured'] = $this->request->data['Companiesfeatured'];
    		if ($this->Companiesfeatured->save($data)) {
    			$this->Session->setFlash(__("Add success"));
    			$this->redirect(Router::url(array('controller' => 'companiesfeatured', 'action' => 'index', 'admin' => true)));
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
        $this->loadModel('Companyentry');
        $companyentries = $this->Companyentry->find('list', array('fields' => array('id', 'companyname')));
        $this->set('companyentries', $companyentries);
    }

    /**
     * Edit a highlight
     * @param null $id
     * @throws NotFoundException
     */
    public function admin_edit($id = null)
    {
    	$banner = $this->Companiesfeatured->read(null, $id);
    	if ($this->request->is('Post') || $this->request->is('put')) {
    		$this->Companiesfeatured->id = $id;
    		$data = $this->request->data['Companiesfeatured'];
    		if ($this->Companiesfeatured->save($data)) {
    			$this->Session->setFlash(__("Edit success"));
    			$this->redirect(Router::url(array('controller' => 'companiesfeatured', 'action' => 'index', 'admin' => true)));
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
    	$this->Companiesfeatured->id = $id;
    	$this->Companiesfeatured->delete();
    	$this->Session->setFlash(__("Delete success"));
    	$this->redirect($this->referer());
    }
}
