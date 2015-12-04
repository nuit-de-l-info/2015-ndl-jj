<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Manage extends MY_Controller {


    public function index()
    {
        $this->template->set_layout('default')
            ->build('views/manage/home', $this->data);
    }
}
