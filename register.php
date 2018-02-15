<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "verve2k18";



$Event=$_POST['event'];
$style=$_POST['radio-134'];
$category=$_POST['category'];
$Name=$_POST['name'];
$Enrollment=$_POST['enroll'];
$Branch=$_POST['branch'];
$Year=$_POST['year'];
$Contact=$_POST['contact'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if ($category=='Solo'){
$team_name='';
$partner_name='';
$sql = "INSERT INTO verve VALUES ('$Event','$style','$category','$Name','$Enrollment','$Branch','$Year','$Contact','$team_name','$partner_name')";
	if ($conn->query($sql) === TRUE) {
echo "Registered successfully";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
}
else if($category=='Duet') {
$team_name='';
$partner=$_POST['partner_name'];

$sql = "INSERT INTO verve VALUES ('$Event','$style','$category','$Name','$Enrollment','$Branch','$Year','$Contact','$team_name','$partner')";
	if ($conn->query($sql) === TRUE) {
echo "Registered successfully";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
}


else
{
$team_name=$_POST['team_name'];
$n=$_POST['team_size'];
$sql = "INSERT INTO verve VALUES ('$Event','$style','$category','$Name','$Enrollment','$Branch','$Year','$Contact','$team_name','');";
if ($conn->query($sql) === TRUE) {
echo "Registered successfully";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
for ($x = 2; $x <=$n; $x++) 
{
//	$str1=enrollment[$x];
//	$str2=name[$x];
    $enrollment=$_POST["enrollment$x"];
    $names=$_POST["name$x"];
    $sql1 ="INSERT INTO duet_group VALUES ('$team_name','$enrollment','$names');";
	if ($conn->query($sql1) === TRUE) {
	echo "Registered successfully";
	} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
	}

}
}


//if ($conn->query($sql) === TRUE) {
//    echo "Registered successfully";
//} else {
//    echo "Error: " . $sql . "<br>" . $conn->error;
//}

$conn->close();
?>