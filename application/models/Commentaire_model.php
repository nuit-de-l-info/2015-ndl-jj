<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Commentaire_model extends MY_Model
{

	public $table = 'commentaire';
	public $pk    = 'id';

	public function __construct()
	{
		parent::__construct();
	}

	public function get_commentaires_avec_crise($id_crise)
    {
  		$this->db->where('crise', $id_crise);
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function plus($com)
	{
		$this->db->where('id', $com)
				 ->limit(1)
				 ->set('nb_votes_positifs', 'nb_votes_positifs+1', FALSE);

		$this->db->update($this->table);

		return $this->db->affected_rows() > 0;
	}

	public function moins($com)
	{
		$this->db->where('id', $com)
				 ->limit(1)
				 ->set('nb_votes_negatifs', 'nb_votes_negatifs+1', FALSE);

		$this->db->update($this->table);

		return $this->db->affected_rows() > 0;
	}
	
	
}
