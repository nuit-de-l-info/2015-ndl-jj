<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crise_model extends MY_Model
{

	public $table = 'crise';
	public $pk    = 'id';

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Presenter de Crise_model
	 * 
	 * @param object &$crise La crise à Presenter
	 * @return void
	 */
	protected function _presenter(&$crise)
	{
		if (is_array($crise))
		{
			return $this->_collection_presenter($crise);
		}

		if (empty($crise))
		{
			$crise = false;
		}
		else
		{
			$crise->url = site_url('index.php/detail-crise/'.$crise->id);
		}

		return;
	}

}
