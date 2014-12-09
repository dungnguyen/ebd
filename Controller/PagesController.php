<?php

App::uses('AppController', 'Controller');

class PagesController extends AppController {

    public function Home() {
        $this->set('title_for_layout', 'Edinburgh Business Directory Template');

        //$highlights = $this->Event->find('list', array());
        //$this->set('highlights', $highlights);

        $this->Render("home");
    }

}
