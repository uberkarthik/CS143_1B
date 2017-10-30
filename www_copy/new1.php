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
			<legend> Please fill out the following form </legend> 
				Movie: <br> <br>
  				  	Movie Title: <input type='text' name='title'><br><br> 
					
 					Company name: <input type='text' name='company'><br><br> 
					
 					Year: <input type='text' name='year' placeholder = 'yyyy'><br><br>
					
					Rating: <input type='radio' name='rating' value='G'> G
							<input type='radio' name='rating' value='PG-13'> PG-13
							<input type='radio' name='rating' value='M'> M
							<input type='radio' name='rating' value='R'> R
							<input type='radio' name='rating' value='PG'checked> PG <br><br>
					Genre: <input type='text' name='genre'><br><br>
  				<input type='submit' value='Submit'>
		</fieldset> 
	</form>
</body>
</html>
";

	$mytitle = $_GET["title"];
	$mycompany = $_GET["company"];
	$myyear = $_GET["year"];
	$myrating = $_GET["rating"];
	$mygenre = $_GET["genre"];

	$fetch_id = "select * from MaxMovieID"; 
	$result = $db_connection->query($fetch_id); 
	$id = $result->fetch_assoc();
	$max_count = $id[id] + 1; 

	$set_id = "update MaxMovieID set id=$max_count;";  
		
	//$mytitle = mysql_escape_string($mytitle);
	//$mycompany = mysql_escape_string($mycompany);
	if($mycompany == "")
	{
		$updater = "INSERT INTO Movie (id,title,year,rating) VALUES ($max_count, '$mytitle', $myyear, '$myrating');";
		print "$updater";
		$rs = $db_connection->query($updater);
	}
	else 
	{
		$updater = "INSERT INTO Movie (id,title,company,year,rating) VALUES ($max_count, '$mytitle', '$mycompany', $myyear, '$myrating');";
		print "$updater";
		$rs = $db_connection->query($updater);
	}
	
	$updater = "INSERT INTO MovieGenre (mid,genre) VALUES ($max_count, '$mygenre');";
	print "$updater";
	$rsi = $db_connection->query($updater);
	if($rs)
	$db_connection->query($set_id); 
	
	mysqli_close($db_connection);
?>