<h1 class="text-primary">
    <i class="fa-solid fa-gauge"></i> Update user
    <small class="text-dark fs-2">Update new user</small>
  </h1>
  <div class="d-grid mb-3">
    <div class="btn btn-light text-start text-muted" type="button">
        <a href="index.php?page=dashboard" class="text-decoration-none"><i class="fa-solid fa-gauge"></i> Dashboard</a> 
        <a href="index.php?page=user-profile" class="px-3 text-decoration-none text-muted"><i class="fa-solid fa-user"></i> All users</a>
        <a href="#" class="text-decoration-none px-2 text-muted"> <i class="fa-solid fa-pen-to-square"></i> Update user</a>
    </div>
  </div>

<?php

  $session_user = $_SESSION["user_login"];

/*   $id = base64_decode($_GET["id"]); */
  
  $user_db = mysqli_query($link, "SELECT * FROM `users` WHERE `username` = '$session_user' ");

  $user_row = mysqli_fetch_assoc($user_db);


  if(isset($_POST["update_user"])){

    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];


    $result = mysqli_query($link, "UPDATE `users` SET `name`='$name',`email`='$email',`username`='$username' WHERE `username` = '$session_user' ");

    if($result){
        
        $_SESSION["user_login"] = $username;
        header("location: index.php?page=user-profile");
    }

  }


?>


<div class="row py-3">
    <div class="col-md-6">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="<?= $user_row["name"]; ?>">
                <input type="hidden" name="id" id="id" placeholder="id" class="form-control" value="<?= $user_row["id"]; ?>">
            </div>
            <div class="form-group">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" placeholder="Username" class="form-control" value="<?= $user_row['username']; ?>">
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" placeholder="Email" class="form-control" value="<?= $user_row["email"]; ?>">
            </div>
            <div class="mt-3">
                <input type="submit" name="update_user" value="Update user" class="btn btn-primary float-end">
            </div>
        </form>
    </div>
</div>