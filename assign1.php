<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "project";

   
    $conn = mysqli_connect($servername, $username, $password, $database);


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get form data
        $eid = $_POST['eid'];
        $tid= $_POST['tid'];
        $dateassign = $_POST["date"];
        $activityid = $_POST["activityid"];
        $remarks = $_POST["re"];

  $sql = "INSERT INTO assign VALUES ('$eid','$tid','$dateassign','$activityid','$remarks')";



        if ($conn->query($sql) === TRUE) 
        {
                echo "New Recorded Connected successfully";
            } 
            else
             {
                echo "Error: " . $sql . "<br>" . $conn->error; 
            }
    }

    
    $conn->close();
?>
