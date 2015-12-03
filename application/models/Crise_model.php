<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crise_model extends MY_Model
{

	public $table = 'crise';
	public $pk    = 'id';

	public function __construct()
	{
		parent::__construct();
	}

}
