<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_crise extends MY_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('commentaire_model', 'commentaire');
        $this->load->model('crise_model', 'crise');
        $this->load->model('categorie_model', 'categorie');
    }

    public function index($index)
    {   
        if($index && $this->data->crise = $this->crise->get($index)) {
        	$this->data->commentaire = $this->commentaire->get_commentaires_avec_crise($index);
            $this->data->categorie = $this->categorie->get($this->data->crise->categorie);
        }

        $this->template->set_layout('default')
            ->build('views/detail_crise/detail_crise', $this->data);
    }

    public function plus($crise, $comment) {
        if($comment) {
            $this->commentaire->plus($comment);
        }
        redirect(site_url('detail-crise/' . $crise), 'location');

    }

    public function moins($crise, $comment) {
        if($comment) {
            $this->commentaire->moins($comment);
        }
        redirect(site_url('detail-crise/' . $crise), 'location');

    }


    public function error(){
        alert('Vous n\'avez pas accès à cette page, il faut être connecté','error',true);
        $this->index();
    }
}
