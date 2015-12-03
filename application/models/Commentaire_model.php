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
	
}
