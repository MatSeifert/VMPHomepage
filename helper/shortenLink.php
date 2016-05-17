<?php
    // Get Debug Info from ini File
    $ini_array = parse_ini_file("global.ini", true);

    if ($ini_array['Debug Properties']['debug'] == 1)
    {
      function createShortLink($url) {
        return "+++ DONT SHARE NEWS IN DEBUG MODE +++";
      }
    } else {
      function createShortLink($url) {
        require_once('../vendor/invokemedia/owly-api-php//OwlyApi.php');
        $owly = OwlyApi::factory( array('key' => 's4Zm5Rxkm99z6CWEF9ikm') );

        try {
          $shortenedUrl = $owly->shorten($url);
        } catch(Exception $e) {
          echo 'Fehler beim kürzen des Links (Error in ow.ly API):' . $e->getMessage() . "<br />";
          $url = "";
        }

        return $shortenedUrl;
      }
    }

?>
