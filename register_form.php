<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM logreg WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{

         if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error[] = "Email is not valid";
         }else{
         
         $insert = "INSERT INTO logreg(fullname, email, password, user_type) VALUES('$fullname','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
      }
   }
}
   

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
   <title>Signup Form</title>
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
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        select {
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
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    
</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h1>Register Now</h1>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <i class="bi bi-person-fill"></i>
      <input type="text" name="fullname" required placeholder="Enter your Full Name">
      <i class="bi bi-envelope"></i>
      <input type="email" name="email" required placeholder="Enter your Email">
      <i class="bi bi-lock"></i>
      <input type="password" name="password" required placeholder="Enter your password">
      <i class="bi bi-lock"></i>
      <input type="password" name="cpassword" required placeholder="confirm your password">
      <select name="user_type">
         <option value="user">user</option>
      </select>
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>Already have an account? <a href="login_form.php">Login</a></p>
   </form>

</div>

</body>
</html>