<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_crise extends MY_Controller {


    public function index($index)
    {   
        $this->load->model('commentaire_model', 'commentaire');
        $this->load->model('crise_model', 'crise');

        $this->data->crise = $this->crise->get($index);
        $this->data->commentaire = $this->commentaire->get_commentaires_avec_crise($index);

        var_dump($this->data);

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
