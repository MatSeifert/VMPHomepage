<?php
	
	$seite = @$_GET["site"];
	if (!isset($seite) || empty($seite)) $seite = "start";

	switch($seite) {
	   	case "start": @include __DIR__ . '/../newsfeed/inc/news.php';
		break;
		
		case "archive": @include '/../newsfeed/inc/archive.php';
		break;
		
		case "information": @include __DIR__ . '/../content/information.html';
		break;
		
		case "rules": @include __DIR__ . '/../content/rules.html';
		break;

		case "calendar": @include __DIR__ . '/../content/kalender.php';
		break;
		
		case "letsplay": @include __DIR__ . '/../content/letsplay.php';
		break;
		
		case "forum": @include __DIR__ . 'content/forum.php';
		break;
		
		case "member": @include __DIR__ . '/../content/member.php';
		break;
		
		case "joinus": @include __DIR__ . 'content/joinus.php';
		break;
		
		case "mania2011": @include __DIR__ . 'content/mania2011.php';
		break;
		
		case "mania2012": @include __DIR__ . 'content/mania2012.php';
		break;
		
		case "mania2013": @include __DIR__ . 'content/mania2013.php';
		break;

		case "AddNews": @include __DIR__ . '/../newsfeed/WriteNews.php';
		break;

		case "playVideo": @include __DIR__ . '/../content/playVideo.php';
		break;

		case "screenshots": @include __DIR__ . '/../content/screenshots.php';
		break;
		
	   	default: @include __DIR__ . '/../content/error404.php';
  }
?>	