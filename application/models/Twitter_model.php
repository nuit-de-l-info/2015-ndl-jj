<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Twitter_model
 *
 * @package App\Models\Twitter
 */
class Twitter_model extends MY_Model
{
	// Utilisé uniquement pour compatibilité avec MY_Model
	public $table    = 'tweet';

	const CACHE_PATH = 'twitter_model/';
	const BRIDGE_URL = 'http://sohouse.thibault-chazottes.fr//?action=display&bridge=TwitterBridge&q=%{hashtag}&format=JsonFormat';

	/**
	 * Empeche toute autre méthode d'être appellée.
	 * Ce model ne correspond pas au pattern MY_Model.
	 *
	 * @param $method
	 * @param $args
	 */
	public function __call($method, $args)
	{
		return false;
	}

	public function get_all_id_tweet_by_hastag($hashtag){
		$query = $this->db->select('id_tweet')->get_where($this->table, array('hashtag' => $hashtag));

		if ($query->num_rows() > 0)
		{
			$tweet = $query->result();
			$this->_presenter($tweet);
			return $tweet;
		}
		else
		{
			return false;
		}
	}

	public function get_all_by_hastag($hashtag){
		$query = $this->db->get_where($this->table, array('hashtag' => $hashtag));

		if ($query->num_rows() > 0)
		{
			$tweet = $query->result();
			$this->_presenter($tweet);
			return $tweet;
		}
		else
		{
			return false;
		}
	}

	/**
	 * Retourne tous les tweets du club dans un tableau classé par timestamp
	 *
	 * @param void
	 * @return array Le tableau des tweets du club
	 */
	public function get_tweets_from_crise($hashtag)
	{

		$tweets = false;

		if ($hashtag != false)
		{
			$url = str_replace('{hashtag}', $hashtag, self::BRIDGE_URL);
			$return = $this->curl->simple_get($url);

			$json = json_decode($return);

			foreach ($json as $tweet)
			{
				$this->_presenter($tweet);
				$tweets[$tweet->timestamp] = $tweet;
			}

			krsort($tweets);

			// On ne garde que 25 tweets
			$tweets = array_slice($tweets, 0, 25);
		}

		$tweets = json_encode($tweets);

	
		return $tweets;
	}

	/**
	 * Présente un tweet
	 *
	 * @param object &$item
	 * @return void
	 */
	public function _presenter(&$item)
	{
		if (is_array($item))
		{
			return $this->_collection_presenter($item);
		}
		if (empty($item))
		{
			$item = false;
		}

		else
		{
			if(isset($item->username) ){
				$item->username = '@' . $item->username;
			}else{
				$item->username = '@';
			}

			if(isset($item->timestamp)){
				$time    = time();
				$elapsed = $time - $item->timestamp;
				$elapsed = (int) round($elapsed / 3600);
			}else{
				$elapsed = time();
			}

			// Le tweet date de moins de 24h
			if ($elapsed < 24)
			{
				$item->elapsed = $elapsed . 'h';
			}
			else
			{
				$elapsed = (int) round($elapsed / 24);
				$item->elapsed = $elapsed . 'j';
			}

			// On enlève certaine données qui ne nous interessent pas...
			unset($item->title);
		}
	}
}