<?php
namespace Keitaro;

use Illuminate\Http\Request;
use Abraham\TwitterOAuth\TwitterOAuth;
use Autolink;
 

class Twitter 
{

private $consumer_key;
private $consumer_secret;
private $cache;

public function __construct($consumer_key, $consumer_secret, $cache)
	{
	$this->consumer_key = $consumer_key;
	$this->consumer_secret = $consumer_secret;
	$this->cache = $cache;
    }

public static function autoLink($tweet)
{
	return Autolink::create()->autolink($tweet);
}

public static function timeTag($date)

{
	$date = date('c', strtotime($date));

	 return "<time class='timeago' datetime='#($date)'></time>";
}



private function getAppAccessToken()
{
	$oauth = new TwitterOAuth($this->$consumer_key, $this->consumer_secret);
	$accessToken = $oauth->oauth2('oauth2/token' , ['grant_type' => 'client_credentials']);
	return $accessToken->access_token;
}


public function lastTweets($screen_name, $limit = 3)
	{
		if(time() - filemtime($this->cache) > 60){

	$twitter = new TwitterOAuth($this->consumer_key, $this->consumer_secret , null, $this->getAppAccessToken());

	$tweets = $twitter->get('statuses/user_timeline', 
	    ['screen_name' => $screen_name,
	     'exclude_replies' => true,
	     'count' => 50
	 ]);

	file_put_contents($this->cache, serialize($tweets));

	}else{
		$tweets = unserialize(file_get_contents($this->cache));
	}

	return array_splice($tweets, 0, $limit);
	}

}

?>