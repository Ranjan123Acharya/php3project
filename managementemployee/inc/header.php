<style>
    .nav-link {
        font-size: 16px;
        margin: 3px;
        color: #fff !important;
        font-weight: 500;
    }

    .hr::hover {
        background: linear-gradient(to right, #ffff00 0%, #ff3399 100%);


    }
</style>

<div class="header">
    <div class="menu-bar">
        <nav class="navbar navbar-expand-lg bg-dark navbar-light px-lg-3 py-lg-2 shadow-sm sticky-top">
            <div class="container-fluid">
                <a class="navbar-brand me-5 fw-bold fs-3 h-font text-white" href="index.php">Employee</a>
                <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon "></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-white">
                        <li class="nav-item">
                            <a class="nav-link active me-2 text-white" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link me-2 text-white" href="newemployee.php">New Employee</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                View/Update Employee
                            </a>
                            <ul class="dropdown-menu bd-dark">
                                <li><a class="dropdown-item text-dark" href="viewemployee.php">View Employee</a></li>
                                <li><a class="dropdown-item text-dark" href="updateemployee.php">Update Employee</a></li>
                            </ul>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link me-2 text-white" href="searchemployee.php">Employee Search</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link me-2 text-white" href="employeehistory.php">Employee History</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link me-2 text-white" href="department.php">Department Information</a>
                        </li>
                        <hr />
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>