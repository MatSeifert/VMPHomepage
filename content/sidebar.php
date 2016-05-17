<div class="right">
    <div class="contentBox">
       <span class="RightHeadline">Teamspeak 3</span>
       <div class="rightText">
           <div data-async-url="widgets/TSViewer/teamspeak.php">
               <p>&nbsp;</p>
               <?php
                   require_once ("widgets/TSViewer/teamspeak.php")
               ?>
        </div>
       </div>
   </div>
   <p>&nbsp;</p>
   <div class="contentBox">
       <span class="RightHeadline">Termine</span>
       <div class="watchmore">
           <a href="?site=termine" class="tooltips">
               &#187;
               <span>Alle Termine</span>
           </a>
       </div>
       <p>&nbsp;</p>
       <div class="rightText">
           <?php
              // include("widgets/kalender/kalender.php")
           ?>
           <p>&nbsp;</p>
       </div>
   </div>
   <p>&nbsp;</p>
   <div class="contentBox">
       <span class="RightHeadline">Let's Play</span>
       <div class="watchmore">
           <a href="?site=letsplay" class="tooltips">
               &#187;
               <span>Alle Projekte</span>
           </a>
       </div>
       <p>&nbsp;</p>
       <div class="rightText">

        <?php require_once("widgets/letsplay/LetsPlay.html"); ?>

       </div>
   </div>
   <p>&nbsp;</p>
   <div class="contentBox">
       <span class="RightHeadline">Social Media</span>
       <p>&nbsp;</p>
       <div class="rightText">

        <?php require_once("widgets/social/media.php"); ?>

       </div>
   </div>
   <p>&nbsp;</p>
   <div class="contentBox mobileHidden" id="mobilePromo">
       <span class="RightHeadline">VMP Mobil</span>
       <div class="watchmore">
           <a href="?site=mobile" class="tooltips">
               &#187;
               <span>Mehr erfahren</span>
           </a>
       </div>
       <p>&nbsp;</p>
       <div class="rightText">
           <img src="images/responsive.png" alt="VMP Mobil" class="mobileScreen">
        Auch unterwegs immer auf dem aktuellsten Stand. Mit der mobilen Webseite des VMP Clans kein Problem!
        <p>&nbsp;</p>
       </div>
   </div>
</div>
