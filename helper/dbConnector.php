<?php
    function connect()
    {
        // TODO: Exclude Credentials
        $con = mysqli_connect("localhost","homepage","yTaYq6Mn*PTY=~%P8oQ,","webseite");

        // Check connection
        if (mysqli_connect_errno()) {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        return $con;
    }
?>
