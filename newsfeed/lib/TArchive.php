<?php

	namespace VMP;

	class Tumblr {

		function __construct($consumerKey, $consumerSecret = null, $token, $tokenSecret = null) {
			$client = new \Tumblr\API\Client($consumerKey, $consumerSecret);
			$client->setToken($token, $tokenSecret);
		
			$options = array("limit" => 1);

			$replace = "<img class=\"rect\" ";
			$search = "<img ";

			foreach ($client->getBlogPosts('vmp-clan', $options)->posts as $post) {

				$postArchive = $post->body;
				$replacedPostArchive = str_replace($search, $replace, $postArchive);
				echo $postArchive;
				echo $replacedPostArchive;

				$date = date('d.m.Y - H:i', $post->timestamp);
				echo "<span class=\"smallHeadline\"> $date - $post->title \n </span>";
				// echo "";

			}
		}	
	}

?>