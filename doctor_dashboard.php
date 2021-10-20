<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard| DBMS Hospital</title>
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
        </div>
        <nav>
            <ul>
                <li>
                    <a href="#">See your patient list</a>
                </li>
                <li><a href="#">
                    Update your account details.
                </a></li>
            </ul>
        </nav>
    </div>

    <main>
        <div class="conten_wrapper">
            <div class="wrapper">

                <div id="patient_list" class="patient_list_view">
                    <h2>Your patients</h2>
                    <ul>
                        <li><a class="single_patient_link" href="patient.php">Patient 1</a></li>
                        <li><a class="single_patient_link" href="patient.php">Patient 1</a></li>
                        <li><a class="single_patient_link" href="patient.php">Patient 1</a></li>
                        <li><a class="single_patient_link" href="patient.php">Patient 1</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="conten_wrapper">
            <div class="wrapper">
                <form action="">
                    <legend><h2>Update your details</h2></legend>
                    <label for="d-address">
                        <h2>Your Address</h2>
                    </label>
                    <input type="text" name="d-address" id="d-address">
        
                    <label for="d-phpne"><h3>Phone No:</h3></label>
                    <input type="tel" name="d-phone" id="d-phone" pattern="{0-9}[11]">
                    
                    <label for="doc-edu">
                        <h3>Please enter your educational qualifications:</h3>
                    </label>
                    <div id="degrees">
                        <input type="text" name="deg1" id="degree"> <button id="add-another-degree">Add Another</button>
                    </div>



                    <label for="d-department">
                        <h3>Update your department:</h3>
                    </label>
                    <select name="department" id="department">
                        <option value="medicine">Medicine</option>
                        <option value="gyno">Gynocololy</option>
                        <option value="neural">Neural</option>
                        <option value="sergical">Sergical</option>
                        <option value="pathology">Pathology</option>
                    </select>


                    <label for="select_available_days">
                        <h2>Change your available days:</h2>
                    </label>
                    <br>
                    <input type="checkbox" name="day_available[]" id="routine" value="0"> Saturday <br>
                    <input type="checkbox" name="day_available[]" id="routine" value="1"> Sunday <br>
                    <input type="checkbox" name="day_available[]" id="routine" value="2"> Monday <br>
                    <input type="checkbox" name="day_available[]" id="routine" value="3"> Tuesday <br>
                    <input type="checkbox" name="day_available[]" id="routine" value="4"> Wednessday <br>
                    <input type="checkbox" name="day_available[]" id="routine" value="5"> Thursday <br>
                    <input type="checkbox" name="day_available[]" id="routine" value="6"> Friday


                    <label for="d-pass"><h3>Password</h3></label>
                    <input type="password" name="d-pass" id="d-pass">
            
                    <label for="d-cpass"><h3>Confirm Password</h3></label>
                    <input type="password" name="d-cpass" id="d-cpass">
                </form>
            </div>
        </div>
    </main>

</body>
</html>