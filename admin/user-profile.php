<h1 class="text-primary">
    <i class="fa-solid fa-user"></i> Profile
    <small class="text-dark fs-2">Profile</small>
  </h1>
  <div class="d-grid mb-3">
    <div class="btn btn-light text-start text-muted" type="button">
        <a href="index.php?page=dashboard" class="text-decoration-none"><i class="fa-solid fa-gauge"></i> Dashboard</a> 
        <a href="#" class=" text-decoration-none text-muted px-3"><i class="fa-solid fa-user"></i> Profile</a>
    </div>
  </div>

  <?php

  $session_user = $_SESSION["user_login"];

  $result = mysqli_query($link, "SELECT * FROM `users` WHERE `username` = '$session_user'  ");

  $row = mysqli_fetch_assoc($result);
  
  ?>

  <div class="row">
      <div class="col-md-6">
          <table class="table table-bordered">
              <tr>
                  <th>Id</th>
                  <td><?= $row["id"]; ?></td>
              </tr>
              <tr>
                  <th>Name</th>
                  <td><?= ucwords($row["name"]); ?></td>
              </tr>
              <tr>
                  <th>Username</th>
                  <td><?= $row["username"]; ?></td>
              </tr>
              <tr>
                  <th>Email</th>
                  <td><?= $row["email"]; ?></td>
              </tr>
              <tr>
                  <th>Status</th>
                  <td><?= ucwords($row["status"]); ?></td>
              </tr>
              <tr>
                  <th>Sign-up date</th>
                  <td><?= $row["datetime"]; ?></td>
              </tr>
          </table>
          <a href="index.php?page=update-user&id=<?= base64_encode($row['id']); ?>" class="btn btn-primary float-end">Edit Profile</a>
      </div>
      <div class="col-md-6">
          <a href="">
              <img style="width: 185px; height: 185px;" class="img-thumbnail" src="images/<?= $row['photo']; ?>" alt="">
          </a>

          <?php
          
          if(isset($_POST["upload"])){

            $file_name = $_FILES["photo"]["name"];
            $file_exp = explode('.',$file_name);
            $file_ext = end($file_exp);
            $file_name = $session_user.'.'.$file_ext;
  
            $result = mysqli_query($link, "UPDATE `users` SET `photo`='$file_name' WHERE `username` = '$session_user' ");
  
            if($result){
  
              move_uploaded_file($_FILES["photo"]["tmp_name"],'images/'.$file_name);
  
            }

          }

          ?>

          <form action="" method="POST" enctype="multipart/form-data">
              <label for="photo" class="form-label">Profile Photo</label><br>
              <input type="file" name="photo" id="photo" required="" class="mb-3"><br>
              <input type="submit" value="Upload" name="upload" class="btn btn-primary">
          </form>
      </div>

  </div>