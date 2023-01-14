<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link href="bootstrap link/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<title>Student management system</title>
</head>
<body>

    <section class="container">
        <div class="py-5">
            <a href="admin/login.php" class="btn btn-primary float-end">Login Admin</a>
            <h1 class="text-center">Welcome to students Management System</h1>

            <div class="row justify-content-center mt-3">
                <div class="col-4">
                    <form action="" method="POST">
                        <table class="table table-bordered">
                            <tr>
                                <td colspan="2" class="text-center"><label class="fw-bold text-muted">Student Information</label></td>
                            </tr>
                            <tr>
                                <td><label for="choose">Choose Class</label></td>
                                <td>
                                    <select class="form-control" name="choose" id="choose">
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
                                </td>
                            </tr>
                            <tr>
                                <td><label for="roll">Roll</label></td>
                                <td><input class="form-control" type="text" name="roll" id="roll" pattern="[0-9]{6}" placeholder="Roll"></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-center"><input class="btn btn-primary " type="submit" value="Show info" name="show_info"></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>

            <?php
            
            require_once "admin/dbcon.php";

            if(isset($_POST["show_info"])){

                $choose = $_POST["choose"];
                $roll = $_POST["roll"];

                $result = mysqli_query($link, "SELECT * FROM `student_info` WHERE `class` = '$choose' and `roll` = '$roll' ");

                $row = mysqli_fetch_assoc($result);

                if(mysqli_num_rows($result) == 1){                   
                    
                ?>
                    <div class="row justify-content-center mt-5">
                        <div class="col-sm-8">
                            <table class="table table-bordered">
                                <tr>
                                    <td rowspan="5">
                                        <img class="img-thumbnail" style="width: 150px;" src="admin/student_images/<?= $row["photo"]; ?>" alt="">
                                    </td>
                                    <th>Name</th>
                                    <td><?= $row["name"]; ?></td> 
                                </tr>
                                <tr>
                                    <th>Roll</th>
                                    <td><?= $row["roll"] ?></td>
                                </tr>
                                <tr>
                                    <th>Class</th>
                                    <td><?= $row["class"] ?></td>
                                </tr>
                                <tr>
                                    <th>City</th>
                                    <td><?= $row["city"] ?></td>
                                </tr>
                                <tr>
                                    <th>Personal contact</th>
                                    <td><?= $row["pcontact"] ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                <?php

                }else{

                    ?>
                        <script type="text/javascript">
                            alert("Data not found!");
                        </script>
                    <?php
                    
                }

            }
            
            ?>


            <?php

            require_once "admin/dbcon.php";
            $student_info = mysqli_query($link, "SELECT * FROM `student_info` LIMIT 5 ");

            ?>

            <div class="row justify-content-center" style="margin-top: 20px;">
                <div class="col-md-6">
                    <h2 class="text-center">Login Access</h2>
                    <div class="row justify-content-center">
                        <div class="mt-3">
                            <form action="" method="POST">
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="3" class="text-center"><label class="fw-bold text-muted">Student Information</label></td>
                                    </tr>

                                    <?php
                                    $sl = 1;
                                    while ($row = mysqli_fetch_assoc($student_info)){
                                        ?>
                                        <tr>
                                            <th rowspan="2" class="fw-bold"><?= $sl; ?></th>
                                            <th><label for="choose" class="">Semester</label></th>
                                            <td>
                                                <p><?= $row['class'] ?></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><label for="roll" class="">Roll</label></th>
                                            <td>
                                                <p><?= $row['roll'] ?></p>
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

        </div>
    </section>

</body>
</html>



