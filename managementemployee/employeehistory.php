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
        <h2 class="fw-bold h-font text-center">EMPLOYEE HISTORY</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">This the Demo Website On Employee Management System. Here you can <br> search for the other details about employee.</p>
    </div>
    <form action="" method="POST">
        <div class="mb-3 py-3 px-5">
            <label for="formGroupExampleInput" class="form-label">
                <h4>Please Enter The Employee Number</h4>
            </label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="123456789" name="emp_num">
            <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base mt-3">
                <h6>Note: If you don't know the employee number then go to the employee search page.</h6>
            </span>
            <div class="col-12 mt-3">
                <button type="submit" name="search" class="btn btn-dark">Search</button>
            </div>

        </div>
    </form>

    <table class="table table-bordered table-secondary mt-4">
        <thead>
            <tr>
                <th scope="col">Employee Number</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Department</th>
                <th scope="col">Date Assigned</th>
                <th scope="col">Job Position</th>
                <th scope="col">Salary</th>
            </tr>
        </thead>

        <?php
        if (isset($_POST['search'])) {
            $emp_num = $_POST['emp_num'];

            $query = "SELECT  employee.emp_num,employee.first_name,employee.last_name,department.dept_name, job_history.date_assign,job.job_desc, job_history.emp_salary FROM employee
        INNER JOIN department ON department.dept_id = employee.dept_id
        INNER JOIN job ON job.job_code = employee.job_code
        
        INNER JOIN job_history ON job_history.emp_num = employee.emp_num
        
        WHERE employee.emp_num = '$emp_num'";
            $rs = mysqli_query($con, $query);

            while ($data = mysqli_fetch_array($rs)) {
        ?>

                <tr>
                    <td><?= $data['emp_num']  ?></td>
                    <td><?= $data['first_name']  ?></td>
                    <td><?= $data['last_name']  ?></td>
                    <td><?= $data['dept_name']  ?></td>
                    <td><?= $data['date_assign']  ?></td>
                    <td><?= $data['job_desc']  ?></td>
                    <td><?= $data['emp_salary']  ?></td>
                </tr>

        <?php
            }
        }


        ?>
        <?php
        if (isset($_GET['emp_num'])) {
            $emp_num = mysqli_real_escape_string($con, $_GET['emp_num']);

            $query = "SELECT employee.emp_num,employee.first_name, employee.last_name, department.dept_name,job_history.date_assign, job.job_desc,job_history.emp_salary FROM employee JOIN department ON department.dept_id = employee.dept_id
            JOIN job ON job.job_code = employee.job_code JOIN job_history ON job_history.emp_num = employee.emp_num  WHERE employee.emp_num='$emp_num'";

            $query_run = mysqli_query($con, $query);
        ?>
            <?php
            if (mysqli_num_rows($query_run) > 0) {
                while ($number = mysqli_fetch_array($query_run)) {
            ?>
                    <tr>
                        <td><?php echo $number['emp_num']  ?></td>
                        <td><?php echo $number['first_name']  ?></td>
                        <td><?php echo  $number['last_name']  ?></td>
                        <td><?php echo  $number['dept_name']  ?></td>
                        <td><?php echo  $number['date_assign']  ?></td>
                        <td><?php echo  $number['job_desc']  ?></td>
                        <td><?php echo  $number['emp_salary']  ?></td>
                    </tr>

        <?php
                }
            } else {
            }
        }

        ?>


    </table>

    <?php require('inc/footer.php'); ?>

</body>

</html>