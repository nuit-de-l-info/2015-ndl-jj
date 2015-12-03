<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Accueil extends MY_Controller {

    //Data test
    public $crises = array(
        array(
            'name' => 'Attentat Bataclan',
            'ville' => 'Paris',
            'lat' => '48.863623',
            'longitude' => '2.371341',
            'url' => 'http://ninfo.fr/crise/0',
            'description' => 'Cras et urna ut mauris sagittis molestie. Cras tempus mattis facilisis.',
        ),
        array(
            'name' => 'Attentat Stade France',
            'ville' => 'Paris',
            'lat' => '48.918',
            'longitude' => '2.351',
            'url' => 'http://ninfo.fr/crise/1',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        )
    );

    public function index()
    {   
        $this->load->model('user_model');


        $this->data->crises = $this->crises;

        $this->template->set_layout('default')
            ->build('views/home/home', $this->data);
    }

    public function get_crise_ajax($id_crise){

        $crises = $this->crises;

        if($this->input->is_ajax_request()){
            if($crises[$id_crise]){
                echo json_encode($crises[$id_crise]);
                exit;
            }
        }
        
        echo json_encode(false);
    
    }

    public function error(){
    	alert('Vous n\'avez pas accès à cette page, il faut être connecté','error',true);
    	$this->index();
    }
}
