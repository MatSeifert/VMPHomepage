<?php
	function DisplayNews() {
		$XmlFile='../feed/2013-02-14_Warface-ClosedBetaangespielt.xml';
    	$NewsXml = simplexml_load_file($XmlFile);

    	print_r($NewsXml);

	     foreach ($NewsXml->news as $news) {
	      echo '<tr><td class="normal"><img src="images/flag_' . $news->title . '.png" alt="Germany"></td>';

	      
	    }   	
	}
?>

<div class="PostTitle">
	NEWS
	<span class="AddNews">
		<a href="?site=AddNews">News schreiben</a>
	</span>
</div>

<div>
	<?php
		DisplayNews();
	?>
</div>
<br />


<p>&nbsp;</p>