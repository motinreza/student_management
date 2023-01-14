<?php

require_once "dbcon.php";

session_start();

if(!isset($_SESSION["user_login"])){
    header("location: login.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--------------------- row css link ------------------>
    <link rel="stylesheet" href="style.css">
    <!--------------------- bootstrap css link ------------------>
    <link rel="stylesheet" href="../bootstrap link/css/bootstrap.min.css">
    <!--------------------- font awesome link ------------------>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!--------------------- bootstrap data table css link ------------------>
    <link rel="stylesheet" href="../bootstrap link/css/dataTables.bootstrap5.min.css">
</head>
<body>
    
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">SMS</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">SMS</a>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="nav-item navbar-right">
            <a class="nav-link" href="login.php"><i class="fa-solid fa-user"></i> Welcome</a>
          </li>
          <li class="nav-item navbar-right">
            <a class="nav-link" href="registration.php"><i class="fa-solid fa-user-plus"></i> Add users</a>
          </li>
          <li class="nav-item navbar-right">
            <a class="nav-link" href="index.php?page=user-profile"><i class="fa-solid fa-user"></i></i> Profile</a>
          </li>
          <li class="nav-item navbar-right">
            <a class="nav-link" href="logout.php"><i class="fa-solid fa-power-off"></i> Logout</a>
          </li>
        </ul>   
      </div>
    </div>
  </nav>

  <section class="container-fluid mt-3">
    <div class="row">
      <div class="col-sm-3">
        <div class="list-group">
          <a href="index.php?page=dashboard" class="list-group-item active"><i class="fa-solid fa-gauge"></i> Dashboard</a>
          <a href="index.php?page=add-student" class="list-group-item"><i class="fa-solid fa-user"></i> Add student</a>
          <a href="index.php?page=all-student" class="list-group-item"><i class="fa-solid fa-users"></i> All student</a>
          <a href="index.php?page=all-users" class="list-group-item"><i class="fa-solid fa-users"></i> All users</a>
        </div>
      </div>
      <div class="col-sm-9">



      <?php 

      if(isset($_GET["page"])){

        $page = $_GET["page"].'.php';

      }else{

        $page = "dashboard.php";

      }

      if(file_exists($page)){
        require_once "$page";
      }else{
        require_once "404.php";
      }

      
      ?>




      </div>
    </div>
  </section>

  <footer class="footer py-3 bg-light text-center">
    <div class="container-fluid">
      <span class="text-muted">Copyright &COPY: 2022 Students Management System. All Rights Are Reserved.</span>
    </div>
  </footer>

  <!--------------------- bootstrap data table js link ------------------>
  <script src="../bootstrap link/js/jquery-3.5.1.js"></script>
  <script src="../bootstrap link/js/jquery.dataTables.min.js"></script>
  <script src="../bootstrap link/js/dataTables.bootstrap5.min.js"></script>
  <script src="../bootstrap link/js/script.js"></script>

</body>
</html>



