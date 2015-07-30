<?php
    if (isset($_GET["site"]) && @$_GET["site"] != null) {
        $seite = @$_GET["site"];
    } else $seite = "start";

    // Define VARIABLES
    $start = "";
    $archive = "";

    switch($seite)
    {
        case "start": $start = 'class="MobileMenuLinkActive"';
        break;

        case "archive": $archive = 'class="MobileMenuLinkActive"';
        break;
    }
?>

    <a href="?site=news" <?php echo $start ?>>News</a>
    <a href="?site=archive" <?php echo $archive ?>>Archiv</a>
    <a href="?site=archive" <?php   ?>>Informationen </a>
    <a href="?site=archive" <?php   ?>>Clanregeln </a>
    <a href="?site=archive" <?php   ?>>Screenshots </a>
    <a href="?site=archive" <?php   ?>>Let's Play </a>
    <a href="?site=archive" <?php   ?>>Forum </a>
    <a href="?site=archive" <?php   ?>>Übersicht </a>
    <a href="?site=archive" <?php   ?>>Join Us </a>
    <a href="?site=archive" <?php   ?>>Teamspeak 3 </a>
    <a href="?site=archive" <?php   ?>>Minecraft</a>
    <a href="?site=archive" <?php   ?>>Mania 2011</a>
    <a href="?site=archive" <?php   ?>>Mania 2012</a>
    <a href="?site=archive" <?php   ?>>Mania 2013</a>
    <a href="?site=archive" <?php   ?>>Mania 2014</a>
