<?php
App::uses('FeaturedarticlesAppController', 'Featuredarticles.Controller');
/**
 * Featuredarticles Controller
 *
 */
class FeaturedarticlesController extends FeaturedarticlesAppController {

/**
 * Scaffold
 *
 * @var mixed
 */
public $scaffold = 'Featured Articles';


	/**
     * index method
     */
	public function admin_index()
	{
       $this->loadModel('Companyentry');
       $companyentries = $this->Companyentry->find('list', array('fields' => array('id', 'companyname')));
       $this->set('companyentries', $companyentries);

       $this->Featuredarticle->recursive = 1;
       $options = array(
         'conditions' => array(),
         'order'      => array(
            'Featuredarticle.ID' => 'ASC'
            )
         );

        //handle search
       if (array_key_exists('Featuredarticle', $this->request->data)) {

        if (!empty($this->request->data["Featuredarticle"]["CompanyID"])) {
            $filterCompany = $this->request->data["Featuredarticle"]["CompanyID"];
            $options["conditions"] = array(
              'Featuredarticle.CompanyID' => $filterCompany
              );
        }
        
        
        $filterFeaturedarticle = array();

        if (!empty($this->request->data["Featuredarticle"]["search"])) {
            $search = $this->request->data["Featuredarticle"]["search"];
            $options["conditions"]['OR'] = array(
               'Featuredarticle.CompanyID LIKE'           => "%" . $search . "%",
               'Featuredarticle.ArticleTitle LIKE'      => "%" . $search . "%",
               'Featuredarticle.ArticlePerson LIKE'      => "%" . $search . "%",
               'Featuredarticle.ArticleDetails	 LIKE'      => "%" . $search . "%",
               'Featuredarticle.ID LIKE'                  => "%" . $search . "%"
               );

        }

            //set filter
        $filterFeaturedarticle['search'] = $this->request->data["Featuredarticle"]["search"];
        $this->Session->write("filterFeaturedarticle", $filterFeaturedarticle);

    } else {
     $filterFeaturedarticle = array();
     if ($this->Session->check('filterFeaturedarticle')) {
        $filterFeaturedarticle = $this->Session->read('filterFeaturedarticle');
    } else {
        $filterFeaturedarticle['search'] = '';
    }

}

$this->paginate = $options;
$this->set('featuredarticles', $this->paginate());
$this->set('filterFeaturedarticle', $filterFeaturedarticle);
}

    /**
     * add method
     *
     * @return void
     */
    public function admin_add()
    {
    	if ($this->request->is('Post') || $this->request->is('put')) {
            $this->request->data['Featuredarticle']['PublishDate'] = date('Y-m-d H:i:s');
            $this->request->data['Featuredarticle']['ArticleSubmittedDate'] = date('Y-m-d H:i:s');
            $data['Featuredarticle'] = $this->request->data['Featuredarticle'];
            if ($this->Featuredarticle->save($data)) {
               $this->Session->setFlash(__("Add success"));
               $this->redirect(Router::url(array('controller' => 'featuredarticles', 'action' => 'index', 'admin' => true)));
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
    	$banner = $this->Featuredarticle->read(null, $id);
    	if ($this->request->is('Post') || $this->request->is('put')) {
    		$this->Featuredarticle->id = $id;
            $this->request->data['Featuredarticle']['PublishDate'] = date('Y-m-d H:i:s');
            $this->request->data['Featuredarticle']['ArticleSubmittedDate'] = date('Y-m-d H:i:s');
            $data = $this->request->data['Featuredarticle'];
            if ($this->Featuredarticle->save($data)) {
               $this->Session->setFlash(__("Edit success"));
               $this->redirect(Router::url(array('controller' => 'featuredarticles', 'action' => 'index', 'admin' => true)));
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
    	$this->Featuredarticle->id = $id;
    	$this->Featuredarticle->delete();
    	$this->Session->setFlash(__("Delete success"));
    	$this->redirect($this->referer());
    }
}
