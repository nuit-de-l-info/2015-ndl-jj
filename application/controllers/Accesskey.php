<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Accesskey extends MY_Controller {

    public function index()
    {
    	$this->template->set_layout('default')
            ->build('views/accesskey/about', $this->data);
    }
}
