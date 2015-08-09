<?php
    function createShortLink($url) {
        require_once('content/socialSDK/owly/OwlyApi.php');
        $owly = OwlyApi::factory( array('key' => 's4Zm5Rxkm99z6CWEF9ikm') );

        try {
            $shortenedUrl = $owly->shorten($url);
        } catch(Exception $e) {
            echo 'Fehler beim kürzen des Links (Error in ow.ly API):' . $e->getMessage() . "<br />";
            $url = "";
        }

        return $shortenedUrl;
    }
?>
