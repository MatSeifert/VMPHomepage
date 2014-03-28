<?php
	# Die Variable $seite darf nur ueber die URL kommen und nicht z.B. ueber fremde Formulare
	# Wenn keine Seite angegeben wurde, z.B. bei www.meinehp.de
	
	$site = $_GET["site"];
	if (!isset($site) || empty($site)) $site = "start";
	# hole Datei zur angegebenen Zahl
	
	// Ausgabe zur Überprüfung des variableninhalts
	// echo $site;	
	
	switch($site) {
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
		
	   	default: @include __DIR__ . '/../content/error404.php';
  }
?>	