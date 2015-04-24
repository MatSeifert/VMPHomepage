<div class="whereAmI">
    TESTSEITE
</div>

<div class="PostTitle">
	TESTSEITE
</div>

<div class="PostPost">
    <?php
        echo "Vielen Dank für deine Bewerbung! Wir werden uns innerhalb von 24h über Steam oder Email bei dir melden. <br><br>
            	 <a href=\"?site=start\">Hier</a> geht es wieder zur Startseite.<br><br>
            	Zur Überprüfung siehst Du hier noch einmal die an uns übermittelten Daten:<br>
            	<div style=\"float: left\">
            		Name: <br>
            		Nickname: <br>
            		Steamname: <br>
            		Email Adresse: <br>
            		Alter: <br>
            		Warum passt du zu uns?
            	</div>
            	<div style=\"float: left\">"
            		. $_POST['Name'] . "<br>"
            		. $_POST['Nickname'] . "<br>"
            		. $_POST['Steamname'] . "<br>"
            		. $_POST['E-Mail'] . "<br>"
            		. $_POST['Alter'] . "<br>"
            		. $_POST['Bemerkungen'] . "<br>
            	</div>";
    ?>
</div>
