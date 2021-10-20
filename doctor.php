<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Details | DBMS Hospital</title>
</head>
<body>
    <header>
        <nav id="main_nav">
            <ul class="nav_buttons">
                <li><a href="index.php">Home
                </a></li>
                <li><a href="#">
                    <!-- View it only for management -->
                    Management
                </a></li>
                <li><a href="#">
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
    <main>
        <div class="conten_wrapper">
            <div class="wrapper">
               <h2>Details for <span class="patient">
                   Muza
               </span></h2>
               <table id="patient-details">
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
                            <th>Eucation</th>
                            <td>
                                <ul>
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
        <h2 class="admin_option">
            Manage this doctor.
        </h2>
        <ul id="manage_doctorv">
            <li><a href="#delete">
                Delete This Doctor
            </a></li>
            <li><a href="#edit">
                Edit this Doctor
            </a></li>
        </ul>
    </nav>
</body>
</html>