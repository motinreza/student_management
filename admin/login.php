<?php

session_start();

if(isset($_SESSION["user_login"])){
    header("location: index.php");
}

require_once("dbcon.php");

if(isset($_POST["login"])){
    
    $username = $_POST["username"];
    $password = $_POST["password"];

    $username_check = mysqli_query($link, "SELECT * FROM `users` WHERE `username` = '$username' ");
    
    if(mysqli_num_rows($username_check) > 0){
        
        $row = mysqli_fetch_assoc($username_check);

        if($row["password"] == $password){
            
            if($row["status"] == "active"){
                
                $_SESSION["user_login"] = $username;

                header("location: index.php");
                
            }else{
                
                $status_inactive = "Your status inactive!";
                
            }
            
        }else{
            
            $wrong_password = "This password is wrong!";
            
        }

    }else{
        
        $username_not_found = "This username not found!";
        
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
  <title>Admin login</title>
</head>
<body>
  
<section class="container">
      <div class="py-5">
          <h1 class="text-center">Welcome to students Management System</h1>

          <div class="row justify-content-center mt-5">
              <div class="col-md-4">
                  <h2 class="text-center mb-5">Admin login form</h2>
                  <form action="login.php" method="POST">
                    <div>
                        <input type="text" name="username" placeholder="Username" required="" class="form-control" value="<?php if(isset($username)){ echo $username; } ?>">      
                    </div>
                    <div class="my-3">
                        <input type="password" name="password" placeholder="Password" required="" class="form-control" value="<?php if(isset($password)){ echo $password; } ?>">
                    </div>
                    <div class="float-end">
                        <input type="submit" value="Login" name="login" class="btn btn-primary">
                    </div>  
                    <a href="registration.php">Back</a>      
                  </form>
              </div>
              <div class="row justify-content-center mt-3">

                <?php if(isset($username_not_found)){ echo "<div class='alert alert-warning col-md-4' >".$username_not_found."</div>"; }?>
                <?php if(isset($wrong_password)){ echo "<div class='alert alert-warning col-md-4' >".$wrong_password."</div>"; }?>
                <?php if(isset($status_inactive)){ echo "<div class='alert alert-warning col-md-4' >".$status_inactive."</div>"; }?>

              </div>
          </div>
      </div>

    <?php

    require_once "dbcon.php";
    $user = mysqli_query($link, "SELECT * FROM `users` ");

    ?>

    <div class="row justify-content-center" style="margin-top: 20px;">
        <div class="col-md-6">
            <h2 class="text-center">Login Access</h2>
            <div class="row justify-content-center">
                <div class="mt-3">
                    <form action="" method="POST">
                        <table class="table table-bordered">
                            <tr>
                                <td colspan="3" class="text-center"><label class="fw-bold text-muted">User Information</label></td>
                            </tr>

                            <?php
                            $sl = 1;
                            while ($row = mysqli_fetch_assoc($user)){
                                ?>
                                <tr>
                                    <th rowspan="2" class="fw-bold"><?= $sl; ?></th>
                                    <th><label for="choose">User name</label></th>
                                    <td>
                                        <p><?= $row['username'] ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="roll">Password</label></th>
                                    <td>
                                        <p><?= $row['password'] ?></p>
                                    </td>
                                </tr>
                            <?php
                                $sl++;
                            }

                            ?>

                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>

  </section>

</body>
</html>