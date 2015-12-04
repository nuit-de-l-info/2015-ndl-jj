<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_mining extends MY_Controller {

    public function update_bdd()
    {   
        $this->load->model('crise_model');
        $this->load->model('twitter_model');
        $this->load->library('curl');

        $crises = $this->crise_model->get_all();

        foreach($crises as $crise){
            $hastag = $crise->hashtag;
            //on récupere les tweet sur ce hastag
            $tweets = $this->twitter_model->get_tweets_from_crise($hastag);
            $tweets = json_decode($tweets);


            $tweets_in_base = $this->twitter_model->get_all_id_tweet_by_hastag($hastag);

            $tmp = [];
            if($tweets_in_base){
                foreach ($tweets_in_base as $value) {
                    $tmp[] = $value->id_tweet;
                }

                foreach ($tweets as $key => $tweet) {
                    if(!in_array($tweet->id, $tmp)){

                        //on ajoute ce tweet en base
                        $data_to_save = array(
                            'username' => $tweet->username,
                            'id_tweet' => $tweet->id,
                            'time' => $tweet->timestamp,
                            'hashtag' => $hastag,
                            'content' =>    $tweet->content
                        );
                        $this->twitter_model->add($data_to_save);
                    }
                }

            }else{
                $tmp=null;
            }

            //on regarde si les tweets du flux existent et si non on les met en base


        }

        $this->template->set_layout('default')
            ->build('views/home/home', $this->data);
    }


    public function error(){
    	alert('Vous n\'avez pas accès à cette page, il faut être connecté','error',true);
    	$this->index();
    }
}
