<?php  
 $connect = mysqli_connect("localhost", "root", "", "project");  
 $sql = "SELECT * FROM assign";

 
   
 $result = mysqli_query($connect, $sql);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Employee Assign Report</title>  
           <style>
                body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h3 {
            text-align: center;
            color: #007BFF;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: center;
        }

        th {
            background-color: #007BFF;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
           </style>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br />  
           <div class="container" style="width:500px;">  
                <center><h3>Employee Assign Report</h3></center><br />                 
                <div class="table-responsive">  
                     <table class="table table-striped">  
                          <tr>  
                               <th>eid</th>  
                               <th>tid</th>
                               <th>dataassign</th>
                               <th>activityid</th>
                               <th>remark</th> 
                              
                          </tr>  
                          <?php  
                          if(mysqli_num_rows($result) > 0)  
                          {  
                               while($row = mysqli_fetch_array($result))  
                               {  
                          ?>  
                          <tr>  
                               <td><?php echo $row["eid"];?></td>  
                               <td><?php echo $row["tid"]; ?></td> 
                               <td><?php echo $row["dateassign"]; ?></td>
                               <td><?php echo $row["activityid"]; ?></td>  
                               <td><?php echo $row["remarks"]; ?></td>
                               
                          </tr>  
                          <?php  
                               }  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
           <br />  
      </body>  
 </html>