<?php

include "connect.php"; 

$query = "select * from Movie;";
$rs = $db_connection->query($query); 


print "

<!DOCTYPE html>
<html>
<head>
	<title>Movie Review</title>

	<style> 

	fieldset
	{
		background-color: powderblue;
	}

	</style> 
</head> 
	<body>
	<fieldset> 
	<legend> Please fill the follwing form </legend>
	<form>
 " ;


print "<b>Please enter youe Name<b></br>";
print "<input type='text' placeholder='Name' name='Name'><br><br>";

print "<b>Select a Movie :</b><br>";
print "<select name='Movie'>";
while($row = $rs->fetch_assoc())
{
	//print "$row[title]";
	print "<option value=$row[id]>$row[title]</option>";

}
print "</select> <br><br>";

print "<b>Please enter your rating for the Movie</b> <br>"; 
print "
	
	<select name='rating'>

	<option value=0> 0 </option>
	<option value=1> 1 </option>
	<option value=2> 2 </option>
	<option value=3> 3 </option>
	<option value=4> 4 </option>
	<option value=5> 5 </option>
	<option value=6> 6 </option>
	<option value=7> 7 </option>
	<option value=8> 8 </option>
	<option value=9> 9 </option>
	<option value=10> 10 </option>

	</select> <br><br> 

";
//print "<input type='text' name='rating' placeholder='0-10'>";

print "<b> Please enter your comment for the Movie <b> <br>"; 
print "<textarea rows='8' cols='100' name='comment'> </textarea><br><br>";

print "<input type='submit' name='Submit' value='Submit'>";


print " 
</fieldset> 
<form>
</body> 
</html>
";

if(isset($_GET['Submit']))
{
	$name = $_GET['Name'];
	// $date = new DateTime();
	// $tstamp = $date->getTimestamp();
	$mid = $_GET['Movie'];
	$rating = $_GET['rating'];
	$comment = $_GET['comment'];

	 $req = "INSERT INTO Review(name,mid,rating,comment) VALUES ('$name',$mid,$rating,'$comment');";

	 print "$req";

	 $res = $db_connection->query($req); 
	 print "$res";

}






mysqli_close($db_connection);
?>