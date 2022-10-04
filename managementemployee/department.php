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
        <h2 class="fw-bold h-font text-center">DEPARTMENT INFORMATION</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">This the Demo Website On Employee Management System. Here you can <br> search for the other details about employee.</p>
    </div>

    <h2 class="text-center">List Of Department Manager</h2>

    <table class="table table-bordered table-secondary mt-4">
        <thead>
            <tr>
                <th scope="col"> Department Name</th>
                <th scope="col">Manager Number</th>
                <th scope="col">View Manager Details</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT department.dept_name, mgr_history.emp_num FROM department 
            JOIN mgr_history ON mgr_history.dept_id = department.dept_id";
            $query_run = mysqli_query($con, $query);

            if (mysqli_num_rows($query_run) > 0) {

                foreach ($query_run as $row) {
            ?>
                    <tr>

                        <td><?= $row['dept_name']; ?></td>
                        <td><?= $row['emp_num']; ?></td>
                        <td>
                            <a href="viewemployee.php?emp_num=<?php echo $row['emp_num'] ?>" class="btn btn-secondary">View</a>
                        </td>

                    </tr>
            <?php
                }
            } else {
            }




            ?>
        </tbody>
    </table>
    <h2 class="text-center">List Of Employee with there Department</h2>

    <table class="table table-bordered table-secondary mt-4">
        <thead>
            <tr>
                <th scope="col">Department Name</th>
                <th scope="col">Employee Number</th>
                <th scope="col">View Employee Details</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT employee.emp_num, department.dept_name 
    FROM employee
    JOIN department ON department.dept_id = employee.dept_id";

            $query_run = mysqli_query($con, $query);

            if (mysqli_num_rows($query_run) > 0) {

                foreach ($query_run as $row) {
            ?>
                    <tr>

                        <td><?= $row['dept_name']; ?></td>
                        <td><?= $row['emp_num']; ?></td>
                        <td>
                            <a href="searchemployee.php?emp_num=<?php echo $row['emp_num'] ?>" class="btn btn-secondary">View</a>
                        </td>

                    </tr>
            <?php
                }
            } else {
            }



            ?>

        </tbody>
    </table>



    <br><br><br>
    <br><br><br>
    <br><br><br>
    <br><br><br>
    <br><br><br>
    <br><br><br>


    <?php require('inc/footer.php'); ?>



</body>

</html>