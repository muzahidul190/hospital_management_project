<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In or Sign Up | DBMS Hospital</title>
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
                <form method="POST" id="signin" 
                class="sign"> 
                <fieldset>
                    <legend>Login</legend>
                <label for="text"><h3>Enter your e-mail:</h3></label>
                    <input type="email" name="email" id="email" placeholder="Mr.x/ mrx@xyz.com">
                    <label for="pass"><h3>Enter your password</h3></label>
                    <input type="password" name="pass" id="pass" placeholder="Password">
                    <span> 
                        <input type="checkbox" name="rememberme" checked="">
                        Remember Me
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
                    <input type="radio" name="profession" id="profession-doctor" value='doctor'> Doctor
                </span>
                <span>
                    <input type="radio" name="profession" id="profession-patient" value='patient'> Patient
                </span>
                
            </div>
            <form method="POST" id="signup-patient" class="sign  hide-single-item form-item"> 
                <fieldset>
                    <legend>Register Patient</legend>
                    <label for="email"><h3>Email:</h3></label>
                    <input type="email" name="p-email" id="p-email" placeholder="yourmail@xyz.com" required="">
    
    
                    <label for="name"><h3>Full Name:</h3></label>
                    <input type="text" name="p-name" id="p-name" placeholder="Mr. X" required="">
    
                    <label for="p-phpne"><h3>Phone No:</h3></label>
                    <input type="tel" name="p-phone" id="p-phone" pattern="{0-9}[11]">

                    <label for="name"><h3>Enter your address:</h3></label>
                    <input type="text" name="p-addrs" id="p-addrs" placeholder="I live in Outer World" required="">

                    <label for="p-pass"><h3>Password</h3></label>
                    <input type="password" name="p-pass" id="p-pass">
    
                    <label for="p-cpass"><h3>Confirm Password</h3></label>
                    <input type="password" name="p-cpass" id="p-cpass">
    
                    <input type="submit" name="signup" value="Register"  class='btn btn-submit'>
                </fieldset>
                </form>
                <form method="POST" id="signup-doc" class="sign hide-single-item form-item"> 
                    <fieldset>
                        <legend>Register Doctor</legend>
                        <label for="d-email"><h3>Email:</h3></label>
                        <input type="email" name="d-email" id="d-email" placeholder="yourmail@xyz.com" required="">
        
        
                        <label for="d-name"><h3>Full Name:</h3></label>
                        <input type="text" name="d-name" id="d-name" placeholder="Mr. X" required="">
        
                        <label for="d-phpne"><h3>Phone No:</h3></label>
                        <input type="tel" name="d-phone" id="d-phone" pattern="{0-9}[11]">
                        
                        <label for="d-department">
                            <h3>Select your department:</h3>
                        </label>
                        <select name="d-department" id="department">
                            <option value="medicine">Medicine</option>
                            <option value="gyno">Gynocololy</option>
                            <option value="neural">Neural</option>
                            <option value="sergical">Sergical</option>
                            <option value="pathology">Pathology</option>
                        </select>
                        <label for="doc-edu">
                            <h3>Please enter your educational qualifications:</h3>
                        </label>
                        <div id="d-degrees">
                            <input type="text" name="deg1" id="degree" class="doc-degree"> <button id="add-another-degree" class="btn btn-add-another-field">Add Another</button>
                        </div>
                        
                        <br>
                        <div id="available_doc_days">
                            <label for="select_available_days">
                                <h2>Select your available days:</h2>
                            </label>
                            <span>
                                Saturday <input type="checkbox" name="day_available[]" value="0"> 
                            </span>
                            <span>
                                Sunday <input type="checkbox" name="day_available[]"  value="1">  
                            </span>
                            <span>
                                Monday <input type="checkbox" name="day_available[]" value="2">
                            </span>
                            <span>
                                Tuesday <input type="checkbox" name="day_available[]" value="3">  
                            </span>
                            <span>
                                Wednessday <input type="checkbox" name="day_available[]" value="4"> 
                            </span>
                            
                            <span>
                                Thursday <input type="checkbox" name="day_available[]" value="5"> 
                            </span>
                            <span>
                                Friday <input type="checkbox" name="day_available[]" value="6">
                            </span> 
                        </div>
                        

                        <label for="d-pass" id="d-pass"><h3>Password</h3></label>
                        <input type="password" name="d-pass" >
        
                        <label for="d-cpass"><h3>Confirm Password</h3></label>
                        <input type="password" name="d-cpass" id="d-cpass">
        
                        <input type="submit" name="signup" value="Register"  class='btn btn-submit' class='btn btn-submit'>
                    </fieldset>
                    </form>
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