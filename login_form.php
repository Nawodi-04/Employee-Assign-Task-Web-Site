<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM logreg WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['fullname'];
         header('location:admin_page.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['fullname'];
         header('location:user_page.php');

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <style>
      body {
         font-family: 'Poppins', sans-serif;
            background-color: #f0f0f0;
            background-image:url('blur-hotel-lobby.jpg');
            background-position: center;
            background-size: cover;
            min-height: 100vh;
            width: 100%;
      }

      .form-container {
         background-color: #fff;
         max-width: 400px;
         margin: 0 auto;
         padding: 20px;
         border-radius: 10px;
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }

      form {
         display: flex;
         flex-direction: column;
      }

      h1 {
         text-align: center;
         color: #333;
      }

      .bi {
         font-size: 24px;
         margin: 5px;
      }

      input[type="email"],
      input[type="password"] {
         padding: 10px;
         margin: 5px 0;
         border: 1px solid #ccc;
         border-radius: 5px;
      }

      .form-btn {
         background-color: #007bff;
         color: #fff;
         border: none;
         border-radius: 5px;
         cursor: pointer;
         padding: 10px;
         margin: 10px 0;
      }

      .form-btn:hover {
         background-color: #0056b3;
      }

      .error-msg {
         color: red;
      }

      p {
         text-align: center;
      }

      a {
         text-decoration: none;
         color: #007bff;
      }
   </style>
   <!-- custom css file link  -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
 

</head>
<body>
   
<div class="form-container">

   <form action="login_form.php" method="post">
      <h1>Log In</h1>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <i class="bi bi-envelope"></i>
      <input type="email" name="email" required placeholder="enter your email">
      <i class="bi bi-lock"></i>
      <input type="password" name="password" required placeholder="enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>Don't have an account? <a href="register_form.php">register now</a></p>
   </form>

</div>

</body>
</html>