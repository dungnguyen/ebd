<?php
App::uses('CompanyprofileAppController', 'Companyprofile.Controller');
/**
 * Companyprofiles Controller
 *
 */
class CompanyprofileController extends CompanyprofileAppController {

/**
 * Scaffold
 *
 * @var mixed
 */
public $scaffold = 'Company Profile';

	/**
     * index method
     */
	public function admin_index()
	{
    $this->loadModel('Companyentry');
    $companyentries = $this->Companyentry->find('list', array('fields' => array('id', 'companyname')));
    $this->set('companyentries', $companyentries);

    $this->Companyprofile->recursive = 1;
    $options = array(
     'conditions' => array(),
     'order'      => array(
      'Companyprofile.ID' => 'ASC'
      )
     );

        //handle search
    if (array_key_exists('Companyprofile', $this->request->data)) {

      if (!empty($this->request->data["Companyprofile"]["companyID"])) {
        $filterCompany = $this->request->data["Companyprofile"]["companyID"];
        $options["conditions"] = array(
          'Companyprofile.companyID' => $filterCompany
          );
      }

      $filterCompanyprofile = array();

      if (!empty($this->request->data["Companyprofile"]["search"])) {
        $search = $this->request->data["Companyprofile"]["search"];
        $options["conditions"]['OR'] = array(
         'Companyprofile.companyID LIKE'           => "%" . $search . "%",
         'Companyprofile.companyprofile LIKE'      => "%" . $search . "%",
         'Companyprofile.ID LIKE'                  => "%" . $search . "%"
         );

      }

            //set filter
      $filterCompanyprofile['search'] = $this->request->data["Companyprofile"]["search"];
      $this->Session->write("filterCompanyprofile", $filterCompanyprofile);

    } else {
     $filterCompanyprofile = array();
     if ($this->Session->check('filterCompanyprofile')) {
      $filterCompanyprofile = $this->Session->read('filterCompanyprofile');
    } else {
      $filterCompanyprofile['search'] = '';
    }

  }

  $this->paginate = $options;
  $this->set('companyprofile', $this->paginate());
  $this->set('filterCompanyprofile', $filterCompanyprofile);
}

    /**
     * add method
     *
     * @return void
     */
    public function admin_add()
    {
    	if ($this->request->is('Post') || $this->request->is('put')) {
        $this->request->data['Companyprofile']['companydateupdated'] = date('Y-m-d H:i:s');
        $this->request->data['Companyprofile']['companyupdatedby'] = $this->Auth->user('id');
        $data['Companyprofile'] = $this->request->data['Companyprofile'];
        if ($this->Companyprofile->save($data)) {
         $this->Session->setFlash(__("Add success"));
         $this->redirect(Router::url(array('controller' => 'companyprofile', 'action' => 'index', 'admin' => true)));
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
    	$banner = $this->Companyprofile->read(null, $id);
    	if ($this->request->is('Post') || $this->request->is('put')) {
    		$this->Companyprofile->id = $id;
        $this->request->data['Companyprofile']['companydateupdated'] = date('Y-m-d H:i:s');
        $this->request->data['Companyprofile']['companyupdatedby'] = $this->Auth->user('id');
        $data = $this->request->data['Companyprofile'];
        if ($this->Companyprofile->save($data)) {
         $this->Session->setFlash(__("Edit success"));
         $this->redirect(Router::url(array('controller' => 'companyprofile', 'action' => 'index', 'admin' => true)));
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
    	$this->Companyprofile->id = $id;
    	$this->Companyprofile->delete();
    	$this->Session->setFlash(__("Delete success"));
    	$this->redirect($this->referer());
    }
  }
