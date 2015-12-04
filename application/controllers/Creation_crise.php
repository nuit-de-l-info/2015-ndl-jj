<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Creation_crise extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('crise_model', 'crise');
        $this->load->model('user_model', 'user');
        $this->load->model('categorie_model', 'categorie');
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
                $id_user = '';
                $hastag = '#crise_' . $this->input->post('hashtag_2');
                if($this->user->get_once_by_email($this->input->post('email'))){
                    $id_user = $this->user->get_once_by('email',$this->input->post('email'))->id;
                }else{
                    // add user in table
                    $data_user = array(
                        'email' => $this->input->post('email'),
                        'est_admin' => false,
                        'pseudo_twitter' => $this->input->post('twitter') !== '' ? $this->input->post('twitter') : '',
                        'mdp' => 'test',
                    );
                    $this->user->add($data_user);
                    $id_user = $this->user->get_once_by('email',$this->input->post('email'))->id;

                }
                // get data from form
                $data = array(
                    'nom' => $this->input->post('nom_crise'),
                    'description' =>$this->input->post('description_crise'),
                    'categorie' => $this->input->post('type_crise'),
                    'hashtag' => $hastag,
                    'auteur' => $id_user,
                    'latitude' => $this->input->post('latitude'),
                    'longitude' => $this->input->post('longitude'),
                );
                $result = $this->crise->add($data);
                if($result !== false){
                    alert("Déclaration de crise ajoutée avec succès",'success',true);
                    redirect('index.php/detail-crise/'.$result);
                }else{
                    alert("Erreur ajout",'error',true);
                }
                


                $this->data->values_form = array(
                    'nom_crise' => $this->input->post('nom_crise'),
                    'description_crise' => $this->input->post('description_crise'),
                    'type_crise' => $this->input->post('type_crise'),
                    'hashtag_2' => $this->input->post('hashtag_2'),
                    'email' => $this->input->post('email'),
                    'twitter' => $this->input->post('twitter'),
                );
            }else{
                // error fields required
                alert(validation_errors('- ', '<br />'),'error',true);
            }
        }
        $this->data->categories = array();
        foreach ($this->categorie->get_all() as $categorie) {
            $this->data->categories[$categorie->id] = $categorie->libelle;
        }
    	$this->template->set_layout('default')
            ->build('views/creation_crise/add', $this->data);
    }
}
