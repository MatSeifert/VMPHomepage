<div class="scrollMenuBox">
    <div class="scrollMenuUpper">
        <a href="?site=start"><i class="fa fa-home"></i></a>
    </div>
    <div class="scrollMenuLower">
        Startseite
    </div>
</div>

<div class="scrollMenuBox">
    <div class="scrollMenuUpper">
        <a href="?site=forum"><i class="fa fa-comments"></i></a>
    </div>
    <div class="scrollMenuLower">
        Forum
    </div>
</div>

<?php
    if (isset($_GET["site"]) && @$_GET["site"] != "start") {
        echo '<div class="scrollMenuBox"></div>';
    }
?>

<div class="scrollMenuBox">
    <div class="scrollMenuUpper">
        <a href="#top"><i class="fa fa-arrow-circle-o-up"></i></a>
    </div>
    <div class="scrollMenuLower">
        Nach oben
    </div>
</div>
