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


				Actor/Director: <br> 

					<input type='radio' name='actdir' value='Actor' checked> Actor<br>
  					<input type='radio' name='actdir' value='Director'> Director<br>

  				  	First name: <input type='text' name='fname'><br><br> 
 					Last name: <input type='text' name='lname'><br><br> 
 					

				Male/Female: <br> 

					<input type='radio' name='gender' value='Male' checked > Male <br> 
  					<input type='radio' name='gender' value='Female' > Female<br> <br> 


  				  	Date of Birth (yyyy-mm-dd): <input type='text' name='dob'><br> <br> 
 					Date of Death (yyyy-mm-dd): <input type='text' name='dod'><br> <br> 

  				<input type='submit' value='Submit'>




		</fieldset> 

	</form>

</body>
</html>
";

$job = $_GET["actdir"]; 
$firstName = $_GET["fname"]; 
$lastName = $_GET["lname"];
$sex = $_GET["gender"];
$dob = $_GET["dob"]; 
$dod = $_GET["dod"]; 


if ($job = "Actor")
{
	$query = "INSERT INTO $job (last,first,sex,dob,dod) VALUES ('$lastName','$firstName','$sex',$dob,$dod);";
}
else 
{
	$query = "INSERT INTO $job (last,first,dob,dod) VALUES ('$lastName','$firstName',$dob,$dod);";
}
//print "The name is $firstName $lastName, $job, $sex, $dob, $dod";



print "$query";
$rs = $db_connection->query($query);
print "$rs";

mysqli_close($db_connection);


?> 