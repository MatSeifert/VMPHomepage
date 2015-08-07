<?php
	if (isset($_GET["site"]) && @$_GET["site"] != null) {
		$seite = @$_GET["site"];
	} else $seite = "start";

	switch($seite) {
	   	case "start": @include __DIR__ . '/../content/news.php';
		break;

		case "archive": @include __DIR__ . '/../content/archive.php';
		break;

		case "information": @include __DIR__ . '/../content/information.html';
		break;

		case "rules": @include __DIR__ . '/../content/rules.html';
		break;

		case "calendar": @include __DIR__ . '/../content/kalender.php';
		break;

		case "letsplay": @include __DIR__ . '/../content/letsplay.php';
		break;

		case "member": @include __DIR__ . '/../content/member.php';
		break;

		case "joinus": @include __DIR__ . '/../content/joinus.php';
		break;

		case "mania2011": @include __DIR__ . '/../content/mania2011.php';
		break;

		case "mania2012": @include __DIR__ . '/../content/mania2012.php';
		break;

		case "mania2013": @include __DIR__ . '/../content/mania2013.php';
		break;

		case "mania2014": @include __DIR__ . '/../content/mania2014.php';
		break;

		case "mania2015": @include __DIR__ . '/../content/mania2015.php';
		break;

		case "AddNews": @include __DIR__ . '/../content/WriteNews.php';
		break;

		case "SaveNews": @include __DIR__ . '/../content/SaveNews.php';
		break;

		case "playVideo": @include __DIR__ . '/../content/playVideo.php';
		break;

		case "screenshots": @include __DIR__ . '/../content/screenshots.php';
		break;

		case "MinecraftMonuments": @include __DIR__ . '/../content/galleries/minecraft.php';
		break;

		case "AdventuresOfDayZ": @include __DIR__ . '/../content/galleries/dayz.php';
		break;

		case "read": @include __DIR__ . '/../content/readArticle.php';
		break;

		case "bugtracker": @include __DIR__ . '/../content/bugtracker.php';
		break;

		case "SaveBugreport": @include __DIR__ . '/../content/saveBugreport.php';
		break;

		case "thankyou": @include __DIR__ . '/../content/thankYou.php';
		break;

		case "disclaimer": @include __DIR__ . '/../content/disclaimer.php';
		break;

		case "changelog": @include __DIR__ . '/../content/changelog.php';
		break;

		case "minecraft": @include __DIR__ . '/../content/minecraft.php';
		break;

		case "teamspeak": @include __DIR__ . '/../content/teamspeak.php';
		break;

		case "CitiesOfAnno2070": @include __DIR__ . '/../content/galleries/anno2070.php';
		break;

		case "FunWithGuns": @include __DIR__ . '/../content/galleries/borderlands2.php';
		break;

		case "authority": @include __DIR__ . '/../content/responsibilities.php';
		break;

		case "mobile": @include __DIR__ . '/../content/mobile.php';
		break;

		case "mania15_register": @include ___DIR__ . '/../content/maniaRegister.php';
		break;

		case "area51": @include __DIR__ . '/../content/area51.php';
		break;

		case "StoriesFromLosSantos": include __DIR__ . '/../content/galleries/gta5.php';
		break;

		case "WeBuildThisCity": include __DIR__ . '/../content/galleries/citiesSkylines.php';
		break;

	   	default: @include __DIR__ . '/../content/error404.php';
  }
?>
