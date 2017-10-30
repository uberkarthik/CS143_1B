<?php
include "connect.php"; 
print "
<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
<style>
//table, th, td {border: 1px solid black;}

legend
	{
		font-weight: bold;
	}
	
.first
{
	float: left; 
	width: 45%;
}
.second
{
	float: right; 
	width: 45%;
}
</style>
</head> 
	<body>
	<fieldset> 
	<legend> What would you like to search  </legend>
	<form>
	<input type='text' size='50' name='search' placeholder='Search'>
	<input type='submit' name='Submit' value='Submit'>
	</form>
	</fieldset> 
	<br> 
	<br>
 " ;
if ( isset($_GET['Submit']))
{
$key = $_GET['search']; 
$words = explode(" ", $key);
print "<div class = 'first'>";
print "<b> The results from Actors are - </b><br>";
print '<table>';

	$arr_size = sizeof($words); 

	if($arr_size == 1)
	{
	 	$query =  "SELECT id,first, last FROM Actor where first REGEXP '$words[0]' or last REGEXP '$words[0]';";
	 	//print "hit1";
	}
	else 
	{
		$query =  "SELECT id,first, last FROM Actor where 
		(first REGEXP '$words[0]' and last REGEXP '$words[1]') or (first REGEXP '$words[1]' and last REGEXP '$words[0]');";
		//print "hit2";
	}


	 $rs = $db_connection->query($query);
	while($row = $rs->fetch_assoc())
	{
		print("<tr>");
		
			print("<td>");
			
			$name = $row['first']." ".$row['last'];
			$uid = $row['id'];
			//print "$name";
			print "<a href='http://localhost:1438/~cs143/showactor.php?id=$uid'> $name </a>";

			print("</td>");
		print("</tr>");

	}

print "</table>";
print "</div>";
 print "<div class = 'second'>";
 print "<b> The results from Movies are - </b> <br>";
 print '<table>';


if($arr_size != 1)
{
	 $query =  "SELECT id,title FROM Movie where title REGEXP '$words[0]' and title REGEXP '$words[1]';";
}
else 
{
	 $query =  "SELECT id,title FROM Movie where title REGEXP '$words[0]';";
}

 $rs = $db_connection->query($query);
while($row = $rs->fetch_assoc())
{
	print("<tr>");
	
		print("<td>");
		$name = $row['title'];
		$uid = $row['id'];
		//print "$name";
		//print_r ($row);
		print "<a href='http://localhost:1438/~cs143/browsemovie.php?id=$uid'> $name </a>";
		print("</td>");
	print("</tr>");
	// 	//echo htmlentities($row['_message']);
	// 	//print "$value	";
	// //} 
	// //print "<br><br>";
}

 print "</table>";
 print "</div>";
 }
print "</body>"; 
print "</html>";
 ?> 