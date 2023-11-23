<?php

$eid=$_POST["txtid"];
$telephone=$_POST["txtt"];
$name=$_POST["txtn"];
$email=$_POST["txte"];
$designation=$_POST["txtd"];

//Create Connection
$conn = mysqli_connect("localhost", "root", "", "Project");
$sql="INSERT INTO employee Values('$eid', '$telephone', '$name', '$email', '$designation')";

if(mysqli_query($conn, $sql))
{
echo"New Record Created Successfully";
}
else
{
echo "Error:".$sql."<br>".mysqli_error($conn);
}
mysqli_close($conn);

?>