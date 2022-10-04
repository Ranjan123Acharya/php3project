<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('inc/links.php'); ?>
    <title>Employee - View/Update Employee </title>
    <?php include('connect.php'); ?>
</head>

<body>

    <?php require('inc/header.php'); ?>


    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">UPDATE EMPLOYEE</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">This the Demo Website On Employee Management System. Here You can <br> search employee by the Employee Number and update it.</p>
    </div>
    <div class="mb-3 py-3 px-5">
        <form action="" method="POST">
            <label for="formGroupExampleInput" class="form-label">
                <h4>Please Enter The Employee Number</h4>
            </label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="emp_num" placeholder="123456789">
            <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base mt-2">
                <h6>Note: If you don't know the employee number then go to the employee search page.</h6>
            </span>
            <div class="col-12">
                <button type="submit" name="search" class="btn btn-dark">Search</button>
            </div>
        </form>


        <?php
        if (isset($_POST['search'])) {
            $emp_num = $_POST['emp_num'];

            $query = "SELECT employee.emp_num,employee.first_name, employee.last_name,employee.sex, employee.birth_date, department.dept_name,employee.date_assign, job.job_desc,employee.emp_salary FROM employee JOIN department ON department.dept_id = employee.dept_id
            JOIN job ON job.job_code = employee.job_code  WHERE employee.emp_num='$emp_num'";

            $query_run = mysqli_query($con, $query);
        ?>
            <?php
            if (mysqli_num_rows($query_run) > 0) {
                while ($row = mysqli_fetch_array($query_run)) {
            ?>

                    <form action="" method="POST" class="row g-3 mt-5 px-5">
                        <div class="col-md-6 mt-2">
                            <label for="firstName" class="form-label" style="font-weight: 500;">First Name</label>
                            <input type="text" id="first_name" class="form-control" name="first_name" value="<?php echo $row['first_name'] ?>">
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="lastName" class="form-label" style="font-weight: 500;">Last Name</label>
                            <input type="text" id="lastName" class="form-control" name="last_name" value="<?php echo $row['last_name'] ?>">
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="gender" class="form-label" style="font-weight: 500;">Select Your Gender</label> <br>
                            <div class="col-2 mt-2">
                                <input type="text" id="sex" name="sex" class="form-control" value="<?php echo $row['sex'] ?>">
                            </div>


                        </div>
                        <div class="col-md-6 mt-2">
                            <label class="form-label" style="font-weight: 500;">Date Of Birth</label><br>
                            <input type="text" name="birth_date" class="form-control" value="<?php echo $row['birth_date'] ?>" readonly>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label class="form-label" style="font-weight: 500;">Current Job Position</label><br>
                            <input type="text" name="job_code" class="form-control" value="<?php echo $row['job_desc'] ?>">

                        </div>
                        <div class="col-md-6 mt-2">
                            <label class="form-label" style="font-weight: 500;">Current Department</label><br>
                            <input type="text" name="dept_id" class="form-control" value="<?php echo $row['dept_name'] ?>"><br>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label class="form-label" style="font-weight: 500;">Date Assigned for the Job Position</label><br>
                            <input type="text" name="date_assign" class="form-control" value="<?php echo $row['date_assign'] ?>" readonly>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label class="form-label" style="font-weight: 500;">Current Salary</label><br>
                            <input type="text" name="emp_salary" class="form-control" value="<?php echo $row['emp_salary'] ?>">
                        </div>
                        <button type="submit" name="update" class="btn btn-secondary btn-lg">Update
                        </button>
                    </form>
        <?php
                }
            } else {
            }
        }
        ?>





        <?php
        if (isset($_GET['emp_num'])) {
            $emp_num = mysqli_real_escape_string($con, $_GET['emp_num']);

            $query = "SELECT employee.emp_num,employee.first_name, employee.last_name,employee.sex, employee.birth_date, department.dept_name,employee.date_assign, job.job_desc,employee.emp_salary FROM employee JOIN department ON department.dept_id = employee.dept_id
            JOIN job ON job.job_code = employee.job_code  WHERE employee.emp_num='$emp_num'";

            $query_run = mysqli_query($con, $query);
        ?>
            <?php
            if (mysqli_num_rows($query_run) > 0) {
                $number = mysqli_fetch_array($query_run);
            ?>
                <br><br>
                <br><br>
                <h4>View FROM SEARCH EMPLOYEE </h4>

                <form action="" method="POST" class="row g-3 mt-5 px-5">
                    <input type="hidden" name="emp_num" value="<?php echo $number['emp_num'] ?>">
                    <div class="col-md-6 mt-2">
                        <label for="firstName" class="form-label" style="font-weight: 500;">First Name</label>
                        <input type="text" id="first_name" class="form-control" name="first_name" value="<?php echo $number['first_name'] ?>">
                    </div>
                    <div class="col-md-6 mt-2">
                        <label for="lastName" class="form-label" style="font-weight: 500;">Last Name</label>
                        <input type="text" id="lastName" class="form-control" name="last_name" value="<?php echo $number['last_name'] ?>">
                    </div>
                    <div class="col-md-6 mt-2">
                        <label for="gender" class="form-label" style="font-weight: 500;">Select Your Gender</label> <br>
                        <div class="col-2 mt-2">
                            <input type="text" id="sex" name="sex" class="form-control" value="<?php echo $number['sex'] ?>">
                        </div>


                    </div>
                    <div class="col-md-6 mt-2">
                        <label class="form-label" style="font-weight: 500;">Date Of Birth</label><br>
                        <input type="text" name="birth_date" class="form-control" value="<?php echo $number['birth_date'] ?>" readonly>
                    </div>
                    <div class="col-md-6 mt-2">
                        <label class="form-label" style="font-weight: 500;">Current Job Position</label><br>
                        <input type="text" name="job_code" class="form-control" value="<?php echo $number['job_desc'] ?>">

                    </div>
                    <div class="col-md-6 mt-2">
                        <label class="form-label" style="font-weight: 500;">Current Department</label><br>
                        <input type="text" name="dept_id" class="form-control" value="<?php echo $number['dept_name'] ?>"><br>
                    </div>
                    <div class="col-md-6 mt-2">
                        <label class="form-label" style="font-weight: 500;">Date Assigned for the Job Position</label><br>
                        <input type="text" name="date_assign" class="form-control" value="<?php echo $number['date_assign'] ?>" readonly>
                    </div>
                    <div class="col-md-6 mt-2">
                        <label class="form-label" style="font-weight: 500;">Current Salary</label><br>
                        <input type="text" name="emp_salary" class="form-control" value="<?php echo $number['emp_salary'] ?>">
                    </div>
                    <button type="submit" name="update_search" class="btn btn-secondary btn-lg">Update
                    </button>
                </form>
        <?php
            }
        } else {
        }

        ?>
    </div>



    <?php require('inc/footer.php'); ?>


</body>

</html>

<?php
$con = mysqli_connect('localhost', 'root', '', 'amaz');
if (isset($_POST['update'])) {
    $emp_num = $_POST['emp_num'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $sex = $_POST['sex'];
    $job_code = $_POST['job_code'];
    $dept_id = $_POST['dept_id'];
    $emp_salary = $_POST['emp_salary'];

    $query = "UPDATE `employee` SET first_name='$_POST[first_name]',last_name='$_POST[last_name]',sex='$_POST[sex]', job_code='$_POST[job_code]',dept_id='$_POST[dept_id]',emp_salary='$_POST[emp_salary]' WHERE emp_num='$_POST[emp_num]'";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        echo '<script> alert("Data Update")</script>';
    } else {
        echo '<script> alert("Data Not Update")</script>';
    }
}


?>

<?php
$con = mysqli_connect('localhost', 'root', '', 'amaz');
if (isset($_POST['update_search'])) {
    $emp_num = mysqli_real_escape_string($con, $_POST['emp_num']);
    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $sex = mysqli_real_escape_string($con, $_POST['sex']);
    $job_code = mysqli_real_escape_string($con, $_POST['job_code']);
    $dept_id = mysqli_real_escape_string($con, $_POST['dept_id']);
    $emp_salary = mysqli_real_escape_string($con, $_POST['emp_salary']);

    $query = "UPDATE employee SET first_name = '$first_name', last_name = '$last_name', job_code ='$job_code', dept_id = '$dept_id', emp_salary = '$emp_salary'
    WHERE emp_num = '$emp_num'";

    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        echo '<script> alert("Data Update")</script>';
    } else {
        echo '<script> alert("Data Not Update")</script>';
    }
}





?>