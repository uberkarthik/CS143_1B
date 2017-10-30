<?php 

include "connect.php"; 

print "

<!DOCTYPE html>
<html>
<head>
	<title>MovAct</title>

	<style> 

	fieldset
	{
		background-color: powderblue;
	}

	legend
	{
		font-weight: bold;
	}

	</style> 
</head> 
	<body>
 " ;


$query = "select * from Movie;";
$query2 = "select * from Actor;";
$rs = $db_connection->query($query); 
$result = $db_connection->query($query2); 

// foreach ($result[title] as $value)
// {
// 	print "$value";
// }

print "<form>";
print "<fieldset>";
print "<legend> Please fill the follwing form </legend>";


print "<b>Select a Movie :</b><br>";
print "<select name='Movie'>";
while($row = $rs->fetch_assoc())
{
	//print "$row[title]";
	print "<option value=$row[id]>$row[title]</option>";

}
print "</select> <br><br>";



print "<b>Select an Actor :</b><br>";
print "<select name='Actor'>";
while($row2 = $result->fetch_assoc())
{
	//print "$row[title]";
	$name = $row2[first]." ".$row2[last];
	print "<option value=$row2[id]>$name</option>";

}
print "</select><br><br>";
print "<b>Add a role: </b><br>";
print "<input name='role' type='text' placeholder='Role'><br><br>";
print "<input type='submit' name='Submit' value='Submit'>";
print "</fieldset>";
print "</form>";
print "	
</body> 
</html> 
";


	$aid = (int)$_GET["Actor"];
	$mid = (int)$_GET["Movie"];
	$role = $_GET["role"];


if(isset($_GET['Submit']))
{
	$request = "INSERT INTO MovieActor(mid,aid,role) VALUES ($mid,$aid,'$role');";
	$rs = $db_connection->query($request); 
	print "$request";
	print "$rs";


}

// $query = "select title from Movie;";
// $result = $db_connection->query($query); 

// foreach ($result as $value)
// 	print "$value";

mysqli_close($db_connection);
?> 