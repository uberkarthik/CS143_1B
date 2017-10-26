<?php

$db_connection = new mysqli("localhost", "cs143", "", "CS143");
$query =  $_GET["message"];
//mysql_select_db("TEST", $db_connection);
$rs = $db_connection->query($query);


print '<!DOCTYPE html>
<html>

	<head> 
		<title> U~K_P1a </title>
	</head>



	<body>
		<form action="./query.php"> 

			<fieldset>
			
				<legend>Please enter your query in the form below</legend>

				Query: <br>

				 <textarea name="message" rows="10" cols="80"></textarea>
				 <br><br> 

				 <input type = "submit" value = "Submit"> 

			</fieldset>

		</form>

	</body>


</html>
';

print "<html>";
print "<head>"; 
print "<style>"; 
print "table, th, td {border: 1px solid black;}";
print "</style>";
print "</head>"; 

print "<body>"; 

print "<p> Message = $query </p>";

print '<table style="width:70%">';
print "<tr>";

 while ($property = mysqli_fetch_field($rs)) {

    $attr =  $property->name;
    print "<th> $attr </th>";

	}


print "</tr>";

while($row = $rs->fetch_assoc())
{
	print("<tr>");
	
	foreach ($row as $value){

		print("<td align='center'>");
		print("$value");
		print("</td>");

	}
	
	print("</tr>");
		//echo htmlentities($row['_message']);
		//print "$value	";

	//} 
	//print "<br><br>";
}

print "</table>";
print "</body>";
print "</html>";


mysql_close($db_connection);

?> 
