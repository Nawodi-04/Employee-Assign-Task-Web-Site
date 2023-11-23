<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>User page</title>
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

      .container {
         display: flex;
         justify-content: center;
         align-items: center;
         height: 100vh;
      }

      .content {
         text-align: center;
         background-color: #fff;
         max-width: 400px;
         padding: 20px;
         border-radius: 10px;
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }

      h1 {
         font-size: 24px;
         color: #333;
      }

      span {
         font-weight: bold;
      }

      p {
         margin-top: 10px;
         color: #555;
      }

      .btn {
         display: inline-block;
         padding: 10px 20px;
         background-color: #007bff;
         color: #fff;
         text-decoration: none;
         margin: 10px;
         border: none;
         border-radius: 5px;
         cursor: pointer;
      }

      .btn:hover {
         background-color: #0056b3;
      }
   </style>
</head>
<body>
   
<div class="container">

   <div class="content">
      <h1> <span>User</span></h1>
      <h1>Welcome <span><?php echo $_SESSION['user_name'] ?></span></h1>
      <p>This is an User Page</p>
      <a href="emp.html" class="btn">Form</a>
      <a href="displayTask.html" class="btn">Report</a>
      <a href="logout.php" class="btn">Logout</a>

      <br>
      <p><center><a href="login_form.php"><input type="submit" class="btn btn-primary" value="Back" name="submit"></a></center></p>
   </div>
   

</div>

</body>
</html>