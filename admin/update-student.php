<h1 class="text-primary">
    <i class="fa-solid fa-gauge"></i> Update student
    <small class="text-dark fs-2">Update new student</small>
  </h1>
  <div class="d-grid mb-3">
    <div class="btn btn-light text-start text-muted" type="button">
        <a href="index.php?page=dashboard" class="text-decoration-none"><i class="fa-solid fa-gauge"></i> Dashboard</a>
        <a href="index.php?page=all-student" class="text-decoration-none px-2"> <i class="fa-solid fa-users"></i> All student</a>
        <a href="#" class="text-decoration-none px-2 text-muted"> <i class="fa-solid fa-pen-to-square"></i> Update student</a>
    </div>
  </div>

<?php


$id = base64_decode($_GET["id"]);

$result = mysqli_query($link, "SELECT * FROM `student_info` WHERE `id` = '$id' ");

$row = mysqli_fetch_assoc($result);

if(isset($_POST["update_student"])){

    $name = $_POST["name"];
    $roll = $_POST["roll"];
    $class = $_POST["class"];
    $city = $_POST["city"];
    $p_contact = $_POST["p_contact"];

/*     $file_name = $_FILES["photo"]["name"];
    $file_exp = explode('.',$file_name);
    $file_ext = end($file_exp);
    $file_name = $roll.'.'.$file_ext; */

    $result = mysqli_query($link,"UPDATE `student_info` SET `name`='$name',`roll`='$roll',`class`='$class',`city`='$city',`pcontact`='$p_contact' WHERE `id` = '$id' ");

    if($result){
        header("location: index.php?page=all-student");
    }

  }


?>


  <div class="row py-3">
      <div class="col-md-6">
          <form action="" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                  <label for="name" class="form-label">Student Name</label>
                  <input type="text" name="name" id="name" placeholder="Student name" class="form-control" required="" value="<?= $row["name"]; ?>">
              </div>
              <div class="form-group">
                  <label for="roll" class="form-label">Roll</label>
                  <input type="text" name="roll" id="roll" placeholder="Student roll" pattern="[0-9]{6}" class="form-control" required="" value="<?= $row["roll"]; ?>">
              </div>
              <div class="form-group">
                  <label for="class" class="form-label">Student class</label>
                  <select name="class" id="class" class="form-select" required="">
                      <option value="">Select</option>
                      <option <?php echo $row["class"] == '1st' ? 'selected':'' ?> value="1st">1st</option>
                      <option <?php echo $row["class"] == '2nd' ? 'selected':'' ?> value="2nd">2nd</option>
                      <option <?php echo $row["class"] == '3rd' ? 'selected':'' ?> value="3rd">3rd</option>
                      <option <?php echo $row["class"] == '4th' ? 'selected':'' ?> value="4th">4th</option>
                      <option <?php echo $row["class"] == '5th' ? 'selected':'' ?> value="5th">5th</option>
                      <option <?php echo $row["class"] == '6th' ? 'selected':'' ?> value="5th">6th</option>
                      <option <?php echo $row["class"] == '7th' ? 'selected':'' ?> value="6th">7th</option>
                      <option <?php echo $row["class"] == '8th' ? 'selected':'' ?> value="7th">8th</option>
                  </select>
              </div>
              <div class="form-group">
                  <label for="city" class="form-label">Student city</label>
                  <input type="text" name="city" id="city" placeholder="Student city" class="form-control" required="" value="<?= $row["city"]; ?>">
              </div>
              <div class="form-group">
                  <label for="p_contact" class="form-label">Student contact number</label>
                  <input type="text" name="p_contact" id="p_contact" pattern="01[1|5|6|7|8|9][0-9]{8}" placeholder="01*********" class="form-control" required="" value="<?= $row["pcontact"]; ?>"> 
              </div>
              <div class="mt-3">
                  <input type="submit" name="update_student" value="Update student" class="btn btn-primary float-end">
              </div>
          </form>
      </div>
  </div>