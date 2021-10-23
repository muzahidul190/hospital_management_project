<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Details | DBMS Hospital</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">
</head>
<body>
<div class="content_wrapper"></div>
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
    <main>
        <div class="conten_wrapper">
            <div class="wrapper">
            <div class="patient_details">
                <h2 style="text-align:center; padding:10px;display:block; font-size:2em;">Details for <span class="patient">
                    Muza
                </span></h2>
                <table id="patient-details" border="2px">
                    <tbody>
                        <tr>
                            <th>Name</th>
                            <td>Dr. X</td>
                        </tr>
                        <tr>
                            <th>Phone No:</th>
                            <td>017545455</td>
                        </tr>
                        <tr>
                            <th>Department</th>
                            <td>Neural</td>
                        </tr>
                        <tr>
                            <th>Availability</th>
                            <td>Saturday, Sunday, Monday</td>
                        </tr>
                        <tr>
                            <th>Education</th>
                            <td>
                                <ul style="list-style-type:numeric;">
                                    <li>ad as asd asd a</li>
                                    <li>ad as asd asd a</li>
                                    <li>ad as asd asd a</li>

                                </ul>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- Only View Able by Management -->
    <nav>
        
        <ul id="manage_patient">
            <li><a href="#delete">
                Delete This Doctor
            </a></li>
            <li><a href="#edit">
                Edit this Doctor
            </a></li>
        </ul>
    </nav>
    <?php
        include 'footer.php';
    ?>