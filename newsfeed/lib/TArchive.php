<?php

	namespace VMP;

	class Tumblr {

		function __construct($consumerKey, $consumerSecret = null, $token, $tokenSecret = null) {
			$client = new \Tumblr\API\Client($consumerKey, $consumerSecret);
			$client->setToken($token, $tokenSecret);
		
			$options = array("limit" => 3);

			foreach ($client->getBlogPosts('vmp-clan', $options)->posts as $post) {
				echo "<div class=\"PostTitle\"> $post->title \n </div>";

				$date = date('d.m.Y - H:i', $post->timestamp);
				echo "<div class=\"PostDate\"> $date \n </div>";
			}
		}	
	}

?>