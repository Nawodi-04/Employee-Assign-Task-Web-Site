<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f0f0;
            background-image:url('blur-hotel-lobby.jpg');
            background-position: center;
            background-size: cover;
            min-height: 100vh;
            width: 100%;
            margin: 0;
            padding: 0;
}

table {
    max-width: 400px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    font-size: 24px;
    color: #333;
}

th {
    padding: 5px;
    text-align: right;
}

td {
    padding: 5px;
}

select {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
    color: black;
}

#activity {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
}

#submit {
    display: block;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    padding: 10px 20px;
    margin-top: 10px;
}

#submit:hover {
    background-color: #0056b3;
}

#savedb {
    display: block;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    padding: 10px 20px;
    margin-top: 10px;
}

#savedb:hover {
    background-color: #0056b3;
}

.btn {
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    padding: 10px 20px;
    margin-top: 10px;
}

.btn:hover {
    background-color: #0056b3;
}
    </style>
    
   
    </head>
<body>

    <form  method="post">

        <center><table>
                <center><h1>Add Activity</h1></center>
                <tr>
                    <th>Task ID</th>
                    <td>
                        <select style="color: black" name = "Tid" required>
                            <option></option>
                            <?php
                                $servername = "localhost";
                                $username = "root";
                                $password = "";
                                $database = "project";
                                
                                
                                // Create connection
                                $conn = mysqli_connect($servername, $username, $password, $database);
                                
                                // Check connection
                                if (!$conn) {
                                  die("Connection failed: " . mysqli_connect_error());
                                }
                                echo "";
                                
                                //$eid = $_POST["activitryid"];
                                //$tid = $_POST["taskid"];
                                //$activity = $_POST["Activity"];
                                
                                $output_sql = "SELECT DISTINCT tid FROM task";
                    
                                $result = mysqli_query($conn, $output_sql);
                    
                                
                                    while($row = mysqli_fetch_assoc($result)){
                                        echo "<option>".$row['tid']."</option>";
                                        
                                    }
                                
                    
                    
                                mysqli_close($conn);
                                
                            ?>
                        </select>
                    </td>
                </tr>

            <tr>
                    <th>Activity</th>
                    <td><input type="text" name="activity" id="activity"></td>
                    <td><input type="submit" name="submit" id="submit" value="Add"></td>
                </tr>
           
        <tr>
            <th>Task id</th>
            <th>Activity</th>
            

        </tr>
                                
        <?php
            if(isset($_POST['submit'])){
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "project";
            
            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $database);
            
            // Check connection
            if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
            }
            echo "";
            
            //$eid = $_POST["activitryid"];
            $tid = $_POST["Tid"];
            $activity = $_POST["activity"];
            
            
            $sql = "INSERT INTO tempactivities (tid, activity) VALUES ('$tid','$activity')";
            
            mysqli_query($conn,$sql);
            //echo "New record created successfullt";
            
            $output_sql = "SELECT * FROM tempactivities";

            $result = mysqli_query($conn, $output_sql);

            if (mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr>
                    <th>".$row['tid']."</th>
                    <th>".$row['activity']."</th>
                    
                </tr>";
                }
            }


            mysqli_close($conn);
            }
            
            
            ?>
            
            </form> 
            <div class="savedb">
            <form method ="post" action = "assignTask.php">
            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" value = "Save DB" name = "saveDB" id="savedb"></td>
            </tr>
</div>

        </table></center>
        <br>
        
    <center> <a href="admin_page.php" target="_blank">Back</a> </center>
        </form>
    
</body>

</html>