<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('inc/links.php'); ?>
    <title>Employee - New Employee </title>
    <?php include('connect.php'); ?>
</head>

<body>

    <?php require('inc/header.php'); ?>


    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">NEW EMPLOYEE</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">This the Demo Website On Employee Management System.Here You can <br> Add New Employee With his Respective Details.</p>
    </div>

    <form action="" method="POST" class="row g-3 mt-5 px-5">
        <div class="col-md-6 mt-2">
            <label for="firstName" class="form-label" style="font-weight: 500;">First Name</label>
            <input type="text" id="first_name" class="form-control" name="first_name" required>
        </div>
        <div class="col-md-6 mt-2">
            <label for="lastName" class="form-label" style="font-weight: 500;">Last Name</label>
            <input type="text" id="lastName" class="form-control" name="last_name" required>
        </div>
        <div class="col-md-6 mt-2">
            <label for="gender" style="font-weight: 500;">Select Your Gender</label> <br>
            <div class="col-2 mt-2">
                <input type="radio" name="sex" value="M" /> M
                <input type="radio" name="sex" value="F" /> F
            </div>


        </div>
        <div class="col-md-6 mt-2">
            <label class="form-label" style="font-weight: 500;">Date Of Birth</label>
            <input type="date" class="form-control shadow-none" name="birth_date">
        </div>
        <div class="col-md-6 mt-2">
            <label class="form-label" style="font-weight: 500;">Current Job Position</label>
            <input type="hidden" name="job_code" value="<?php echo $job_code; ?>">
            <select class="form-control" name="job_code" id="">
                <option value=""> - - Job Position - - </option>
                <?php
                $con = mysqli_connect("localhost", "root", "", "amaz");
                $query = "SELECT * FROM job";
                $query_run = mysqli_query($con, $query);
                if (mysqli_num_rows($query_run) > 0) {
                    foreach ($query_run as $rowhob) {

                ?>
                        <option value="<?php echo $rowhob['job_code']; ?>"><?php echo $rowhob['job_desc']; ?></option>
                <?php
                    }
                } else {
                    echo "NO Record Found";
                }
                ?>
            </select>
        </div>


        <div class="col-md-6 mt-2">
            <label class="form-label" style="font-weight: 500;">Department</label>
            <input type="hidden" name="dept_id" value="<?php echo $dept_id; ?>">
            <select class="form-control" name="dept_id" id="">
                <option value=""> - - Select Department - - </option>

                <?php
                $con = mysqli_connect("localhost", "root", "", "amaz");
                $query = "SELECT * FROM department";
                $query_run = mysqli_query($con, $query);
                if (mysqli_num_rows($query_run) > 0) {
                    foreach ($query_run as $rowhob) {

                ?>
                        <option value="<?php echo $rowhob['dept_id']; ?>"><?php echo $rowhob['dept_name']; ?></option>
                <?php
                    }
                } else {
                    echo "NO Record Found";
                }


                ?>
            </select>
        </div>
        <div class="col-md-6 mt-2">
            <label class="form-label" style="font-weight: 500;">Date Assigned for the Job Position</label>
            <input type="date" class="shadow-none form-control" name="date_assign">
        </div>

        <div class="col-md-6 mt-2">
            <label class="form-label" style="font-weight: 500;">Current Salary</label>
            <input type="text" class="form-control" name="emp_salary" required>
        </div>
        <button type="submit" name="save" class="btn btn-secondary btn-lg">Update
        </button>
    </form>

    <?php

    if (isset($_POST['save'])) {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $sex = $_POST['sex'];
        $birth_date = $_POST['birth_date'];
        $job_code = $_POST['job_code'];
        $dept_id = $_POST['dept_id'];
        $date_assign = $_POST['date_assign'];
        $emp_salary = $_POST['emp_salary'];

        // print_r($_POST);
        $query = "INSERT INTO employee(first_name,last_name,sex,birth_date,job_code,dept_id,date_assign,emp_salary) VALUES('$first_name','$last_name','$sex','$birth_date','$job_code','$dept_id','$date_assign','$emp_salary')";
        if (mysqli_query($con, $query)) {
            echo "<script>alert('record inserted')</script>";
        } else {
            echo "<script>alert('record not inserted')</script>";
        }
    }


    ?>

    <?php require('inc/footer.php'); ?>


</body>

</html>