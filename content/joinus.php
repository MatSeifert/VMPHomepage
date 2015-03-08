<div class="whereAmI">
    JOIN US
</div>

<div class="PostTitle">
  JOIN US
</div>

<div class="PostPost">

    <form action="?site=thankyou" method="post">
        <!-- Formularfelder -->
            <br>
            <input type="text" name="Name" placeholder="Max Mustermann" class="NewsTitle required" required/>
            <br><br>
            <span class="tag">[VMP]</span><input type="text" name="Nickname" placeholder="Nickname" class="NewsTitleWithTag required" required/> &nbsp;
            <input type="text" name="Steamname" placeholder="Steamname" class="NewsTitleWithTag"/>
            <br><br>
            <input type="text" name="E-Mail" placeholder="mailadresse@provider.tld" class="NewsTitle required" required/>
            <br><br>
            <input type="number" name="Alter" placeholder="Alter" class="InputAge required"/><span class="tag" required>Du musst mindestens 18 Jahre alt sein!</span>
            <br><br>
            <input type="checkbox" name="RegelnGelesen" value="regeln" class="DefaultFormCheckbox" required/>
                <span class="tag">&nbsp;Ich habe die <a href="?site=rules" target="_blank">Clanregeln</a> gelesen &amp; akzeptiert</span>
            <br><br>
            <textarea name="Bemerkungen" class="NewsContent required" placeholder="Warum passt du zu uns?" id="NewsContent" required></textarea>
        <!-- Ende der Formularfelder -->
        	<div class="ju_disc">
        		Die Angabe deines Steam Namens ist optional. Falls das Feld ausgefüllt wird, werden wir versuchen dich direkt über Steam zu erreichen, andernfalls
                erhältst du von uns eine Antwort Email.
        	</div>
        <!-- Senden und Zurücksetzenbuttons -->
            <div class="NewsSubmit">
                <input type="Submit" name="" value="Jetzt bewerben!" class="NewsSubmit">
                <span style="width: 30px; display: inline-block;">&nbsp;</span>
                <input type="Reset" name="" value="Felder leeren" class="NewsSubmit">
            </div>
        <!-- Ende der Buttons -->
    </form>

</div>
