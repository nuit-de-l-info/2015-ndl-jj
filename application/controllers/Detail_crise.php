<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_crise extends MY_Controller {


    public function index()
    {   
        //$this->load->model('user_model');
        //$this->load->view('home');

        //if($this->user_lib->connected()){

        //}

        $this->template->set_layout('default')
            ->build('views/detail_crise/detail_crise', $this->data);
    }

    public function error(){
    	alert('Vous n\'avez pas accès à cette page, il faut être connecté','error',true);
    	$this->index();
    }
}
