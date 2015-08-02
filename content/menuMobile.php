<?php
    if (isset($_GET["site"]) && @$_GET["site"] != null) {
        $seite = @$_GET["site"];
    } else $seite = "start";

    // Define VARIABLES
    $start = "";
    $archive = "";
    $information = "";
    $rules = "";
    $calendar = "";
    $letsplay = "";
    $forum = "";
    $member = "";
    $joinus = "";
    $mania2011 = "";
    $mania2012 = "";
    $mania2013 = "";
    $mania2014 = "";
    $mania2015 = "";
    $bugtracker = "";
    $disclaimer = "";
    $changelog = "";
    $minecraft = "";
    $teamspeak3 = "";
    $mania2012 = "";
    $authority = "";
    $mobile = "";
    $area51 = "";
    $screenshots = "";

    switch($seite)
    {
        case "start": $start = 'class="MobileMenuLinkActive"';
        break;

        case "archive": $archive = 'class="MobileMenuLinkActive"';
        break;

        case "information": $information = 'class="MobileMenuLinkActive"';
        break;

        case "rules": $rules = 'class="MobileMenuLinkActive"';
        break;

        case "calendar": $calendar = 'class="MobileMenuLinkActive"';
        break;

        case "letsplay": $letsplay = 'class="MobileMenuLinkActive"';
		break;

		case "forum": $forum = 'class="MobileMenuLinkActive"';
		break;

		case "member": $member = 'class="MobileMenuLinkActive"';
		break;

		case "joinus": $joinus = 'class="MobileMenuLinkActive"';
		break;

		case "mania2011": $mania2011 = 'class="MobileMenuLinkActive"';
		break;

		case "mania2012": $mania2012 = 'class="MobileMenuLinkActive"';
		break;

		case "mania2013": $mania2013 = 'class="MobileMenuLinkActive"';
		break;

		case "mania2014": $mania2014 = 'class="MobileMenuLinkActive"';
		break;

		case "mania2015": $mania2015 = 'class="MobileMenuLinkActive"';
		break;

		case "AddNews": $start = 'class="MobileMenuLinkActive"';
		break;

		case "SaveNews": $start = 'class="MobileMenuLinkActive"';
		break;

		case "playVideo": $letsplay = 'class="MobileMenuLinkActive"';
		break;

		case "screenshots": $screenshots = 'class="MobileMenuLinkActive"';
		break;

		case "MinecraftMonuments": $screenshots = 'class="MobileMenuLinkActive"';
		break;

		case "AdventuresOfDayZ": $screenshots = 'class="MobileMenuLinkActive"';
		break;

		case "read": $start = 'class="MobileMenuLinkActive"';
		break;

		case "bugtracker": $bugtracker = 'class="MobileMenuLinkActive"';
		break;

		case "SaveBugreport": $bugtracker = 'class="MobileMenuLinkActive"';
		break;

		case "thankyou": $joinus = 'class="MobileMenuLinkActive"';
		break;

		case "disclaimer": $disclaimer = 'class="MobileMenuLinkActive"';
		break;

		case "changelog": $changelog = 'class="MobileMenuLinkActive"';
		break;

		case "minecraft": $minecraft = 'class="MobileMenuLinkActive"';
		break;

		case "teamspeak": $teamspeak3 = 'class="MobileMenuLinkActive"';
		break;

		case "CitiesOfAnno2070": $screenshots = 'class="MobileMenuLinkActive"';
		break;

		case "FunWithGuns": $screenshots = 'class="MobileMenuLinkActive"';
		break;

		case "authority": $authority = 'class="MobileMenuLinkActive"';
		break;

		case "mobile": $mobile = 'class="MobileMenuLinkActive"';
		break;

		case "mania15_register": $mania2015 = 'class="MobileMenuLinkActive"';
		break;

		case "area51": $area51 = 'class="MobileMenuLinkActive"';
		break;

		case "StoriesFromLosSantos": $screenshots = 'class="MobileMenuLinkActive"';
		break;

		case "WeBuildThisCity": $screenshots = 'class="MobileMenuLinkActive"';
		break;

	   	default: @include __DIR__ . '/../content/error404.php';
    }
?>

    <a href="?site=start" <?php echo $start ?>>News</a>
    <a href="?site=archive" <?php echo $archive ?>>Archiv</a>
    <a href="?site=information" <?php echo $information ?>>Informationen </a>
    <a href="?site=rules" <?php echo $rules ?>>Clanregeln </a>
    <a href="?site=screenshots" <?php echo $screenshots ?>>Screenshots </a>
    <a href="?site=letsplay" <?php echo $letsplay ?>>Let's Play </a>
    <a href="?site=forum" <?php echo $forum ?>>Forum </a>
    <a href="?site=member" <?php echo $member ?>>Übersicht </a>
    <a href="?site=joinus" <?php echo $joinus ?>>Join Us </a>
    <a href="?site=teamspeak3" <?php echo $teamspeak3 ?>>Teamspeak 3 </a>
    <a href="?site=minecraft" <?php echo $minecraft ?>>Minecraft</a>
    <a href="?site=mania2011" <?php echo $mania2011 ?>>Mania 2011</a>
    <a href="?site=mania2012" <?php echo $mania2012 ?>>Mania 2012</a>
    <a href="?site=mania2013" <?php echo $mania2013 ?>>Mania 2013</a>
    <a href="?site=mania2014" <?php echo $mania2014 ?>>Mania 2014</a>
    <a href="?site=mania2015" <?php echo $mania2015 ?>>Mania 2015</a>
