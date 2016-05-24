<!DOCTYPE html>

<html lang="de-DE">
  <head>
    <!-- CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,100|Open+Sans:300' rel='stylesheet' type='text/css'>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <!-- Javascript -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
            integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous">
    </script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
  </head>

  <body>
    <div class="col-md-12 wrapper" ng-app="">
     	<div class="col-md-12 menu">

        <div class="col-md-12 menu-content" id="menucontent">
          <div class="col-md-2 menu-category">
            <div class="nav-category">Home</div>
            <div class="nav-point">
              <a href="#"><i class="fa fa-newspaper-o" aria-hidden="true"></i> News</a>
              <a href="#"><i class="fa fa-inbox" aria-hidden="true"></i> Archiv</a>
            </div>
          </div>
          <div class="col-md-2 menu-category">
            <div class="nav-category">VMP Clan</div>
            <div class="nav-point">
              <a href="#"><i class="fa fa-info-circle" aria-hidden="true"></i> Informationen</a>
              <a href="#"><i class="fa fa-book" aria-hidden="true"></i> Clanregeln</a>
              <a href="#"><i class="fa fa-picture-o" aria-hidden="true"></i> Screenshots</a>
              <a href="#"><i class="fa fa-gamepad" aria-hidden="true"></i> Let's Play</a>
              <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> Forum</a>
            </div>
          </div>
          <div class="col-md-2 menu-category">
            <div class="nav-category">Member</div>
            <div class="nav-point">
              <a href="#"><i class="fa fa-users" aria-hidden="true"></i> Übersicht</a>
              <a href="#"><i class="fa fa-user-plus" aria-hidden="true"></i> Join Us</a>
            </div>
          </div>
          <div class="col-md-2 menu-category">
            <div class="nav-category">Server</div>
            <div class="nav-point">
              <a href="#"><i class="fa fa-microphone" aria-hidden="true"></i> Teamspeak 3</a>
              <a href="#"><i class="fa fa-square" aria-hidden="true"></i> Minecraft</a>
            </div>
          </div>
          <div class="col-md-2 menu-category">
            <div class="nav-category">VMP Mania</div>
            <div class="nav-point">
              <a href="#"><i class="fa fa-trophy" aria-hidden="true"></i> 2011</a>
              <a href="#"><i class="fa fa-trophy" aria-hidden="true"></i> 2012</a>
              <a href="#"><i class="fa fa-trophy" aria-hidden="true"></i> 2013</a>
              <a href="#"><i class="fa fa-trophy" aria-hidden="true"></i> 2014</a>
              <a href="#"><i class="fa fa-trophy" aria-hidden="true"></i> 2015</a>
            </div>
          </div>
          <div class="col-md-2 menu-category">
            <div class="nav-category">Über die Seite</div>
            <div class="nav-point">
              <a href="#">Version 5.0</a>
              <a href="#">Impressum</a>
              <a href="#">Haftungsausschluss</a>
              <a href="#">Datenschutzerklärung</a>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-md-offset-3 inner white">

          <div class="col-md-1">
            <i class="fa fa-bars menu-toggle" aria-hidden="true" id="menutoggle"></i>

            <img src="img/logo.png" class="menu-image" alt="VMP">
          </div>

          <div class="col-md-9">
            <form method="POST" target="#" class="searchform">
              <input type="text" class="searchbar" placeholder="Suchen ...">
              <button type="submit" class="searchsubmit">
                <i class="fa fa-search" aria-hidden="true"></i>
              </button>
            </form>
          </div>

          <div class="col-md-2 userprofile-short">
            <span class="nobreak">Hallo Behemoth!</span> <br>
            <img src="img/profile.jpg" class="userprofile-short-img">
          </div>
        </div>
      </div>

      <div class="col-md-12 image-slider">

      </div>

      <div class="col-md-12">
        <div class="inner content">

        </div>
      </div>

    </div>

    <script>
      // Add Button Funcktionallity
      $("#menutoggle").click(function(){
        if($("#menucontent").is(":visible")) {
            $("#menucontent").fadeOut(200);
        }
        else {
           $("#menucontent").fadeIn(200);
        }
      });
    </script>
  </body>
</html>
