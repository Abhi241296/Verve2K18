<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "verve";



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
$sql = "INSERT INTO main (event,style,category,Name,enrollment,branch,year,contact,partner_name,team_name) VALUES ('$Event','$style','$category','$Name','$Enrollment','$Branch','$Year','$Contact','$partner_name',$team_name')";
	if ($conn->query($sql) === TRUE) {
echo "Registered successfully";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
}
else if($category=='Duet') {
$team_name='';
$partner=$_POST['partner_name'];

$sql = "INSERT INTO main (event,style,category,Name,enrollment,branch,year,contact,partner_name,team_name) VALUES ('$Event','$style','$category','$Name','$Enrollment','$Branch','$Year','$Contact','$partner','$team_name')";
// $q="select max(ID) from main";
// $ID=mysqli_query($conn,$q);;
// while($row = mysqli_fetch_array($ID)) {
// $id = $row['max(ID)'];
// if(isset($id))
// $id=intval($id);
// }
//$sql1="INSERT INTO group_duet VALUES ('$id','$enrollment','$partner','$team_name');";
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
$sql = "INSERT INTO main (event,style,category,Name,enrollment,branch,year,contact,partner_name,team_name) VALUES ('$Event','$style','$category','$Name','$Enrollment','$Branch','$Year','$Contact','',$team_name');";
if ($conn->query($sql) === TRUE) {
echo "Registered successfully";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
$q="select max(ID) from main";
$ID=mysqli_query($conn,$q);;
while($row = mysqli_fetch_array($ID)) {
$id = $row['max(ID)'];
if(isset($id))
$id=intval($id);
}
for ($x = 2; $x <=$n; $x++) 
{
//	$str1=enrollment[$x];
//	$str2=name[$x];
    $enrollment=$_POST["enrollment$x"];
    $names=$_POST["name$x"];
 //    $sql1="SET @last_id_in_main= LAST_INSERT_ID();";
 //    if ($conn->query($sql1) === TRUE) {
	// echo "set done";
	// } else {
	// echo "Error: " . $sql1 . "<br>" . $conn->error;
	// }
    $sql2="INSERT INTO group_duet (id,enrollment,name,team_name) VALUES ('$id','$enrollment','$names','$team_name');";
	if ($conn->query($sql2) === TRUE) {
	echo "Registered successfully";
	} else {
	echo "Error: " . $sql2 . "<br>" . $conn->error;
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