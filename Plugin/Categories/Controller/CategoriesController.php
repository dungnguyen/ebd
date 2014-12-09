<?php
App::uses('CategoriesAppController', 'Categories.Controller');
/**
 * Categories Controller
 *
 */
class CategoriesController extends CategoriesAppController {

/**
 * Scaffold
 *
 * @var mixed
 */
public $scaffold = 'Categories';

	/**
     * index method
     */
	public function admin_index()
	{
		$this->Category->recursive = 1;
		$options = array(
			'conditions' => array(),
			'order'      => array(
				'Category.id' => 'ASC'
				)
			);

        //handle search
		if (array_key_exists('Category', $this->request->data)) {

			$filterCategory = array();

			if (!empty($this->request->data["Category"]["search"])) {
				$search = $this->request->data["Category"]["search"];
				$options["conditions"]['OR'] = array(
					'Category.parent LIKE'      => "%" . $search . "%",
					'Category.title LIKE'      => "%" . $search . "%",
					'Category.groupid LIKE'      => "%" . $search . "%",
					'Category.title1 LIKE'      => "%" . $search . "%",
					'Category.inListing LIKE'      => "%" . $search . "%",
					'Category.id LIKE'         => "%" . $search . "%"
					);

			}

            //set filter
			$filterCategory['search'] = $this->request->data["Category"]["search"];
			$this->Session->write("filterCategory", $filterCategory);

		} else {
			$filterCategory = array();
			if ($this->Session->check('filterCategory')) {
				$filterCategory = $this->Session->read('filterCategory');
			} else {
				$filterCategory['search'] = '';
			}

		}

		$this->paginate = $options;
		$this->set('categories', $this->paginate());
		$this->set('filterCategory', $filterCategory);
	}

    /**
     * add method
     *
     * @return void
     */
    public function admin_add()
    {
    	if ($this->request->is('Post') || $this->request->is('put')) {
    		$data['Category'] = $this->request->data['Category'];
    		if ($this->Category->save($data)) {
    			$this->Session->setFlash(__("Add success"));
    			$this->redirect(Router::url(array('controller' => 'categories', 'action' => 'index', 'admin' => true)));
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
    	$banner = $this->Category->read(null, $id);
    	if ($this->request->is('Post') || $this->request->is('put')) {
    		$this->Category->id = $id;
    		$data = $this->request->data['Category'];
    		if ($this->Category->save($data)) {
    			$this->Session->setFlash(__("Edit success"));
    			$this->redirect(Router::url(array('controller' => 'categories', 'action' => 'index', 'admin' => true)));
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
    	$this->Category->id = $id;
    	$this->Category->delete();
    	$this->Session->setFlash(__("Delete success"));
    	$this->redirect($this->referer());
    }
}
