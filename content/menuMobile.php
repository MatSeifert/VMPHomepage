<?php
    if (isset($_GET["site"]) && @$_GET["site"] != null) {
        $seite = @$_GET["site"];
    } else $seite = "start";
    // Predefine Variables, to prevent php from Q_Q
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
    $teamspeak = "";
    $mania2012 = "";
    $authority = "";
    $mobile = "";
    $area51 = "";
    $screenshots = "";
    $authority = "";
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
        case "minecraftMap": $minecraft = 'class="MobileMenuLinkActive"';
        break;
		case "teamspeak": $teamspeak = 'class="MobileMenuLinkActive"';
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
        case "authority": $authority = 'class="MobileMenuLinkActive"';
        break;
	   	default:  $start = 'class="MobileMenuLinkActive"';
    }
?>

    <script>
        // Get the GET Variable (because getting get is getting important here)
        function getUrlVars() {
            var vars = {};
            var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
            vars[key] = value;
            });
            return vars;
        }

        function determineOffset(viewport, offset, elementwidth) {
            var halfViewport = viewport / 2;

            if (offset > halfViewport)
            {
                // I don't reeeeaaaly know, why we need to add 5, but it looks more "centered", so fuck it
                return ((offset - halfViewport) + (elementwidth / 2) + 5);
            }

            return 0;
        }

        function mobileOffset() {
            var site = getUrlVars()["site"];
            var offset = 0;
            var viewport = window.innerWidth;

            switch (site) {
                case 'start':
                    offset = determineOffset(viewport, document.getElementById("start").offsetLeft, document.getElementById("start").offsetWidth)
                    break;
                case 'archive':
                    offset = determineOffset(viewport, document.getElementById("archive").offsetLeft, document.getElementById("archive").offsetWidth)
                    break;
                case 'information':
                    offset = determineOffset(viewport, document.getElementById("information").offsetLeft, document.getElementById("information").offsetWidth)
                    break;
                case 'rules':
                    offset = determineOffset(viewport, document.getElementById("rules").offsetLeft, document.getElementById("rules").offsetWidth)
                    break;
                case 'screenshots':
                    offset = determineOffset(viewport, document.getElementById("screenshots").offsetLeft, document.getElementById("screenshots").offsetWidth)
                    break;
                case 'letsplay':
                    offset = determineOffset(viewport, document.getElementById("letsplay").offsetLeft, document.getElementById("letsplay").offsetWidth)
                    break;
                case 'forum':
                    offset = determineOffset(viewport, document.getElementById("forum").offsetLeft, document.getElementById("forum").offsetWidth)
                    break;
                case 'member':
                    offset = determineOffset(viewport, document.getElementById("member").offsetLeft, document.getElementById("member").offsetWidth)
                    break;
                case 'joinus':
                    offset = determineOffset(viewport, document.getElementById("joinus").offsetLeft, document.getElementById("joinus").offsetWidth)
                    break;
                case 'teamspeak':
                    offset = determineOffset(viewport, document.getElementById("teamspeak").offsetLeft, document.getElementById("teamspeak").offsetWidth)
                    break;
                case 'minecraft':
                    offset = determineOffset(viewport, document.getElementById("minecraft").offsetLeft, document.getElementById("minecraft").offsetWidth)
                    break;
                case 'minecraftMap':
                    offset = determineOffset(viewport, document.getElementById("minecraft").offsetLeft, document.getElementById("minecraft").offsetWidth)
                    break;
                case 'mania2011':
                    offset = determineOffset(viewport, document.getElementById("mania2011").offsetLeft, document.getElementById("mania2011").offsetWidth)
                    break;
                case 'mania2012':
                    offset = determineOffset(viewport, document.getElementById("mania2012").offsetLeft, document.getElementById("mania2012").offsetWidth)
                    break;
                case 'mania2013':
                    offset = determineOffset(viewport, document.getElementById("mania2013").offsetLeft, document.getElementById("mania2013").offsetWidth)
                    break;
                case 'mania2014':
                    offset = determineOffset(viewport, document.getElementById("mania2014").offsetLeft, document.getElementById("mania2014").offsetWidth)
                    break;
                case 'mania2015':
                    offset = determineOffset(viewport, document.getElementById("mania2015").offsetLeft, document.getElementById("mania2015").offsetWidth)
                    break;
                case 'authority':
                    offset = determineOffset(viewport, document.getElementById("authority").offsetLeft, document.getElementById("authority").offsetWidth)
                    break;
                default: 0
            }

            $(document).ready(function() {
                $("#sticky").animate( {
                    scrollLeft: offset
                }, 400);
            });
        }
    </script>

    <a id="start" href="index.php?site=start" <?php echo $start ?>>News</a>
    <a id="archive" href="index.php?site=archive" <?php echo $archive ?>>Archiv</a>
    <a id="information" href="index.php?site=information" <?php echo $information ?>>Informationen </a>
    <a id="rules" href="index.php?site=rules" <?php echo $rules ?>>Clanregeln </a>
    <a id="screenshots" href="index.php?site=screenshots" <?php echo $screenshots ?>>Screenshots </a>
    <a id="letsplay" href="index.php?site=letsplay" <?php echo $letsplay ?>>Let&#39;s Play </a>
    <a id="forum" href="forum.php?site=forum" <?php echo $forum ?>>Forum </a>
    <a id="member" href="index.php?site=member" <?php echo $member ?>>Übersicht </a>
    <a id="joinus" href="index.php?site=joinus" <?php echo $joinus ?>>Join Us </a>
    <a id="teamspeak" href="index.php?site=teamspeak" <?php echo $teamspeak ?>>Teamspeak 3 </a>
    <a id="minecraft" href="index.php?site=minecraft" <?php echo $minecraft ?>>Minecraft</a>
    <a id="mania2011" href="index.php?site=mania2011" <?php echo $mania2011 ?>>Mania 2011</a>
    <a id="mania2012" href="index.php?site=mania2012" <?php echo $mania2012 ?>>Mania 2012</a>
    <a id="mania2013" href="index.php?site=mania2013" <?php echo $mania2013 ?>>Mania 2013</a>
    <a id="mania2014" href="index.php?site=mania2014" <?php echo $mania2014 ?>>Mania 2014</a>
    <!-- <a id="mania2015" href="index.php?site=mania2015" <?php echo $mania2015 ?>>Mania 2015</a> -->
    <a id="authority" href="index.php?site=authority" <?php echo $authority ?>>Impressum</a>
    <span class="w30"></span>
