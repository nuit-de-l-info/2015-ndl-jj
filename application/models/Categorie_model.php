<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categorie_model extends MY_Model
{

	public $table = 'categorie';
	public $pk    = 'id';

	public function __construct()
	{
		parent::__construct();
	}

}
