
<?php 

    include 'db_con.php';
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management Dashboard | DBMS Hospital</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="content_wrapper">
        <div class="wrapper">
            <header>
                <div class="logo">
                    <h2>DBMS Hospital</h2>
                    <h3>Your favourite place for treatment</h3>
                </div>
                <nav id="main_nav">
                    <ul class="nav_buttons">
                        <li><a href="index.php">Home
                        </a></li>

                        <li><a href="management_dashboard.php">
                            <!-- View it only for management -->
                            Management
                        </a></li>
                        <li><a href="sign-in-or-sign-up.php">
                            <!-- View it only for non logged users -->
                            Login / Sign Up 
                        </a></li>
                        <li><a href="patient_dashbord.php">
                            <!-- View it only for patient -->
                            My Dashboard
                        </a></li>
                        <li><a href="doctor_dashboard.php">
                            <!-- View it only for patient -->
                            My Dashboard
                        </a></li>
                    </ul>
                </nav>
            </header>
        </div>
    </div>
    <div class="content_wrapper">
        <div class="wrapper">
            <hr>
            <section class="management_view">
                <nav class="secondary_nav">
                <ul>
                    <li><a href="#doctor_approval">
                        Approve New Doctors(5)</a>
                    </li>
                    <li>
                        <a href="#departments">
                            Total Department(5)
                        </a>
                    </li>
                    <li>
                        <a href="#all_patitents">
                            Total Patients(10)
                        </a>
                    </li>
                    <li>
                        <a href="#approved_doctors">
                            Total Approved Doctors(7)
                        </a>
                    </li>
                    <li>
                        <a href="#add_another_dept">
                            Add another department
                        </a>
                    </li>
                </ul>
                </nav>


            <div class="item_according_to_link">
                <div id="doctor_approval" class="single-item-design">
                    <h2>Doctor Needs Approval</h2>
                    <ul class="doctor_approval_list">
                        <li><a href="#">Doctor 1</a></li>
                        <li><a href="#">Doctor 1</a></li>
                        <li><a href="#">Doctor 1</a></li>
                        <li><a href="#">Doctor 1</a></li>
                    </ul>
                </div>

                <div id="departments" class="single-item-design hide-single-item">
                    <h2>All Departments</h2>
                    <ul class="all_departments">
                        <li><a href="#">Dept 1</a></li>
                        <li><a href="#">Dept 1</a></li>
                        <li><a href="#">Dept 1</a></li>
                        <li><a href="#">Dept 1</a></li>
                    </ul>
                </div>

                <div id="all_patitents" class="single-item-design hide-single-item">
                    <h2>All patients</h2>
                    <ul class="all_patitents_list">
                        <li><a href="#">patients 1</a></li>
                        <li><a href="#">patients 1</a></li>
                        <li><a href="#">patients 1</a></li>
                        <li><a href="#">patients 1</a></li>
                    </ul>
                </div>

                <div id="approved_doctors" class="single-item-design hide-single-item">
                    <h2>Approved Doctors</h2>
                    <ul class="approved_doctors_list">
                        <li><a href="#">Doctor 1</a></li>
                        <li><a href="#">Doctor 1</a></li>
                        <li><a href="#">Doctor 1</a></li>
                        <li><a href="#">Doctor 1</a></li>
                    </ul>
                </div>

                
                <div id="add_another_dept" class="single-item-design hide-single-item">
                    <h2>Add Another Department</h2>
                    <form action="">
                        <label for="d-name">Enter new department name:</label> <br>
                        <input type="text" name="d-name" id="d-name"><br>
                        
                        <label for="d-seats">Total Seat in this department:</label><br>
                        <input type="number" name="d-seats" id="d-seats"><br>
                        <label for="d-per-sit-cost">
                            Cost of per sit in this department:
                        </label><br>
                        <input type="number" name="d-per-sit-cost" id="d-per-sit-cost"><br>

                        <label for="d-details">Enter brief details of the department:</label><br><br>
                        <textarea name="d-details" id="d-details" cols="30" rows="3"></textarea>
                        <br>
                        <input type="submit" value="Add Department" class="btn btn-warn">
                    </form>
                </div>
            </div>
            </section>
            <hr>
        </div>
        </div>
    </div>
    <footer>
    <div class="content_wapper">
        <div class="wrapper">
            <div class="copyright">
                &copy; DBMS Hospital 2021. All rights reserved by group 4.
            </div> 
        </div>
    </div>
    </footer>
    <script src="assets/js/script.js"></script>
</body>
</html>