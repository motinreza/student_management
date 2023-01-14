<h1 class="text-primary">
    <i class="fa-solid fa-gauge"></i> Add student
    <small class="text-dark fs-2">Add new student</small>
  </h1>
  <div class="d-grid mb-3">
    <div class="btn btn-light text-start text-muted" type="button">
        <a href="index.php?page=dashboard" class="text-decoration-none"><i class="fa-solid fa-gauge"></i> Dashboard</a>
        <a href="#" class="px-3 text-decoration-none text-muted"><i class="fa-solid fa-user-plus"></i> Add studen</a>
    </div>
  </div>


  <?php
  
  if(isset($_POST["add_student"])){

    $name = $_POST["name"];
    $roll = $_POST["roll"];
    $class = $_POST["class"];
    $city = $_POST["city"];
    $p_contact = $_POST["p_contact"];

    $file_name = $_FILES["photo"]["name"];
    $file_exp = explode('.',$file_name);
    $file_ext = end($file_exp);
    $file_name = $roll.'.'.$file_ext;

    $result = mysqli_query($link,"INSERT INTO `student_info`(`name`, `roll`, `class`, `city`, `pcontact`, `photo`) VALUES ('$name','$roll','$class','$city','$p_contact','$file_name') ");

    if($result){

        move_uploaded_file($_FILES["photo"]["tmp_name"],'student_images/'.$file_name);

        $success = "Data insert success!";

    }else{

        $error = "Data not save!";

    }

  }
  
  ?>


  <div class="row py-3">
      <div class="col-md-6">
          <?php
          
          if(isset($success)){
              echo "<div class='alert alert-info' >$success</div>";
          }

          if(isset($error)){
              echo "<div class='alert alert-danger' >$error</div>";
          }
          
          ?>
          


          <form action="" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                  <label for="name" class="form-label">Student Name</label>
                  <input type="text" name="name" id="name" placeholder="Student name" class="form-control" required="">
              </div>
              <div class="form-group">
                  <label for="roll" class="form-label">Roll</label>
                  <input type="text" name="roll" id="roll" placeholder="Student roll" pattern="[0-9]{6}" class="form-control" required="">
              </div>
              <div class="form-group">
                  <label for="class" class="form-label">Student Semester</label>
                  <select name="class" id="class" class="form-select" required="">
                      <option value="">Select</option>
                      <option value="1st">1st</option>
                      <option value="2nd">2nd</option>
                      <option value="3rd">3rd</option>
                      <option value="4th">4th</option>
                      <option value="5th">5th</option>
                      <option value="6th">6th</option>
                      <option value="7th">7th</option>
                      <option value="8th">8th</option>
                  </select>
              </div>
              <div class="form-group">
                  <label for="city" class="form-label">Student city</label>
                  <input type="text" name="city" id="city" placeholder="Student city" class="form-control" required="">
              </div>
              <div class="form-group">
                  <label for="p_contact" class="form-label">Student contact number</label>
                  <input type="text" name="p_contact" id="p_contact" pattern="01[1|5|6|7|8|9][0-9]{8}" placeholder="01*********" class="form-control" required="">
              </div>
              <div class="form-group">
                  <label for="photo" class="form-label">Student photo</label><br>
                  <input type="file" name="photo" id="photo" required="">
              </div>
              <div class="form-group">
                  <input type="submit" name="add_student" value="Add student" class="btn btn-primary float-end">
              </div>
          </form>
      </div>
  </div>