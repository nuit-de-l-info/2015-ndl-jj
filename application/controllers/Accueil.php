<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Accueil extends MY_Controller {

    public function index()
    {   
        $this->load->model('crise_model');

        $this->data->crises = $this->crise_model->get_all();

        $this->template->set_layout('default')
            ->build('views/home/home', $this->data);
    }

    public function get_crise_ajax($id_crise){
        $this->load->model('crise_model');
        $crises = $this->crise_model->get_all();

        if($this->input->is_ajax_request()){
            if($crises[$id_crise]){
                echo json_encode($crises[$id_crise]);
                exit;
            }
        }
        echo json_encode(false);
    
    }

    public function trombi(){
        $this->template->set_layout('default')
            ->build('views/home/trombi',$this->data);
    }


    public function error(){
    	alert('Vous n\'avez pas accès à cette page, il faut être connecté','error',true);
    	$this->index();
    }
}
