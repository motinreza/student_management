<h1 class="text-primary">
    <i class="fa-solid fa-gauge"></i> All student
    <small class="text-dark fs-2">All new student</small>
  </h1>
  <div class="d-grid mb-3">
    <div class="btn btn-light text-start text-muted" type="button">
        <a href="index.php?page=dashboard" class="text-decoration-none"><i class="fa-solid fa-gauge"></i> Dashboard</a> 
        <a href="#" class="px-3 text-decoration-none text-muted"><i class="fa-solid fa-users"></i> All student</a>
    </div>
  </div>

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