<?php

require_once "dbcon.php";

session_start();

if(isset($_POST["registration"])){
  
  $name = $_POST["name"];
  $email = $_POST["email"];
  $username = $_POST["username"];
  $password = $_POST["password"];
  $c_password = $_POST["c_password"];

  /*$md5_psw = md5($_POST["password"]);
  $cmd5_psw = md5($_POST["password"]);*/

  $file_name = explode('.',$_FILES["photo"]["name"]);
  $file_end = end($file_name);
  $file_full_name = $username.'.'.$file_end;

  $input_error = array();

  if(empty($name)){

    $input_error["name"] = "This name field is required!";

  }
  if(empty($email)){

    $input_error["email"] = "This email field is required!";

  }
  if(empty($username)){

    $input_error["username"] = "This username field is required!";

  }
  if(empty($password)){

    $input_error["password"] = "This password field is required!";

  }
  if(empty($c_password)){

    $input_error["c_password"] = "This conform password field is required!";

  }


  

  if(count($input_error) == 0){

    $email_check = mysqli_query($link, "SELECT * FROM `users` WHERE `email` = '$email'; ");

    if(mysqli_num_rows($email_check) == 0){
      
      $username_check = mysqli_query($link, "SELECT * FROM `users` WHERE `username` = '$username'; ");

      if(mysqli_num_rows($username_check) == 0){
       
        if(strlen($username) > 7){
          
          if(strlen($password) > 7){
            
            if($password == $c_password){
              
              $query = "INSERT INTO `users`(`name`, `email`, `username`, `password`, `photo`, `status`) VALUES ('$name','$email','$username','$password','$file_full_name','Inactive')" ;
              
              $result = mysqli_query($link, $query);

              if($result){
                
                $_SESSION["data_insert_success"] = "Data insert success!";

                move_uploaded_file($_FILES['photo']['tmp_name'],'images/'.$file_full_name);
                
              }else{

                $_SESSION["data_insert_error"] = "Data insert error!";

              }

            }else{

              $password_not_match = "Conform password not matched!";

            }

          }else{

            $password_l  = "Password more than 8 characters!";

          }
          
        }else{
          
          $username_l = "Username more than 8 characters!";

        }
        
      }else{
        $username_error = "This username already exists!";
      }

    }else{
      $email_error = "This email already exists.";
    }


  }


  
}

?>


<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="../bootstrap link/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>Registration form</title>
</head>
<body>
  
<section class="container">
      <div class="py-5">
          <h1 class="text-center">Welcome to students Management System</h1>

          <hr>

          <div class="row justify-content-center mt-5">
              <div class="col-md-5">

                  <?php
                  
                  if(isset($_SESSION["data_insert_success"])){
                    echo "<div class='alert alert-primary'>".$_SESSION["data_insert_success"]."</div>";
                    unset($_SESSION["data_insert_success"]);
                  }
                  
                  if(isset($_SESSION["data_insert_error"])){
                    echo "<div class='alert alert-primary'>".$_SESSION["data_insert_error"]."</div>";
                    unset($_SESSION["data_insert_error"]);
                  }
                  
                  ?>

                  <h2 class="text-center mb-5">Registration form</h2>
                  <form method="POST" enctype="multipart/form-data">
                    <div class="row mb-3">
                      <label for="name" class="col-sm-2 col-form-label">Name</label>
                      <div class="col-sm-10">
                        <input type="name" name="name" placeholder="Enter your name" class="form-control" id="name" value="<?php if(isset($name)){echo $name; }?>">
                        <label for="" class="error"><?php if(isset($input_error["name"])){echo $input_error["name"];} ?></label>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="email" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" name="email" placeholder="Enter your email" class="form-control" id="email" value="<?php if(isset($email)){echo $email;} ?>">
                        
                        <label for="" class="error"><?php if(isset($input_error["email"])){echo $input_error["email"];} ?></label>
                        <label for="" class="error"><?php if(isset($email_error)){echo $email_error;} ?></label>
                      
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="username" class="col-sm-2 col-form-label">Username</label>
                      <div class="col-sm-10">
                        <input type="username" name="username" placeholder="Enter your username" class="form-control" id="username" value="<?php if(isset($username)){echo $username;} ?>">
                        
                        <label for="" class="error"><?php if(isset($input_error["username"])){echo $input_error["username"];} ?></label>
                        <label for="" class="error"><?php if(isset($username_error)){echo $username_error;} ?></label>
                        <label for="" class="error"><?php if(isset($username_l)){echo $username_l;} ?></label>
                      
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="password" class="col-sm-2 col-form-label">Password</label>
                      <div class="col-sm-10">
                        <input type="password" name="password" placeholder="Enter your password" class="form-control" id="password" value="<?php if(isset($password)){echo $password;} ?>">
                        
                        <label for="" class="error"><?php if(isset($input_error["password"])){echo $input_error["password"];} ?></label>
                        <label for="" class="error"><?php if(isset($password_l)){echo $password_l;} ?></label>
                      
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="c_password" class="col-sm-2 col-form-label">Conform password</label>
                      <div class="col-sm-10">
                        <input type="c_password" name="c_password" placeholder="Enter your conform password" class="form-control" id="c_password" value="<?php if(isset($c_password)){echo $c_password;} ?>">
                        
                        <label for="" class="error"><?php if(isset($input_error["c_password"])){echo $input_error["c_password"];} ?></label>
                        <label for="" class="error"><?php if(isset($password_not_match)){echo $password_not_match;} ?></label>
                      
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="photo" class="col-sm-2 col-form-label">Photo</label>
                      <div class="col-sm-10">
                        <input type="file" name="photo" id="photo">
                      </div>
                    </div>
                    <div class="float-end">
                        <input type="submit" value="Registration" name="registration" class="btn btn-primary">
                    </div>
                  </form>
              </div>
          </div>
          
          <p>If you have an account? then please <a href="login.php">Login</a></p>

          <hr>

          <footer>
              <p>Copyright @ 2021- <?= date('Y'); ?> All Rights Reseved</p>
          </footer>
      </div>
  </section>

</body>
</html>