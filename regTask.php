<?php

$tid=$_POST["txttid"];
$name=$_POST["txtn"];
$startdate=$_POST["txtsd"];
$enddate=$_POST["txted"];
$nature=$_POST["txtna"];

//Create Connection
$conn = mysqli_connect("localhost", "root", "", "Project");
$sql="INSERT INTO task Values('$tid', '$name', '$startdate', '$enddate', '$nature')";

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