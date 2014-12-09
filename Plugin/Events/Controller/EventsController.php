<?php
App::uses('EventsAppController', 'Events.Controller');
/**
 * Events Controller
 *
 */
class EventsController extends EventsAppController {

/**
 * Scaffold
 *
 * @var mixed
 */
public $scaffold = 'Events';

	/**
     * index method
     */
	public function admin_index()
	{
		$this->Event->recursive = 1;
		$options = array(
			'conditions' => array(),
			'order'      => array(
				'Event.ID' => 'ASC'
				)
			);

        //handle search
		if (array_key_exists('Event', $this->request->data)) {

			$filterEvent = array();

			if (!empty($this->request->data["Event"]["search"])) {
				$search = $this->request->data["Event"]["search"];
				$options["conditions"]['OR'] = array(
					'Event.EventName LIKE'           => "%" . $search . "%",
					'Event.EventLocation LIKE'      => "%" . $search . "%",
					'Event.EventPostCode LIKE'      => "%" . $search . "%",
					'Event.EventDetails LIKE'      => "%" . $search . "%",
					'Event.EventCost LIKE'      => "%" . $search . "%",
					'Event.EventURL LIKE'      => "%" . $search . "%",
					'Event.ID LIKE'                  => "%" . $search . "%"
					);

			}

            //set filter
			$filterEvent['search'] = $this->request->data["Event"]["search"];
			$this->Session->write("filterEvent", $filterEvent);

		} else {
			$filterEvent = array();
			if ($this->Session->check('filterEvent')) {
				$filterEvent = $this->Session->read('filterEvent');
			} else {
				$filterEvent['search'] = '';
			}

		}

		$this->paginate = $options;
		$this->set('events', $this->paginate());
		$this->set('filterEvent', $filterEvent);
	}

    /**
     * add method
     *
     * @return void
     */
    public function admin_add()
    {
    	if ($this->request->is('Post') || $this->request->is('put')) {
        $this->request->data['Event']['EventDate'] = date('Y-m-d H:i:s');
        $data['Event'] = $this->request->data['Event'];
        if ($this->Event->save($data)) {
         $this->Session->setFlash(__("Add success"));
         $this->redirect(Router::url(array('controller' => 'events', 'action' => 'index', 'admin' => true)));
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
    	$banner = $this->Event->read(null, $id);
    	if ($this->request->is('Post') || $this->request->is('put')) {
    		$this->Event->id = $id;
        $this->request->data['Event']['EventDate'] = date('Y-m-d H:i:s');
        $data = $this->request->data['Event'];
        if ($this->Event->save($data)) {
         $this->Session->setFlash(__("Edit success"));
         $this->redirect(Router::url(array('controller' => 'events', 'action' => 'index', 'admin' => true)));
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
    	$this->Event->id = $id;
    	$this->Event->delete();
    	$this->Session->setFlash(__("Delete success"));
    	$this->redirect($this->referer());
    }
  }
