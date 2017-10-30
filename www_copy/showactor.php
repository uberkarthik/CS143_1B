<?php
include "connect.php";
print
"
<!DOCTYPE html>
<html>
<head>
	<title>U=~=S</title>

	<style> 

	fieldset
	{
		background-color: powderblue;
	}

	</style> 
</head>
<body>
		<form> 
		
		<fieldset>

			<legend> Actor Information </legend> 

		

	</form>

</body>
</html>
";
//$act = $_GET["id"];
$act = 25722;	//temporary id to test if the code works		
if ($act != "")
{
	$db_connection = mysql_connect("localhost", "cs143", "");
	mysql_select_db("CS143", $db_connection);
	$updater = "SELECT last, first, sex, dob, dod FROM Actor WHERE $act=Actor.id;";
	$rs = mysql_query($updater, $db_connection);
	$row = mysql_fetch_row($rs);				
	$mylast = $row[0];
	$myfirst = $row[1];
	$mygender = $row[2];
	$mydob = $row[3];
	$mydod = $row[4];
					
	print "Name: $myfirst $mylast<br/>";
	print "Birth: $mydob, Gender: $mygender<br/>";
	if ($mydod != null)
		print "Date of Death: $mydod<br/><hr><br>";
					
	print "<h3>Movies Starring $myfirst $mylast</h3>";
	$updater = "SELECT role, mid, title, year FROM Movie, MovieActor WHERE aid = $act AND mid = id ORDER BY year;";
	$rs = mysql_query($updater, $db_connection);
	while ($row = mysql_fetch_row($rs))
		echo "$row[0] in <a href=\"browsemovie.php?id=$row[1]\">",$row[2]," -- ",$row[3],"</a><br/>";

	print "</fieldset> ";				
	mysql_close($db_connection);
}
?>