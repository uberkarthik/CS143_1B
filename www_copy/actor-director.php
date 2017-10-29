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


  				  	Date of Birth 	: <input type='text' name='dob' placeholder = 'yyyy-mm-dd'><br> <br> 
 					Date of Death : <input type='text' name='dod' placeholder = 'yyyy-mm-dd'><br> <br> 

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


$dob = str_replace('-','', $dob); 
$dod = str_replace('-','', $dod); 

$fetch_id = "select * from MaxPersonID"; 
$result = $db_connection->query($fetch_id); 
$id = $result->fetch_assoc();
$max_count = $id[id] + 1; 
//print "$max_count";
//$max_count = $max_count + 1; 
 
$set_id = "update MaxPersonID set id=$max_count;"; 
// foreach ($id as $val)
// 	print "$val"; 

if ($job == "Actor")
{
	if($dod != "")
		$query = "INSERT INTO $job (id,last,first,sex,dob,dod) VALUES ($max_count,'$lastName','$firstName','$sex',$dob,$dod);";
	else 
		$query = "INSERT INTO $job (id,last,first,sex,dob) VALUES ($max_count,'$lastName','$firstName','$sex',$dob);";	
}
else 
{
	if($dod != "")
		$query = "INSERT INTO $job (id,last,first,dob,dod) VALUES ($max_count,'$lastName','$firstName',$dob,$dod);";
	else 
		$query = "INSERT INTO $job (id,last,first,dob) VALUES ($max_count,'$lastName','$firstName',$dob);";
}
//print "The name is $firstName $lastName, $job, $sex, $dob, $dod";



print "$query";
$rs = $db_connection->query($query);
print "$rs";

if($rs)
	$db_connection->query($set_id); 

mysqli_close($db_connection);


?> 