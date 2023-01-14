<h1 class="text-primary">
    <i class="fa-solid fa-gauge"></i> All users
    <small class="text-dark fs-2">All users</small>
  </h1>
  <div class="d-grid mb-3">
    <div class="btn btn-light text-start text-muted" type="button">
        <a href="index.php?page=dashboard" class="text-decoration-none"><i class="fa-solid fa-gauge"></i> Dashboard</a> 
        <a href="#" class="px-3 text-decoration-none text-muted"><i class="fa-solid fa-users"></i> All users</a>
    </div>
  </div>

<div class="table-responsive">
  <table id="example" class="table table-bordered table-hover table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Username</th>
        <th>Photo</th>
      </tr>
    </thead>
    <tbody>

      <?php
      
      $result = mysqli_query($link, "SELECT * FROM `users` ");

      while($row = mysqli_fetch_assoc($result)){

        ?>

        <tr>
          <td><?= $row["name"]; ?></td>
          <td><?= $row["email"]; ?></td>
          <td><?= $row["username"]; ?></td>
          <td><img src="images/<?= $row["photo"]; ?>" style="width: 100px; height: 100px;" alt=""></td>
        </tr>

        <?php
      }
      
      ?>

    </tbody>
  </table>
</div>