<?php
if(isset($_POST['saveDB'])){
            
            // Create connection
            $conn = mysqli_connect("localhost", "root", "", "Project");
            
            // Check connection
            if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
            }
            echo "New Recorded Connected successfully";

            $output_sql = "SELECT * FROM tempactivities";

            $result = mysqli_query($conn, $output_sql);

            if (mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){
                    $tid = $row['tid'];
                    $activity = $row['activity'];
                    $activity_id = $row['id'];
                    
                    
                    $sql = "INSERT INTO taskactivities (activityid, tid, activity) VALUES ($activity_id, '$tid','$activity')";
                    
                    mysqli_query($conn,$sql);

                   

                    
                }

                
            }

            $ff ="DELETE FROM tempactivities";

                mysqli_query($conn,$ff );
            
            //$eid = $_POST["activitryid"];
           
            //echo "New record created successfullt";
            
        
            mysqli_close($conn);
            }

            ?>