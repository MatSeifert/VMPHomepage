<?php

	require_once('autoloader.php');

	require_once(__DIR__ . '/../lib/TArchive.php');

	$consumerKey = 'uxPZrqtzreXNX6oY2ZfzF1yxuIOLjsLuFeCcNMpR3RXkegecU2';
	$consumerSecret = 'u1AwlpJZWeQZXw813IWYRNQjmKQUhna6q8y9GoO59Xj5DyVT1T';
	$token = 'wsDSZginzPHhzSDMXYuWqYL3QgvFa4yGQUZMuTdTfGE28xncd1';
	$tokenSecret = 'EnFglmkTa3PiP5UT66ynDrIxUfsKUCRvImpvs1iLF5AP0RP4sQ';

	$tumblr = new \VMP\Tumblr($consumerKey, $consumerSecret, $token, $tokenSecret);

?>