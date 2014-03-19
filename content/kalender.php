<?php
	$monate = array(1=>"Januar", 2=>"Februar", 3=>"M&auml;rz", 4=>"April", 5=>"Mai", 6=>"Juni", 7=>"Juli", 8=>"August", 9=>"September", 10=>"Oktober", 11=>"November", 12=>"Dezember");
	
	$year = date("Y");
	$month = date("n");
		
	$CalDate = time();
		
	$CalDays = date("t", $CalDate);
	$CalStartTimestamp = mktime(0,0,0,date("n",$CalDate),1,date("Y",$CalDate));
	$CalFirstDay = date("N", $CalStartTimestamp);
	$CalLastDay = date("N", mktime(0,0,0,date("n",$CalDate),$CalDays,date("Y",$CalDate)));
	//Testausgabe

?>

<div class="PostTitle">
	KALENDER
</div>
<br />
<span class="month"><?php echo ("$monate[$month] $year");?></span>
<table class="calendar">
	<thead>
		<tr>
			<td class="wday"> MO </td>
			<td class="wday"> DI </td>
			<td class="wday"> MI </td>
			<td class="wday"> DO </td>
			<td class="wday"> FR </td>
			<td class="wday"> SA </td>
			<td class="wday"> SO </td>
		</tr>
	</thead>
	
	<tbody>
		<?php
		  for($i = 1; $i <= $CalDays+($CalFirstDay-1)+(7-$CalLastDay); $i++)
		  {
			$CalActDay = $i - $CalFirstDay;
			$CalTodayTimestamp = strtotime($CalActDay." day", $CalStartTimestamp);
			$CalToday = date("j", $CalTodayTimestamp);
			if(date("N",$CalTodayTimestamp) == 1)
			  echo "<tr>\n";
			if(date("dmY", $CalDate) == date("dmY", $CalTodayTimestamp))
			  echo "      <td class=\"ActDay\">",$CalToday,"</td>\n";
			elseif($CalActDay >= 0 AND $CalActDay < $CalDays)
			  echo "      <td class=\"StandDay\">",$CalToday,"</td>\n";
			else
			  echo "      <td class=\"PreMonDay\">",$CalToday,"</td>\n";
			if(date("N",$CalTodayTimestamp) == 7)
			  echo "    </tr>\n";
		  }
		?>		
	</tbody>
</table>

<div class="PostPost">
Dieser Kalender ist auch als Google Kalender verfügbar, und kann in mobilen Apps und Desktopanwendungen eingebettet werden.
</div>

<p>&nbsp;</p>