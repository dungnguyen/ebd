<?php
App::uses('AdpageoptionsAppController', 'Adpageoptions.Controller');
/**
 * Adpageoptions Controller
 *
 */
class AdpageoptionsController extends AdpageoptionsAppController {

    /**
     * Scaffold
     *
     * @var mixed
     */
    var $name = 'Adpageoptions';

    /**
     * index method
     */

    public function admin_index()
    {
        $this->Adpageoption->recursive = 1;
        $options = array(
            'conditions' => array(),
            'order'      => array(
                'Adpageoption.ID' => 'ASC'
                )
            );

        //handle search
        if (array_key_exists('Adpageoption', $this->request->data)) {

            $filterAdpageoption = array();

            if (!empty($this->request->data["Adpageoption"]["search"])) {
                $search = $this->request->data["Adpageoption"]["search"];
                $options["conditions"]['OR'] = array(
                    'Adpageoption.pagetype LIKE'      => "%" . $search . "%",
                    'Adpageoption.ID LIKE'         => "%" . $search . "%"
                    );

            }

            //set filter
            $filterAdpageoption['search'] = $this->request->data["Adpageoption"]["search"];
            $this->Session->write("filterAdpageoption", $filterAdpageoption);

        } else {
            $filterAdpageoption = array();
            if ($this->Session->check('filterAdpageoption')) {
                $filterAdpageoption = $this->Session->read('filterAdpageoption');
            } else {
                $filterAdpageoption['search'] = '';
            }

        }

        $this->paginate = $options;
        $this->set('adpageoptions', $this->paginate());
        $this->set('filterAdpageoption', $filterAdpageoption);
    }

    /**
     * add method
     *
     * @return void
     */
    public function admin_add()
    {
        if ($this->request->is('Post') || $this->request->is('put')) {
            $data['Adpageoption'] = $this->request->data['Adpageoption'];
            if ($this->Adpageoption->save($data)) {
                $this->Session->setFlash(__("Add success"));
                $this->redirect(Router::url(array('controller' => 'adpageoptions', 'action' => 'index', 'admin' => true)));
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
        $banner = $this->Adpageoption->read(null, $id);
        if ($this->request->is('Post') || $this->request->is('put')) {
            $this->Adpageoption->id = $id;
            $data = $this->request->data['Adpageoption'];
            if ($this->Adpageoption->save($data)) {
                $this->Session->setFlash(__("Edit success"));
                $this->redirect(Router::url(array('controller' => 'adpageoptions', 'action' => 'index', 'admin' => true)));
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
        $this->Adpageoption->id = $id;
        $this->Adpageoption->delete();
        $this->Session->setFlash(__("Delete success"));
        $this->redirect($this->referer());
    }

}
