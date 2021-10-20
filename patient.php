<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Details | DBMS Hospital</title>
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
        </div>
    </div>
        
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
                            <td>Mr. X</td>
                        </tr>
                        <tr>
                            <th>Date of Birth</th>
                            <td>29 Feb 1998</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>adlosa, sdsakd, Bangladesh</td>
                        </tr>
                        <tr>
                            <th>Phone Number</th>
                            <td>0171711717</td>
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
                Delete This Patient
            </a></li>
            <li><a href="#edit">
                Edit this patient
            </a></li>
        </ul>
    </nav>
</body>
</html>