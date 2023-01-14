<div class="content">
  <h1 class="text-primary">
    <i class="fa-solid fa-gauge"></i> Dashboard
    <small class="text-dark fs-2">Statics Overview</small>
  </h1>
  <div class="d-grid mb-3">
    <div class="btn btn-light text-start text-muted" type="button">
      <i class="fa-solid fa-gauge"></i> Dashboard
    </div>
  </div>


  <?php
  
  $count_student = mysqli_query($link, "SELECT * FROM `student_info` ");
  $total_student = mysqli_num_rows($count_student);


  $count_user = mysqli_query($link, "SELECT * FROM `users` ");
  $total_user = mysqli_num_rows($count_user);

  
  ?>


  <div class="row">
    <div class="col-md-4">
      <div class="card">
        <div class="card-body bg-primary text-white">
          <div class="card-heading">
            <div class="row">
              <div class="col-md-3">
                <i class="fa-solid fa-users fs-1"></i>
              </div>
              <div class="col-md-9">
                <div class="float-end fs-1"><?= $total_student; ?></div>
                <div class="clearfix"></div>
                <div class="float-end">All students</div>
              </div>
            </div>
          </div>
        </div>
        <a href="index.php?page=all-student">
          <div class="card-footer">
            <span class="float-start">All students</span>
            <span class="float-end"
              ><i class="fa-solid fa-circle-right"></i
            ></span>
            <div class="clearfix"></div>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-body bg-primary text-white">
          <div class="card-heading">
            <div class="row">
              <div class="col-md-3">
                <i class="fa-solid fa-users fs-1"></i>
              </div>
              <div class="col-md-9">
                <div class="float-end fs-1"><?= $total_user; ?></div>
                <div class="clearfix"></div>
                <div class="float-end">All users</div>
              </div>
            </div>
          </div>
        </div>
        <a href="index.php?page=all-users">
          <div class="card-footer">
            <span class="float-start">All users</span>
            <span class="float-end"
              ><i class="fa-solid fa-circle-right"></i
            ></span>
            <div class="clearfix"></div>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>

<hr class="mt-5" />

<h3 class="py-3">New Students</h3>

<div class="table-responsive">
  <table id="example" class="table table-bordered table-hover table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Roll</th>
        <th>Class</th>
        <th>City</th>
        <th>Contact</th>
        <th>Photo</th>
        <td>Action</td>
      </tr>
    </thead>
    <tbody>

      <?php
      
      $result = mysqli_query($link, "SELECT * FROM `student_info` ");

      while($row = mysqli_fetch_assoc($result)){

        ?>

        <tr>
          <td><?= $row["id"]; ?></td>
          <td><?= ucwords($row["name"]); ?></td>
          <td><?= $row["roll"]; ?></td>
          <td><?= $row["class"]; ?></td>
          <td><?= ucwords($row["city"]); ?></td>
          <td><?= $row["pcontact"]; ?></td>
          <td><img src="student_images/<?= $row["photo"]; ?>" style="width: 100px; height: 100px;" alt=""></td>
          <td>
            <a href="index.php?page=update-student&id=<?= base64_encode($row['id']); ?>" class="btn btn-info btn-sm"><i class="fa-solid fa-pen"></i> Edit</a>
            <a href="delete-student.php?id=<?= base64_encode($row['id']); ?>" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</a>
          </td>
        </tr>

        <?php
      }
      
      ?>

    </tbody>
  </table>
</div>

