<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Creation_crise extends MY_Controller {

    public function index()
    {
    	$this->template->set_layout('default')
            ->build('views/creation_crise/add', $this->data);
    }
}
