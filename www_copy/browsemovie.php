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

			<legend> Movie Information </legend> 

		

	</form>

</body>
</html>
";

$movie = $_GET["id"];
$db_connection = mysql_connect("localhost", "cs143", "");
mysql_select_db("CS143", $db_connection);
$updater = "SELECT title, year, rating, company FROM Movie WHERE $movie=Movie.id;";
$rs = mysql_query($updater, $db_connection);
$row = mysql_fetch_row($rs);
$mytitle = $row[0];
$myyear = $row[1];
$myrating = $row[2];
$mycompany = $row[3];

$updater = "SELECT first, last FROM Director, MovieDirector WHERE Director.id=MovieDirector.did AND MovieDirector.mid=$movie ORDER BY last;";
$rs = mysql_query($updater, $db_connection);

print "Movie: $mytitle<br/>";
print "Company: $mycompany<br/>";
print "Year of Release: $myyear<br/>";
print "Rated $myrating<br/>";
print "Directors: ";
while ($row = mysql_fetch_row($rs))
	echo "$row[1], $row[0]<br/>";

print "<h4> Actors Starring in $mytitle</h4>";
$updater = "SELECT first, last, dob, role, id FROM MovieActor, Actor WHERE $movie=MovieActor.mid AND Actor.id = MovieActor.aid;";
$rs = mysql_query($updater, $db_connection);
while ($row = mysql_fetch_row($rs))
	echo "<a href=\"showactor.php?id=$row[4]\">",$row[0]," ",$row[1],"</a> as $row[3]<br/>";

print "<h4> User Reviews </h4>";
print "<a href=\"Review.php?id=$movie\" target=\"main\">Click here to write a review!</a><br/>";
print "Average Rating: ";
$updater = "SELECT AVG(rating), COUNT(*) FROM Review WHERE $movie=Review.mid;";
$rs = mysql_query($updater, $db_connection);
$row = mysql_fetch_row($rs);
if ($row[1] == 0)
	print "There are no available ratings.<br/>";
else
	printf("This movie has a rating of %.1f from %d reviews.<br/>", $row[0], $row[1]);
				
$updater = "SELECT name, rating, comment, time FROM Review WHERE $movie=Review.mid;";
$rs = mysql_query($updater, $db_connection);
while ($row = mysql_fetch_row($rs)) 
{
	$name = $row[0];
	$rating = $row[1];
	$comment = $row[2];
	$time = $row[3];

					
	echo "On $row[3], ";
	if ($name == null)
		print "Unknown User ";
	else
		print "$row[0] ";
	print "rated this Movie a $row[1] <br/>";
	print "Review: $row[2]<hr>";
	print "</fieldset> ";
}
mysql_close($db_connection);
?>