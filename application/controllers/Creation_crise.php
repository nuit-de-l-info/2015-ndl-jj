<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Creation_crise extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        // @todo : add get data from database (table categorie)

        if ($this->input->post('ajouter_crise') == 'sent'){
            // rules for form add crisis
            $rules = array(
                array(
                    'field' => 'nom_crise',
                    'label' => 'Nom crise',
                    'rules' => 'required',
                ),
                array(
                    'field' => 'hashtag_2',
                    'label' => '',
                    'rules' => 'required',
                ),
                array(
                    'field' => 'email',
                    'label' => 'Email',
                    'rules' => 'required',
                ),
            );

            // valid form
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run() === true) {
                // get data from form
                $data = array(
                    'nom_crise' => trim(strtolower($this->input->post('nom_crise'))),
                    'description_crise' => trim(strtolower($this->input->post('description_crise'))),
                    'type_crise' => trim(strtolower($this->input->post('type_crise'))),
                    'hashtag_2' => trim(strtolower($this->input->post('hashtag_2'))),
                    'email' => trim(strtolower($this->input->post('email'))),
                    'twitter' => trim(strtolower($this->input->post('twitter'))),
                );

                // add data in table crise
                // if ajout ok
                $this->data->values_form = array(
                    'nom_crise' => $this->input->post('nom_crise'),
                    'description_crise' => $this->input->post('description_crise'),
                    'type_crise' => $this->input->post('type_crise'),
                    'hashtag_2' => $this->input->post('hashtag_2'),
                    'email' => $this->input->post('email'),
                    'twitter' => $this->input->post('twitter'),
                );
            }else{
                // display alert message error
            }
        }
        $this->data->categories = array('attentat', 'séisme', 'ouragan', 'thibault');
    	$this->template->set_layout('default')
            ->build('views/creation_crise/add', $this->data);
    }
}