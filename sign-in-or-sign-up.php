
<?php

    include 'db_con.php';

    $sql = "SELECT * FROM departments";

    $dep_list = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In or Sign Up | DBMS Hospital</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">
    <script src="assets/js/jquery.min.js"></script>
    <script src="ajax.js"></script>
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
                        <li><a href="sign-in-or-sign-up.php" class="active-main-nav">
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
    </div>
    <div class="content_wrapper">
    <div class="wrapper">
        <button id="goback" class="btn btn-goback hide-single-item">Go Back</button>
            <div id="signinORsignup" class="form-item">
                <ul>
                    <li><button id="signinbtn" class="signin">Sign In</button></li>
                    <li>OR</li>
                    <li><button id="signupbtn" class="signup">Sign Up</button></li>
                </ul>
            </div>
    
            <div id="signInForm" class="hide-single-item form-item">
                <form onsubmit="return false" method="POST" id="signin" 
                class="sign"> 
                <fieldset>
                    <legend>Login</legend>
                    <label id="warning" style="text-align: center;display: block;"></label>
                <label for="text"><h3>Enter your e-mail:</h3></label>
                    <input type="email" name="email" id="email" placeholder="Mr.x/ mrx@xyz.com">
                    <label for="pass"><h3>Enter your password</h3></label>
                    <input type="password" name="pass" id="pass" placeholder="Password">
                    <span> 
                        <input type="checkbox" value="1" name="remember_me" checked="" id="remem">
                        <label for="remem">Remember Me</label>
                        
                    </span>
                    <input type="submit" value="Sign In" name="signin" class='btn btn-submit'>
                </fieldset>    
                </form>
            </div>

            <div id="signUpCheck" class="hide-single-item form-item">
                <label for="profession">
                    <h2>Choose account type:</h2>
                </label>
                <span>
                    <input type="radio" name="profession" id="profession-doctor" value='doctor'>
                    <label for="profession-doctor">Doctor</label>
                </span>
                <span>
                    <input type="radio" name="profession" id="profession-patient" value='patient'> 
                    <label for="profession-patient">Patient</label>
                </span>
                
            </div>
            <form onsubmit="return false" method="POST" id="signup-patient" class="sign  hide-single-item form-item"> 
                <fieldset>
                    <legend>Register Patient</legend>
                    <label for="p-email"><h3>Email:</h3></label>
                    <input type="email" name="p-email" id="p-email" placeholder="yourmail@xyz.com" required="">
                    <p class="error p-mail-error">Showing</p>
    
                    <label for="name"><h3>Full Name:</h3></label>
                    <input type="text" name="p-name" id="p-name" placeholder="Mr. X" required="">
    
                    <label for="p-phpne"><h3>Phone No:</h3></label>
                    <input type="tel" name="p-phone" id="p-phone" pattern="{0-9}[11]">
                    <p class="error p-phone-error">Showing</p>
                    <div class="gender-radio">
                        <label for="p-gender"><h3>Gender:</h3></label>
                        <input type="radio" name="gender" value="m" id="p-gender-m" required><label for="p-gender-m"> Male</label><br>
                        <input type="radio" name="gender" value="f" id="p-gender-f"><label for="p-gender-f"> Female</label><br>
                        <input type="radio" name="gender" value="n" id="p-gender-n"><label for="p-gender-n"> 3rd Gender</label>
                    </div>
                    
                    <label for="p-dob"><h3>Date of Birth:</h3></label>
                    <input type="date" name="p-dob" id="p-dob" required>

                    <label for="name"><h3>Enter your address:</h3></label>
                    <input type="text" name="p-addrs" id="p-addrs" placeholder="I live in Outer World">

                    <label for="p-pass"><h3>Password</h3></label>
                    <input type="password" name="p-pass" id="p-pass">
    
                    <label for="p-cpass"><h3>Confirm Password</h3></label>
                    <input type="password" name="p-cpass" id="p-cpass">
                    <p class="error p-pass-error">Showing</p>
    
                    <input type="submit" name="signup" value="Register"  class='btn btn-submit'>
                </fieldset>
            </form>
            <form onsubmit="return false" method="POST" id="signup-doc" class="sign hide-single-item form-item"> 
                <fieldset>
                    <legend>Register Doctor</legend>
                    <label for="d-email"><h3>Email:</h3></label>
                    <input type="email" name="d-email" id="d-email" placeholder="yourmail@xyz.com" required="">
                    <p class="error d-mail-error">Showing</p>

    
                    <label for="d-name"><h3>Full Name:</h3></label>
                    <input type="text" name="d-name" id="d-name" placeholder="Mr. X" required="">
    
                    <label for="d-phpne"><h3>Phone No:</h3></label>
                    <input type="tel" name="d-phone" id="d-phone" pattern="[0-9]{11}">
                    
                    <label for="d-department">
                        <h3>Select your department:</h3>
                    </label>
                    <select name="d-department" id="department">
                        <option value="" selected>Choose a department</option>
                        <?php
                            while($row = mysqli_fetch_assoc($dep_list)){
                                echo '<option value="'.$row["dep_id"].'">'.$row["dep_name"].'</option>';
                            }
                        ?>
                    </select>
                    <label for="doc-edu">
                        <h3>Please enter your educational qualifications:</h3>
                    </label>
                    <div id="d-degrees">
                        <input type="text" name="deg[]" class="doc-degree">
                    </div>
                    <a id="add-another-degree" class="btn btn-add-another-field">
                        Add Another
                    </a>
                    
                    <br>
                    <div id="available_doc_days">
                        <label for="select_available_days">
                            <h2>Select your available days:</h2>
                        </label>
                        <span>
                            <label for="sat">Saturday</label>
                            <input type="checkbox" name="day_available[]" value="0" id="sat"> 
                        </span>
                        <span>
                            <label for="sun">Sunday</label>
                            <input type="checkbox" name="day_available[]"  value="1" id="sun">  
                        </span>
                        <span>
                            <label for="mon">Monday</label>
                            <input type="checkbox" name="day_available[]" value="2" id="mon">
                        </span>
                        <span>
                        <label for="tue">Tuesday</label>
                            <input type="checkbox" name="day_available[]" value="3" id="tue">  
                        </span>
                        <span>
                        <label for="wed">Wednessday</label>
                            <input type="checkbox" name="day_available[]" value="4" id="wed"> 
                        </span>
                        
                        <span>
                        <label for="thur">Thursday</label>
                            <input type="checkbox" name="day_available[]" value="5" id="thur"> 
                        </span>
                        <span>
                        <label for="fri">Friday</label>
                            <input type="checkbox" name="day_available[]" value="6" id="fri">
                        </span> 
                    </div>
                    

                    <label for="d-pass"><h3>Password</h3></label>
                    <input type="password" id="d-pass" name="d-pass" >
    
                    <label for="d-cpass"><h3>Confirm Password</h3></label>
                    <input type="password" name="d-cpass" id="d-cpass">
                    <p class="error d-pass-error">Showing</p>
    
                    <input type="submit" name="signup" value="Register"  class='btn btn-submit'>
                </fieldset>
            </form>
            </div>
        </div>
    </div>

    <?php
        include 'footer.php';
    ?>