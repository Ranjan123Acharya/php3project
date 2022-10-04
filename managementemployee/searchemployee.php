<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('inc/links.php'); ?>
    <title>Employee - Employee history </title>
    <?php include('connect.php'); ?>


</head>

<body>

    <?php require('inc/header.php'); ?>


    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">SEARCH EMPLOYEE</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">This the Demo Website On Employee Management System. Here you can <br> search for the other details about employee.</p>
    </div>

    <form action="" method="POST">
        <div class="mb-3 py-3 px-5">
            <label for="formGroupExampleInput" class="form-label">
                <h4>Please Enter The Employee Number</h4>
            </label>
            <input type="text" class="form-control" placeholder="SEARCH" name="search">
            <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base mt-3">
                <h6>Note: If you don't know the employee number then go to the employee search page.</h6>
            </span>
            <div class="col-12 mt-3">
                <button class="btn btn-dark">Search</button>
            </div>

        </div>
    </form>

    <table class="table table-bordered table-striped mt-4">
        <thead>
            <tr>
                <th scope="col">Employee Number</th>
                <th scope="col">Name</th>
                <th scope="col">Department</th>
                <th scope="col">Date Assigned</th>
                <th scope="col">Job Position</th>
                <th scope="col">Salary</th>
                <th scope="col">View Employee</th>
                <th scope="col">Update Employee</th>
                <th scope="col">Employee History</th>

            </tr>
        </thead>

        <tbody><?php
                if (isset($_POST['search'])) {
                    $searchKey = $_POST['search'];
                    $sql = "SELECT employee.emp_num,employee.first_name, employee.last_name, department.dept_name,employee.date_assign, job.job_desc,employee.emp_salary FROM employee JOIN department ON department.dept_id = employee.dept_id
        JOIN job ON job.job_code = employee.job_code  WHERE CONCAT(first_name,last_name,dept_name,job_desc) LIKE '%$searchKey%'";
                    $query_run = mysqli_query($con, $sql);

                    if (mysqli_num_rows($query_run) > 0) {
                        foreach ($query_run as $row) {
                ?>
                        <tr>
                            <td><?php echo $row['emp_num'] ?></td>
                            <td><?php echo $row['first_name'] ?> <?php echo $row['last_name'] ?></td>
                            <td><?php echo $row['dept_name'] ?></td>
                            <td><?php echo $row['date_assign'] ?></td>
                            <td><?php echo $row['job_desc'] ?></td>
                            <td><?php echo $row['emp_salary'] ?></td>
                            <td>
                                <a href="viewemployee.php?emp_num=<?php echo $row['emp_num'] ?>" class="btn btn-secondary">View Employee </a>
                            </td>
                            <td>
                                <a href="updateemployee.php?emp_num=<?php echo $row['emp_num'] ?>" class="btn btn-secondary">Update Employee </a>
                            </td>
                            <td>
                                <a href="employeehistory.php?emp_num=<?php echo $row['emp_num'] ?>" class="btn btn-secondary">Employee History </a>
                            </td>
                        </tr>

                    <?php
                        }
                    } else {
                    ?>
                    <tr>
                        <td colspan="9">NO EMPLOYEE FOUND</td>
                    </tr>
            <?php
                    }
                }
            ?>


            <?php
            if (isset($_GET['emp_num'])) {
                $emp_num = mysqli_real_escape_string($con, $_GET['emp_num']);

                $query = "SELECT employee.emp_num,employee.first_name, employee.last_name, department.dept_name,employee.date_assign, job.job_desc,employee.emp_salary FROM employee JOIN department ON department.dept_id = employee.dept_id
                JOIN job ON job.job_code = employee.job_code  WHERE employee.emp_num='$emp_num'";

                $query_run = mysqli_query($con, $query);

                if (mysqli_num_rows($query_run) > 0) {
                    while ($number = mysqli_fetch_array($query_run)) {
            ?>
                        <tr>
                            <td><?php echo $number['emp_num'] ?></td>
                            <td><?php echo $number['first_name'] ?> <?php echo $number['last_name'] ?></td>
                            <td><?php echo $number['dept_name'] ?></td>
                            <td><?php echo $number['date_assign'] ?></td>
                            <td><?php echo $number['job_desc'] ?></td>
                            <td><?php echo $number['emp_salary'] ?></td>
                            <td>
                                <a href="viewemployee.php?emp_num=<?php echo $number['emp_num'] ?>" class="btn btn-secondary">View Employee </a>
                            </td>
                            <td>
                                <a href="updateemployee.php?emp_num=<?php echo $number['emp_num'] ?>" class="btn btn-secondary">Update Employee </a>
                            </td>
                            <td>
                                <a href="employeehistory.php?emp_num=<?php echo $number['emp_num'] ?>" class="btn btn-secondary">Employee History </a>
                            </td>
                        </tr>

            <?php
                    }
                }
            }
            ?>

        </tbody>
    </table>

    <?php require('inc/footer.php'); ?>


</body>

</html>